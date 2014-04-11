<?php
 include '../../conf/conf.php';
?>
<html>
    <head>
        <link href="../../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
   <?php
        $keyword=$_GET['keyword'];
        $_sql         = "SELECT * FROM set_tahun";
        $hasil        = bukaquery($_sql);
        $baris        = mysql_fetch_row($hasil);
        $tahun         = $baris[0];
        $bulan          = $baris[1];
        $_sql = "SELECT pegawai.id,
		        pegawai.nik,
				pegawai.nama,
				pegawai.departemen,
				keanggotaan.koperasi,
				keanggotaan.jamsostek,
				potongan.jamsostek,
				potongan.dansos,
				potongan.simwajib,
				potongan.angkop,
				potongan.angla,
				potongan.telpri,
				potongan.pajak,
				potongan.pribadi,
				potongan.lain,
				potongan.ktg
				FROM keanggotaan, potongan
				RIGHT OUTER JOIN pegawai ON potongan.id = pegawai.id
				AND tahun like '%".$tahun."%'  and bulan like '%".$bulan."%'
				WHERE pegawai.stts_aktif<>'KELUAR' and keanggotaan.id=pegawai.id and pegawai.nik like '%".$keyword."%' or
				pegawai.stts_aktif<>'KELUAR' and keanggotaan.id=pegawai.id and pegawai.nama like '%".$keyword."%' or
				pegawai.stts_aktif<>'KELUAR' and keanggotaan.id=pegawai.id and pegawai.departemen like '%".$keyword."%' or
				pegawai.stts_aktif<>'KELUAR' and keanggotaan.id=pegawai.id and keanggotaan.koperasi like '%".$keyword."%' or
				pegawai.stts_aktif<>'KELUAR' and keanggotaan.id=pegawai.id and keanggotaan.jamsostek like '%".$keyword."%'
				order by pegawai.id ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        $jamsos=0;
        $dansos=0;
        $simwa=0;
        $angkop=0;
        $angla=0;
        $telpri=0;
        $pajak=0;
        $pribadi=0;
        $jml=0;
        $lain=0;
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <caption><h2 class=title><font color='999999'>Laporan Potongan Gaji Tahun ".$tahun." Bulan ".$bulan."</font></h2></caption>
                    <tr class='head'>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
			<td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Departemen</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Anggota Koperasi</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Anggota Jamsostek</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Jamsostek</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Dana Sosial</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Simpanan Wajib</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Angsuran Koperasi</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Angsuran Lain</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Telepon Pribadi</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Pajak</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Pribadi</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Lain-Lain</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Total Potongan</strong></font></div></td>
                        <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Keterangan</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        $ttl=$baris[6]+$baris[7]+$baris[8]+$baris[9]+$baris[10]+$baris[11]+$baris[12]+$baris[13]+$baris[14];
                        $jml=$jml+$ttl;
                        $jamsos=$jamsos+$baris[6];
                        $dansos=$dansos+$baris[7];
                        $simwa=$simwa+$baris[8];
                        $angkop=$angkop+$baris[9];
                        $angla=$angla+$baris[10];
                        $telpri=$telpri+$baris[11];
                        $pajak=$pajak+$baris[12];
                        $pribadi=$pribadi+$baris[13];
                        $lain=$lain+$baris[14];
                        echo "<tr class='isi'>
                                <td>$baris[1]&nbsp;</td>
                                <td>$baris[2]&nbsp;</td>
                                <td>$baris[3]&nbsp;</td>
                                <td>$baris[4]&nbsp;</td>
                                <td>$baris[5]&nbsp;</td>
                                <td>".formatDuit($baris[6])."&nbsp;</td>
                                <td>".formatDuit($baris[7])."&nbsp;</td>
                                <td>".formatDuit($baris[8])."&nbsp;</td>
                                <td>".formatDuit($baris[9])."&nbsp;</td>
                                <td>".formatDuit($baris[10])."&nbsp;</td>
                                <td>".formatDuit($baris[11])."&nbsp;</td>
                                <td>".formatDuit($baris[12])."&nbsp;</td>
                                <td>".formatDuit($baris[13])."&nbsp;</td>
                                <td>".formatDuit($baris[14])."&nbsp;</td>
                                <td>".formatDuit($ttl)."&nbsp;</td>
                                <td>$baris[15]&nbsp;</td>
                             </tr>";
                    }
            echo "</table>";
        }
        echo "<br><font color='999999' size='3'><b>Total Jamsostek : ".formatDuit($jamsos)."</b></font>";
        echo "<br><font color='999999' size='3'><b>Total Dana Sosial : ".formatDuit($dansos)."</b></font>";
        echo "<br><font color='999999' size='3'><b>Total Simpanan Wajib : ".formatDuit($simwa)."</b></font>";
        echo "<br><font color='999999' size='3'><b>Total Angsuran koperasi : ".formatDuit($angkop)."</b></font>";
        echo "<br><font color='999999' size='3'><b>Total Angsuran Lain : ".formatDuit($angla)."</b></font>";
        echo "<br><font color='999999' size='3'><b>Total Telephone Pribadi : ".formatDuit($telpri)."</b></font>";
        echo "<br><font color='999999' size='3'><b>Total Pajak : ".formatDuit($pajak)."</b></font>";
        echo "<br><font color='999999' size='3'><b>Total Pribadi : ".formatDuit($pribadi)."</b></font>";
        echo "<br><font color='999999' size='3'><b>Total Lain-Lain : ".formatDuit($lain)."</b></font>";
        echo "<br><font color='999999' size='3'><b>Jumlah Total Potongan Gaji : ".formatDuit($jml)."</b></font>";
    ?>
    </body>
</html>