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
                $action     =$_GET['action'];
                $nop        =$_GET['nop'];
                $id         =$_GET['id'];

                $_sql2  = "SELECT nop, id, jml_angsur, pinjaman, pokok, 
                          jasa, setoran, tgl_pinjam, stts
                          FROM pinjam_koperasi where nop='$nop'";
                $hasil2 =bukaquery($_sql2);
                $baris2 = mysql_fetch_row($hasil2);
                $nop        = $baris2[0];
                $id         = $baris2[1];
                $jml_angsur = $baris2[2];
                $pinjaman   = $baris2[3];
                $pokok      = $baris2[4];
                $jasa       = $baris2[5];
                $setoran    = $baris2[6];
                $tgl_pinjam = $baris2[7];
                $stts       = $baris2[8];                
                
		$_sql  = "SELECT nik,nama FROM pegawai where id='$id'";
                $hasil = bukaquery($_sql);
                $baris = mysql_fetch_row($hasil);
                //mencari jumlah angsuran dan angsuran yang sudah dibayarkan
                $_sqlj = "select count(nop),sum(besar_angsuran)
                        from detailpinjam_koperasi where nop='$nop' group by nop";
                $hasilj=bukaquery($_sqlj);
                $barisj = mysql_fetch_array($hasilj);
                $jml_sdh_angsur =$barisj[0];
                $sdh_setor      =$barisj[1];
                $sisa_pinjam    =$pinjaman-($jml_sdh_angsur*$pokok);
                if(($sisa_pinjam==0)||($jml_sdh_angsur==$jml_angsur)||($sdh_setor>=$pinjaman)){
                    
                }

                echo "<input type=hidden name=nop value=$nop>
                      <input type=hidden name=setoran value=$setoran>
                      <input type=hidden name=action value=$action>";

                    echo "<div align='center' class='link'>                          
                          <a href=?act=DetailPinjam&action=TAMBAH&id=$id>| List History Pinjam |</a>
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
                    <td width="67%"><?php echo $tgl_pinjam;?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Jml.Angsuran</td><td width="">:</td>
                    <td width="67%"><?php echo $jml_angsur;?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Jml.Pinjaman</td><td width="">:</td>
                    <td width="67%"><?php echo formatDuit($pinjaman);?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Pokok</td><td width="">:</td>
                    <td width="67%"><?php echo formatDuit($pokok);?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Jasa</td><td width="">:</td>
                    <td width="67%"><?php echo formatDuit($jasa);?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Setoran</td><td width="">:</td>
                    <td width="67%"><?php echo formatDuit($setoran);?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Status Pinjaman</td><td width="">:</td>
                    <td width="67%"><?php echo $stts;?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Jml.Sdh Diangsur</td><td width="">:</td>
                    <td width="67%"><?php echo formatDuit($jml_sdh_angsur);?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Ttl.Sdh Diangsur</td><td width="">:</td>
                    <td width="67%"><?php echo formatDuit($sdh_setor);?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Sisa Pinjaman</td><td width="">:</td>
                    <td width="67%"><?php echo formatDuit($sisa_pinjam);?></td>
                </tr>
                <tr class="head">
                    <td width="31%" colspan="3">&nbsp;</td>
                </tr>
                <tr class="head">
                    <td width="31%" >Tanggal Setoran</td><td width="">:</td>
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
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan']; 
                if (isset($BtnSimpan)) {
                    $nop      = trim($_POST['nop']);
                    $besar_angsuran  = trim($_POST['setoran']);
                    $Tgl             = trim($_POST['Tgl']);
                    $Bln 	     = trim($_POST['Bln']);
                    $Thn             = trim($_POST['Thn']);
                    $tgl_agsur       = $Thn.'-'.$Bln.'-'.$Tgl;
                    if(($sisa_pinjam==0)||($jml_sdh_angsur==$jml_angsur)||($sdh_setor>=$pinjaman)){
                        echo 'Sudah lunas cooooy, masak bayar lagi......!!!';
                    }else if ((!empty($nop))&&(!empty($besar_angsuran))&&(!empty($tgl_agsur))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" detailpinjam_koperasi "," '-','$nop','$tgl_agsur','$besar_angsuran'", " angsuran " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=BayarPinjam&action=TAMBAH&nop=$nop'>";
                                break;
                        }
                    }else if ((empty($nop))||(empty($besar_angsuran))||(empty($tgl_agsur))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
            <?php
                $_sql = "select no_detail, nop, tgl_agsur, besar_angsuran
                        from detailpinjam_koperasi where nop='$nop'";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);
                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='90px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='40px'><div align='center'><font size='2' face='Verdana'><strong>No.</strong></font></div></td>
                                <td width='260px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Angsur</strong></font></div></td>
                                <td width='260px'><div align='center'><font size='2' face='Verdana'><strong>Besar Angsuran</strong></font></div></td>
                            </tr>";
                    $i=1;
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi' title='$baris[2], $baris[3], $baris[4], $baris[5], $baris[6], $baris[7], $baris[8]'>
                                <td>
                                    <center>";?>
                                    <a href="?act=BayarPinjam&action=HAPUS&nop=<?php print $baris[1] ?>&no_detail=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data history pinjam ini?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$i</td>
                                <td>$baris[2]</td>
                                <td>".formatDuit($baris[3])."</td>
                           </tr>";$i++;
                    }
                echo "</table>";

            } else {echo "<b>Data Bayar Peminjaman masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" detailpinjam_koperasi "," no_detail ='".$_GET['no_detail']."'","?act=BayarPinjam&action=TAMBAH&nop=".$_GET['nop']);
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