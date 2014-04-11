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
    <h1 class="title">:: Data Tuslah Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
    <div class="entry">   

    &nbsp;&nbsp;<b>Pendapatan Tuslah : </b>
    <div align="center" class="link">
        <a href=?act=InputTuslah&action=TAMBAH>| Input Pendapatan Tuslah |</a>
    </div>   
	<br/>
    <div style="width: 598px; height: 90px; overflow: auto; padding: 5px">
    <?php
        $_sql   = "SELECT pendapatan_tuslah, persen_rs, 
                   bagian_rs, persen_kry,bagian_kry
                   FROM set_tuslah WHERE tahun='$tahun' and bulan='$bulan' ORDER BY bagian_kry";
        $hasil   =bukaquery($_sql);
        $jumlah  =mysql_num_rows($hasil);
        $pendapatan_tuslah="0";
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='800px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>                        
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Pendapatan Tuslah</strong></font></div></td>
                        <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>% RS</strong></font></div></td>
			<td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Bagian RS</strong></font></div></td>
                        <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>% Kry</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Bagian Kry</strong></font></div></td>
                    </tr>";					
                    while($baris = mysql_fetch_array($hasil)) {
                        $pendapatan_tuslah=$baris[4];
                        echo "<tr class='isi'>
				<td>
                                 <center>
				   <a href=?act=InputTuslah&action=UBAH>[edit]</a>";?>
                                   <a href="?act=ListTuslah&action=HAPUSAKTE&bagian_kry=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data pendapatan akte <?php print "Rp. ".$baris[0]?>?')) return false;">[hapus]</a>
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
            
        } else {echo "<b>Data Pendapatan Tuslah masih kosong !</b>";}

    ?>      
    </div>

    <br>
    &nbsp;&nbsp;<b>Pembagian Tuslah : </b>
    <div align="center" class="link">
        <a href=?act=InputPenerimaTuslah&action=TAMBAH>| Input Bagian Tuslah |</a>
    </div>
    <br/>
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
    <?php
        $_sql   = "SELECT pembagian_tuslah.id,pegawai.nama,pembagian_tuslah.persen FROM pembagian_tuslah,pegawai
                 where pembagian_tuslah.id=pegawai.id ORDER BY persen desc";
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
                        $bagiankry=($baris[2]/100)*$pendapatan_tuslah;
			$ttl=$ttl+$bagiankry;
			$prosen=$prosen+$baris[2];
                        echo "<tr class='isi'>
                                <td>
                                    <center>
					<a href=?act=InputPenerimaTuslah&action=UBAH&id=".str_replace(" ","_",$baris[0]).">[edit]</a>";?>
                                        <a href="?act=ListTuslah&action=HAPUSPENERIMA&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data penerima')) return false;">[hapus]</a>
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
            Hapus(" set_tuslah  "," pendapatan_tuslah ='".$_GET['bagian_kry']."' and tahun='$tahun' and bulan='$bulan' ","?act=ListTuslah");
       }
       if ($_GET['action']=="HAPUSPENERIMA") {
            Hapus(" pembagian_tuslah "," id ='".$_GET['id']."'","?act=ListTuslah");
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