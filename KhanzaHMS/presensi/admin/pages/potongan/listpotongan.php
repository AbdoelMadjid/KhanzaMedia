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
   $bulan          = $baris[1];
?>

<div id="post">
    <h1 class="title">:: Data Potongan Gaji Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputDansos&action=TAMBAH>| Set Dana Sosial |</a>
        <a href=?act=ListPotongan>| List Potongan |</a>
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


        /*$_sqlcari="select pegawai.id from pegawai where
                   pegawai.id not in(select potongan.id from potongan where 
                       potongan.tahun='$tahun'  and
                       potongan.bulan='$bulan') ";*/
        $_sqlcari="select pegawai.id from pegawai";
        $hasilcari=bukaquery($_sqlcari);
        while($bariscari = mysql_fetch_array($hasilcari)) {
            $_sqlkon = "SELECT stts_kerja FROM pegawai WHERE id='$bariscari[0]'";
            $hasilkon=bukaquery($_sqlkon);
            $bariskon= mysql_fetch_row($hasilkon);

            $_sqldansos       = "SELECT dana FROM dansos";
	    $hasildansos      = bukaquery($_sqldansos);
	    $barisdansos      = mysql_fetch_row($hasildansos);
            
            $dansos=0;
            if($bariskon[0]!="Poc"){
                  $dansos      = $barisdansos[0];
            }else if($bariskon[0]=="Poc"){
                  $dansos      = 0;
            }//selain pocokan dipotong dansos tanggal 03-03012

            $_sqlpot = "SELECT koperasi.wajib, jamsostek.biaya
		     from keanggotaan,jamsostek,koperasi
		     where keanggotaan.koperasi=koperasi.stts
	             and keanggotaan.jamsostek=jamsostek.stts
		     and keanggotaan.id='$bariscari[0]'";
	    $hasilpot      =bukaquery($_sqlpot);
	    $barispot      = mysql_fetch_row($hasilpot);
	    $simwajib	 = $barispot[0];
            $jamsostek   = $barispot[1];

            if(mysql_num_rows($hasilpot)!=0) {  
                $_sqlcari2="select potongan.id from potongan where 
                       potongan.tahun='$tahun'  and
                       potongan.bulan='$bulan' and id='$bariscari[0]'";
                $hasilvalidasi  =bukaquery($_sqlcari2);
                if(mysql_num_rows($hasilvalidasi)!=0) { 
                    EditData(" potongan ","jamsostek='$jamsostek',dansos='$dansos',simwajib='$simwajib' where 
                       potongan.tahun='$tahun'  and
                       potongan.bulan='$bulan' and id='$bariscari[0]'  ");
                    
                }elseif(mysql_num_rows($hasilvalidasi)==0) { 
                    InsertData(" potongan ","'$tahun','$bulan','$bariscari[0]','$jamsostek','$dansos','$simwajib',
               				     '0','0','0','0','0','0','-' ");
                }   
            } 
        }


	$keyword=trim($_POST['keyword']);        

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
        $jml=0;
        
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='2100px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
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
                        echo "<tr class='isi' title='$baris[1] $baris[2]'>
                                <td>
                                    <center>
                                        <a href=?act=InputPotongan&action=UBAH&id=$baris[0]>[Update]</a>
                                    </center>
                               </td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>$baris[1]</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>$baris[2]</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>$baris[3]</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>$baris[4]</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>$baris[5]</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($baris[6])."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($baris[7])."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($baris[8])."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($baris[9])."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($baris[10])."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($baris[11])."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($baris[12])."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($baris[13])."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($baris[14])."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>".formatDuit($ttl)."</a></td>
                                <td><a href=?act=InputPotongan&action=UBAH&id=$baris[0]>$baris[15]</a></td>
                             </tr>";
                    }
            echo "</table>";           
        } else {echo "<b>Data potongan masih kosong !</b>";}

    ?>
    </div>
	</form>
         <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT pegawai.id, 
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
				WHERE keanggotaan.id=pegawai.id and pegawai.nik like '%".$keyword."%' or
				keanggotaan.id=pegawai.id and pegawai.nama like '%".$keyword."%' or
				keanggotaan.id=pegawai.id and pegawai.departemen like '%".$keyword."%' or
				keanggotaan.id=pegawai.id and keanggotaan.koperasi like '%".$keyword."%' or
				keanggotaan.id=pegawai.id and keanggotaan.jamsostek like '%".$keyword."%'
				order by pegawai.id ASC ");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah, Jml.Ptg : ".formatDuit($jml)." <a target=_blank href=/penggajian/pages/potongan/LaporanPotongan.php?&keyword=$keyword>| Laporan |</a> ");
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