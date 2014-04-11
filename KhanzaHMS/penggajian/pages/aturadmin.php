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
    <h1 class="title">::[ Input Data Admin ]::</h1><br>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $nip         =$_GET['nip'];
                $usere       =$_GET['usere'];
                $passwordte  =$_GET['passwordte'];
                $type        =$_GET['type'];
                echo "<input type=hidden name=nip value=$nip><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Pegawai</td><td width="">:</td>
                    <td width="67%">
                        <select name="nip" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php
                                $cari  = bukaquery("select * from sesion ");
                                $row   = mysql_fetch_row($cari);
                                $usi   = $row[0];
                                if($usi=="ADMIN"){
                                    $qry="";
                                }else{
                                    $qry=" where nik='$usi' ";
                                }

                                $_sql = "SELECT nik,nama FROM pegawai ".$qry." ORDER BY nama";
                                $hasil=bukaquery($_sql);
                                while($baris = mysql_fetch_array($hasil)) {
                                      echo "<option id='TxtIsi1' value='$baris[0]'>$baris[1]</option>";
                                }
                            ?>
                        </select>
                        <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >ID User</td><td width="">:</td>
                    <td width="59%"><input name="usere" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" value="<?php echo $usere;?>" size="40" maxlength="20">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Password</td><td width="">:</td>
                    <td width="59%"><input name="passwordte" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" value="<?php echo $passwordte;?>" size="40" maxlength="20" />
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Tipe User</td><td width="">:</td>
                    <td width="67%">
                        <select name="type" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                            <!-- <option id='TxtIsi2' value=' '>- Jenis Kelamin -</option> -->
                            <?php
                                $cari  = bukaquery("select * from sesion ");
                                $row   = mysql_fetch_row($cari);
                                $usi   = $row[0];
                                if($usi=="ADMIN"){
                                    echo "<option id='TxtIsi4' value='ADMIN'>ADMIN</option>
                                          <option id='TxtIsi4' value='PEGAWAI'>PEGAWAI</option>";
                                }else{
                                    $cari2  = bukaquery("SELECT type FROM user where nip='$usi'");
                                    $barisu = mysql_fetch_array($cari2);
                                        echo "<option id='TxtIsi4' value='$barisu[0]'>$barisu[0]</option>";
                                
                                    
                                }                                   
                            ?>
                        </select>
                        <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {                    
                    $usere          = trim($_POST['usere']);
                    $passwordte     = trim($_POST['passwordte']);
                    $type           = trim($_POST['type']);
                    if($type=="ADMIN"){
                        $nip = "ADMIN";
                    }else{
                        $nip = trim($_POST['nip']);
                    }
                    
                    if ((!empty($nip))&&(!empty($usere))&&(!empty($passwordte))&&(!empty($type))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                $_sql = "SELECT * FROM user where nip='$nip'";
                                $hasil=bukaquery($_sql);
                                $jumlah=mysql_num_rows($hasil);

                                if(mysql_num_rows($hasil)==0) {
                                    Tambah(" user "," '$nip','$usere','$passwordte','$type'", " data admin " );
                                    echo"<meta http-equiv='refresh' content='1;URL=?act=InputDataAdmin&action=TAMBAH&usere=$nip'>";
                                    break;
                                }else if(mysql_num_rows($hasil)>0) {
                                    Ubah(" user "," usere='$usere',passwordte='$passwordte' where nip='$nip'", " data admin " );
                                    echo"<meta http-equiv='refresh' content='1;URL=?act=InputDataAdmin&action=TAMBAH&usere=$nip'>";
                                    break;
                                }
                                
                        }
                    }else if ((empty($nip))||(empty($usere))||(empty($passwordte))||(empty($type))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;

                $cari  = bukaquery("select * from sesion ");
                $row   = mysql_fetch_row($cari);
                $usi   = $row[0];
                if($usi=="ADMIN"){
                   $qry="";
                }else{
                   $qry=" where nip='$usi' ";
                }

                $_sql = "SELECT * FROM user ".$qry." ORDER BY nip ASC LIMIT $awal,20";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='10%'><div align='center'><font size='2' face='Verdana'><strong>NIP</strong></font></div></td>
                                <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>ID User</strong></font></div></td>
                                <td width='40%'><div align='center'><font size='2' face='Verdana'><strong>Password</strong></font></div></td>
                                <td width='40%'><div align='center'><font size='2' face='Verdana'><strong>Tipe User</strong></font></div></td>
                                <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                                <td>$baris[3]</td>
                                <td width='120'>
                                    <center>"; ?>
                                    <a href="?act=InputDataAdmin&action=HAPUS&nip=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data user <?php print $baris[1]?>?')) return false;">hapus</a>
                            <?php
                            echo "</center>
                                </td>
                           </tr>";
                    }
                echo "</table>";

                $cari  = bukaquery("select * from sesion ");
                $row   = mysql_fetch_row($cari);
                $usi   = $row[0];
                if($usi=="ADMIN"){
                   $qry="";
                }else{
                   $qry=" where nip='$usi' ";
                }

                $hasil1=bukaquery("SELECT * FROM user ".$qry." ORDER BY nip");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo("Jumlah Record : $jumlah | Halaman: ");
                for($j=1;$j<=$i;$j++){
                    $awal=(($j-1)*19+$j)-1;
                    echo("<a href='?act=InputDataAdmin&awal=$awal&page=$j'>[$j]</a>");
                }
            } else {echo "Data user masih kosong !";}
        ?>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                if(mysql_num_rows($hasil)!=1){
                    Hapus(" user "," nip ='".$nip."' ","?act=InputDataAdmin&action=TAMBAH&nip=$nip");
                }else if(mysql_num_rows($hasil)==1){
                    echo 'Minimal harus tersedia satu user untuk login...!!!';
                }
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