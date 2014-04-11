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
    <h1 class="title">::[ Input Data Komponen Karya Ilmiah ]::</h1>
    <a href=?act=ListKomponen>| List Komponen |</a><br/>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
                $id                 =$_GET['id'];
                $nip                =$_GET['nip'];
                $jenis              =$_GET['jenis'];
                $penerbit           =$_GET['penerbit'];
                $tahun              =$_GET['tahun'];
                $jmlhal             =$_GET['jmlhal'];
                $isbn               =$_GET['isbn'];
                $judul              =$_GET['judul'];
                $dokumen            =$_GET['dokumen'];
                $keterangan         =$_GET['keterangan'];

                echo "<input type=hidden name=id  value=$id><input type=hidden name=nip  value=$nip><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Nama</td><td width="">:</td>
                    <td width="67%">
                            <?php
                                $_sql = "SELECT nama FROM pegawai where nip_baru='$nip'  ORDER BY nama";
                                $hasil=bukaquery($_sql);
                                while($baris = mysql_fetch_array($hasil)) {
                                      echo $baris[0];
                                }
                            ?>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Jenis</td><td width="">:</td>
                    <td width="67%">
                        <select name="jenis" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                            <!--<option id='TxtIsi3'>- Agama -</option>-->
                            <option id='TxtIsi1' value='Buku'>Buku</option>
                            <option id='TxtIsi1' value='Jurnal'>Jurnal</option>
                            <option id='TxtIsi1' value='Media Masa'>Media Masa</option>
                            <option id='TxtIsi1' value='Seminar'>Seminar</option>
                        </select>
                        <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Penerbit</td><td width="">:</td>
                    <td width="67%"><input name="penerbit" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" value="<?php echo $penerbit;?>" size="30" maxlength="30">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Tahun Terbit</td><td width="">:</td>
                    <td width="67%">
			<select name="tahun" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" id="TxtIsi3">
                             <?php
                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Jumlah Halaman</td><td width="">:</td>
                    <td width="67%"><input name="jmlhal" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" type=text id="TxtIsi4" value="<?php echo $jmlhal;?>" size="15" maxlength="3">
                    <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >ISBN/ISSN</td><td width="">:</td>
                    <td width="67%"><input name="isbn" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" type=text id="TxtIsi5" value="<?php echo $isbn;?>" size="30" maxlength="25">
                    <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Judul</td><td width="">:</td>
                    <td width="67%"><input name="judul" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi6'));" type=text id="TxtIsi6" value="<?php echo $judul;?>" size="55" maxlength="70">
                    <span id="MsgIsi6" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Dokumen PDF</td><td width="">:</td>
                    <td width="59%"><input name="dokumen" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" type=file id="TxtIsi7" value="<?php echo $dokumen;?>" size="30" maxlength="255" />
                    <span id="MsgIsi7" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Keterangan</td><td width="">:</td>
                    <td width="67%"><input name="keterangan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi8'));" type=text id="TxtIsi8" value="<?php echo $keterangan;?>" size="55" maxlength="60">
                    <span id="MsgIsi8" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $id                 =trim($_POST['id']);
                    $nip                =trim($_POST['nip']);
                    $jenis              =trim($_POST['jenis']);
                    $penerbit           =trim($_POST['penerbit']);
                    $tahun              =trim($_POST['tahun']);
                    $jmlhal             =trim($_POST['jmlhal']);
                    $isbn               =trim($_POST['isbn']);
                    $judul              =trim($_POST['judul']);
                    $keterangan         =trim($_POST['keterangan']);
                    $dokumen            =str_replace(" ",'_',"upload/".$_FILES['dokumen']['name']);
                    
                    move_uploaded_file($_FILES['dokumen']['tmp_name'],$dokumen);
                    
                    if ((!empty($nip))&&(!empty($jenis))&&(!empty($penerbit))&&(!empty($tahun))
                            &&(!empty($jmlhal))&&(!empty($isbn))&&(!empty($judul))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" komponenilmiah "," '$id','$nip','$jenis','$penerbit','$tahun',
                                        '$jmlhal','$isbn','$judul','$dokumen','$keterangan'", " karya ilmiah " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=DetailKomponen&action=TAMBAH&nip=$nip'>";
                                break;
                        }
                    }else if ((empty($nip))||(empty($jenis))||(empty($penerbit))||(empty($tahun))
                            ||(empty($jmlhal))||(empty($isbn))||(empty($judul))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 300px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "SELECT komponenilmiah.id,
                        komponenilmiah.nip,
                        komponenilmiah.jenis,
                        komponenilmiah.penerbit,
                        komponenilmiah.tahun,
                        komponenilmiah.jmlhal,                        
                        komponenilmiah.isbn,
                       komponenilmiah.judul,
                       komponenilmiah.dokumen,
                       komponenilmiah.keterangan from komponenilmiah where nip='$nip' ORDER BY komponenilmiah.tahun ASC ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='1000px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Jenis</strong></font></div></td>
                                <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Penerbit</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Tahun</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jml.Halaman</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>ISBN/ISSN</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Judul</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Komponen</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Keterangan</strong></font></div></td>
                                <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>$baris[2]</td>
                                <td>$baris[3]</td>
                                <td>$baris[4]</td>
                                <td>$baris[5]</td>
                                <td>$baris[6]</td>
                                <td>$baris[7]</td>
                                <td><a target=_blank href=$baris[8]>$baris[8]</a></td>
                                <td>$baris[9]</td>
                                <td width='120'>
                                    <center>"; ?>
                                    <a href="?act=DetailKomponen&action=HAPUS&nip=<?php print $baris[1] ?>&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data penghargaan <?php print $baris[3]?>?')) return false;">hapus</a>
                            <?php
                            echo "</center>
                                </td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data Komponen Karya Ilmiah masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" komponenilmiah "," id ='".$id."' ","?act=DetailKomponen&action=TAMBAH&nip=$nip");
            }

        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT komponenilmiah.id,
                        komponenilmiah.nip,
                        komponenilmiah.jenis,
                        komponenilmiah.penerbit,
                        komponenilmiah.tahun,
                        komponenilmiah.jmlhal,
                        komponenilmiah.isbn,
                       komponenilmiah.judul,
                       komponenilmiah.dokumen,
                       komponenilmiah.keterangan from komponenilmiah where nip='$nip' ORDER BY komponenilmiah.tahun ASC");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo("Jumlah Record : $jumlah ");
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