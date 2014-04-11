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
    <h1 class="title">:: Data Riwayat Pangkat ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputPangkat&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListPangkat>| List Data |</a>
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
        
        $_sql = "SELECT pangkat_pegawai.nip,ruang.nama,
                pegawai.nama, pangkat_pegawai.gaji,pangkat_pegawai.tmt_pangkat,
                pangkat_pegawai.tmt_pangkat_yad,pangkat_pegawai.pejabat_penetap,
                pangkat_pegawai.nomor_sk,pangkat_pegawai.tgl_sk,
                pangkat_pegawai.dasar_peraturan,
                pangkat_pegawai.golongan,
                pangkat_pegawai.masa_kerja,
                pangkat_pegawai.bln_kerja
                FROM pangkat_pegawai,pegawai,ruang
                where pangkat_pegawai.nip=pegawai.nip_baru ".$qry." 
                and pangkat_pegawai.golongan=ruang.kode ORDER BY nip ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='head'>
                                 <td width='100%' colspan='3'><font size='2' face='Verdana'><strong>::--------------------------------------------:></strong></font></td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >NIP</td><td width=''>:</td>
                                 <td width='59%'>$baris[0]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >Pangkat/Gol.Ruang</td><td width=''>:</td>
                                 <td width='59%'>$baris[1]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >Nama Pegawai</td><td width=''>:</td>
                                 <td width='59%'>$baris[2]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >Gaji Pokok</td><td width=''>:</td>
                                 <td width='59%'>Rp. $baris[3]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >TMT Pangkat</td><td width=''>:</td>
                                 <td width='59%'>$baris[4]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >TMT Pangkat YAD</td><td width=''>:</td>
                                 <td width='59%'>$baris[5]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >Pejabat Penetap</td><td width=''>:</td>
                                 <td width='59%'>$baris[6]</td>
                              </tr>
                              <tr class='isi'>
                                 <td width='35%' >Nomor SK</td><td width=''>:</td>
                                 <td width='59%'>$baris[7]</td>
                              </tr>
                              <tr class='isi'>
                                  <td width='35%' >Tgl.SK</td><td width=''>:</td>
                                  <td width='59%'>$baris[8]</td>
                              </tr>
                              <tr class='isi'>
                                  <td width='35%' >Dasar Peraturan</td><td width=''>:</td>
                                  <td width='59%'>$baris[9]</td>
                              </tr>
                              <tr class='isi'>
                                  <td width='35%' >Masa Kerja Golongan</td><td width=''>:</td>
                                  <td width='59%'>$baris[11] Tahun,$baris[12] Bulan</td>
                              </tr>
                              <tr class='isi'>
                                   <td width='35%' >Proses</td><td width=''>:</td>
                                   <td width='59%'>
                                        <center>
                                        <a href=?act=InputPangkat&action=UBAH&nip=$baris[0]&golongan=$baris[10]>edit</a> |"; ?>
                                        <a href="?act=ListPangkat&action=HAPUS&nip=<?php print $baris[0] ?>&golongan=<?php print $baris[10] ?>" onClick="if (!confirm('Anda yakin menghapus data pegawai <?php print $baris[0]?> dengan pangkat <?php print $baris[1]?> ? ')) return false;">hapus</a>
                            <?php
                           echo "       </center>
                                   </td>
                               </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data riwayat pangkat masih kosong !</b>";}

    ?>
    
    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" pangkat_pegawai "," nip ='".$_GET['nip']."' and golongan ='".$_GET['golongan']."'  ","?act=ListPangkat");
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
                $qry=" and nip_baru='$usi' ";
            }

            $hasil1=bukaquery("SELECT pangkat_pegawai.nip,ruang.nama,
                pegawai.nama, pangkat_pegawai.gaji,pangkat_pegawai.tmt_pangkat,
                pangkat_pegawai.tmt_pangkat_yad,pangkat_pegawai.pejabat_penetap,
                pangkat_pegawai.nomor_sk,pangkat_pegawai.tgl_sk,
                pangkat_pegawai.dasar_peraturan,
                pangkat_pegawai.golongan,
                pangkat_pegawai.masa_kerja,
                pangkat_pegawai.bln_kerja
                FROM pangkat_pegawai,pegawai,ruang
                where pangkat_pegawai.nip=pegawai.nip_baru ".$qry."
                and pangkat_pegawai.golongan=ruang.kode ORDER BY nip");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("<br/>Jumlah Record : $jumlah ");
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