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
    <h1 class="title">::[ Jam Jaga Departemen ]::</h1>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action            =$_GET['action'];
                $no_id             =$_GET['no_id'];

                echo "<input type=hidden name=no_id  value=$no_id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="25%" >Departemen</td><td width="">:</td>
                    <td width="75%">
                        <select name="dep_id" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php
                                $_sql = "SELECT dep_id,nama FROM departemen ORDER BY dep_id";
                                $hasil=bukaquery($_sql);
                                while($baris = mysql_fetch_array($hasil)) {
                                    echo "<option id='TxtIsi1' value='$baris[0]'>$baris[0] $baris[1]</option>";
                                }
                            ?>
                        </select>
                        <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Status Aktif</td><td width="">:</td>
                    <td width="75%">
                        <select name="shift" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2">
                            <option id='TxtIsi2' value='Pagi'>Pagi</option
                            <option id='TxtIsi2' value='Pagi1'>Pagi1</option>
                            <option id='TxtIsi2' value='Pagi2'>Pagi2</option>
                            <option id='TxtIsi2' value='Pagi3'>Pagi3</option>   
                            <option id='TxtIsi2' value='Midle Pagi1'>Midle Pagi1</option>
                            <option id='TxtIsi2' value='Midle Pagi2'>Midle Pagi2</option>
                            <option id='TxtIsi2' value='Midle Pagi3'>Midle Pagi3</option>
                            <option id='TxtIsi2' value='Midle Siang1'>Midle Siang1</option>
                            <option id='TxtIsi2' value='Midle Siang2'>Midle Siang2</option>
                            <option id='TxtIsi2' value='Siang'>Siang</option>
                            <option id='TxtIsi2' value='Midle Siang3'>Midle Siang3</option>
                            <option id='TxtIsi2' value='Sore'>Sore</option>
                            <option id='TxtIsi2' value='Midle Sore1'>Midle Sore1</option>
                            <option id='TxtIsi2' value='Midle Sore2'>Midle Sore2</option>
                            <option id='TxtIsi2' value='Malam'>Malam</option>
                            <option id='TxtIsi2' value='Midle Malam1'>Midle Malam1</option>
                            <option id='TxtIsi2' value='Midle Malam2'>Midle Malam2</option>
                        </select>
                        <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Jam Masuk</td><td width="">:</td>
                    <td width="75%">
                        <select name="jam_masuk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" id="TxtIsi3">
                             <?php
                                loadJam();
                             ?>
                        </select>
			<select name="menit_masuk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" id="TxtIsi3">
                             <?php
                                loadMenit();
                             ?>
                        </select>
                        <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Jam Pulang</td><td width="">:</td>
                    <td width="75%">
                        <select name="jam_pulang" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                loadJam();
                             ?>
                        </select>
			<select name="menit_pulang" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                loadMenit();
                             ?>
                        </select>
                        <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp;<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $no_id              =trim($_POST['no_id']);
                    $dep_id             =trim($_POST['dep_id']);
                    $shift              =trim($_POST['shift']);
                    $jam_masuk          =trim($_POST['jam_masuk']);
                    $menit_masuk        =trim($_POST['menit_masuk']);
                    $jam_pulang         =trim($_POST['jam_pulang']);
                    $menit_pulang       =trim($_POST['menit_pulang']);
                    
                    if (!empty($dep_id)) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" jam_jaga "," '','$dep_id','$shift','$jam_masuk:$menit_masuk:00',
                                        '$jam_pulang:$menit_pulang:00'", " Jam Jaga " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=ListJam&action=TAMBAH'>";
                                break;
                        }
                    }else if (empty($dep_id)){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
            <?php
                $_sql = "SELECT  jam_jaga.no_id,jam_jaga.dep_id,jam_jaga.shift,
                    jam_jaga.jam_masuk,jam_jaga.jam_pulang from jam_jaga
                    ORDER BY jam_jaga.dep_id ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='40px'><div align='center'><font size='2' face='Verdana'><strong>Departemen</strong></font></div></td>
                                <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Shift</strong></font></div></td>
                                <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Jam Datang</strong></font></div></td>
                                <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Jam Pulang</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>
                                    <center>";?>
                                    <a href="?act=ListJam&action=HAPUS&no_id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data jam jaga <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$baris[1]</td>
                                 <td>$baris[2]</td>
                                 <td>$baris[3]</td>
                                 <td>$baris[4]</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data  jam jaga masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus("  jam_jaga "," no_id ='".$no_id."' ","?act=ListJam&action=TAMBAH");
            }

        if(mysql_num_rows($hasil)!=0) {
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