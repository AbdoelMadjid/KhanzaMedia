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
    <h1 class="title">:: Data Resume Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
    <div class="entry">   

    &nbsp;&nbsp;<b>Pendapatan Resume : </b>
    <div align="center" class="link">
        <a href=?act=InputResume&action=TAMBAH>| Input Pendapatan Resume |</a>
    </div>   
	<br/>
    <div style="width: 598px; height: 90px; overflow: auto; padding: 5px">
    <?php
        $_sql   = "SELECT pendapatan_resume,persen_rs,
                   bagian_rs,persen_kry,bagian_kry
                   FROM set_resume WHERE tahun='$tahun' and bulan='$bulan' ORDER BY pendapatan_resume";
        $hasil   =bukaquery($_sql);
        $jumlah  =mysql_num_rows($hasil);
        $total_resume="0";
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='800px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Pendapatan Resume</strong></font></div></td>
                        <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>% RS</strong></font></div></td>
			<td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Bagian RS</strong></font></div></td>
                        <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>% Kry</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Bagian Kry</strong></font></div></td>
                    </tr>";					
                    while($baris = mysql_fetch_array($hasil)) {
                        $total_resume=$baris[0];
                        echo "<tr class='isi'>
				<td>
                                 <center>
				   <a href=?act=InputResume&action=UBAH>[edit]</a>";?>
                                   <a href="?act=ListResume&action=HAPUSAKTE&pendapatan_resume=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data pendapatan akte <?php print "Rp. ".$baris[0]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                               </td>
                                <td>".formatDuit($baris[0])."</td>
                                <td>$baris[1]%</td>
                                <td>".formatDuit($baris[2])."</td>
                                <td>$baris[3]%</td>
                                <td>".formatDuit($baris[4])."</td>
                             </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Pendapatan Resume masih kosong !</b>";}

    ?>      
    </div>

    <br>
    &nbsp;&nbsp;<b>Pembagian Resume : </b>
    <div align="center" class="link">
        <a href=?act=InputPenerimaResume&action=TAMBAH>| Input Bagian Resume |</a>
    </div>
    <br/>
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
    <?php
        $_sql   = "SELECT pembagian_resume.id,pegawai.nama,persen FROM pembagian_resume,pegawai
                 where pembagian_resume.id=pegawai.id ORDER BY persen desc";
        $hasil   =bukaquery($_sql);
        $jumlah  =mysql_num_rows($hasil);
	$ttl=0;
	$prosen=0;
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='650px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Nama Karyawan</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Porsi Bagian</strong></font></div></td>
			<td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Bagian Karyawan</strong></font></div></td>
                    </tr>";
		    $bagiankry=0;
                    while($baris = mysql_fetch_array($hasil)) {
                        $bagiankry=($baris[2]/100)*$total_resume;
			$ttl=$ttl+$bagiankry;
			$prosen=$prosen+$baris[2];
                        echo "<tr class='isi'>
                                <td>
                                    <center>
					<a href=?act=InputPenerimaResume&action=UBAH&id=".str_replace(" ","_",$baris[0]).">[edit]</a>";?>
                                        <a href="?act=ListResume&action=HAPUSPENERIMA&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data penerima')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                               </td>
                                <td>$baris[1]</td>
                                <td>$baris[2]%</td>
                                <td>".formatDuit($bagiankry)."</td>
                             </tr>";
                    }
            echo "</table>";

        } else {echo "<b>Data Bagian Karyawan masih kosong !</b>";}
    ?>
    
    </div>
    <?php
       if ($_GET['action']=="HAPUSAKTE") {
            Hapus(" set_resume  "," pendapatan_resume ='".$_GET['pendapatan_resume']."' and tahun='$tahun' and bulan='$bulan' ","?act=ListResume");
       }
       if ($_GET['action']=="HAPUSPENERIMA") {
            Hapus(" pembagian_resume "," id ='".$_GET['id']."'","?act=ListResume");
       }
        if(mysql_num_rows($hasil)!=0) {
            echo("<br/>Data : $jumlah, Ttl Prosen : ".$prosen."%, Ttl Bagian : ".formatDuit($ttl));
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