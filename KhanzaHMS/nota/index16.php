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

        $_sql = "select piutang.nota_piutang, piutang.tgl_piutang, 
                    piutang.kode_krywn,datakaryawan.nama_krywn, 
                    piutang.kode_member,piutang.nama_member, 
                    piutang.catatan,piutang.jns_jual,piutang.ongkir,piutang.uangmuka,piutang.sisapiutang,
                    detailpiutang.kode_brng,databarang.nama_brng, detailpiutang.kode_sat,
                    kodesatuan.satuan,detailpiutang.h_jual, detailpiutang.jumlah, 
                    detailpiutang.subtotal, detailpiutang.dis, detailpiutang.bsr_dis, detailpiutang.total,piutang.tgltempo                        
                    from piutang inner join datakaryawan  
                    inner join detailpiutang inner join databarang inner join kodesatuan 
                    on detailpiutang.kode_brng=databarang.kode_brng 
                    and detailpiutang.kode_sat=kodesatuan.kode_sat 
                    and piutang.kode_krywn=datakaryawan.kode_krywn
                    and piutang.nota_piutang=detailpiutang.nota_piutang where piutang.nota_piutang='$nonota' ";            
        $hasil=bukaquery($_sql);
        $barisdata=  mysql_fetch_array($hasil);
        
        $nota_piutang   =$barisdata["nota_piutang"];
        $tgl_piutang    =$barisdata["tgl_piutang"]; 
        $kode_krywn     =$barisdata["kode_krywn"];
        $nama_krywn     =$barisdata["nama_krywn"];
        $ongkir         =$barisdata["ongkir"];
        $uangmuka       =$barisdata["uangmuka"];
        $sisapiutang    =$barisdata["sisapiutang"];
        $nama_member    =$barisdata["nama_member"];
        $tgltempo       =$barisdata["tgltempo"];
        $catatan        =$barisdata["catatan"];
        
        
        $hasil2=bukaquery($_sql);
        
        $_sqlins = "SELECT nama_instansi, alamat_instansi, kabupaten, propinsi from setting";            
        $hasilins=bukaquery($_sqlins);
        $barisins = mysql_fetch_array($hasilins);
        
        $_sqlset = "SELECT * from setnota";            
        $hasilset=bukaquery($_sqlset);
        $barisset = mysql_fetch_array($hasilset);
        
        if(mysql_num_rows($hasil)!=0) { 
          echo "<table width='$barisset[1]'  border='0' align='left' cellpadding='0' cellspacing='0' class='tbl_form'>
                 <tr class='isi14'>
                       <td width=50% colspan=4 align=left>
                           <font color='000000' size='4' face='Tahoma'>&nbsp;</font><br/>
                           <font color='000000' size='2' face='Tahoma'>
                               &nbsp;<br/>
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
                    <td width='30%'>: $nota_piutang</td>
                    <td width='20%'>&nbsp;</td>
                    <td width='30%'>$barisins[2], ".substr($tgl_piutang,8,2)."-".substr($tgl_piutang,5,2)."-".substr($tgl_piutang,0,4)."</td>
                 </tr> 
                 <tr class='isi14'>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'>Sales</font>
                    </td>
                    <td width='30%'>: $nama_krywn</td>
                    <td width='20%'>&nbsp;</td>
                    <td width='30%'>$nama_member</td>
                 </tr> 
                 <tr class='isi14'>
                    <td width='20%'>
                       <font color='000000' size='2' face='Tahoma'></font>
                    </td>
                    <td width='30%'></td>
                    <td width='20%'>&nbsp;</td>
                    <td width='30%'>Jatuh Tempo : ".substr($tgltempo,8,2)."-".substr($tgltempo,5,2)."-".substr($tgltempo,0,4)."</td>
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
                                   <td width='60%' align=center>Barang</td>
                                   <td width='10%' align=center>Harga</td>
                                   <td width='5%' align=center>Jml</td>
                                   <td width='10%' align=center>Diskon</td>
                                        <td width='110px' align=center>Total</td>
                               </tr>";
                                      $ttlpesan=0;
                                      $i=1;
                                      while($barisdata = mysql_fetch_array($hasil2)) { 
                                          $ttlpesan=$ttlpesan+$barisdata["total"];
                                          echo "
                                            <tr class='isi15'>
                                                <td>$i</td>
                                                <td>".$barisdata["nama_brng"]."</td>
                                                <td align=right>".formatDuit2($barisdata["h_jual"])."</td>
                                                <td align=right>".formatDuit2($barisdata["jumlah"])."</td>
                                                <td align=right>".formatDuit2($barisdata["subtotal"])."</td>
                                                <td align=right>".formatDuit2($barisdata["total"])."</td>
                                           </tr>";$i++;
                                      }    
                             echo "<tr class='isi14'>
                                      <td colspan=4></td>
                                      <td>Ttl.Beli</td>
                                      <td align='right'>".formatDuit2($ttlpesan)."</td>
                                    </tr> 
                                    <tr class='isi14'>
                                      <td colspan=4></td>
                                      <td>Ongkir</td>
                                      <td align='right'>".formatDuit2($ongkir)."<br/><hr/></td>
                                    </tr> 

                                    <tr class='isi14'>
                                      <td colspan=4></td>
                                      <td>Uang Muka</td>
                                      <td align='right'>".formatDuit2($uangmuka)."<br/><hr/></td>
                                    </tr> 
                                     
                                    <tr class='isi14'>
                                      <td colspan=4></td>
                                      <td><b>Total</b></td>
                                      <td align='right'><b>".formatDuit2($ttlpesan+$ongkir-$uangmuka)."</b></td>
                                    </tr>    

                          </table>
                          <br/>
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
