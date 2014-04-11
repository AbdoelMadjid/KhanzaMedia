<div class="t">
<div class="b">
<div class="l">
<div class="r">
<div class="bl">
<div class="br">
<div class="tl">
<div class="tr">
<div class="y">

<?php
   $_sql         = "SELECT * FROM set_tahun";
   $hasil        = bukaquery($_sql);
   $baristh        = mysql_fetch_row($hasil);
   $tahun         = $baristh[0];
   $bulan          = $baristh[1];
?>

<div id="post">
    <h1 class="title">::[ Input Bagian Warung Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ]::</h1>
    <div align="center" class="link">
        <a href=?act=ListWarung>| List Warung |</a>
    </div>
    <div class="entry">
        <form name="frm_pelatihan" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $id          =str_replace("_"," ",$_GET['id']);
                if($action == "TAMBAH"){
                    $id          = str_replace("_"," ",$_GET['id']);
                    $persen      = "";
                }else if($action == "UBAH"){
                    $_sql         = "SELECT id,persen FROM pembagian_warung WHERE id='$id' ";
                    $hasil        = bukaquery($_sql);
                    $baris        = mysql_fetch_row($hasil);
                    $id           = $baris[0];
                    $persen       = $baris[1];
                }
                echo"<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Pegawai</td><td width="">:</td>
                    <td width="67%">
                         <select name="id" class="text1" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php                            
                                if($action == "UBAH"){
                                    $_sql2 = "SELECT id,nik,nama FROM pegawai where id='$id' ORDER BY nama";
                                    $hasil2=bukaquery($_sql2);
                                    while($baris2 = mysql_fetch_array($hasil2)) {
                                        echo "<option id='TxtIsi1' value='$baris2[0]'>$baris2[2] $baris2[1]</option>";
                                    }
                                }
                                if($action == "TAMBAH"){
                                    $_sql = "SELECT id,nik,nama FROM pegawai ORDER BY nama";
                                $hasildep=bukaquery($_sql);
                                    while($barisdep = mysql_fetch_array($hasildep)) {
                                        echo "<option id='TxtIsi1' value='$barisdep[0]'>$barisdep[2] $barisdep[1]</option>";
                                    }
                                }                                
                            ?>
                        </select>
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
              <!--  <tr class="head">
                    <td width="31%" >Porsi Warung(%)</td><td width="">:</td>
                    <td width="67%"><input name="persen" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $persen;?>" size="10" maxlength="6" />%
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>-->
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];

		$_sql         = "SELECT * FROM set_tahun";
		$hasil        = bukaquery($_sql);
		$baris        = mysql_fetch_row($hasil);
		$tahun        = $baris[0];
		$bulan        = $baris[1];

                if (isset($BtnSimpan)) {
                    $id          = trim($_POST['id']);
                    $persen      = "-";
                    if ((!empty($id))&&(!empty($persen))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" pembagian_warung ","'$id','$persen' ", " Penerima Warung " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputPenerimaWarung&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" pembagian_warung ","persen='$persen' WHERE id='$id'  ", " Penerima Warung  ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListWarung'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($id))||(empty($persen))){
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