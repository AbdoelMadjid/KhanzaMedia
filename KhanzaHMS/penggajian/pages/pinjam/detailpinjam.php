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
    <h1 class="title">::[ Input Peminjaman ]::</h1>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
                $id                 =$_GET['id'];
                $jml_angsur         =$_GET['jml_angsur'];
                $pinjaman           =$_GET['pinjaman'];
                $pokok              =$_GET['pokok'];
                $jasa               =$_GET['jasa'];
                $setoran            =$_GET['setoran'];
                $tgl_pinjam         =$_GET['tgl_pinjam'];
                $stts               =$_GET['stts'];
                
                echo "<input type=hidden name=id  value=$id>
                <input type=hidden name=action value=$action>";
		$_sql = "SELECT nik,nama FROM pegawai where id='$id'";
                $hasil=bukaquery($_sql);
                $baris = mysql_fetch_row($hasil);

                    $_sqlnext         	= "SELECT id FROM pegawai WHERE id>'$id' order by id asc limit 1";
                    $hasilnext        	= bukaquery($_sqlnext);
                    $barisnext        	= mysql_fetch_row($hasilnext);
                    $next               = $barisnext[0];

                    $_sqlprev         	= "SELECT id FROM pegawai WHERE id<'$id' order by id desc limit 1";
                    $hasilprev        	= bukaquery($_sqlprev);
                    $barisprev        	= mysql_fetch_row($hasilprev);
                    $prev               = $barisprev[0];

                    echo "<div align='center' class='link'>
                          <a href=?act=DetailPinjam&action=TAMBAH&id=$prev><<--</a>
                          <a href=?act=ListPinjam>| List Pinjam |</a>
                          <a href=?act=DetailPinjam&action=TAMBAH&id=$next>-->></a>
                          </div>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >NIK</td><td width="">:</td>
                    <td width="67%">
                     <?php echo $baris[0];?>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Nama</td><td width="">:</td>
                    <td width="67%"><?php echo $baris[1];?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Tanggal Pinjam</td><td width="">:</td>
                    <td width="67%">
                         <select name="Tgl" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi1' value=$Tgl>$Tgl</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
                        <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
			<select name="Bln" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi1' value=$Bln>$Bln</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thn" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi1' value=$Thn>$Thn</option>";
                                }

                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Jml.Angsuran</td><td width="">:</td>
                    <td width="67%"><input name="jml_angsur" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $jml_angsur;?>" size="10" maxlength="4" /> 
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Jml.Pinjaman</td><td width="">:</td>
                    <td width="67%"><input name="pinjaman" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $pinjaman;?>" size="20" maxlength="15" />
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $id                 =trim($_POST['id']);
                    $jml_angsur         =trim($_POST['jml_angsur']);
                    $pinjaman           =trim($_POST['pinjaman']);
                    $pokok              =$pinjaman/$jml_angsur;
                    $jasa               =0.01*$pinjaman;
                    $setoran            =$pokok+$jasa;

                    $Tgl                = trim($_POST['Tgl']);
                    $Bln 		= trim($_POST['Bln']);
                    $Thn                = trim($_POST['Thn']);

                    $tgl_pinjam         = $Thn.'-'.$Bln.'-'.$Tgl;
                    $stts               ='Belum Lunas';
                    if ((!empty($id))&&(!empty($jml_angsur))&&(!empty($pinjaman))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" pinjam_koperasi "," '-','$id','$jml_angsur','$pinjaman','$pokok',
                                        '$jasa','$setoran','$tgl_pinjam','$stts'", " peminjaman " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=DetailPinjam&action=TAMBAH&id=$id'>";
                                break;
                        }
                    }else if ((empty($id))||(empty($jml_angsur))||(empty($pinjaman))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "select nop, id, jml_angsur, pinjaman, pokok,
                    jasa, setoran, tgl_pinjam, stts from pinjam_koperasi
                    where id='$id'";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);
                $ttllembur=0;
                $ttlhr=0;

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='998px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='120px'><div align='center'><font size='2' face='Verdana'><strong>JMl.Angsur</strong></font></div></td>
                                <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Pinjaman</strong></font></div></td>
                                <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Pokok</strong></font></div></td>
                                <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Jasa</strong></font></div></td>
                                <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Setoran</strong></font></div></td>
                                <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Pinjam</strong></font></div></td>
                                <td width='140px'><div align='center'><font size='2' face='Verdana'><strong>Status Pinjam</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi' title='$baris[2], $baris[3], $baris[4], $baris[5], $baris[6], $baris[7], $baris[8]'>
                                <td>
                                    <center>
                                     <a href=?act=BayarPinjam&action=TAMBAH&nop=".str_replace(" ","_",$baris[0]).">[Detail]</a>";?>
                                    <a href="?act=DetailPinjam&action=HAPUS&nop=<?php print $baris[0] ?>&id=<?php print $baris[1] ?>" onClick="if (!confirm('Anda yakin menghapus data history pinjam ini?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$baris[2]</td>
                                <td>".formatDuit($baris[3])."</td>
                                <td>".formatDuit($baris[4])."</td>
                                <td>".formatDuit($baris[5])."</td>
                                <td>".formatDuit($baris[6])."</td>
                                <td>$baris[7]</td>
                                <td>$baris[8]</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data Peminjaman masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" pinjam_koperasi "," nop ='".$_GET['nop']."'","?act=DetailPinjam&action=TAMBAH&id=".$_GET['id']);
            }

        if(mysql_num_rows($hasil)!=0) {
                echo("Data : $jumlah <a target=_blank href=/penggajian/pages/pinjam/LaporanDetailPinjam.php?&id=$id>| Laporan |</a> ");
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