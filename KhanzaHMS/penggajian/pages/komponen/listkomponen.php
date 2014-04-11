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
    <h1 class="title">:: List Data Komponen Karya Ilmiah ::</h1>
    <div class="entry">
	<br/>
    <div style="width: 598px; height: 500px; overflow: auto; padding: 5px">

    <?php
        $awal=$_GET['awal'];
        if (empty($awal)) $awal=0;

        $cari  = bukaquery("select * from sesion ");
        $row   = mysql_fetch_row($cari);
        $usi   = $row[0];
        if($usi=="ADMIN"){
            $qry="";
        }else{
            $cariuser  = bukaquery("select type from user where nip='$usi' ");
            $rowuser   = mysql_fetch_row($cariuser);
            $typeuser  = $rowuser[0];
            if($typeuser=="OPERATOR"){
                 $qry="";
            }else{
                 $qry=" where nip_baru='$usi' ";
            }
        }

        $_sql = "SELECT nip_baru,nama FROM pegawai ".$qry." ORDER BY nip_baru ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {

            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>NIP</strong></font></div></td>
                        <td width='65%'><div align='center'><font size='2' face='Verdana'><strong>Nama Pegawai</strong></font></div></td>
                        <td width='15%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td>
                                    <center>
                                        <a href=?act=DetailKomponen&action=TAMBAH&nip=$baris[0]>[Detail]</a>&nbsp;
                                    </center>
                               </td>
                             </tr>";
                    }
            echo "</table>";

        } else {echo "<b>Data Komponen Karya Ilmiah masih kosong !</b>";}

    ?>
    </div>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $cari  = bukaquery("select * from sesion ");
            $row   = mysql_fetch_row($cari);
            $usi   = $row[0];
            if($usi=="ADMIN"){
                $qry="";
            }else{
                $cariuser  = bukaquery("select type from user where nip='$usi' ");
                $rowuser   = mysql_fetch_row($cariuser);
                $typeuser  = $rowuser[0];
                if($typeuser=="OPERATOR"){
                    $qry="";
                }else{
                    $qry=" where nip_baru='$usi' ";
                }
            }
            $hasil1=bukaquery("select nip_baru,nama FROM pegawai ".$qry." ORDER BY nip_baru");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Jumlah Record : $jumlah ");
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