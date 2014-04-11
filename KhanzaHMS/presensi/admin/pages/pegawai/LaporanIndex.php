<?php
 include '../../conf/conf.php';
?>
<html>
    <head>
        <link href="../../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

    <?php
     $_sqlthn         = "SELECT * FROM set_tahun";
            $hasilthn        = bukaquery($_sqlthn);
            $baristhn        = mysql_fetch_row($hasilthn);
            $tahun           = $baristhn[0];
            $blnini          =$baristhn[1];
            $hari            =$baristhn[2];
            $bln_leng=strlen($blnini);
            $bulan="0";
            if ($bln_leng==1){
                $bulan="0".$blnini;
            }else{
                $bulan=$blnini;
            }
            
        $keyword=$_GET['keyword'];   
        $say=" pegawai.pendidikan=pendidikan.tingkat
                and pegawai.stts_kerja =stts_kerja.stts
                and pegawai.jnj_jabatan=jnj_jabatan.kode ";
        $_sql = "select pegawai.id,
                pegawai.nik,
                pegawai.nama,
                pegawai.jbtn,
                pegawai.pendidikan,
                pegawai.mulai_kerja,
                CONCAT(FLOOR(PERIOD_DIFF(DATE_FORMAT('$tahun-$bulan-$hari', '%Y%m'),DATE_FORMAT(mulai_kerja, '%Y%m'))/12), ' Tahun ',MOD(PERIOD_DIFF(DATE_FORMAT('$tahun-$bulan-$hari', '%Y%m'), DATE_FORMAT(mulai_kerja, '%Y%m')),12), ' Bulan ') as lama,
                pendidikan.indek as index_pendidikan,
                (To_days('$tahun-$bulan-$hari')-to_days(mulai_kerja))/365 as masker,
                stts_kerja.indek as index_status,
                pegawai.indek as index_struktural,
                pegawai.pengurang,
                pegawai.mulai_kontrak,
                CONCAT(FLOOR(PERIOD_DIFF(DATE_FORMAT('$tahun-$bulan-$hari', '%Y%m'),DATE_FORMAT(mulai_kontrak, '%Y%m'))/12), ' Tahun ',MOD(PERIOD_DIFF(DATE_FORMAT('$tahun-$bulan-$hari', '%Y%m'), DATE_FORMAT(mulai_kontrak, '%Y%m')),12), ' Bulan ') as lamakontrak,
                (To_days('$tahun-$bulan-$hari')-to_days(mulai_kontrak))/365 as maskon,
                cuti_diambil
                from pegawai inner join pendidikan
                inner join stts_kerja
                inner join jnj_jabatan
                where ".$say." and pegawai.nik like '%".$keyword."%' or
                ".$say." and pegawai.nama like '%".$keyword."%' or
                ".$say." and pegawai.jbtn like '%".$keyword."%' or
                ".$say." and pegawai.pendidikan like '%".$keyword."%' or
                ".$say." and pegawai.mulai_kerja like '%".$keyword."%'
                order by pegawai.id ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <caption><h1 class=title>DAFTAR INDEX PEGAWAI/KARYAWAN RSKIA SADEWA YOGYAKARTA</h1><br></caption>
                    <tr class='head'>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                                 <td width='180px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Jabatan</strong></font></div></td>
                                 <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Pendidikan</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Mulai Kerja</strong></font></div></td>
                                 <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Lama Kerja</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Index Pendidikan</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Index Masa Kerja</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Index Status</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Index Struktural</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Pengurang</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Total Index</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Mulai Kontrak</strong></font></div></td>
                                 <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Lama Kontrak</strong></font></div></td>
                                 <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Gaji Pokok</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Hak Cuti</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Cuti Diambil</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Sisa Cuti</strong></font></div></td>
                   </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                          $_sql4    = "SELECT `gapok1`, `gapok2`, `gapok3`
                            from pendidikan  where tingkat='$baris[4]' ";
                            $hasil4   = bukaquery($_sql4);
                            $baris4   = mysql_fetch_row($hasil4);
                            $gapok     = 0;
                            $hakcuti   = 0;

                            $_sql6    = "SELECT count(id)
                            from ketidakhadiran  where id='$baris[0]'
                            and tgl like '%".$tahun."%' and jns='C' group by id";
                            $hasil6   = bukaquery($_sql6);
                            $baris6   = mysql_fetch_row($hasil6);
                            $ttlc     = $baris6[0]+$baris[15];
                            if(empty ($baris6[0])){
                                $ttlc=0;
                            }

                          $masa_kerja=0;
                          if($baris[8]<1){
                             $masa_kerja=0;
                          }else if(($baris[8]>=1)&&($baris[8]<2)){
                             $masa_kerja=2;
                          }else if(($baris[8]>=2)&&($baris[8]<3)){
                             $masa_kerja=4;
                          }else if(($baris[8]>=3)&&($baris[8]<4)){
                             $masa_kerja=6;
                          }else if(($baris[8]>=4)&&($baris[8]<5)){
                             $masa_kerja=8;
                          }else if(($baris[8]>=5)&&($baris[8]<6)){
                             $masa_kerja=10;
                          }else if($baris[8]>=6){
                             $masa_kerja=12;
                          }
                          if($baris[14]<1){
                             $gapok=$baris4[0];
                             $hakcuti=0;
                          }else if(($baris[14]>=1)&&($baris[14]<3)){
                             $gapok=$baris4[1];
                             $hakcuti=12;
                          }else if($baris[14]>=3){
                             $gapok=$baris4[2];
                             $hakcuti=14;
                          }

                          $total=0;
                          if($baris[11]==0){
                              $total=($baris[7]+$masa_kerja+$baris[9]+$baris[10]);
                          }else if($baris[11]>0){
                              $total=($baris[7]+$masa_kerja+$baris[9]+$baris[10])*($baris[11]/100);
                          }
                          
                        echo "<tr class='isi'>					        
                                 <td>$baris[1]&nbsp;</td>
                                 <td>$baris[2]&nbsp;</td>
                                 <td>$baris[3]&nbsp;</td>
                                 <td>$baris[4]&nbsp;</td>
                                 <td>$baris[5]&nbsp;</td>
                                 <td>$baris[6]&nbsp;</td>
                                 <td>$baris[7]&nbsp;</td>
                                 <td>$masa_kerja&nbsp;</td>
                                 <td>$baris[9]&nbsp;</td>
                                 <td>$baris[10]&nbsp;</td>
                                  <td>$baris[11] %&nbsp;</td>
                                  <td>$total&nbsp;</td>
                                  <td>$baris[12]&nbsp;</td>
                                  <td>$baris[13]&nbsp;</td>
                                  <td>".formatDuit($gapok)."&nbsp;</td>
                                  <td>$hakcuti&nbsp;</td>
                                  <td>$ttlc&nbsp;</td>
                                  <td>".($hakcuti-$ttlc)."&nbsp;</td>
                               </tr>";
                    }
            echo "</table>";
            echo "<br><font color='999999' size='3'><b>Jumlah Pegawai : ".$jumlah."</b></font>";

        } else {echo "<b>Data Index Pegawai masih kosong !</b>";}
    ?>

    </body>
</html>