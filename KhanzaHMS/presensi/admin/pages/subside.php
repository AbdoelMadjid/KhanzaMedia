<ul class="left_menu">
<?php
    $x=bukaquery("select * from kategori order by nm_kategori");
    while ($row=mysql_fetch_row($x)){             
        $x2=bukaquery("select * from subkategori where kd_kategori='$row[0]' order by nm_subktg");
        echo "<li class='even'><a href=?act=ListKategoriProduk&action=KATEGORI&kd_kategori=$row[0]&nm_kategori=$row[1]>$row[1] (".mysql_num_rows($x2).")</a></li>";
    }
?>

</ul>
<br/>