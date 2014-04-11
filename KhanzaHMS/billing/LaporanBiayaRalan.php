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
        $tgl1      = $_GET['tgl1']; 
        $tgl2      = $_GET['tgl2']; 

        $_sql = "select rawat_jl_dr.no_rawat,reg_periksa.no_rkm_medis,pasien.nm_pasien 
                from rawat_jl_dr inner join reg_periksa inner join pasien
                on rawat_jl_dr.no_rawat=reg_periksa.no_rawat
                and reg_periksa.no_rkm_medis=pasien.no_rkm_medis
                where tgl_registrasi between '$tgl1' and '$tgl2'
                group by reg_periksa.no_rawat ";            
        $hasil=bukaquery($_sql);
        
        if(mysql_num_rows($hasil)!=0) { 
          echo "<table width='100%'  border='0' align='left' cellpadding='0' cellspacing='0' class='tbl_form'>
            <tr class='isi13'>
                <td>
                   <table width='100%' bgcolor='#ffffff' align='left' border='0' class='tbl_form' border=1>
                        <tr>
                            <td>
                                <img width='80' height='70' src='images/LOGO.png'/>
                            </td>
                            <td>
                            <center>
                                    <font color='333333' size='2'  face='Tahoma'>RUMAH SAKIT AMAL SEHAT WONOGIRI</font><br/>
                                    <font color='333333' size='1'  face='Tahoma'>
                                    Jl.Ngerjopuro-Slogohimo, Slogohimo, Wonogiri 57694<br/>
                                    Telp. : 0273-5316677, 5316688, SMS AMAL SEHAT : 08132952199<br/>
                                    Email : amal_sehat@telkom.net
                                    </font> 
                            </center>
                            </td>
                            <td>
                              <center>
                                <font color='333333' size='3'  face='Tahoma'>DAFTAR BIAYA RAWAT JALAN</font>
                              </center>
                            </td>
                        </tr>
                  </table>
                </td>
            </tr>           
             <tr class='isi14'>
                <td height='310px' valign=top>
                <br/>
                  <table width=100% cellpadding='0' cellspacing='0' >
                     <tr class=isi15>
                          <td width='2%' align=center rowspan='2'>No</td>
                          <td width='20%' align=center colspan='2'>PASIEN</td>
                          <td width='58%' align=center colspan='6'>BIAYA PENGOBATAN</td>
                          <td width='10%' align=center rowspan='2'>DOKTER</td>
                          <td width='10%' align=center rowspan='2'>KETERANGAN</td>
                     </tr>
                     <tr class=isi15>
                          <td align=center>NO.RM</td>
                          <td align=center>NAMA PASIEN</td>
                          <td align=center>ADMINISTRASI</td>
                          <td align=center>JASA MEDIS</td>
                          <td align=center>OBAT</td>
                          <td align=center>TINDAKAN</td>
                          <td align=center>OKSIGEN</td>
                          <td align=center>TOTAL</td>
                     </tr>
                     ";
                                      $i=1;
                                      while($barispesan = mysql_fetch_array($hasil)) { 
                                          echo "<tr class=isi15>
                                                   <td>$i</td>
                                                   <td>".$barispesan["no_rkm_medis"]."</td>
                                                   <td>".$barispesan["nm_pasien"]."</td>
                                                   <td align='right'>&nbsp;".
                                                   formatDuit2(getOne("select sum(billing.totalbiaya) from billing where status='Registrasi'
                                                           and no_rawat='".$barispesan["no_rawat"]."'  group by billing.no_rawat"))."
                                                   </td>
                                                   <td align='right'>&nbsp;".
                                                   formatDuit2(getOne("select sum(jns_perawatan.total_byrdr) from jns_perawatan inner join rawat_inap_dr
                                                         on rawat_inap_dr.kd_jenis_prw=jns_perawatan.kd_jenis_prw where
                                                         no_rawat='".$barispesan["no_rawat"]."'"))."
                                                   </td>
                                                   <td align='right'>&nbsp;".
                                                   formatDuit2(getOne("select sum(billing.totalbiaya) from billing where status='Obat'
                                                           and no_rawat='".$barispesan["no_rawat"]."'  group by billing.no_rawat"))."
                                                   </td>
                                                   <td align='right'>&nbsp;".
                                                   formatDuit2(getOne("select sum(billing.totalbiaya) from billing where status='Ralan Dokter'
                                                           and no_rawat='".$barispesan["no_rawat"]."'  group by billing.no_rawat")+
                                                           getOne("select sum(billing.totalbiaya) from billing where status='Ralan Paramedis'
                                                           and no_rawat='".$barispesan["no_rawat"]."'  group by billing.no_rawat"))."
                                                   </td>
                                                   <td>&nbsp;</td>
                                                   <td align='right'>&nbsp;".
                                                   formatDuit2(getOne("select sum(billing.totalbiaya) from billing where no_rawat='".$barispesan["no_rawat"]."'  group by billing.no_rawat"))."
                                                   </td>
                                                   <td align='left'>&nbsp;".
                                                   getOne("select nm_perawatan from billing where no_rawat='".$barispesan["no_rawat"]."' and status='Dokter' ")."
                                                   </td>
                                                   <td>&nbsp;".getOne("select if(sum(billing.totalbiaya)>0,'Lunas','Belum Lunas') from billing where no_rawat='".$barispesan["no_rawat"]."'  group by billing.no_rawat")."</td>
                                                <tr>";$i++;
                                      }    
                             echo " 
                          </table>
                      </td>
                    </tr>                   

                 </table>";
            
        } else {echo "<b>Data pesan masih kosong !</b>";}
    ?>

    </body>
</html>
