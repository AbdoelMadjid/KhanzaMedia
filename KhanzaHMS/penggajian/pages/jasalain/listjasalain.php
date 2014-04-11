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
    <h1 class="title">:: List Jasa lain Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
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
        
	$keyword=trim($_POST['keyword']);        

        $_sql = "SELECT pegawai.id,pegawai.nik,pegawai.nama,
		        pegawai.departemen,sum(bsr_jasa)
                FROM jasa_lain right OUTER JOIN pegawai
				ON jasa_lain.id=pegawai.id and thn='".$tahun."'
                                and bln='".$bulan."'
				where  pegawai.stts_aktif<>'KELUAR' and pegawai.nik like '%".$keyword."%' or 
				pegawai.stts_aktif<>'KELUAR' and pegawai.nama like '%".$keyword."%' or
				pegawai.stts_aktif<>'KELUAR' and pegawai.departemen like '%".$keyword."%' 
				group by pegawai.id order by pegawai.id ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        $ttljm=0;
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='650px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>Depart</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Total Jasa lain</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        $ttljm=$ttljm+$baris[4];
                        echo "<tr class='isi' title='$baris[1] $baris[2]'>
                                <td>
                                    <center>
                                        <a href=?act=InputJasLa&action=TAMBAH&id=$baris[0]>[Detail]</a>
                                    </center>
                               </td>
                                <td><a href=?act=InputJasLa&action=TAMBAH&id=$baris[0]>$baris[1]</a></td>
                                <td><a href=?act=InputJasLa&action=TAMBAH&id=$baris[0]>$baris[2]</a></td>
                                <td><a href=?act=InputJasLa&action=TAMBAH&id=$baris[0]>$baris[3]</a></td>
                                <td><a href=?act=InputJasLa&action=TAMBAH&id=$baris[0]>".formatDuit($baris[4])."</a></td>
                             </tr>";
                    }
            echo "</table>";           
        } else {echo "<b>Data Jasa lain masih kosong !</b>";}

    ?>
    </div>
	</form>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT pegawai.id,pegawai.nik,pegawai.nama,
		        pegawai.departemen,sum(bsr_jasa)
                FROM jasa_lain right OUTER JOIN pegawai
				ON jasa_lain.id=pegawai.id and thn='".$tahun."'
                                and bln='".$bulan."'
				where pegawai.nik like '%".$keyword."%' or
				pegawai.nama like '%".$keyword."%' or
				pegawai.departemen like '%".$keyword."%'
				group by pegawai.id order by pegawai.id ASC");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah, Ttl.Jasa lain : ".formatDuit($ttljm)." ");
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