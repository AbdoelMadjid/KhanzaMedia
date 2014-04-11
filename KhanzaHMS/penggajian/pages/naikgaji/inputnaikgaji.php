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
    <h1 class="title">::[ Input Kenaikan Gaji ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputNaikgaji&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListNaikgaji>| List Data |</a>
    </div>  
    <div class="entry">
        <form name="frm_ruang" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action         =$_GET['action'];
                $nip            =$_GET['nip'];
		$pangkat        =$_GET['pangkat'];
                if($action == "TAMBAH"){
                    $nip          = $_GET['nip'];
                    $pangkat      = $_GET['pangkat'];
                }else if($action == "UBAH"){
                    $_sql             = "SELECT * FROM kenaikan_gaji WHERE nip='$nip' and pangkat='$pangkat'";
                    $hasil            = bukaquery($_sql);
                    $baris            = mysql_fetch_row($hasil);
                    $nip              = $baris[0];
                    $pangkat          = $baris[1];
                    $gapok            = $baris[2];
                    $tmt_berkala      = $baris[3];

                    $Thnberkala=substr($baris[3],0,4);
                    $Blnberkala=substr($baris[3],5,2);
                    $Tglberkala=substr($baris[3],8,2);

                    $tmt_berkala_yad  = $baris[4];

                    $Thnberkalayad=substr($baris[4],0,4);
                    $Blnberkalayad=substr($baris[4],5,2);
                    $Tglberkalayad=substr($baris[4],8,2);
                    
                    $no_sk            = $baris[5];
                    $tgl_sk           = $baris[6];
                    $Thnsk=substr($baris[6],0,4);
                    $Blnsk=substr($baris[6],5,2);
                    $Tglsk=substr($baris[6],8,2);

                    $dasar_penetap    = $baris[7];
                    $masa_kerja         = $baris[8];
                    $bln_kerja          = $baris[9];
                }
                echo"<input type=hidden name=nip value=$nip><input type=hidden name=pangkat value=$pangkat><input type=hidden name=action value=$action>";
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
                                    $cariuser  = bukaquery("select type from user where nip='$usi' ");
                                    $rowuser   = mysql_fetch_row($cariuser);
                                    $typeuser  = $rowuser[0];
                                    if($typeuser=="OPERATOR"){
                                        $qry="";
                                    }else{
                                        $qry=" where nip_baru='$usi' ";
                                    }
                                }
                                if($action == "TAMBAH"){
                                        $_sql = "SELECT nip_baru,nama FROM pegawai ".$qry." ORDER BY nama";
                                        $hasil=bukaquery($_sql);
                                        while($baris = mysql_fetch_array($hasil)) {
                                            echo "<option id='TxtIsi1' value='$baris[0]'>$baris[1]</option>";
                                        }
                                }else if($action == "UBAH"){
                                        $_sql = "SELECT nip_baru,nama FROM pegawai where nip_baru='$nip'  ORDER BY nama";
                                        $hasil=bukaquery($_sql);
                                        while($baris = mysql_fetch_array($hasil)) {
                                            echo "<option id='TxtIsi1' value='$baris[0]'>$baris[1]</option>";
                                        }
                                }
                            ?>
                        </select>
                        <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Pangkat/Gol.Ruang</td><td width="">:</td>
                    <td width="67%">
                        <select name="pangkat" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2">
                            <!-- <option id='TxtIsi2' value=' '>- Jenis Kelamin -</option> -->
                            <?php
                                if($action == "TAMBAH"){
                                        $_sql = "SELECT kode,nama FROM ruang ORDER BY nama";
                                        $hasil=bukaquery($_sql);
                                        while($baris = mysql_fetch_array($hasil)) {
                                            echo "<option id='TxtIsi2' value='$baris[0]'>$baris[1]</option>";
                                        }
                                }else if($action == "UBAH"){
                                        $_sql = "SELECT kode,nama FROM ruang where kode='$pangkat' ORDER BY nama";
                                        $hasil=bukaquery($_sql);
                                        while($baris = mysql_fetch_array($hasil)) {
                                            echo "<option id='TxtIsi2' value='$baris[0]'>$baris[1]</option>";
                                        }
                                }
                            ?>
                        </select>
                        <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Gaji Pokok Baru</td><td width="">:</td>
                    <td width="67%"><input name="gapok" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $gapok;?>" size="30" maxlength="12">
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >TMT Berkala</td><td width="">:</td>
                    <td width="67%">
                        <select name="Tglberkala" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi4' value=$Tglberkala>$Tglberkala</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
                        <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
			<select name="Blnberkala" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi4' value=$Blnberkala>$Blnberkala</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thnberkala" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi4' value=$Thnberkala>$Thnberkala</option>";
                                }
                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >TMT Berkala YAD</td><td width="">:</td>
                    <td width="67%">
                        <select name="Tglberkalayad" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi5' value=$Tglberkalayad>$Tglberkalayad</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
                        <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
			<select name="Blnberkalayad" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi5' value=$Blnberkalayad>$Blnberkalayad</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thnberkalayad" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi5' value=$Thnberkalayad>$Thnberkalayad</option>";
                                }
                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Nomor SK</td><td width="">:</td>
                    <td width="67%"><input name="no_sk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi6'));" type=text id="TxtIsi6" class="inputbox" value="<?php echo $no_sk;?>" size="30" maxlength="25">
                    <span id="MsgIsi6" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Tanggal SK</td><td width="">:</td>
                    <td width="67%">
                        <select name="Tglsk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" id="TxtIsi7">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi7' value=$Tglsk>$Tglsk</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
                        <span id="MsgIsi8" style="color:#CC0000; font-size:10px;"></span>
			<select name="Blnsk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" id="TxtIsi7">
                             <?php
                                 if($action == "UBAH"){
                                    echo "<option id='TxtIsi7' value=$Blnsk>$Blnsk</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thnsk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" id="TxtIsi7">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi7' value=$Thnsk>$Thnsk</option>";
                                }
                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi7" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Masa Kerja Golongan</td><td width="">:</td>
                    <td width="75%">
                        <input name="masa_kerja" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi8'));" type=text id="TxtIsi8" class="inputbox" value="<?php echo $masa_kerja;?>" size="5" maxlength="2">
                        Tahun
                        <span id="MsgIsi8" style="color:#CC0000; font-size:10px;"></span>
                        <input name="bln_kerja" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi9'));" type=text id="TxtIsi9" class="inputbox" value="<?php echo $bln_kerja;?>" size="5" maxlength="2">
                        Bulan
                        <span id="MsgIsi9" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $nip              = trim($_POST['nip']);
                    $pangkat          = trim($_POST['pangkat']);
                    $gapok            = trim($_POST['gapok']);

                    $Tglberkala       = trim($_POST['Tglberkala']);
                    $Blnberkala       = trim($_POST['Blnberkala']);
                    $Thnberkala       = trim($_POST['Thnberkala']);
                    $tmt_berkala      = $Thnberkala.'-'.$Blnberkala.'-'.$Tglberkala;

                    $Tglberkalayad    = trim($_POST['Tglberkalayad']);
                    $Blnberkalayad    = trim($_POST['Blnberkalayad']);
                    $Thnberkalayad    = trim($_POST['Thnberkalayad']);
                    $tmt_berkala_yad  = $Thnberkalayad.'-'.$Blnberkalayad.'-'.$Tglberkalayad;

                    $no_sk            = trim($_POST['no_sk']);

                    $Tglsk            = trim($_POST['Tglsk']);
                    $Blnsk            = trim($_POST['Blnsk']);
                    $Thnsk            = trim($_POST['Thnsk']);
                    $tgl_sk           = $Thnsk.'-'.$Blnsk.'-'.$Tglsk;
                    $dasar_penetap    = "-";
                    $masa_kerja         = trim($_POST['masa_kerja']);
                    $bln_kerja          = trim($_POST['bln_kerja']);

                    if ((!empty($nip))&&(!empty($pangkat))&&(!empty($gapok))&&(!empty($tmt_berkala))&&(!empty($tmt_berkala_yad))
                             &&(!empty($no_sk))&&(!empty($tgl_sk))&&(!empty($dasar_penetap))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" kenaikan_gaji "," '$nip','$pangkat','$gapok','$tmt_berkala','$tmt_berkala_yad',
                                        '$no_sk','$tgl_sk','$dasar_penetap','$masa_kerja','$bln_kerja' ", " riwayat kenaikan gaji " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputNaikgaji&action=TAMBAH'></head><body></body></html>";
                                /*echo $tmt_pangkat;
                                echo $tmt_pangkat_yad;
                                echo $tgl_sk;*/
                                break;
                            case "UBAH":
                                Ubah(" kenaikan_gaji "," gapok='$gapok',tmt_berkala='$tmt_berkala',tmt_berkala_yad='$tmt_berkala_yad',
                                        no_sk='$no_sk',tgl_sk='$tgl_sk',dasar_penetap='$dasar_penetap',masa_kerja='$masa_kerja',bln_kerja='$bln_kerja'
                                        WHERE nip='".$_GET['nip']."' and pangkat='$pangkat' ", " riwayat kenaikan gaji ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListNaikgaji'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($nip))||(empty($pangkat))||(empty($gapok))||(empty($tmt_berkala))||(empty($tmt_berkala_yad))
                             ||(empty($no_sk))||(empty($tgl_sk))||(empty($dasar_penetap))){
                        echo '<b>Semua field harus isi..!!</b>';
                        /*echo 'Nip : '.$nip.'
                              <br/> Pangkat : '.$pangkat.'
                              <br/> Gapok : '.$gapok.'
                              <br/> Berkala : '.$tmt_berkala.'
                              <br/> Berkala Yad : '.$tmt_berkala_yad.'
                              <br/> Pejabat : '.$pejabat.'
                              <br/> No.SK : '.$no_sk.'
                              <br/> Tgl SK : '.$tgl_sk.'
                              <br/> Dasar : '.$dasar_penetap.'
                              <br/> Status : '.$status;*/
                    }
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