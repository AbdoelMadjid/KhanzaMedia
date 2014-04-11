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
    <h1 class="title">::[ Daftar Kasift ]::</h1>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
                $id                =$_GET['id'];
                $jmlks             =$_GET['jmlks'];
                $bsr               =$_GET['bsr'];

                echo "<input type=hidden name=id  value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="25%" >Pegawai</td><td width="">:</td>
                    <td width="75%">
                        <select name="id" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php
                                $_sql = "SELECT id,nik,nama FROM pegawai  ORDER BY nama";
                                $hasil=bukaquery($_sql);
                                while($baris = mysql_fetch_array($hasil)) {
                                    echo "<option id='TxtIsi1' value='$baris[0]'>$baris[2] $baris[1]</option>";
                                }
                            ?>
                        </select>
                        <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Jml.KS</td><td width="">:</td>
                    <td width="75%"><input name="jmlks" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $jmlks;?>" size="10" maxlength="10">
                    isi dengan - jika ingin KS mengikuti normal masuk, isi dengan angka masuk jika tidak !!!!
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Besar Tunjangan</td><td width="">:</td>
                    <td width="75%"><input name="bsr" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $bsr;?>" size="15" maxlength="15">
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp;<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $id                 =trim($_POST['id']);
                    $jmlks              =trim($_POST['jmlks']);
                    $bsr                =trim($_POST['bsr']);
                    if (!empty($id)) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" kasift "," '$id','$jmlks','$bsr'", " Daftar Kasift " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=ListKS&action=TAMBAH&id='$id'>";
                                break;
                        }
                    }else if (empty($id)){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "SELECT kasift.id,kasift.jmlks,kasift.bsr,
                pegawai.nik,
                pegawai.nama,
                pegawai.jbtn,
                pegawai.jnj_jabatan,
                pegawai.departemen,
                pegawai.bidang from kasift inner join pegawai where pegawai.id=kasift.id ORDER BY pegawai.nik ASC ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='1000px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='40px'><div align='center'><font size='2' face='Verdana'><strong>KS</strong></font></div></td>
                                <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Bsr.Tnj</strong></font></div></td>
                                <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                                 <td width='180px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Jabatan</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Kode Jenjang</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Departemen</strong></font></div></td>
                                 <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Bidang</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>
                                    <center>";?>
                                    <a href="?act=ListKS&action=HAPUS&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data Kasift <?php print $baris[2]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$baris[1]</td>
                                 <td>".formatDuit($baris[2])."</td>
                                 <td>$baris[3]</td>
                                 <td>$baris[4]</td>
                                 <td>$baris[5]</td>
                                 <td>$baris[6]</td>
                                 <td>$baris[7]</td>
                                 <td>$baris[8]</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data kasift masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" kasift"," id ='".$id."' ","?act=ListKS&action=TAMBAH&id=$id");
            }

        if(mysql_num_rows($hasil)!=0) {
                $hasil1=bukaquery("SELECT kasift.id,kasift.jmlks,kasift.bsr,
                pegawai.nik,
                pegawai.nama,
                pegawai.jbtn,
                pegawai.jnj_jabatan,
                pegawai.departemen,
                pegawai.bidang from kasift inner join pegawai where pegawai.id=kasift.id ORDER BY pegawai.nik ");
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