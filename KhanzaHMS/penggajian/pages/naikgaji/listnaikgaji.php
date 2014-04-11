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
    <h1 class="title">:: Data Kenaikan Gaji ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputNaikgaji&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListNaikgaji>| List Data |</a>
    </div>   
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
                $qry=" and nip_baru='$usi' ";
            }
        }
        
        $_sql = "SELECT kenaikan_gaji.nip,
                pegawai.nama,
                kenaikan_gaji.pangkat,
                ruang.nama,
                kenaikan_gaji.gapok,
                kenaikan_gaji.tmt_berkala,
                kenaikan_gaji.tmt_berkala_yad,
                kenaikan_gaji.no_sk,
                kenaikan_gaji.tgl_sk,
                kenaikan_gaji.dasar_penetap,
                kenaikan_gaji.masa_kerja,
                kenaikan_gaji.bln_kerja
                from kenaikan_gaji,pegawai,ruang
                where kenaikan_gaji.nip=pegawai.nip_baru ".$qry."
                and kenaikan_gaji.pangkat=ruang.kode
                ORDER BY nip ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {                
            echo "<table width='1700' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIP</strong></font></div></td>
                        <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Nama Pegawai</strong></font></div></td>
                        <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Pangkat/Gol.Ruang</strong></font></div></td>
                        <td width='120px'><div align='center'><font size='2' face='Verdana'><strong>Gaji Pokok Baru</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>TMT Berkala</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>TMT Brkla YAD</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Nomor SK</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tanggal SK</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Masa Kerja Golongan</strong></font></div></td>
                        <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td>$baris[3]</td>
                                <td>Rp. $baris[4]</td>
                                <td>$baris[5]</td>
                                <td>$baris[6]</td>
                                <td>$baris[7]</td>
                                <td>$baris[8]</td>
                                <td>$baris[10] Tahun,$baris[11] Bulan</td>
                                <td width='120'>
                                    <center>
                                        <a href=?act=InputNaikgaji&action=UBAH&nip=$baris[0]&pangkat=$baris[2]>edit</a> |"; ?>
                                        <a href="?act=ListNaikgaji&action=HAPUS&nip=<?php print $baris[0] ?>&pangkat=<?php print $baris[2] ?>" onClick="if (!confirm('Anda yakin mau menghapus kenaikan gaji <?php print $baris[1]?> dengan pangkat <?php print $baris[3]?> ? ')) return false;">hapus</a>
                            <?php
                            echo "</center>
                               </td>
                             </tr>";
                    }
            echo "</table>";
            
        }  else {echo "<b>Data kenaikan gaji masih kosong !</b>";}

    ?>
    
    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" kenaikan_gaji "," nip ='".$_GET['nip']."' and pangkat ='".$_GET['pangkat']."' ","?act=ListNaikgaji");
       }
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
                    $qry=" and nip_baru='$usi' ";
                }
            }
            $hasil1=bukaquery("SELECT kenaikan_gaji.nip,
                pegawai.nama,
                kenaikan_gaji.pangkat,
                ruang.nama,
                kenaikan_gaji.gapok,
                kenaikan_gaji.tmt_berkala,
                kenaikan_gaji.tmt_berkala_yad,
                kenaikan_gaji.no_sk,
                kenaikan_gaji.tgl_sk,
                kenaikan_gaji.dasar_penetap,
                kenaikan_gaji.masa_kerja,
                kenaikan_gaji.bln_kerja
                from kenaikan_gaji,pegawai,ruang
                where kenaikan_gaji.nip=pegawai.nip_baru
                and kenaikan_gaji.pangkat=ruang.kode ".$qry."
                ORDER BY nip");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("<br/>Jumlah Record : $jumlah");
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