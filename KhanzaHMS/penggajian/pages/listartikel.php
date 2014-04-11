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
    <h1 class="title">:: Data Artikel ::</h1>
    <div class="entry">

    <div align="center" class="link">
        <a href=?act=InputArtikel&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListArtikel>| List Data |</a>
    </div>
	<br/>
    <?php
        $awal=$_GET['awal'];
        if (empty($awal)) $awal=0;
        $_sql = "SELECT * FROM artikel ORDER BY id ASC LIMIT $awal,20";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='head'>
                                 <td width='100%' colspan='3'><font size='2' face='Verdana'><strong>::--------------------------------------------:></strong></font></td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >Judul Artikel</td><td width=''>:</td>
                                 <td width='59%'>$baris[1]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >Isi Artikel</td><td width=''>:</td>
                                 <td width='59%'>$baris[2]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >Tgl.Posting</td><td width=''>:</td>
                                 <td width='59%'>$baris[3]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >Pengirim</td><td width=''>:</td>
                                 <td width='59%'>$baris[4]</td>
                              </tr>
                               <tr class='isi'>
                                 <td width='35%' >Page</td><td width=''>:</td>
                                 <td width='59%'>$baris[5]</td>
                              </tr>
                              <tr class='isi'>
                                  <td width='35%' >Gambar</td><td width=''>:</td>
                                  <td width='59%'><img src='$baris[6]' width='300px' height='300px'></td>
                              </tr>
                              <tr class='isi'>
                                   <td width='35%' >Proses</td><td width=''>:</td>
                                   <td width='59%'>
                                        <center>
                                        <a href=?act=InputArtikel&action=UBAH&id=$baris[0]>edit</a> |"; ?>
                                        <a href="?act=ListArtikel&action=HAPUS&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data artikel <?php print $baris[1]?>?')) return false;">hapus</a>
                            <?php
                           echo "       </center>
                                   </td>
                               </tr>";
                    }
            echo "</table>";
            $hasil1=bukaquery("SELECT * FROM artikel");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("<br/> <p>Jumlah Record : $jumlah | Halaman: ");
            for($j=1;$j<=$i;$j++){
                 $awal=(($j-1)*19+$j)-1;
                 echo("<a href='?act=ListArtikel&awal=$awal&page=$j'>[$j]</a></p>");
            }
        } else {echo "<b>Data Artikel masih kosong !</b>";}
    ?>

    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" artikel "," id ='".$_GET['id']."' ","?act=ListArtikel");
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