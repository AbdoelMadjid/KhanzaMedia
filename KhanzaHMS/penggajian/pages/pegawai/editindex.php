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
    <h1 class="title">::[ Edit Index Pegawai ]::</h1>
    <div class="entry">
        <form name="frm_unit" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $id     =$_GET['id'];
                if($action == "TAMBAH"){
                    $id    	= $_GET['id'];
                    $nik              ='';
                }else if($action == "UBAH"){
                    $_sql         	= "SELECT id,nik,nama,indek,pengurang FROM pegawai WHERE id='$id'";
                    $hasil        	= bukaquery($_sql);
                    $baris        	= mysql_fetch_row($hasil);
                    $id                 = $baris[0];
                    $nik                = $baris[1];
                    $nama               = $baris[2];
                    $indek              = $baris[3];
                    $pengurang          = $baris[4];
        
                }
                echo"<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
                
                 $_sqlnext         	= "SELECT id FROM pegawai WHERE id>'$id' order by id asc limit 1";
                    $hasilnext        	= bukaquery($_sqlnext);
                    $barisnext        	= mysql_fetch_row($hasilnext);
                    $next               = $barisnext[0];

                    $_sqlprev         	= "SELECT id FROM pegawai WHERE id<'$id' order by id desc limit 1";
                    $hasilprev        	= bukaquery($_sqlprev);
                    $barisprev        	= mysql_fetch_row($hasilprev);
                    $prev               = $barisprev[0];

                    echo "<div align='center' class='link'>
                          <a href=?act=EditIndexPegawai&action=UBAH&id=$prev><<--</a>
                          <a href=?act=ListIndexPegawai>| Index Pegawai |</a>
                          <a href=?act=EditIndexPegawai&action=UBAH&id=$next>-->></a>
                          </div>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="45%" >NIK</td><td width="">:</td>
                    <td width="55%"><?php echo$nik; ?></td>
                </tr>
                <tr class="head">
                    <td width="45%" >Nama</td><td width="">:</td>
                    <td width="55%"><?php echo$nama;?></td>
                </tr>
                <tr class="head">
                    <td width="45%" >Index Struktural</td><td width="">:</td>
                    <td width="55%"><input name="indek" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $indek;?>" size="10" maxlength="2">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="45%" >Pengurang</td><td width="">:</td>
                    <td width="55%"><input name="pengurang" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $pengurang;?>" size="10" maxlength="5"> %
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="45%" >Cuti Yang Sudah Diambil</td><td width="">:</td>
                    <td width="55%"><input name="cuti_diambil" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $cuti_diambil;?>" size="10" maxlength="5"> X
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>  
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>

            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
	            $id               = trim($_POST['id']);
                    $nik              = trim($_POST['nik']);
                    $nama             = trim($_POST['nama']);
                    $indek            = trim($_POST['indek']);
                    $pengurang        = trim($_POST['pengurang']);
                    $cuti_diambil     = trim($_POST['cuti_diambil']);
                    if ((!empty($pengurang))&&(!empty($indek))) {
                        switch($_GET['action']) {
                            case "UBAH":
                                Ubah(" pegawai "," pengurang='$pengurang',indek='$indek',cuti_diambil='$cuti_diambil' WHERE id='".$_GET['id']."' ", " Index Pegawai ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=EditIndexPegawai&action=UBAH&id=$id'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($indek))||(empty($pengurang))) {
                        echo '<b>Semua field harus isi..!!</b>';
                        /*echo " nik='$nik',nama='$nama',jk='$jk',jbtn='$jbtn',jnj_jabatan='$jnj_jabatan',departemen='$departemen',
								                bidang='$bidang',stts_wp='$stts_wp',stts_kerja='$stts_kerja',npwp='$npwp',pendidikan='$pendidikan',
												gapok='$gapok',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',kota='$kota',
												mulai_kerja='$mulai_kerja',ms_kerja='$ms_kerja',indek='$indek',indexins='$indexins',bpd='$bpd',
												rekening='$rekening' ";*/
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