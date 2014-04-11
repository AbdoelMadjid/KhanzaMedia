<div class="t">
<div class="b">
<div class="l">
<div class="r">
<div class="bl">
<div class="br">
<div class="tl">
<div class="tr">
<div class="y">
<?php
   $_sql         = "SELECT * FROM set_tahun";
   $hasil        = bukaquery($_sql);
   $baris        = mysql_fetch_row($hasil);
   $tahun         = $baris[0];
   $bln_leng=strlen($baris[1]);
   $bulan="0";
   if ($bln_leng==1){
    	$bulan="0".$baris[1];
   }else{
		$bulan=$baris[1];
   }
?>

<div id="post">
    <h1 class="title">:: List Lembur Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
    <div class="entry">
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
            </div><br>   
            
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
	
    <?php
        $awal=$_GET['awal'];
		$keyword=trim($_POST['keyword']);
        if (empty($awal)) $awal=0;

        $_sql = "SELECT pegawai.id,pegawai.nik,pegawai.nama
                FROM pegawai where pegawai.stts_aktif<>'KELUAR' and pegawai.nik like '%".$keyword."%' or pegawai.stts_aktif<>'KELUAR' and pegawai.nama like '%".$keyword."%'
                ORDER BY pegawai.id ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {

            echo "<table width='750px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Hadir HB</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Index Lembur HB</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Hadir HR</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Index Lembur HR</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        $_sql2="select count(presensi.id),sum(presensi.lembur)
                                from presensi
                                where presensi.id='$baris[0]' and presensi.tgl like '%".$tahun."-".$bulan."%'
                                and presensi.jns='HB'
                                group by presensi.id";
			$hasil2=bukaquery($_sql2);
			$baris2 = mysql_fetch_array($hasil2);
                        $_sql3="select count(presensi.id),sum(presensi.lembur)
                                from presensi
                                where presensi.id='$baris[0]' and presensi.tgl like '%".$tahun."-".$bulan."%'
                                and presensi.jns='HR'
                                group by presensi.id";
			$hasil3=bukaquery($_sql3);
			$baris3=mysql_fetch_array($hasil3);
                        
                        echo "<tr class='isi'>
                                <td>
                                    <center>
                                        <a href=?act=DetailPresensi&action=TAMBAH&id=$baris[0]>[Detail]</a>&nbsp;
                                    </center>
                               </td>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                                <td>$baris2[0]</td>
                                <td>$baris2[1]</td>
                                <td>$baris3[0]</td>
                                <td>$baris3[1]</td>
                             </tr>";
                    }
            echo "</table>";

        } else {echo "<b>Data Presensi masih kosong !</b>";}

    ?>
    </div>
	</form>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT pegawai.id,pegawai.nik,pegawai.nama
                FROM pegawai where pegawai.nik like '%".$keyword."%' or pegawai.nama like '%".$keyword."%'
                ORDER BY pegawai.id ASC ");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah <a target=_blank href=/penggajian/pages/presensi/LaporanPresensi.php?&keyword=$keyword>| Laporan |</a> ");
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