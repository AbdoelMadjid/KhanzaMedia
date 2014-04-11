<?php
   $_sql         = "SELECT * FROM set_tahun";
   $hasil        = bukaquery($_sql);
   $baris        = mysql_fetch_row($hasil);
   $tahun         = $baris[0];
   $bln_leng=strlen($baris[1]);
   $hari         =$baris[2];
   $bulan="0";
   $bulanindex=$baris[1];
   if ($bln_leng==1){
    	$bulan="0".$baris[1];
   }else{
	$bulan=$baris[1];
   }
   $action      =$_GET['action'];

    $_sqllibur = "select `tanggal`, `ktg`
                        from set_hari_libur
                        where tanggal like '%".$tahun."-".$bulan."%' ORDER BY tanggal";
                $hasillibur=bukaquery($_sqllibur);
                $jumlahlibur=mysql_num_rows($hasillibur);
?>
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
    <h1 class="title">:: Pencarian Data Pegawai ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputPegawai&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListCariPegawai>| List Data |</a>
        <a href=?act=ListIndexPegawai>| Index Pegawai |</a>
    </div>   
	<br/>
    <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
        <?php
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
        <div style="width: 598px; height:400px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
        $keyword=trim($_POST['keyword']);
        if (empty($awal)) $awal=0;
        $_sql = "select id,nik,nama,jk,jbtn,jnj_jabatan,departemen,bidang,stts_wp,stts_kerja,
                npwp, pendidikan, gapok,tmp_lahir,tgl_lahir,alamat,kota,mulai_kerja,ms_kerja,
                indexins,bpd,rekening,stts_aktif,wajibmasuk,mulai_kontrak from pegawai
                 where
                 nik like '%".$keyword."%' or
                 nama like '%".$keyword."%' or
                 jk like '%".$keyword."%' or
                 jbtn like '%".$keyword."%' or
                 jnj_jabatan like '%".$keyword."%' or
                 departemen like '%".$keyword."%' or
                 bidang like '%".$keyword."%' or
                 stts_wp like '%".$keyword."%' or
                 stts_kerja like '%".$keyword."%' or
                 npwp like '%".$keyword."%' or
                 pendidikan like '%".$keyword."%' or
                 gapok like '%".$keyword."%' or
                 tmp_lahir like '%".$keyword."%' or
                 tgl_lahir like '%".$keyword."%' or
                 alamat like '%".$keyword."%' or
                 kota like '%".$keyword."%' or
                 mulai_kerja like '%".$keyword."%' or
                 ms_kerja like '%".$keyword."%' or
                 indexins like '%".$keyword."%' or
                 bpd like '%".$keyword."%' or
                 rekening like '%".$keyword."%' or
                 stts_aktif like '%".$keyword."%'
                 order by id ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {            
            echo "<table width='2600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                                 <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                                 <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                                 <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>J.K.</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Jabatan</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Kode Jenjang</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Departemen</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Bagian</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Status</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Status Karyawan</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NPWP</strong></font></div></td>
                                 <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Pendidikan</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tmp.Lahir</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Lahir</strong></font></div></td>
                                 <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Alamat</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Kota </strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Mulai Kerja</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Kode Ms Kerja</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Kode Index</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>BPD</strong></font></div></td>
                                 <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Rekening</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Stts Aktif</strong></font></div></td>
                                 <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Wajib Masuk</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Mulai Kontrak</strong></font></div></td>
                    </tr>";					
					
                    while($baris = mysql_fetch_array($hasil)) {
			$_sql2         = "SELECT normal-$jumlahlibur,jmlhr FROM set_tahun";
			 $hasil2        = bukaquery($_sql2);
			 $baris2        = mysql_fetch_row($hasil2);
			 $jmlmsk         = $baris2[0];
			 if($baris[23]==-1){
			     $jmlmsk=0;
			 }else if($baris[23]==-2){
			     $jmlmsk=$baris2[1]-4;
			 }else if($baris[23]==-3){
			     $jmlmsk=$baris2[1]-2-$jumlahlibur;
			 }else if($baris[23]!=0){
			     $jmlmsk=$baris[23];
			 }else if(!($baris[23]==0)){
			     $jmlmsk=$baris2[0];
			 }
                        echo "<tr class='isi' title='$baris[1] $baris[2]'>
								  <td>
                                        <center>
                                        <a href=?act=InputPegawai&action=UBAH&id=$baris[0]>[edit]</a>"; ?>
                                        <a href="?act=ListCariPegawai&action=HAPUS&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data pegawai <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                           echo "       </center>
                                </td>								
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[1]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[2]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[3]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[4]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[5]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[6]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[7]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[8]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[9]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[10]</a></td>
                                 <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[11]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[13]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[14]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[15]</a></td>
				  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[16]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[17]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[18]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[19]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[20]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[21]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[22]</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$jmlmsk</a></td>
                                  <td><a href=?act=InputPegawai&action=UBAH&id=$baris[0]>$baris[24]</a></td>
                               </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Pegawai masih kosong !</b>";}

    ?>

    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" pegawai "," id ='".$_GET['id']."' ","?act=ListCariPegawai");
       }
       $BtnPrint=$_POST['BtnPrint'];
       if (isset($BtnPrint)) {
           echo"<html><head><title></title><meta http-equiv='refresh' content='2;pages/pegawai/LaporanPegawai.php?&keyword=$keyword'></head><body></body></html>";
                    
       }
    ?>
    </div>

    </form>

     
       <?php
            if(mysql_num_rows($hasil)!=0) {
				$hasil1=bukaquery("select id,nik,nama,jk,jbtn,jnj_jabatan,departemen,bidang,stts_wp,stts_kerja,
                 npwp, pendidikan, gapok,tmp_lahir,tgl_lahir,alamat,kota,mulai_kerja,ms_kerja,
                 indexins,bpd,rekening,stts_aktif,wajibmasuk,mulai_kontrak from pegawai
                 where
                 nik like '%".$keyword."%' or
                 nama like '%".$keyword."%' or
                 jk like '%".$keyword."%' or
                 jbtn like '%".$keyword."%' or
                 jnj_jabatan like '%".$keyword."%' or
                 departemen like '%".$keyword."%' or
                 bidang like '%".$keyword."%' or
                 stts_wp like '%".$keyword."%' or
                 stts_kerja like '%".$keyword."%' or
                 npwp like '%".$keyword."%' or
                 pendidikan like '%".$keyword."%' or
                 gapok like '%".$keyword."%' or
                 tmp_lahir like '%".$keyword."%' or
                 tgl_lahir like '%".$keyword."%' or
                 alamat like '%".$keyword."%' or
                 kota like '%".$keyword."%' or
                 mulai_kerja like '%".$keyword."%' or
                 ms_kerja like '%".$keyword."%' or
                 indexins like '%".$keyword."%' or
                 bpd like '%".$keyword."%' or
                 rekening like '%".$keyword."%' or
                 stts_aktif like '%".$keyword."%'
                 order by id ASC");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo(" Data : $jumlah<a target=_blank href=/penggajian/pages/pegawai/LaporanPegawai.php?&keyword=$keyword>| Laporan |</a> ");
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