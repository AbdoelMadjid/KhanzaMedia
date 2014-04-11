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
    <h1 class="title">:: Data Penerima Tunjangan ::</h1>
    <div class="entry">   

    <div align="center" class="link">
	<a href=?act=DetailTunjanganBulanan&action=TAMBAH>| Ms.Tunj Bulanan |</a>
        <a href=?act=DetailTunjanganHarian&action=TAMBAH>| Ms.Tunj Harian |</a>
        <a href=?act=ListTunjangan>| List Penerima |</a>
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
		 pegawai.departemen from pegawai
		 where pegawai.stts_aktif<>'KELUAR' and pegawai.nik like '%".$keyword."%' or
		 pegawai.stts_aktif<>'KELUAR' and pegawai.nama like '%".$keyword."%' or
		 pegawai.stts_aktif<>'KELUAR' and pegawai.departemen like '%".$keyword."%'
		 order by pegawai.id ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='1000px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Departemen</strong></font></div></td>
                        <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Tnj. Bulanan Diterima</strong></font></div></td>
			<td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Tnj. Harian Diterima</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi' title='$baris[1] $baris[2]'>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                                <td>$baris[3]</td>
                                <td>";$_sql2="select master_tunjangan_bulanan.nama,
				             master_tunjangan_bulanan.tnj
					     from pnm_tnj_bulanan,master_tunjangan_bulanan
					     where pnm_tnj_bulanan.id_tnj=master_tunjangan_bulanan.id
					     and pnm_tnj_bulanan.id='$baris[0]'";
				      $hasil2=bukaquery($_sql2);
				     while($baris2 = mysql_fetch_array($hasil2)) {
					  echo "<table width='300px'><tr class='isi3'><td width='150px'>$baris2[0]</td><td>: ".formatDuit($baris2[1])."</td></tr></table>";
				     }
				    echo"<a href=?act=DetailPenerimaTunjanganBulanan&action=TAMBAH&id=$baris[0]>[Update]</a>
				</td>
				<td>";$_sql2="select master_tunjangan_harian.nama,
				             master_tunjangan_harian.tnj
					     from pnm_tnj_harian,master_tunjangan_harian
					     where pnm_tnj_harian.id_tnj=master_tunjangan_harian.id
					     and pnm_tnj_harian.id='$baris[0]'";
				      $hasil2=bukaquery($_sql2);
				     while($baris2 = mysql_fetch_array($hasil2)) {
					  echo "<table width='300px'><tr class='isi3'><td width='150px'>$baris2[0]</td><td>: ".formatDuit($baris2[1])."</td></tr></table>";
				     }
				    echo"<a href=?act=DetailPenerimaTunjanganHarian&action=TAMBAH&id=$baris[0]>[Update]</a>
				</td>
                             </tr>";
                    }
            echo "</table>";           
        } else {echo "<b>Data penerima tunjangan masih kosong !</b>";}

    ?>
    </div>
	</form>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("select pegawai.id,pegawai.nik,pegawai.nama,
		        pegawai.departemen from pegawai
				where pegawai.nik like '%".$keyword."%' or 
				pegawai.nama like '%".$keyword."%' or
				pegawai.departemen like '%".$keyword."%' 
				order by pegawai.id ASC ");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah <a target=_blank href=/penggajian/pages/tunjangan/LaporanTunjangan.php?&keyword=$keyword>| Laporan |</a> ");
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