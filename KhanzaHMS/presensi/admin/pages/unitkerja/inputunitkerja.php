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
    <h1 class="title">::[ Input Dosen Jurusan ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputUnitkerja&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListUnitkerja>| List Data |</a>
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
                    $_sql         = "SELECT * FROM dosen_jurusan WHERE kode='$TxtKode'";
                    $hasil        = bukaquery($_sql);
                    $baris        = mysql_fetch_row($hasil);
                    $TxtKode      = $baris[0];
                    $TxtNama      = $baris[1];
                }
                echo"<input type=hidden name=TxtKode value=$TxtKode><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Kode Jurusan</td><td width="">:</td>
                    <td width="67%"><input name="TxtKode" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $TxtKode;?>" size="20" maxlength="2">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Nama Jurusan</td><td width="">:</td>
                    <td width="67%"><input name="TxtNama" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $TxtNama;?>" size="55" maxlength="50" />
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
                                Tambah(" dosen_jurusan "," '$TxtKode','$TxtNama' ", " Dosen Jurusan " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputUnitkerja&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" dosen_jurusan "," nama='$TxtNama' WHERE kode='".$_GET['kode']."' ", " Dosen Jurusan ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListUnitkerja'></head><body></body></html>";
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