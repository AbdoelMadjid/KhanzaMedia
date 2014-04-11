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
    <h1 class="title">::[ Input Jabatan Struktural ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputStruktural&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListStruktural>| List Data |</a>
    </div>  
    <div class="entry">
        <form name="frm_lokasi" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $TxtKode     =$_GET['kode'];
                if($action == "TAMBAH"){
                    $TxtKode       = $_GET['TxtKode'];;
                    $TxtJabatan     = "";
                }else if($action == "UBAH"){
                    $_sql         = "SELECT * FROM jbtn_struktural WHERE kode='$TxtKode'";
                    $hasil        = bukaquery($_sql);
                    $baris        = mysql_fetch_row($hasil);
                    $TxtKode      = $baris[0];
                    $TxtJabatan   = $baris[1];
                }
                echo"<input type=hidden name=TxtKode value=$TxtKode><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Kode Jabatan</td><td width="">:</td>
                    <td width="67%"><input name="TxtKode" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $TxtKode;?>" size="20" maxlength="2">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Jabatan Struktural</td><td width="">:</td>
                    <td width="67%"><input name="TxtJabatan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $TxtJabatan;?>" size="55" maxlength="70" />
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $TxtKode    = trim($_POST['TxtKode']);
                    $TxtJabatan = trim($_POST['TxtJabatan']);
                    if ((!empty($TxtKode))&&(!empty($TxtJabatan))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" jbtn_struktural "," '$TxtKode','$TxtJabatan' ", " Jabatan Struktural " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputStruktural&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" jbtn_struktural "," nama='$TxtJabatan' WHERE kode='".$_GET['kode']."' ", "jabatan struktural");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListStruktural'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($TxtKode))||(empty($TxtJabatan))){
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