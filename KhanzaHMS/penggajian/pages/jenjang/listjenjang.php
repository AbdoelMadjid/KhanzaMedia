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
    <h1 class="title">:: Data Jenjang Jabatan ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputJenjang&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListJenjang>| List Data |</a>
    </div>   
	<br/>
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
        if (empty($awal)) $awal=0;
        $_sql = "SELECT kode,nama,tnj FROM jnj_jabatan ORDER BY tnj DESC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='650px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='15%'><div align='center'><font size='2' face='Verdana'><strong>Kode Jenjang</strong></font></div></td>
                        <td width='30%'><div align='center'><font size='2' face='Verdana'><strong>Nama Jenjang</strong></font></div></td>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Tunjangan Jabatan</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                <td>
                                    <center>
                                        <a href=?act=InputJenjang&action=UBAH&kode=".str_replace(" ","_",$baris[0]).">[edit]</a>";?>
                                        <a href="?act=ListJenjang&action=HAPUS&kode=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data status kerja <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                               </td>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td>".formatDuit($baris[2])."</td>
                             </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Status WP masih kosong !</b>";}

    ?>
    
    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" jnj_jabatan "," kode ='".$_GET['kode']."' ","?act=ListJenjang");
       }
    ?>
    </div>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT kode,nama,tnj FROM jnj_jabatan ORDER BY tnj desc");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("<br/>Data : $jumlah ");
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