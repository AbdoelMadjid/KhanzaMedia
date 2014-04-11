<?php
 include 'conf/conf.php';
?>
<html>
    <isi>
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </isi>
    <body>

    <?php
    reportsqlinjection();      
        $noretur     =str_replace("_"," ",$_GET['noretur']);  
        $gudang1     =str_replace("_"," ",$_GET['gudang1']); 
        $tanggal     =$_GET['tanggal']; 
        $gudang2     = str_replace("_"," ",$_GET['gudang2']); 

        $_sql = "select mutasibarang.kode_brng,databarang.nama_brng,databarang.h_beli,mutasibarang.jml, 
                mutasibarang.keterangan from mutasibarang inner join databarang  
                on mutasibarang.kode_brng=databarang.kode_brng 
                where (select nama_gudang from datagudang where kode_gudang=kode_gudangdari)='$gudang1' and
                (select nama_gudang from datagudang where kode_gudang=kode_gudangke)='$gudang2' and
                mutasibarang.tanggal='$tanggal'";            
        $hasil=bukaquery($_sql);
        
        $_sqlins = "SELECT nama_instansi, alamat_instansi, kabupaten, propinsi from setting";            
        $hasilins=bukaquery($_sqlins);
        $barisins = mysql_fetch_array($hasilins);
        
        $_sqlset = "SELECT * from setnota";            
        $hasilset=bukaquery($_sqlset);
        $barisset = mysql_fetch_array($hasilset);
        
        if(mysql_num_rows($hasil)!=0) { 
          echo "<table width='$barisset[1]'  border='0' align='left' cellpadding='0' cellspacing='0' class='tbl_form'>
                  <tr class='isi14'>
                       <td width=50% colspan=5 align=left>
                           <font color='000000' size='4' face='Tahoma'>$barisins[0]</font><br/>
                           <font color='000000' size='2' face='Tahoma'>
                               $barisins[1], $barisins[2], $barisins[3]<br/>
                           </font>
                       </td>
                 </tr>
                 <tr class='isi14'>
                    <td colspan='5' align='center'>
                       <font color='000000' size='3' face='Tahoma'>SURAT JALAN</font>
                    </td>
                 </tr> 
                 <tr class='isi14'>
                    <td colspan='5' align='center'>
                       <font color='000000' size='2' face='Tahoma'>&nbsp;</font>
                    </td>
                 </tr> 
                 <tr>
                 <td colspan='6'>
                 <table width=100%>
                 <tr class='isi14'>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'>Dari Gudang </font>
                    </td>
                    <td width='30%'>: $gudang1</td>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'></font>
                    </td>
                    <td width='30%'>$barisins[2], ".substr($tanggal,8,2)."-".substr($tanggal,5,2)."-".substr($tanggal,0,4)."</td>
                 </tr> 
                 <tr class='isi14'>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'>Ke Gudang</font>
                    </td>
                    <td width='30%'>: $gudang2</td>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'></font>
                    </td>
                    <td width='30%'></td>
                 </tr> 
                 </table>
                 </td>
                 </tr>
                 <tr class='isi13'>
                     <td colspan=4>&nbsp;</td>
                 </tr>
                 <tr class='isi14'>
                      <td colspan=4 height='310px' valign=top>
                            <table width=100% cellpadding='0' cellspacing='0'>
                               <tr class=isi15>
                                   <td width='5%' align=center>No</td>
                                   <td width='5%' align=center>Kode Barang</td>
                                   <td width='60%' align=center>Nama Barang</td>
                                   <td width='10%' align=center>Harga</td>
                                   <td width='5%' align=center>Jml</td>
                                   <td width='10%' align=center>Total</td>
                                   <td width='10%' align=center>Keterangan</td>
                               </tr>";
                                      $ttlpesan=0;
                                      $i=1;
                                      while($barispesan = mysql_fetch_array($hasil)) { 
                                          $ttlpesan=$ttlpesan+($barispesan[3]*$barispesan[2]);
                                          echo "
                                            <tr class='isi15'>
                                                <td>$i</td>
                                                <td>$barispesan[0]</td>
                                                <td>$barispesan[1]</td>
                                                <td align=right>".formatDuit2($barispesan[2])."</td>
                                                <td align=right>".formatDuit2($barispesan[3])."</td>
                                                <td align=right>".formatDuit2($barispesan[2]*$barispesan[3])."</td>
                                                <td>$barispesan[1]</td>
                                           </tr>";$i++;
                                      }    
                             echo " <tr class='isi14'>
                                      <td colspan=5 align=right><b>Total</b></td>
                                      <td align='right'><b>".formatDuit2($ttlpesan)."</b></td>
                                    </tr> 
                          </table>
                      </td>
                    </tr>
                    <tr class='isi14'>
                      <td colspan=1 width='30%'>
                        <table width='100%' cellpadding='0' cellspacing='0'>
                           <tr class='isi15'>
                              <td width='33%'>Ptg.Pengirim</td><td width='33%'>Checking</td><td width='33%'>Ptg.Penerima</td>
                           </tr>
                           <tr class='isi15'>
                              <td height='40px'>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                           </tr>
                        </table>
                      </td>
                      <td colspan=3 width='70%'>
                        <table width=100% cellpadding='0' cellspacing='0'>
                           <tr class='isi14'>
                              <td width='80%'>Catatan</td><td align=center>Penerima</td>
                           </tr>
                           <tr class='isi14' valign=bottom>
                              <td height='40px'>$catatan</td><td align=center>(_______________)</td>
                           </tr>
                        </table>
                      </td>
                    </tr>
                 </table>";
            
        } else {echo "<b>Data pesan masih kosong !</b>";}
    ?>

    </body>
</html>
