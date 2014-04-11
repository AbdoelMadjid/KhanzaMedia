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
    <h1 class="title">::[ Set Dana Sosial ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputDansos&action=TAMBAH>| Set Dana Sosial |</a>
        <a href=?act=ListPotongan>| List Potongan |</a>
    </div>   
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
                $dana               =$_GET['dana'];
                echo "<input type=hidden name=stts  value=$stts><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Dana Sosial</td><td width="">:</td>
                    <td width="67%">Rp <input name="dana" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $dana;?>" size="20" maxlength="15">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $dana                =trim($_POST['dana']);
                    if (!empty($dana)) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" dansos "," '$dana '", " Set/Pengaturan dana sosial " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=InputDansos&action=TAMBAH&dana='$dana'>";
                                break;
                        }
                    }else if (empty($dana)){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 200px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "SELECT dana from dansos ORDER BY dana desc ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='350px'><div align='center'><font size='2' face='Verdana'><strong>Besarnya Dana Sosial</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>
                                    <center>"; ?>
                                    <a href="?act=InputDansos&action=HAPUS&dana=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus dana sosial <?php print $baris[0]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>".formatDuit($baris[0])."</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Set/pengaturan dana sosial !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" dansos "," dana ='".$dana."' ","?act=InputDansos&action=TAMBAH&dana=$dana");
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