<div class="t">
<div class="b">
<div class="l">
<div class="r">
<div class="bl">
<div class="br">
<div class="tl">
<div class="tr">
<div class="y">

<div id="post">
    <h1 class="title">:: Data Index Pegawai ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputPegawai&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListCariPegawai>| List Data |</a>
        <a href=?act=ListIndexPegawai>| Index Pegawai |</a>
    </div>   
	<br/>
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
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
  
                echo "";
                $action      =$_GET['action'];
                //$keyword     =$_GET['keyword'];
                echo "<input type=hidden name=keyword value=$keyword><input type=hidden name=action value=$action>";
        ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="25%" >Keyword</td><td width="">:</td>
                    <td width="82%"><input name="keyword" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $keyword;?>" size="65" maxlength="250" />

                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnCari type=submit class="button" value="&nbsp;&nbsp;Cari&nbsp;&nbsp;">
                                <input name=BtnPrint type=submit class="button" value="&nbsp;Print&nbsp;">
            </div><br>
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
        $keyword=trim($_POST['keyword']);
        if (empty($awal)) $awal=0;
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
            echo "<table width='2300px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                                 <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
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
                            if(empty ($baris6[0])){
                                $ttlc=0;
                            }

                            $ttlc     = $baris6[0]+$baris[15];
                            
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
                          }else if(($baris[8]>=6)&&($baris[8]<7)){
                             $masa_kerja=12;
                          }else if($baris[8]>=7){
                             $masa_kerja=14;
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
                          
                        echo "<tr class='isi' title='$baris[1] $baris[2]'>
                                  <td width='70'>
                                        <center>
                                        <a href=?act=EditIndexPegawai&action=UBAH&id=$baris[0]>[edit]</a>";
                           echo "       </center>
                                </td>						        
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[1]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[2]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[3]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[4]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[5]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[6]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[7]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$masa_kerja</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[9]</a></td>
                                 <td><a href=?act=EditIndexPegawai&action=UBAH&id=$baris[0]>$baris[10]</a></td>
                                  <td><a href=?act=EditIndexPegawai&action=UBAH&id=$baris[0]>$baris[11] %</a></td>
                                  <td><a href=?act=EditIndexPegawai&action=UBAH&id=$baris[0]>$total</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[12]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[13]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>".formatDuit($gapok)."</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$hakcuti</a></td>
                                  <td><a href=?act=EditIndexPegawai&action=UBAH&id=$baris[0]>$ttlc</a></td>
                                  <td><a href=?act=EditIndexPegawai&action=UBAH&id=$baris[0]>".($hakcuti-$ttlc)."</a></td>
                               </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Index Pegawai masih kosong !</b>";}

       $BtnPrint=$_POST['BtnPrint'];
       if (isset($BtnPrint)) {
           echo"<html><head><title></title><meta http-equiv='refresh' content='2;pages/pegawai/LaporanIndex.php?&keyword=$keyword'></head><body></body></html>";

       }
    ?>
    </div>
            </form>
       <?php
            if(mysql_num_rows($hasil)!=0) {
                $say=" pegawai.pendidikan=pendidikan.tingkat
                and pegawai.stts_kerja =stts_kerja.stts
                and pegawai.jnj_jabatan=jnj_jabatan.kode ";
                $hasil1=bukaquery("select pegawai.id,
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
                (To_days('$tahun-$bulan-$hari')-to_days(mulai_kontrak))/365 as maskon
                from pegawai inner join pendidikan
                inner join stts_kerja
                inner join jnj_jabatan
                where ".$say." and pegawai.nik like '%".$keyword."%' or
                ".$say." and pegawai.nama like '%".$keyword."%' or
                ".$say." and pegawai.jbtn like '%".$keyword."%' or
                ".$say." and pegawai.pendidikan like '%".$keyword."%' or
                ".$say." and pegawai.mulai_kontrak like '%".$keyword."%' or
                ".$say." and pegawai.mulai_kerja like '%".$keyword."%'
                order by pegawai.id ASC");
                $jumlah1=mysql_num_rows($hasil1);;
                $i=$jumlah1/19;
                $i=ceil($i);
                echo("Data : $jumlah <a target=_blank href=/penggajian/pages/pegawai/LaporanIndex.php?&keyword=$keyword>| Laporan |</a> ");
             }
       ?>
    </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>