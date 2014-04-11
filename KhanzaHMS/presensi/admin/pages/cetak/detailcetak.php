<?php
 include '../../conf/conf.php';
 $riwkep=$_GET['riwkep'];
 $riwpend=$_GET['riwpend'];
 $kegil=$_GET['kegil'];
 $pelatihan=$_GET['pelatihan'];
 $kgb=$_GET['kgb'];
 $riwpeng=$_GET['riwpeng'];
 $penpeg=$_GET['penpeg'];
 $kkn=$_GET['kkn'];
 $pm=$_GET['pm'];
 $pk=$_GET['pk'];
 $pp=$_GET['pp'];
 $kki=$_GET['kki'];
 $rk=$_GET['rk'];
 $pbs=$_GET['pbs'];
 $pgs=$_GET['pgs'];
 $ks=$_GET['ks'];
 $pa=$_GET['pa'];
 $pb=$_GET['pb'];
?>
<html>
    <head>
        <link href="../../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
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
    <h1 class="title"><center>FAKULTAS USHULUDDIN, STUDI AGAMA DAN PEMIKIRAN ISLAM UIN SUNAN KALIJAGA YOGYAKARTA</center></h1>
    <div class="entry">
        <div style="width: 100%;  padding: 5px">

            <?php
                echo "";
                $nip            =$_GET['nip'];
                $_sql = "SELECT pegawai.nama,
                        pegawai.nip_baru,
                        jbtn_struktural.nama,
                        fungsional.nama,
                        pegawai.tmp_lahir,
                        pegawai.tgl_lahir,pegawai.photo,pegawai.alamat,
                        pegawai.telpon,pegawai.email
                        FROM pegawai inner join
                        jbtn_struktural inner join
                        fungsional
                        where nip_baru='$nip'
                        and pegawai.struktural=jbtn_struktural.kode
                        and pegawai.fungsional=fungsional.kode
                        ORDER BY pegawai.nama";
                $hasil=bukaquery($_sql);
                while($baris = mysql_fetch_array($hasil)) {
                   echo "<table width='100%' align='center'>
                           <tr class='head3'>
                             <td width='20%' >Nama</td><td width=''>:</td>
                             <td width='55%'>$baris[0]</td>
                             <td width='25%' ROWSPAN=7><img src='../../$baris[6]' width='145px' height='145px'></td>
                          </tr>
                          <tr class='head3'>
                             <td width='20%' >NIP</td><td width=''>:</td>
                             <td width='55%'>$baris[1]</td>
                          </tr>
                          <tr class='head3'>
                             <td width='20%' >Jabatan</td><td width=''>:</td>
                             <td width='55%'>$baris[2]</td>
                          </tr>
                          <tr class='head3'>
                             <td width='20%' >Jabatan Fungsional</td><td width=''>:</td>
                             <td width='55%'>$baris[3]</td>
                          </tr>
                          <tr class='head3'>
                             <td width='20%' >Alamat</td><td width=''>:</td>
                             <td width='55%'>$baris[7]</td>
                          </tr>
                         <tr class='head3'>
                             <td width='20%' >No.Telp</td><td width=''>:</td>
                             <td width='55%'>$baris[8]</td>
                          </tr>
                          <tr class='head3'>
                             <td width='20%' >E-Mail</td><td width=''>:</td>
                             <td width='55%'>$baris[9]</td>
                          </tr>
                    </table><br/>";
                }
                if(!empty($riwkep)){
                    $_sql = "SELECT ruang.nama,pangkat_pegawai.gaji,pangkat_pegawai.tmt_pangkat,
                    pangkat_pegawai.tmt_pangkat_yad,pangkat_pegawai.pejabat_penetap,
                    pangkat_pegawai.nomor_sk,pangkat_pegawai.tgl_sk,
                    pangkat_pegawai.dasar_peraturan,
                    pangkat_pegawai.golongan
                    FROM pangkat_pegawai,ruang
                    where pangkat_pegawai.nip='$nip' and pangkat_pegawai.golongan=ruang.kode ORDER BY pangkat_pegawai.nip";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Riwayat Kepegawaian</b> </caption>
                            <tr class='head4'>
                                <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Golongan Pangkat</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Gaji Pokok</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>TMT Pangkat</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>TMT Pangkat YAD</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Pejabat Penetap</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Nomor SK</strong></font></div></td>
                                <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.SK</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Dasar Peraturan</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[0]</td>
                                    <td>Rp. $baris[1]</td>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($riwpend)){
                    $_sql = "SELECT pendidikan_pegawai.pendidikan,
                        pendidikan_pegawai.sekolah,pendidikan_pegawai.jurusan,pendidikan_pegawai.thn_lulus,
                        pendidikan_pegawai.tempat,pendidikan_pegawai.kepala,pendidikan_pegawai.pendanaan,
                        pendidikan_pegawai.keterangan,pendidikan_pegawai.status
                        FROM pendidikan_pegawai
                        where pendidikan_pegawai.nip='$nip' order by pendidikan_pegawai.nip";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Riwayat Pendidikan</b> </caption>
                            <tr class='head4'>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Pendidikan</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Sekolah/Universitas</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Jurusan</strong></font></div></td>
                                <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>Thn.Lls</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tempat</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Kepala/Rektor</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Asal Pendanaan</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Keterangan</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Status Pendidikan</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[0]</td>
                                    <td>$baris[1]</td>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                    <td>$baris[8]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($kegil)){
                    $_sql = "SELECT seminar_pegawai.id,
                        seminar_pegawai.nip,
                        seminar_pegawai.tingkat,
                        seminar_pegawai.jenis,
                        seminar_pegawai.nama_seminar,
                        seminar_pegawai.peranan,
                        seminar_pegawai.tanggal,
                        seminar_pegawai.sd,
                        seminar_pegawai.penyelengara,
                        seminar_pegawai.tempat from seminar_pegawai where nip='$nip' ORDER BY seminar_pegawai.tanggal ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Kegiatan Ilmiah</b> </caption>
                            <tr class='head4'>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tingkat</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jenis</strong></font></div></td>
                                <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Peran</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tanggal Mulai</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tanggal Selesai</strong></font></div></td>
                                <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Penyelenggara</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tempat</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                    <td>$baris[8]</td>
                                    <td>$baris[9]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($pelatihan)){
                    $_sql = "SELECT pelatihan_pegawai.nama_pelatihan,
                        pelatihan_pegawai.tgl_mulai,
                        pelatihan_pegawai.tgl_akhir,
                        pelatihan_pegawai.jml_jam,
                        pelatihan_pegawai.thn_sertifikat,
                        pelatihan_pegawai.tempat,
                        pelatihan_pegawai.keterangan,
                        pelatihan_pegawai.peran
                        FROM pelatihan_pegawai
                        where pelatihan_pegawai.nip='$nip'
                        ORDER BY nip ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Pelatihan</b> </caption>
                            <tr class='head4'>
                                <td width='260px'><div align='center'><font size='2' face='Verdana'><strong>Nama Pelatihan</strong></font></div></td>
                                <td width='90px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Mulai</strong></font></div></td>
                                <td width='90px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Selesai</strong></font></div></td>
                                <td width='90px'><div align='center'><font size='2' face='Verdana'><strong>Jumlah Jam</strong></font></div></td>
                                <td width='90px'><div align='center'><font size='2' face='Verdana'><strong>Tahun</strong></font></div></td>
                                <td width='210px'><div align='center'><font size='2' face='Verdana'><strong>Tempat</strong></font></div></td>
                                <td width='210px'><div align='center'><font size='2' face='Verdana'><strong>Penyelenggara</strong></font></div></td>
                                <td width='210px'><div align='center'><font size='2' face='Verdana'><strong>Peran</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[0]</td>
                                    <td>$baris[1]</td>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($kgb)){
                    $_sql = "SELECT ruang.nama,
                        kenaikan_gaji.gapok,
                        kenaikan_gaji.tmt_berkala,
                        kenaikan_gaji.tmt_berkala_yad,
                        kenaikan_gaji.no_sk,
                        kenaikan_gaji.tgl_sk
                        from kenaikan_gaji,ruang
                        where kenaikan_gaji.nip='$nip'
                        and kenaikan_gaji.pangkat=ruang.kode
                        ORDER BY nip ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Kenaikan Gaji Berkala</b> </caption>
                            <tr class='head4'>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Golongan Pangkat</strong></font></div></td>
                                <td width='120px'><div align='center'><font size='2' face='Verdana'><strong>Gaji Pokok Baru</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>TMT Berkala</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>TMT Brkla YAD</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Nomor SK</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tanggal SK</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[0]</td>
                                    <td>Rp. $baris[1]</td>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($riwpeng)){
                    $_sql = "SELECT penghargaan.id,
                        penghargaan.nip,
                        penghargaan.jenis,
                        penghargaan.nama_penghargaan,
                        penghargaan.tanggal,
                        penghargaan.instansi,
                        penghargaan.pejabat_pemberi from penghargaan where penghargaan.nip='$nip' ORDER BY penghargaan.tanggal ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Riwayat Penghargaan</b> </caption>
                            <tr class='head4'>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Jenis Penghargaan</strong></font></div></td>
                                <td width='400px'><div align='center'><font size='2' face='Verdana'><strong>Nama Penghargaan</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Penghargaan</strong></font></div></td>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Instansi/Negara Pemberi</strong></font></div></td>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Pemberi Penghargaan</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($penpeg)){
                    $_sql = "SELECT penelitian.id,
                         penelitian.nip,
                         penelitian.jenis_penelitian,
                         penelitian.jenis_kegiatan,
                         penelitian.peranan,
                         penelitian.judul_buku,
                         penelitian.judul_jurnal,
                         penelitian.tahun,
                         penelitian.asal_dana from penelitian where nip='$nip' ORDER BY penelitian.tahun ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Penelitian Pegawai</b> </caption>
                            <tr class='head4'>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Jenis Penelitian</strong></font></div></td>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Peranan</strong></font></div></td>
                                <td width='400px'><div align='center'><font size='2' face='Verdana'><strong>Judul</strong></font></div></td>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Jumlah Biaya</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tahun</strong></font></div></td>
                                <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Asal Dana</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                    <td>$baris[8]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($kkn)){
                    $_sql = "SELECT kunjungan.id,
                         kunjungan.nip,
                         kunjungan.jenis_kegiatan,
                         kunjungan.tujuan,
                         kunjungan.negara,
                         kunjungan.tgl_mulai,
                         kunjungan.tgl_selesai,
                         kunjungan.asal_dana from kunjungan where nip='$nip' ORDER BY kunjungan.tgl_mulai ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Kunjungan Keluar Negeri</b> </caption>
                            <tr class='head4'>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Jenis Kegiatan</strong></font></div></td>
                                <td width='400px'><div align='center'><font size='2' face='Verdana'><strong>Tujuan Kunjungan</strong></font></div></td>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Negara Tujuan</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Mulai</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Selesai</strong></font></div></td>
                                <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Asal Dana</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }

                if(!empty($pm)){
                    $_sql = "SELECT pengabdian.id,
                        pengabdian.nip,
                        pengabdian.target_peserta,
                        pengabdian.tempat,
                        pengabdian.tgl_mulai,
                        pengabdian.tgl_selesai,
                        pengabdian.kegiatan,
                        pengabdian.jml_peserta,
                        pengabdian.asal_dana,
                        pengabdian.besar_dana from pengabdian where nip='$nip' ORDER BY pengabdian.tgl_mulai ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Pengabdian Masyarakat</b> </caption>
                            <tr class='head4'>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Bentuk Pengabdian</strong></font></div></td>
                                <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Tempat</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Mulai</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Selesai</strong></font></div></td>
                                <td width='400px'><div align='center'><font size='2' face='Verdana'><strong>Peran</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jlm.Peserta</strong></font></div></td>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Asal Dana</strong></font></div></td>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Besar Dana</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                    <td>$baris[8]</td>
                                    <td>$baris[9]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($pk)){
                    $_sql = "SELECT pengalaman.id,
                         pengalaman.nip,
                         pengalaman.rentang,
                         pengalaman.pengalaman,
                         pengalaman.posisi from pengalaman where nip='$nip' ORDER BY pengalaman.rentang ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Pengalaman Kerja</b> </caption>
                            <tr class='head4'>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Waktu</strong></font></div></td>
                                <td width='440px'><div align='center'><font size='2' face='Verdana'><strong>Institusi</strong></font></div></td>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Posisi</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($pp)){
                    $_sql = "select pengajaran.id,
                        pengajaran.nip,
                        pengajaran.thnakd,
                        pengajaran.semester,
                        pengajaran.matkul,
                        pengajaran.sks,
                        pengajaran.bmbngskripsi,
                        pengajaran.pengujiskripsi,
                        pengajaran.bukuajar,
                        pengajaran.penasehat from pengajaran where nip='$nip' ORDER BY pengajaran.thnakd";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Pendidikan & Pengajaran</b> </caption>
                            <tr class='head4'>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tahun Akademik</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Semester</strong></font></div></td>
                                <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Matakuliah</strong></font></div></td>
                                <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Tempat Mengajar</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[8]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($kki)){
                    $_sql = "SELECT komponenilmiah.id,
                        komponenilmiah.nip,
                        komponenilmiah.jenis,
                        komponenilmiah.penerbit,
                        komponenilmiah.tahun,
                        komponenilmiah.jmlhal,
                        komponenilmiah.isbn,
                       komponenilmiah.judul,
                       komponenilmiah.dokumen,
                       komponenilmiah.keterangan from komponenilmiah where nip='$nip' ORDER BY komponenilmiah.tahun ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Komponen Karya Ilmiah</b> </caption>
                            <tr class='head4'>
                                <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Jenis</strong></font></div></td>
                                <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Penerbit</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tahun</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jml.Halaman</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>ISBN/ISSN</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Judul</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Komponen</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Keterangan</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                    <td><a target=_blank href=$baris[8]>$baris[8]</a></td>
                                    <td>$baris[9]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($rk)){
                    $_sql = "SELECT keahlian.id,
                          keahlian.nip,
                          keahlian.keahlian,
                          keahlian.dasar,
                          keahlian.bahasa from keahlian where nip='$nip' ORDER BY keahlian.keahlian ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Riwayat Keahlian</b> </caption>
                            <tr class='head4'>
                                <td width='350px'><div align='center'><font size='2' face='Verdana'><strong>Keahlian</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Dasar Keahlian</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($pbs)){
                    $_sql = "SELECT bimbingsekripsi.id,
                        bimbingsekripsi.nip,
                        bimbingsekripsi.thnakd,
                        bimbingsekripsi.semester,
                        bimbingsekripsi.utama,
                        bimbingsekripsi.dua from bimbingsekripsi where nip='$nip' ORDER BY bimbingsekripsi.thnakd ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Pembimbing Sekripsi</b> </caption>
                            <tr class='head4'>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tahun Akademik</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Semester</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Pembimbing Utama</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Pembimbing 2</strong></font></div></td>                                
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4] mhs</td>
                                    <td>$baris[5] mhs</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($pgs)){
                    $_sql = "SELECT penguji.id,
                        penguji.nip,
                        penguji.thnakd,
                        penguji.semester,
                        penguji.uji1,
                        penguji.uji2,
                        penguji.jumlah from penguji where nip='$nip' ORDER BY penguji.thnakd ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Penguji Sekripsi</b> </caption>
                            <tr class='head4'>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tahun Akademik</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Semester</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Penguji 1</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Penguji 2</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jumlah</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4] mhs</td>
                                    <td>$baris[5] mhs</td>
                                    <td>$baris[6] mhs</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($ks)){
                    $_sql = "SELECT sidang.id,
                        sidang.nip,
                        sidang.thnakd,
                        sidang.semester,
                        sidang.jumlah,
                        sidang.tempat from sidang where nip='$nip' ORDER BY sidang.thnakd ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Ketua Sidang</b> </caption>
                            <tr class='head4'>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tahun Akademik</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Semester</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jumlah</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tempat</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4] mhs</td>
                                    <td>$baris[5]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($pa)){
                    $_sql = "SELECT penasehat.id,
                        penasehat.nip,
                        penasehat.thnakd,
                        penasehat.semester,
                        penasehat.jumlah from penasehat where nip='$nip' ORDER BY penasehat.thnakd ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Penasehat Akademik</b> </caption>
                            <tr class='head4'>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tahun Akademik</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Semester</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jumlah</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4] mhs</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
                }
                if(!empty($pb)){
                    $_sql = "SELECT bahasa.id,
                          bahasa.nip,
                          bahasa.bahasa from bahasa where nip='$nip' ORDER BY bahasa.bahasa";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <caption><b>Penguasaan Bahasa</b> </caption>
                            <tr class='head4'>
                                <td width='350px'><div align='center'><font size='2' face='Verdana'><strong>Penguasaan Bahasa</strong></font></div></td>
                            </tr>";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi4'>
                                    <td>$baris[2]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                    }
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
</div>
   </body>
</html>