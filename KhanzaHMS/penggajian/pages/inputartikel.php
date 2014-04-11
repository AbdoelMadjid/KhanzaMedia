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
    <h1 class="title">::[ Input Artikel ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputArtikel&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListArtikel>| List Data |</a>
    </div>
    <div class="entry">
        <form name="frm_inpproduk" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $Id          =$_GET['id'];
                if($action == "TAMBAH"){
                    $TxtId         = $Id;
                    $TxtJudul      = "";
                    $TxtIsi        = "";
                    $TxtTgl        = "";
                    $TxtPengirim   = "";
                    $TxtPage       = "";
                    $TxtGambar     = "";
                  }else if($action == "UBAH"){
                    $_sql          = "SELECT * from artikel WHERE id='$Id'";
                    $hasil         = bukaquery($_sql);
                    $baris         = mysql_fetch_row($hasil);
                    $TxtId         = $baris[0];
                    $TxtJudul      = $baris[1];
                    $TxtIsi        = $baris[2];
                    $TxtTgl        = $baris[3];
                    $TxtPengirim   = $baris[4];
                    $TxtPage       = $baris[5];
                    $TxtGambar     = $baris[6];
                }
                echo"<input type=hidden name=TxtKode value=$TxtKode><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="35%" >Judul Artikel</td><td width="">:</td>
                    <td width="59%">
                        <input name="TxtJudul" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $TxtJudul;?>" size="40" maxlength="255" />
                       <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Isi Artikel</td><td width="">:</td>
                    <td width="59%">
                        <textarea name="TxtIsi" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2" cols="37" rows="15"><?php echo $TxtIsi;?></textarea>
                        <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%">Tgl.Posting</td><td width="">:</td>
                    <td width="59%"><input name="TxtTgl" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" value="<?php echo $TxtTgl;?>" size="15" maxlength="15" />
                        <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%">Diposting Oleh</td><td width="">:</td>
                    <td width="59%"><input name="TxtPengirim" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" type=text id="TxtIsi4" value="<?php echo $TxtPengirim;?>" size="30" maxlength="50" />
                        <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Halaman</td><td width="">:</td>
                    <td width="59%">
                        <select name="TxtPage" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5">
                                <option id='TxtIsi5' value='artikel'>Artikel</option>
                                <option id='TxtIsi5' value='home'>Home</option>
                        </select>
                        <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Gambar</td><td width="">:</td>
                    <td width="59%"><input name="TxtGambar" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsiw'));" type=file id="TxtIsiw" value="<?php echo $TxtGambar;?>" size="30" maxlength="150" />
                    <span id="MsgIsiw" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>                
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $TxtId         = trim($_POST['TxtId']);
                    $TxtJudul      = trim($_POST['TxtJudul']);
                    $TxtIsi        = trim($_POST['TxtIsi']);
                    $TxtTgl        = trim($_POST['TxtTgl']);
                    $TxtPengirim   = trim($_POST['TxtPengirim']);
                    $TxtPage       = trim($_POST['TxtPage']);
                    $TxtGambar     = "upload/".$_FILES['TxtGambar']['name'];
                    move_uploaded_file($_FILES['TxtGambar']['tmp_name'],$TxtGambar);
                    
                    if ((!empty($TxtJudul))&&(!empty($TxtIsi))&&(!empty($TxtTgl))&&(!empty($TxtPengirim))&&(!empty($TxtPage))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                /*echo 'kode='.$TxtKode.',nama='.$TxtNmBrng.',sub='.$TxtSub.',merk='.$TxtMerk.',spec='.$TxtSpec.',harga='.$TxtHarga.',stok='.$TxtStok.',berat='.$TxtBerat.',file='.$TxtGambar.',tgl='.$TxtTgl;*/
                                Tambah(" artikel "," '$TxtId','$TxtJudul','$TxtIsi','$TxtTgl','$TxtPengirim','$TxtPage','$TxtGambar'", " artikel " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=ListArtikel'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" artikel "," judul='$TxtJudul',isi='$TxtIsi',post='$TxtTgl',pengirim='$TxtPengirim',page='$TxtPage',foto='$TxtGambar' WHERE id='".$_GET['id']."' ", "artikel");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListArtikel'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($TxtJudul))||(empty($TxtIsi))||(empty($TxtTgl))||(empty($TxtPengirim))||(empty($TxtPage))){
                        echo '<b>Semua field harus isi..!!</b> <br>';
                        /*echo 'id='.$TxtId.',judul='.$TxtJudul.',isi='.$TxtIsi.',tgl='.$TxtTgl.',pengirim='.$TxtPengirim.',page='.$TxtPage.',gambar='.$TxtGambar;*/
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