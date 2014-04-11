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
        $id                 =$_GET['id'];

        $_sql2  = "SELECT nik,nama FROM pegawai where id='$id'";
        $hasil2 = bukaquery($_sql2);
        $baris2 = mysql_fetch_row($hasil2);

   ?>

   <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
       <caption><h2 class=title><font color='999999'>Laporan History Peminjaman</font></h2></caption>
        <tr class="head">
             <td width="31%" >NIK</td>
             <td width="">:</td>
             <td width="67%"><?php echo $baris2[0];?></td>
        </tr>
        <tr class="head">
             <td width="31%">Nama</td><td width="">:</td>
             <td width="67%"><?php echo $baris2[1];?></td>
        </tr>               
   </table>

  <?php
        $_sql = "select nop, id, jml_angsur, pinjaman, pokok,
                    jasa, setoran, tgl_pinjam, stts from pinjam_koperasi
                    where id='$id'";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    
                    <tr class='head'>
                        <td width='120px'><div align='center'><font size='2' face='Verdana'><strong>JMl.Angsur</strong></font></div></td>
                         <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Pinjaman</strong></font></div></td>
                         <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Pokok</strong></font></div></td>
                         <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Jasa</strong></font></div></td>
                         <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Setoran</strong></font></div></td>
                         <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Pinjam</strong></font></div></td>
                         <td width='140px'><div align='center'><font size='2' face='Verdana'><strong>Status Pinjam</strong></font></div></td>
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
                                <td>$baris[2]</td>
                                <td>".formatDuit($baris[3])."</td>
                                <td>".formatDuit($baris[4])."</td>
                                <td>".formatDuit($baris[5])."</td>
                                <td>".formatDuit($baris[6])."</td>
                                <td>$baris[7]</td>
                                <td>$baris[8]</td>
                             </tr>";
                    }
            echo "</table>";
            echo("<h3 class=title><font color='999999'>Jumlah Data : $jumlah </font></h3>");
  
        } 
    ?>
    </body>
</html>