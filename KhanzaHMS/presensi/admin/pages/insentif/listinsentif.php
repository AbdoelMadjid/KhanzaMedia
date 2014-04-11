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
    <h1 class="title">:: Data Insentif Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
    <div class="entry">   

    &nbsp;&nbsp;<b>Pendapatan : </b>
    <div align="center" class="link">
        <a href=?act=InputInsentif&action=TAMBAH>| Input Pendapatan |</a>
    </div>   
	<br/>
    <div style="width: 598px; height: 80px; overflow: auto; padding: 5px">
    <?php
        $_sql   = "SELECT pendapatan,persen,total_insentif FROM set_insentif WHERE tahun='$tahun' and bulan='$bulan' ORDER BY pendapatan";
        $hasil   =bukaquery($_sql);
        $jumlah  =mysql_num_rows($hasil);
        $total_insentif="0";
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='30%'><div align='center'><font size='2' face='Verdana'><strong>Pendapatan</strong></font></div></td>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Prosentase</strong></font></div></td>
			<td width='30%'><div align='center'><font size='2' face='Verdana'><strong>Total Insentif</strong></font></div></td>
                    </tr>";					
                    while($baris = mysql_fetch_array($hasil)) {
                        $total_insentif=$baris[2];						
                        echo "<tr class='isi'>
				<td>
                                 <center>
				   <a href=?act=InputInsentif&action=UBAH>[edit]</a>";?>
                                   <a href="?act=ListInsentif&action=HAPUSINSENTIF&pendapatan=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data pendapatan <?php print "Rp. ".$baris[0]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                               </td>
                                <td>".formatDuit($baris[0])."</td>
                                <td>$baris[1]%</td>
                                <td>".formatDuit($baris[2])."</td>                                
                             </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Pendapatan  masih kosong !</b>";}

    ?>      
    </div>

    <br>
    <b>Insentif : </b>
    <div align="center" class="link">
        <a href=?act=InputIndex&action=TAMBAH>| Input Insentif |</a>
    </div>
    <br/>
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
    <?php
        $_sql   = "SELECT dep_id,persen FROM indexins ORDER BY persen desc";
        $hasil   =bukaquery($_sql);
        $jumlah  =mysql_num_rows($hasil);
	$ttl=0;
	$prosen=0;
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Kode Index</strong></font></div></td>
                        <td width='30%'><div align='center'><font size='2' face='Verdana'><strong>Porsi Insentif</strong></font></div></td>
			<td width='30%'><div align='center'><font size='2' face='Verdana'><strong>Total Insentif</strong></font></div></td>
                    </tr>";
		    $insentifindex=0;
                    while($baris = mysql_fetch_array($hasil)) {
                        $insentifindex=($baris[1]/100)*$total_insentif;
			$ttl=$ttl+$insentifindex;
			$prosen=$prosen+$baris[1];
                        echo "<tr class='isi'>
                                <td>
                                    <center>
					<a href=?act=InputIndex&action=UBAH&dep_id=".str_replace(" ","_",$baris[0]).">[edit]</a>";?>
                                        <a href="?act=ListInsentif&action=HAPUSINDEX&dep_id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data index<?php print "Rp. ".$insentifindex;?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                               </td>
                                <td>$baris[0]</td>
                                <td>$baris[1]%</td>
                                <td>".formatDuit($insentifindex)."</td>
                             </tr>";
                    }
            echo "</table>";

        } else {echo "<b>Data Insentif  masih kosong !</b>";}
    ?>
    
    </div>
    <?php
       if ($_GET['action']=="HAPUSINSENTIF") {
            Hapus(" set_insentif  "," pendapatan ='".$_GET['pendapatan']."' and tahun='$tahun' and bulan='$bulan' ","?act=ListInsentif");
       }
       if ($_GET['action']=="HAPUSINDEX") {
            Hapus(" indexins "," dep_id ='".$_GET['dep_id']."'","?act=ListInsentif");
       }
        if(mysql_num_rows($hasil)!=0) {
            echo("<br/>Data : $jumlah, Ttl Prosen : ".$prosen."%, Ttl Insentif : ".formatDuit($ttl)."  ");
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