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
    <h1 class="title">::[ Status Keanggotan Jamsostek ]::</h1>
    <div align="center" class="link">
        <a href=?act=DetailJamsostek&action=TAMBAH>| Stts Jamsostek |</a>
        <a href=?act=DetailKoperasi&action=TAMBAH>| Stts Koperasi |</a>
        <a href=?act=ListKeanggotaan>| List Keanggotaan |</a>
    </div>   
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
				$stts               =str_replace("_"," ",$_GET['stts']);
                $biaya              =$_GET['biaya'];
                echo "<input type=hidden name=stts  value=$stts><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Stts Keanggotaan</td><td width="">:</td>
                    <td width="67%"><input name="stts" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $stts;?>" size="10" maxlength="5">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Biaya Jamsostek</td><td width="">:</td>
                    <td width="67%">Rp <input name="biaya" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" value="<?php echo $biaya;?>" size="20" maxlength="15">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $stts                 =trim($_POST['stts']);
                    $biaya                =trim($_POST['biaya']);
                    if ((!empty($stts))&&(!empty($biaya))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" jamsostek "," '$stts','$biaya'", " Status Keanggotaan Jamsostek " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=DetailJamsostek&action=TAMBAH&stts='$stts'>";
                                break;
							case "UBAH":
                                Ubah(" jamsostek ","biaya='$biaya' WHERE stts='$stts'  ", " Status Keanggotaan Jamsostek   ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=DetailJamsostek&action=TAMBAH&stts='$stts'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($stts))||(empty($biaya))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 200px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "SELECT stts,biaya from jamsostek ORDER BY stts ASC ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='180px'><div align='center'><font size='2' face='Verdana'><strong>Status Keanggotaan</strong></font></div></td>
                                <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Biaya Jamsostek</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>
                                    <center>
					                <a href=?act=DetailJamsostek&action=UBAH&stts=".str_replace(" ","_",$baris[0])."&biaya=".$baris[1].">[edit]</a>";?>
                                    <a href="?act=DetailJamsostek&action=HAPUS&stts=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data status keanggotaan jamsostek <?php print $baris[0]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$baris[0]</td>
                                <td>".formatDuit($baris[1])."</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data Status Keanggotaan Jamsostek masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" jamsostek "," stts ='".$stts."' ","?act=DetailJamsostek&action=TAMBAH&stts=$stts");
            }

        if(mysql_num_rows($hasil)!=0) {
                $hasil1=bukaquery("SELECT stts,biaya from jamsostek ORDER BY stts ");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo(" Data : $jumlah");
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