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
    <h1 class="title">:: Silahkan Pilih Data & Pegawai ::</h1>
    <div class="entry">
     <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
                $id                 =$_GET['id'];
                //$nippeg               =$_GET['nip'];
                if(isset($_POST['riwkep'])){
                    $riwkep=trim($_POST['riwkep']);
                }
                if(isset($_POST['riwpend'])){
                    $riwpend=trim($_POST['riwpend']);
                }
                if(isset($_POST['kegil'])){
                    $kegil=trim($_POST['kegil']);
                }
                if(isset($_POST['pelatihan'])){
                    $pelatihan=trim($_POST['pelatihan']);
                }
                if(isset($_POST['kgb'])){
                    $kgb=trim($_POST['kgb']);
                }
                if(isset($_POST['riwpeng'])){
                    $riwpeng=trim($_POST['riwpeng']);
                }
                if(isset($_POST['penpeg'])){
                    $penpeg=trim($_POST['penpeg']);
                }
                if(isset($_POST['kkn'])){
                    $kkn=trim($_POST['kkn']);
                }
                if(isset($_POST['pm'])){
                    $pm=trim($_POST['pm']);
                }
                if(isset($_POST['pk'])){
                    $pk=trim($_POST['pk']);
                }
                if(isset($_POST['pp'])){
                    $pp=trim($_POST['pp']);
                }
                if(isset($_POST['kki'])){
                    $kki=trim($_POST['kki']);
                }
                if(isset($_POST['rk'])){
                    $rk=trim($_POST['rk']);
                }
                if(isset($_POST['pbs'])){
                    $pbs=trim($_POST['pbs']);
                }
                if(isset($_POST['pgs'])){
                    $pgs=trim($_POST['pgs']);
                }
                if(isset($_POST['ks'])){
                    $ks=trim($_POST['ks']);
                }
                if(isset($_POST['pa'])){
                    $pa=trim($_POST['pa']);
                }
                if(isset($_POST['pb'])){
                    $pb=trim($_POST['pb']);
                }
                if(isset($_POST['nip'])){
                    $nippeg=trim($_POST['nip']);
                }

                echo "<input type=hidden name=id  value=$id><input type=hidden name=nip  value=$nip><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <?php
                       if(trim($riwkep)!=""){
                          echo "<td width='10%' ><input type='checkbox' name='riwkep' value='riwkep' checked/></td>";
                       }else {
                          echo "<td width='10%' ><input type='checkbox' name='riwkep' value='riwkep'/></td>";
                       }
                    ?>                    
                    <td width="90%">Tampilkan Data Riwayat Kepegawaian</td>
                </tr>
                <tr class="head">
                    <?php
                       if(trim($riwpend)!=""){
                          echo "<td width='10%' ><input type='checkbox' name='riwpend' value='riwpend' checked/></td>";
                       }else {
                          echo "<td width='10%' ><input type='checkbox' name='riwpend' value='riwpend'/></td>";
                       }
                    ?>
                    <td width="90%">Tampilkan Data Riwayat Pendidikan</td>
                </tr>
                <tr class="head">
                    <?php
                       if(trim($kegil)!=""){
                          echo "<td width='10%' ><input type='checkbox' name='kegil' value='kegil' checked/></td>";
                       }else {
                          echo "<td width='10%' ><input type='checkbox' name='kegil' value='kegil'/></td>";
                       }
                    ?>                    
                    <td width="90%">Tampilkan Data Kegiatan Ilmiah</td>
                </tr>
                <tr class="head">
                    <?php
                       if(trim($pelatihan)!=""){
                          echo "<td width='10%' ><input type='checkbox' name='pelatihan' value='pelatihan' checked/></td>";
                       }else {
                          echo "<td width='10%' ><input type='checkbox' name='pelatihan' value='pelatihan'/></td>";
                       }
                    ?>                     
                    <td width="90%">Tampilkan Data Pelatihan</td>
                </tr>
                <tr class="head">
                    <?php
                       if(trim($kgb)!=""){
                          echo "<td width='10%' ><input type='checkbox' name='kgb' value='kgb' checked/></td>";
                       }else {
                          echo "<td width='10%' ><input type='checkbox' name='kgb' value='kgb'/></td>";
                       }
                    ?>                      
                    <td width="90%">Tampilkan Data Kenaikan Gaji Berkala</td>
                </tr>
                <tr class="head">
                    <?php
                       if(trim($riwpeng)!=""){
                          echo "<td width='10%' ><input type='checkbox' name='riwpeng' value='riwpeng' checked/></td>";
                       }else {
                          echo "<td width='10%' ><input type='checkbox' name='riwpeng' value='riwpeng'/></td>";
                       }
                    ?>                     
                    <td width="90%">Tampilkan Data Riwayat Penghargaan</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($penpeg)!=""){
                          echo "<input type='checkbox' name='penpeg' value='penpeg' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='penpeg' value='penpeg'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Penelitian Pegawai</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($kkn)!=""){
                          echo "<input type='checkbox' name='kkn' value='kkn' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='kkn' value='kkn'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Kunjungan Keluar Negeri</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($pm)!=""){
                          echo "<input type='checkbox' name='pm' value='pm' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='pm' value='pm'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Pengabdian Masyarakat</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($pk)!=""){
                          echo "<input type='checkbox' name='pk' value='pk' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='pk' value='pk'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Pengalaman Kerja</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($pp)!=""){
                          echo "<input type='checkbox' name='pp' value='pp' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='pp' value='pp'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Pendidikan & Pengajaran</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($kki)!=""){
                          echo "<input type='checkbox' name='kki' value='kki' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='kki' value='kki'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Komponen Karya Ilmiah</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($rk)!=""){
                          echo "<input type='checkbox' name='rk' value='rk' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='rk' value='rk'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Riwayat Keahlian</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($pbs)!=""){
                          echo "<input type='checkbox' name='pbs' value='pbs' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='pbs' value='pbs'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Pembimbing Skripsi</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($pgs)!=""){
                          echo "<input type='checkbox' name='pgs' value='pgs' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='pgs' value='pgs'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Penguji Skripsi</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($ks)!=""){
                          echo "<input type='checkbox' name='ks' value='ks' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='ks' value='ks'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Ketua Sidang</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($pa)!=""){
                          echo "<input type='checkbox' name='pa' value='pa' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='pa' value='pa'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Penasehat Akademik</td>
                </tr>
                <tr class="head">
                    <td width="10%" >
                     <?php
                       if(trim($pb)!=""){
                          echo "<input type='checkbox' name='pb' value='pb' checked/></td>";
                       }else {
                          echo "<input type='checkbox' name='pb' value='pb'/>";
                       }
                     ?>
                    </td>
                    <td width="90%">Tampilkan Data Penguasaan Bahasa</td>
                </tr>
            </table>
            <div align="center"><input name=BtnPrint type=submit class="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tampilkan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></div><br>
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
                                        <input type='checkbox' name='nip' value='$baris[0]'/>&nbsp;
                                    </center>
                               </td>
                             </tr>";
                    }
            echo "</table>";

        } else {echo "<b>Data pegawai masih kosong !</b>";}

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
            echo("Jumlah Record : $jumlah | Halaman: ");
            for($j=1;$j<=$i;$j++){
                 $awal=(($j-1)*19+$j)-1;
                 echo("<a href='?act=ListCetak&awal=$awal&page=$j'>[$j]</a>");
            }
        }

              //$nippeg            =$_GET['nip'];
                if(isset($_POST['riwkep'])){
                    $riwkep=trim($_POST['riwkep']);
                }
                if(isset($_POST['riwpend'])){
                    $riwpend=trim($_POST['riwpend']);
                }
                if(isset($_POST['kegil'])){
                    $kegil=trim($_POST['kegil']);
                }
                if(isset($_POST['pelatihan'])){
                    $pelatihan=trim($_POST['pelatihan']);
                }
                if(isset($_POST['kgb'])){
                    $kgb=trim($_POST['kgb']);
                }
                if(isset($_POST['riwpeng'])){
                    $riwpeng=trim($_POST['riwpeng']);
                }
                if(isset($_POST['penpeg'])){
                    $penpeg=trim($_POST['penpeg']);
                }
                if(isset($_POST['kkn'])){
                    $kkn=trim($_POST['kkn']);
                }
                if(isset($_POST['pm'])){
                    $pm=trim($_POST['pm']);
                }
                if(isset($_POST['pk'])){
                    $pk=trim($_POST['pk']);
                }
                if(isset($_POST['pp'])){
                    $pp=trim($_POST['pp']);
                }
                if(isset($_POST['kki'])){
                    $kki=trim($_POST['kki']);
                }
                if(isset($_POST['rk'])){
                    $rk=trim($_POST['rk']);
                }
                if(isset($_POST['pbs'])){
                    $pbs=trim($_POST['pbs']);
                }
                if(isset($_POST['pgs'])){
                    $pgs=trim($_POST['pgs']);
                }
                if(isset($_POST['ks'])){
                    $ks=trim($_POST['ks']);
                }
                if(isset($_POST['pa'])){
                    $pa=trim($_POST['pa']);
                }
                if(isset($_POST['pb'])){
                    $pb=trim($_POST['pb']);
                }
                if(isset($_POST['nip'])){
                    $nippeg=trim($_POST['nip']);
                }

       $BtnPrint=$_POST['BtnPrint'];
       if (isset($BtnPrint)) {
           echo"<meta http-equiv='refresh' content='2;pages/cetak/detailcetak.php?&nip=$nippeg&riwkep=$riwkep&riwpend=$riwpend&kegil=$kegil&pelatihan=$pelatihan&kgb=$kgb&riwpeng=$riwpeng&penpeg=$penpeg&kkn=$kkn&pm=$pm&pk=$pk&pp=$pp&kki=$kki&rk=$rk&pbs=$pbs&pgs=$pgs&ks=$ks&pa=$pa&pb=$pb'>";
       }
    ?>
      </form>
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