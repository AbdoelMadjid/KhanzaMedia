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
    <h1 class="title">:: Data Bidang ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputBidang&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListBidang>| List Data |</a>
    </div>   
	<br/>
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">

    <?php
        $awal=$_GET['awal'];
        if (empty($awal)) $awal=0;
        $_sql = "SELECT nama FROM bidang ORDER BY nama ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {            
            
            echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='10%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='70%'><div align='center'><font size='2' face='Verdana'><strong>Bidang</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
						       <td>
                                    <center>";?>
                                        <a href="?act=ListBidang&action=HAPUS&nama=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data Bidang <?php print $baris[0]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                               </td>
                                <td>$baris[0]</td>                                
                             </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Bidang masih kosong !</b>";}

    ?>   
    
    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" bidang "," nama ='".$_GET['nama']."' ","?act=ListBidang");
       }
    ?>
    </div>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT nama FROM bidang");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah ");
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