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
    <h1 class="title">:: List Pinjam Koperasi Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
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

        $say=" pegawai.id=keanggotaan.id and keanggotaan.koperasi='Y'  ";
        $_sql = "SELECT pegawai.id,pegawai.nik,pegawai.nama
                FROM pegawai,keanggotaan 
                where $say and pegawai.nik like '%".$keyword."%' or
                $say and pegawai.nama like '%".$keyword."%'
                ORDER BY pegawai.id ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {

            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Keterangan Pinjam</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        $_sql2="select stts from pinjam_koperasi where
                               stts='Belum Lunas' and id='$baris[0]' ";
			$hasil2=bukaquery($_sql2);
                        $jumlah2=mysql_num_rows($hasil2);
                        $status="Tidak Ada Pinjaman";
                        if($jumlah2!=0){
                           $status="Ada Pinjaman";
                        }
                        echo "<tr class='isi'>
                                <td>
                                    <center>
                                        <a href=?act=DetailPinjam&action=TAMBAH&id=$baris[0]>[Detail]</a>&nbsp;
                                    </center>
                               </td>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                                <td>$status</td>
                             </tr>";
                    }
            echo "</table>";

        } else {echo "<b>Data Pinjam masih kosong !</b>";}

    ?>
    </div>
	</form>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $say=" pegawai.id=keanggotaan.id and keanggotaan.koperasi='Y'  ";
            $hasil1=bukaquery("SELECT pegawai.id,pegawai.nik,pegawai.nama
                FROM pegawai,keanggotaan
                where $say and pegawai.nik like '%".$keyword."%' or
                $say and pegawai.nama like '%".$keyword."%'
                ORDER BY pegawai.id ASC ");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah <a target=_blank href=/penggajian/pages/pinjam/LaporanPinjam.php?&keyword=$keyword>| Laporan |</a> ");
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