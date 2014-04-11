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
        $nonota    =str_replace("_"," ",$_GET['nonota']);  
        $kdptg     =str_replace("_"," ",$_GET['kdptg']); 
        $bayar     =$_GET['bayar']; 
        $ongkir    =$_GET['ongkir']; 
        $tanggal   =$_GET['tanggal']; 
        $nm_member = str_replace("_"," ",$_GET['nm_member']); 
        $catatan = str_replace("_"," ",$_GET['catatan']); 

        $_sql = "SELECT kode_brng, nama_brng, satuan, h_jual,jumlah, subtotal, dis, bsr_dis, 
                 dis2, bsr_dis2, total from tampjual1";            
        $hasil=bukaquery($_sql);
        
        $_sqluser = "SELECT nama_krywn from datakaryawan where  kode_krywn='$kdptg'";            
        $hasiluser=bukaquery($_sqluser);
        $barisuser = mysql_fetch_array($hasiluser);
        
        $_sqlins = "SELECT nama_instansi, alamat_instansi, kabupaten, propinsi from setting";            
        $hasilins=bukaquery($_sqlins);
        $barisins = mysql_fetch_array($hasilins);
        
        $_sqlset = "SELECT * from setnota";            
        $hasilset=bukaquery($_sqlset);
        $barisset = mysql_fetch_array($hasilset);
        
        if(mysql_num_rows($hasil)!=0) { 
          echo "<table width='$barisset[1]'  border='0' align='left' cellpadding='0' cellspacing='0' class='tbl_form'>
                 <tr class='isi14'>
                       <td width=50% colspan=6 align=left>
                           <font color='000000' size='4' face='Tahoma'>$barisins[0]</font><br/>
                           <font color='000000' size='2' face='Tahoma'>
                               $barisins[1], $barisins[2], $barisins[3]<br/>
                           </font>
                       </td>
                 </tr>
                 <tr>
                 <td colspan='6'>
                 <table width=100%>
                 <tr class='isi14'>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'>Faktur No</font>
                    </td>
                    <td width='30%'>: $nonota</td>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'></font>
                    </td>
                    <td width='30%'>$barisins[2], ".substr($tanggal,8,2)."-".substr($tanggal,5,2)."-".substr($tanggal,0,4)."</td>
                 </tr> 
                 <tr class='isi14'>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'>Sales</font>
                    </td>
                    <td width='30%'>: $barisuser[0]</td>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'></font>
                    </td>
                    <td width='30%'>$nm_member</td>
                 </tr>
                 </table>
                 </td>
                 </tr>
                 <tr class='isi13'>
                     <td colspan=6>&nbsp;</td>
                 </tr>
                 <tr class='isi14'>
                      <td colspan=6 height='310px' valign=top>
                            <table width=100% cellpadding='0' cellspacing='0'>
                               <tr class=isi15>
                                   <td width='5%' align=center>No</td>
                                   <td width='50%' align=center>Barang</td>
                                   <td width='10%' align=center>Satuan</td>
                                   <td width='10%' align=center>Harga</td>
                                   <td width='5%' align=center>Jml</td>
                                   <td width='10%' align=center>Diskon1</td>
                                   <td width='10%' align=center>Diskon2</td>
                                        <td width='110px' align=center>Total</td>
                               </tr>";
                                      $ttlpesan=0;
                                      $i=1;
                                      while($barispesan = mysql_fetch_array($hasil)) { 
                                          $ttlpesan=$ttlpesan+$barispesan[10];
                                          echo "
                                            <tr class='isi15'>
                                                <td>$i</td>
                                                <td>$barispesan[1]</td>
                                                <td>$barispesan[2]</td>
                                                <td align=right>".formatDuit2($barispesan[3])."</td>
                                                <td align=right>".formatDuit2($barispesan[4])."</td>
                                                <td align=right>".formatDuit2($barispesan[7])."</td>
                                                <td align=right>".formatDuit2($barispesan[9])."</td>
                                                <td align=right>".formatDuit2($barispesan[10])."</td>
                                           </tr>";$i++;
                                      }    
                             echo "<tr class='isi14'>
                                      <td colspan=6></td>
                                      <td>Ttl.Beli</td>
                                      <td align='right'>".formatDuit2($ttlpesan)."</td>
                                    </tr> 
                                    <tr class='isi14'>
                                      <td colspan=6></td>
                                      <td>Ongkir</td>
                                      <td align='right'>".formatDuit2($ongkir)."<br/><hr/></td>
                                    </tr>   
                                    <tr class='isi14'>
                                      <td colspan=6></td>
                                      <td>Total</td>
                                      <td align='right'>".formatDuit2($ongkir+$ttlpesan)."</td>
                                    </tr>                                     
                                    <tr class='isi14'>
                                      <td colspan=6></td>
                                      <td>Bayar</td>
                                      <td align='right'>".formatDuit2($bayar)."<br/><hr/></td>
                                    </tr>  
                                    <tr class='isi14'>
                                      <td colspan=6></td>
                                      <td>Kembalian</td>
                                      <td align='right'>".formatDuit2($bayar-$ttlpesan-$ongkir)."</td>
                                    </tr>  
                          </table>
                      </td>
                    </tr>
                    <tr class='isi14'>
                      <td colspan=1 width='30%'>
                        <table width='100%' cellpadding='0' cellspacing='0'>
                           <tr class='isi15'>
                              <td width='33%'>Sales&nbsp;&nbsp;&nbsp;</td><td width='33%'>Checking</td><td width='33%'>Gudang</td>
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
