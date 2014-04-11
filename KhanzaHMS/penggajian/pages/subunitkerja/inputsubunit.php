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
    <h1 class="title">::[ Input Sub Unit Kerja ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputSubunit&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListSubunit>| List Data |</a>
    </div>  
    <div class="entry">
        <form name="frm_unit" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $TxtKode     =$_GET['kode'];
                if($action == "TAMBAH"){
                    $TxtKode      = $_GET['TxtKode'];;
                    $TxtNama      = "";
                }else if($action == "UBAH"){
                    $_sql         = "SELECT * FROM sub_unit_kerja WHERE kode='$TxtKode'";
                    $hasil        = bukaquery($_sql);
                    $baris        = mysql_fetch_row($hasil);
                    $TxtKode      = $baris[0];
                    $TxtNama      = $baris[1];
                }
                echo"<input type=hidden name=TxtKode value=$TxtKode><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Kode Sub Unit</td><td width="">:</td>
                    <td width="67%"><input name="TxtKode" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $TxtKode;?>" size="20" maxlength="3">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Nama Sub Unit</td><td width="">:</td>
                    <td width="67%"><input name="TxtNama" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $TxtNama;?>" size="55" maxlength="80" />
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $TxtKode    = trim($_POST['TxtKode']);
                    $TxtNama    = trim($_POST['TxtNama']);
                    if ((!empty($TxtKode))&&(!empty($TxtNama))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" sub_unit_kerja "," '$TxtKode','$TxtNama' ", " sub unit kerja " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputSubunit&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" sub_unit_kerja "," nama='$TxtNama' WHERE kode='".$_GET['kode']."' ", " sub unit kerja ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListSubunit'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($TxtKode))||(empty($TxtNama))){
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