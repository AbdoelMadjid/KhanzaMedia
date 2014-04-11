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
                    <caption><h2 class=title><font color='999999'>Laporan Peminjaman</font></h2></caption>
                    <tr class='head'>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Keterangan Pinjam</strong></font></div></td>
                    </tr>";
                        $_sql2="select stts from pinjam_koperasi where
                               stts='Belum Lunas' and id='$baris[0]' ";
			$hasil2=bukaquery($_sql2);
                        $jumlah2=mysql_num_rows($hasil2);
                        $status="Tidak Ada Pinjaman";
                        if($jumlah2!=0){
                           $status="Ada Pinjaman";
                        }
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                <td>$baris[1] &nbsp;</td>
                                <td>$baris[2] &nbsp;</td>
                                <td>$status &nbsp;</td>
                             </tr>";
                    }
            echo "</table>";
            echo("<h3 class=title><font color='999999'>Jumlah Data : $jumlah </font></h3>");
  
        } 
    ?>
    </body>
</html>