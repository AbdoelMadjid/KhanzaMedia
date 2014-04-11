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
    <h1 class="title">:: Data Status Kerja ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputSttskerja&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListSttskerja>| List Data |</a>
    </div>   
	<br/>
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
        if (empty($awal)) $awal=0;
        $_sql = "SELECT stts,ktg,indek FROM stts_kerja ORDER BY indek desc ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>					   
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Status</strong></font></div></td>
                        <td width='40%'><div align='center'><font size='2' face='Verdana'><strong>Keterangan</strong></font></div></td>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Index Status</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
						       <td>
                                    <center>
                                        <a href=?act=InputSttskerja&action=UBAH&stts=".str_replace(" ","_",$baris[0]).">[edit]</a>";?>
                                        <a href="?act=ListSttskerja&action=HAPUS&stts=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data status kerja <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                               </td>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>                                
                             </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Status Kerja masih kosong !</b>";}

    ?>
    
    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" stts_kerja "," stts ='".$_GET['stts']."' ","?act=ListSttskerja");
       }
    ?>
    </div>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT stts,ktg,indek FROM stts_kerja order by indek desc");
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