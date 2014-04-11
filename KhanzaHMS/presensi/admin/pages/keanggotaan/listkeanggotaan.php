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
    <h1 class="title">:: Data Keanggotaan Koperasi & Jamsostek ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=DetailJamsostek&action=TAMBAH>| Stts Jamsostek |</a>
        <a href=?act=DetailKoperasi&action=TAMBAH>| Stts Koperasi |</a>
        <a href=?act=ListKeanggotaan>| List Keanggotaan |</a>
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
            </div><br>  
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
		$keyword=trim($_POST['keyword']);
        if (empty($awal)) $awal=0;

        $_sql = "select pegawai.id,pegawai.nik,pegawai.nama,
                keanggotaan.koperasi, keanggotaan.jamsostek
                from keanggotaan right OUTER JOIN pegawai
                on keanggotaan.id=pegawai.id
				where pegawai.stts_aktif<>'KELUAR' and pegawai.nik like '%".$keyword."%' or 
				pegawai.stts_aktif<>'KELUAR' and pegawai.nama like '%".$keyword."%' or
				pegawai.stts_aktif<>'KELUAR' and keanggotaan.koperasi like '%".$keyword."%' or
				pegawai.stts_aktif<>'KELUAR' and keanggotaan.jamsostek like '%".$keyword."%'
				order by pegawai.id ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Anggota Koperasi</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Anggota Jamsostek</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                <td>
                                    <center>
                                        <a href=?act=InputKeanggotaan&action=UBAH&id=$baris[0]>[Update]</a>
                                    </center>
                               </td>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                                <td>$baris[3]</td>
                                <td>$baris[4]</td>
                             </tr>";
                    }
            echo "</table>";           
        } else {echo "<b>Data keanggotaan masih kosong !</b>";}

    ?>
    </div>
	</form>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("select pegawai.id,pegawai.nik,pegawai.nama,
                keanggotaan.koperasi, keanggotaan.jamsostek
                from keanggotaan right OUTER JOIN pegawai
                on keanggotaan.id=pegawai.id
				where pegawai.nik like '%".$keyword."%' or 
				pegawai.nama like '%".$keyword."%' or
				keanggotaan.koperasi like '%".$keyword."%' or
				keanggotaan.jamsostek like '%".$keyword."%'
				order by pegawai.id ASC ");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah <a target=_blank href=/penggajian/pages/keanggotaan/LaporanKeanggotaan.php?&keyword=$keyword>| Laporan |</a> ");
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