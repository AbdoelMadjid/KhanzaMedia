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
        $_sql = "select pegawai.id,pegawai.nik,pegawai.nama,
		 pegawai.departemen from pegawai
		 where pegawai.stts_aktif<>'KELUAR' and pegawai.nik like '%".$keyword."%' or
		 pegawai.stts_aktif<>'KELUAR' and pegawai.nama like '%".$keyword."%' or
		 pegawai.stts_aktif<>'KELUAR' and pegawai.departemen like '%".$keyword."%'
		 order by pegawai.id ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <caption><h2 class=title><font color='999999'>Laporan Penerima Tunjangan</font></h2></caption>
                    <tr class='head'>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Departemen</strong></font></div></td>
                        <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Tnj. Bulanan Diterima</strong></font></div></td>
			<td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Tnj. Harian Diterima</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                <td>$baris[1]&nbsp;</td>
                                <td>$baris[2]&nbsp;</td>
                                <td>$baris[3]&nbsp;</td>
                                <td>";$_sql2="select master_tunjangan_bulanan.nama,
				             master_tunjangan_bulanan.tnj
					     from pnm_tnj_bulanan,master_tunjangan_bulanan
					     where pnm_tnj_bulanan.id_tnj=master_tunjangan_bulanan.id
					     and pnm_tnj_bulanan.id='$baris[0]'";
				      $hasil2=bukaquery($_sql2);
				     while($baris2 = mysql_fetch_array($hasil2)) {
					  echo "<table width='300px'><tr class='isi3'><td width='150px'>$baris2[0]&nbsp;</td><td>: ".formatDuit($baris2[1])."&nbsp;</td></tr></table>";
				     }
				    echo"&nbsp;
				</td>
				<td>";$_sql2="select master_tunjangan_harian.nama,
				             master_tunjangan_harian.tnj
					     from pnm_tnj_harian,master_tunjangan_harian
					     where pnm_tnj_harian.id_tnj=master_tunjangan_harian.id
					     and pnm_tnj_harian.id='$baris[0]'";
				      $hasil2=bukaquery($_sql2);
				     while($baris2 = mysql_fetch_array($hasil2)) {
					  echo "<table width='300px'><tr class='isi3'><td width='150px'>$baris2[0]&nbsp;</td><td>: ".formatDuit($baris2[1])."&nbsp;</td></tr></table>";
				     }
				    echo"&nbsp;
				</td>
                             </tr>";
                    }
            echo "</table>";
        } 
    ?>
    </body>
</html>