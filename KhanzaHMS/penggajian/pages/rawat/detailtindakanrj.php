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
    <h1 class="title">::[ Master Nama & Biaya Tindakan ]::</h1>
    <div align="center" class="link">
        <a href=?act=DetailTindakanRj&action=TAMBAH>| Master Tindakan |</a>
        <a href=?act=ListRj>| Rawat Jalan Spesialis |</a>
    </div>   
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];				
		$id                 =$_GET['id'];
		$nama               =str_replace("_"," ",$_GET['nama']);
		$jm                 =$_GET['jm'];
                $jns               =str_replace("_"," ",$_GET['jns']);
      
                echo "<input type=hidden name=id  value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Nama Tindakan</td><td width="">:</td>
                    <td width="67%"><input name="nama" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $nama;?>" size="50" maxlength="50">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >JM Tindakan</td><td width="">:</td>
                    <td width="67%">Rp <input name="jm" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" value="<?php echo $jm;?>" size="20" maxlength="15">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Jenis Tindakan</td><td width="">:</td>
                    <td width="75%">
                        <select name="jns" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" id="TxtIsi3">
                            <!-- <option id='TxtIsi2' value=' '>- Jenis Kelamin -</option> -->
                            <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi3' value=$jns>$jns</option>";
                                }
                            ?>
                            <option id='TxtIsi3' value='dr Spesialis'>dr Spesialis</option>
                        </select>
                        <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
		    $id                   =trim($_POST['id']);
                    $nama                 =trim($_POST['nama']);
                    $jm                   =trim($_POST['jm']);
                    $jns                  =trim($_POST['jns']);
                    if ((!empty($nama))&&(!empty($jm))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" master_tindakan ","'','$nama','$jm','$jns'", " Master Tindakan " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=DetailTindakanRj&action=TAMBAH&nama='$nama'>";
                                break;
							case "UBAH":
                                Ubah(" master_tindakan ","nama='$nama',jm='$jm',jns='$jns' WHERE id='$id'  ", " Master Tindakan  ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=DetailTindakanRj&action=TAMBAH&nama='$nama'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($nama))||(empty($jm))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "SELECT id,nama,jm,jns from master_tindakan ORDER BY jns,nama ASC ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='170px'><div align='center'><font size='2' face='Verdana'><strong>Nama Tindakan</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>JM Tindakan</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jns.Tindakan</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>
                                    <center>
					                <a href=?act=DetailTindakanRj&action=UBAH&id=".$baris[0]."&nama=".str_replace(" ","_",$baris[1])."&jm=".$baris[2]."&jns=".str_replace(" ","_",$baris[3]).">[edit]</a>";?>
                                    <a href="?act=DetailTindakanRj&action=HAPUS&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data master tindakan <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$baris[1]</td>
                                <td>".formatDuit($baris[2])."</td>
                                <td>$baris[3]</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data master tindakan masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" master_tindakan "," id ='".$_GET['id']."' ","?act=DetailTindakanRj&action=TAMBAH&nama=$nama");
            }

        if(mysql_num_rows($hasil)!=0) {
		        $hasil1=bukaquery("SELECT id,nama,jm from master_tindakan ORDER BY nama ASC ");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo(" Data : $jumlah ");
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