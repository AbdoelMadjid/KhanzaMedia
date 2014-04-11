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
    <h1 class="title">::[ Master Tunjangan Harian ]::</h1>
    <div align="center" class="link">
	    <a href=?act=DetailTunjanganBulanan&action=TAMBAH>| Ms.Tunj Bulanan |</a>
        <a href=?act=DetailTunjanganHarian&action=TAMBAH>| Ms.Tunj Harian |</a>
        <a href=?act=ListTunjangan>| List Penerima |</a>
    </div>   
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
				$id                 =$_GET['id'];
				$nama               =str_replace("_"," ",$_GET['nama']);
                $tnj                =$_GET['tnj'];
                echo "<input type=hidden name=id  value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Nama Tunjangan</td><td width="">:</td>
                    <td width="67%"><input name="nama" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $nama;?>" size="50" maxlength="40">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Besar tunjangan</td><td width="">:</td>
                    <td width="67%">Rp <input name="tnj" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" value="<?php echo $tnj;?>" size="20" maxlength="15">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
				    $id                 =trim($_POST['id']);
                    $nama               =trim($_POST['nama']);
                    $tnj                =trim($_POST['tnj']);
                    if ((!empty($nama))&&(!empty($tnj))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" master_tunjangan_harian ","'','$nama','$tnj'", " Master Tunjangan Harian " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=DetailTunjanganHarian&action=TAMBAH&nama='$nama'>";
                                break;
							case "UBAH":
                                Ubah(" master_tunjangan_harian ","tnj='$tnj',nama='$nama' WHERE id='$id'  ", " Master Tunjangan Harian   ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=DetailTunjanganHarian&action=TAMBAH&nama='$nama'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($nama))||(empty($tnj))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 300px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "SELECT id,nama,tnj from master_tunjangan_harian ORDER BY nama ASC ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='180px'><div align='center'><font size='2' face='Verdana'><strong>Nama Tunjangan</strong></font></div></td>
                                <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Besar Tunjangan</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>
                                    <center>
					                <a href=?act=DetailTunjanganHarian&action=UBAH&id=".$baris[0]."&nama=".str_replace(" ","_",$baris[1])."&tnj=".$baris[2].">[edit]</a>";?>
                                    <a href="?act=DetailTunjanganHarian&action=HAPUS&id=<?php print $baris[0] ?>&nama=<?php print str_replace(" ","_",$baris[1]) ?>" onClick="if (!confirm('Anda yakin menghapus master tunjangan harian <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$baris[1]</td>
                                <td>".formatDuit($baris[2])."</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data Master Tunjangan Harian !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" master_tunjangan_harian "," id ='".$id."' ","?act=DetailTunjanganHarian&action=TAMBAH&nama=".$nama);
            }

        if(mysql_num_rows($hasil)!=0) {
                $hasil1=bukaquery("SELECT nama,tnj from master_tunjangan_harian ORDER BY nama ");
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