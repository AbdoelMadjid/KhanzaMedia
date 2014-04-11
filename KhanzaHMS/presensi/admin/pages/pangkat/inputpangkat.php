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
    <h1 class="title">::[ Input Pangkat Pegawai ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputPangkat&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListPangkat>| List Data |</a>
    </div>  
    <div class="entry">
        <form name="frm_ruang" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action         =$_GET['action'];
                $nip            =$_GET['nip'];
		$golongan       =$_GET['golongan'];
                if($action == "TAMBAH"){
                    $nip          = $_GET['nip'];
                    $golongan     = $_GET['golongan'];
                }else if($action == "UBAH"){
                    $_sql             = "SELECT * FROM pangkat_pegawai WHERE nip='$nip' and golongan='$golongan'";
                    $hasil            = bukaquery($_sql);
                    $baris            = mysql_fetch_row($hasil);
                    $nip              = $baris[0];
                    $golongan         = $baris[1];
                    $gaji             = $baris[2];
                    $tmt_pangkat      = $baris[3];

                    $Thnpangkat=substr($baris[3],0,4);
                    $Blnpangkat=substr($baris[3],5,2);
                    $Tglpangkat=substr($baris[3],8,2);

                    $tmt_pangkat_yad  = $baris[4];

                    $Thnpangkat_yad=substr($baris[4],0,4);
                    $Blnpangkat_yad=substr($baris[4],5,2);
                    $Tglpangkat_yad=substr($baris[4],8,2);
                    
                    $pejabat_penetap  = $baris[5];
                    $nomor_sk         = $baris[6];
                    $tgl_sk           = $baris[7];

                    $Thnsk=substr($baris[7],0,4);
                    $Blnsk=substr($baris[7],5,2);
                    $Tglsk=substr($baris[7],8,2);

                    $dasar_peraturan  = $baris[8];
                    $masa_kerja         = $baris[9];
                    $bln_kerja          = $baris[10];
                }
                echo"<input type=hidden name=nip value=$nip><input type=hidden name=action value=$action>";
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
                        <select name="golongan" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php
                                $_sql = "SELECT kode,nama FROM ruang ORDER BY nama";
                                $hasil=bukaquery($_sql);
                                if($action == "UBAH"){
                                    $_sql2 = "SELECT kode,nama FROM ruang where kode='$golongan' ORDER BY nama";
                                    $hasil2=bukaquery($_sql2);
                                    while($baris2 = mysql_fetch_array($hasil2)) {
                                        echo "<option id='TxtIsi2' value='$baris2[0]'>$baris2[1]</option>";
                                    }
                                }
                                while($baris = mysql_fetch_array($hasil)) {
                                    echo "<option id='TxtIsi2' value='$baris[0]'>$baris[1]</option>";
                                }
                            ?>
                        </select>
                        <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Gaji Pokok Baru</td><td width="">:</td>
                    <td width="67%"><input name="gaji" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $gaji;?>" size="30" maxlength="12">
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >TMT Pangkat</td><td width="">:</td>
                    <td width="67%">
                        <select name="Tglpangkat" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi4' value=$Tglpangkat>$Tglpangkat</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
                        <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
			<select name="Blnpangkat" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi4' value=$Blnpangkat>$Blnpangkat</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thnpangkat" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi4' value=$Thnpangkat>$Thnpangkat</option>";
                                }
                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >TMT Pangkat YAD</td><td width="">:</td>
                    <td width="67%">
                        <select name="Tglpangkatyad" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi5' value=$Tglpangkat_yad>$Tglpangkat_yad</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
                        <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
			<select name="Blnpangkatyad" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi5' value=$Blnpangkat_yad>$Blnpangkat_yad</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thnpangkatyad" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi5' value=$Thnpangkat_yad>$Thnpangkat_yad</option>";
                                }
                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Pejabat Penetap</td><td width="">:</td>
                    <td width="67%"><input name="pejabat_penetap" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi6'));" type=text id="TxtIsi6" class="inputbox" value="<?php echo $pejabat_penetap;?>" size="55" maxlength="50">
                    <span id="MsgIsi6" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Nomor SK</td><td width="">:</td>
                    <td width="67%"><input name="nomor_sk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" type=text id="TxtIsi7" class="inputbox" value="<?php echo $nomor_sk;?>" size="30" maxlength="25">
                    <span id="MsgIsi7" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Tanggal SK</td><td width="">:</td>
                    <td width="67%">
                        <select name="Tglsk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi8'));" id="TxtIsi8">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi8' value=$Tglsk>$Tglsk</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
                        <span id="MsgIsi8" style="color:#CC0000; font-size:10px;"></span>
			<select name="Blnsk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi8'));" id="TxtIsi8">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi8' value=$Blnsk>$Blnsk</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thnsk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi8'));" id="TxtIsi8">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi8' value=$Thnsk>$Thnsk</option>";
                                }
                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi8" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Dasar Peraturan</td><td width="">:</td>
                    <td width="67%"><input name="dasar_peraturan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi9'));" type=text id="TxtIsi9" class="inputbox" value="<?php echo $dasar_peraturan;?>" size="30" maxlength="30">
                    <span id="MsgIsi9" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Masa Kerja Golongan</td><td width="">:</td>
                    <td width="75%">
                        <input name="masa_kerja" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi10'));" type=text id="TxtIsi10" class="inputbox" value="<?php echo $masa_kerja;?>" size="5" maxlength="2">
                        Tahun
                        <span id="MsgIsi10" style="color:#CC0000; font-size:10px;"></span>
                        <input name="bln_kerja" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi11'));" type=text id="TxtIsi11" class="inputbox" value="<?php echo $bln_kerja;?>" size="5" maxlength="2">
                        Bulan
                        <span id="MsgIsi11" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $nip              = trim($_POST['nip']);
                    $golongan         = trim($_POST['golongan']);
                    $gaji             = trim($_POST['gaji']);

                    $Tglpangkat       = trim($_POST['Tglpangkat']);
                    $Blnpangkat       = trim($_POST['Blnpangkat']);
                    $Thnpangkat       = trim($_POST['Thnpangkat']);
                    $tmt_pangkat      = $Thnpangkat.'-'.$Blnpangkat.'-'.$Tglpangkat;
                    
                    $Tglpangkatyad    = trim($_POST['Tglpangkatyad']);
                    $Blnpangkatyad    = trim($_POST['Blnpangkatyad']);
                    $Thnpangkatyad    = trim($_POST['Thnpangkatyad']);
                    $tmt_pangkat_yad  = $Thnpangkatyad.'-'.$Blnpangkatyad.'-'.$Tglpangkatyad;
                    
                    $pejabat_penetap  = trim($_POST['pejabat_penetap']);
                    $nomor_sk         = trim($_POST['nomor_sk']);

                    $Tglsk            = trim($_POST['Tglsk']);
                    $Blnsk            = trim($_POST['Blnsk']);
                    $Thnsk            = trim($_POST['Thnsk']);
                    $tgl_sk           = $Thnsk.'-'.$Blnsk.'-'.$Tglsk;
                    $dasar_peraturan  = trim($_POST['dasar_peraturan']);
                    $masa_kerja         = trim($_POST['masa_kerja']);
                    $bln_kerja          = trim($_POST['bln_kerja']);

                    if ((!empty($nip))&&(!empty($golongan))&&(!empty($gaji))&&(!empty($tmt_pangkat))&&(!empty($tmt_pangkat_yad))&&(!empty($pejabat_penetap))&&(!empty($nomor_sk))&&(!empty($tgl_sk))&&(!empty($dasar_peraturan))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" pangkat_pegawai "," '$nip','$golongan','$gaji','$tmt_pangkat','$tmt_pangkat_yad','$pejabat_penetap','$nomor_sk','$tgl_sk','$dasar_peraturan','$masa_kerja','$bln_kerja' ", " riwayat pangkat pegawai " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputPangkat&action=TAMBAH'></head><body></body></html>";
                                /*echo $tmt_pangkat;
                                echo $tmt_pangkat_yad;
                                echo $tgl_sk;*/
                                break;
                            case "UBAH":
                                Ubah(" pangkat_pegawai "," nip='$nip',golongan='$golongan',gaji='$gaji',tmt_pangkat='$tmt_pangkat',tmt_pangkat_yad='$tmt_pangkat_yad',pejabat_penetap='$pejabat_penetap',nomor_sk='$nomor_sk',
                                        tgl_sk='$tgl_sk',dasar_peraturan='$dasar_peraturan',masa_kerja='$masa_kerja',bln_kerja='$bln_kerja' WHERE nip='".$_GET['nip']."' and golongan='$golongan'", " riwayat pangkat pegawai ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListPangkat'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($nip))||(empty($golongan))||(empty($gaji))||(empty($tmt_pangkat))||(empty($tmt_pangkat_yad))||(empty($pejabat_penetap))||(empty($nomor_sk))||(empty($tgl_sk))||(empty($dasar_peraturan))){
                        echo '<b>Semua field harus isi..!!</b>';
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