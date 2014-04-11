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
    <h1 class="title">:: Data Akte Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
    <div class="entry">   

    &nbsp;&nbsp;<b>Pendapatan Akte : </b>
    <div align="center" class="link">
        <a href=?act=InputAkte&action=TAMBAH>| Input Pendapatan Akte |</a>
    </div>   
	<br/>
    <div style="width: 598px; height: 90px; overflow: auto; padding: 5px">
    <?php
        $_sql   = "SELECT pendapatan_akte,persen_rs,
                   bagian_rs,persen_kry,bagian_kry
                   FROM set_akte WHERE tahun='$tahun' and bulan='$bulan' ORDER BY pendapatan_akte";
        $hasil   =bukaquery($_sql);
        $jumlah  =mysql_num_rows($hasil);
        $total_akte="0";
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='800px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Pendapatan Akte</strong></font></div></td>
                        <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>% RS</strong></font></div></td>
			<td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Bagian RS</strong></font></div></td>
                        <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>% Kry</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Bagian Kry</strong></font></div></td>
                    </tr>";					
                    while($baris = mysql_fetch_array($hasil)) {
                        $total_akte=$baris[4];
                        echo "<tr class='isi'>
				<td>
                                 <center>
				   <a href=?act=InputAkte&action=UBAH>[edit]</a>";?>
                                   <a href="?act=ListAkte&action=HAPUSAKTE&pendapatan_akte=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data pendapatan akte <?php print "Rp. ".$baris[0]?>?')) return false;">[hapus]</a>
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
            
        } else {echo "<b>Data Pendapatan Akte masih kosong !</b>";}

    ?>      
    </div>

    <br>
    &nbsp;&nbsp;<b>Pembagian Akte : </b>
    <div align="center" class="link">
        <a href=?act=InputPenerimaAkte&action=TAMBAH>| Input Bagian Akte |</a>
    </div>
    <br/>
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
    <?php
        $_sql   = "SELECT pembagian_akte.id,pegawai.nama,persen FROM pembagian_akte,pegawai
                 where pembagian_akte.id=pegawai.id ORDER BY persen desc";
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
                        $bagiankry=($baris[2]/100)*$total_akte;
			$ttl=$ttl+$bagiankry;
			$prosen=$prosen+$baris[2];
                        echo "<tr class='isi'>
                                <td>
                                    <center>
					<a href=?act=InputPenerimaAkte&action=UBAH&id=".str_replace(" ","_",$baris[0]).">[edit]</a>";?>
                                        <a href="?act=ListAkte&action=HAPUSPENERIMA&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data penerima')) return false;">[hapus]</a>
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
            Hapus(" set_akte  "," pendapatan_akte ='".$_GET['pendapatan_akte']."' and tahun='$tahun' and bulan='$bulan' ","?act=ListAkte");
       }
       if ($_GET['action']=="HAPUSPENERIMA") {
            Hapus(" pembagian_akte "," id ='".$_GET['id']."'","?act=ListAkte");
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