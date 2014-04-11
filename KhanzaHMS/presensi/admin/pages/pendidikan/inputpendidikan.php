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
    <h1 class="title">::[ Input Pendidikan ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputPendidikan&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListPendidikan>| List Data |</a>
    </div>  
    <div class="entry">
        <form name="frm_pendidikan" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $tingkat     =str_replace("_"," ",$_GET['tingkat']);
                if($action == "TAMBAH"){
                    $tingkat      = $_GET['tingkat'];
                    $indek        ="";
                }else if($action == "UBAH"){
                    $_sql         = "SELECT tingkat,indek,gapok1,gapok2,gapok3 FROM pendidikan WHERE tingkat='$tingkat'";
                    $hasil        = bukaquery($_sql);
                    $baris        = mysql_fetch_row($hasil);
                    $tingkat      = $baris[0];
                    $indek        = $baris[1];
                    $gapok1       = $baris[2];
                    $gapok2       = $baris[3];
                    $gapok3       = $baris[4];
                }
                echo"<input type=hidden name=tingkat value=$tingkat><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Tingkat Pendidikan</td><td width="">:</td>
                    <td width="67%"><input name="tingkat" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $tingkat;?>" size="50" maxlength="80">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Index Pendidikan</td><td width="">:</td>
                    <td width="67%"><input name="indek" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $indek;?>" size="10" maxlength="2">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Gapok Ms Krj <1th</td><td width="">:</td>
                    <td width="67%"><input name="gapok1" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $gapok1;?>" size="10" maxlength="15">
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Gapok Ms Krj 1-<3th</td><td width="">:</td>
                    <td width="67%"><input name="gapok2" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" type=text id="TxtIsi4" class="inputbox" value="<?php echo $gapok2;?>" size="10" maxlength="15">
                    <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Gapok Ms Krj >=3th</td><td width="">:</td>
                    <td width="67%"><input name="gapok3" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" type=text id="TxtIsi5" class="inputbox" value="<?php echo $gapok3;?>" size="10" maxlength="15">
                    <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $tingkat   = trim($_POST['tingkat']);
                    $indek     = trim($_POST['indek']);
                    $gapok1       = trim($_POST['gapok1']);
                    $gapok2       = trim($_POST['gapok2']);
                    $gapok3       = trim($_POST['gapok3']);
                    if (!empty($tingkat)&&!empty($indek)&&!empty($gapok1)&&!empty($gapok2)&&!empty($gapok3)) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" pendidikan "," '$tingkat','$indek','$gapok1','$gapok2','$gapok3' ", " Pendidikan " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputPendidikan&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" pendidikan "," tingkat='$tingkat',indek='$indek',gapok1='$gapok1',gapok2='$gapok2',
                                        gapok3='$gapok3' WHERE tingkat='$tingkat' ", "Pendidikan");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListPendidikan'></head><body></body></html>";
                                break;
                        }
                    }else if (empty($tingkat)||empty($indek)||empty($gapok1)||empty($gapok2)||empty($gapok3)){
                        echo '<b>Semua field harus isi..!!</b> ';
                        //echo "1'$tingkat',2'$indek',3'$gapok1',4'$gapok2',5'$gapok3'";
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