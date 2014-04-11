<div class="t">
<div class="b">
<div class="l">
<div class="r">
<div class="bl">
<div class="br">
<div class="tl">
<div class="tr">
<div class="y">
<?php
   $_sql         = "SELECT * FROM set_tahun";
   $hasil        = bukaquery($_sql);
   $baris        = mysql_fetch_row($hasil);
   $tahun         = $baris[0];
   $bulan          = $baris[1];
?>


<div id="post">
    <h1 class="title">::[ Update Data Potongan Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ]::</h1>
    <div class="entry">
        <form name="frm_lokasi" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $id          =$_GET['id'];
                $action      =$_GET['action']; 
                $_sql = "SELECT id,jamsostek,dansos,simwajib,angkop,angla,
				        telpri,pajak,pribadi,lain,ktg FROM potongan WHERE id='$id' AND tahun='$tahun'  and bulan='$bulan'";
                $hasil=bukaquery($_sql);
                
                $_sqlkon = "SELECT (To_days(NOW())-to_days(mulai_kontrak)) as maskon FROM pegawai WHERE id='$id'";
                $hasilkon=bukaquery($_sqlkon);
                $bariskon= mysql_fetch_row($hasilkon);

                if(mysql_num_rows($hasil)!=0) {
                    $action = "UBAH";
					$baris = mysql_fetch_row($hasil); 
					$jamsostek        = $baris[1];
					$dansos			  = $baris[2];
					$simwajib		  = $baris[3];
					$angkop			  = $baris[4];
					$angla			  = $baris[5];
					$telpri			  = $baris[6];
					$pajak			  = $baris[7];
					$pribadi		  = $baris[8];
					$lain			  = $baris[9];
					$ktg		      = $baris[10];

                                        if($jamsostek==0){$jamsostek = '-';}
					if($dansos==0){$dansos	 = '-';}
					if($simwajib==0){$simwajib = '-';}

                                        if($angkop==0){$angkop	 = '-';}
					if($angla==0){$angla	 = '-';}
					if($telpri==0){$telpri	 = '-';}
					if($pajak==0){$pajak	 = '-';}
					if($pribadi==0){$pribadi = '-';}
					if($lain==0){$lain	 = '-';}
					if($ktg==""){$ktg	 = '-';}
                                        
                }else if(mysql_num_rows($hasil)==0) {
                    $action = "TAMBAH";
					$_sql3 = "SELECT koperasi.wajib, jamsostek.biaya
						  from keanggotaan,jamsostek,koperasi
						  where keanggotaan.koperasi=koperasi.stts
						  and keanggotaan.jamsostek=jamsostek.stts 
						  and keanggotaan.id='$id'";
					$hasil3      =bukaquery($_sql3);
					$baris3      = mysql_fetch_row($hasil3);
					$simwajib	 = $baris3[0];
					$jamsostek   = $baris3[1];
				
					$_sql4       = "SELECT dana FROM dansos";
					$hasil4      = bukaquery($_sql4);
					$baris4      = mysql_fetch_row($hasil4);
                                        if($bariskon[0]>=1){
                                            $dansos      = $baris4[0];
                                        }else if($bariskon[0]<1){
                                            $dansos      = 0;
                                        }

                                        if($jamsostek==0){$jamsostek = '-';}
					if($dansos==0){$dansos	 = '-';}
					if($simwajib==0){$simwajib = '-';}
					

					$angkop			  = '-';
					$angla			  = '-';
					$telpri			  = '-';
					$pajak			  = '-';
					$pribadi		  = '-';
					$lain			  = '-';
					$ktg		      = '-';
                }
                
                $_sql2 = "SELECT nik,nama,departemen FROM pegawai where id='$id'";
                $hasil2=bukaquery($_sql2);
                $baris2 = mysql_fetch_row($hasil2);  		
				
                echo"<input type=hidden name=id  value=$id><input type=hidden name=action value=$action>";

                    $_sqlnext         	= "SELECT id FROM pegawai WHERE id>'$id' order by id asc limit 1";
                    $hasilnext        	= bukaquery($_sqlnext);
                    $barisnext        	= mysql_fetch_row($hasilnext);
                    $next               = $barisnext[0];

                    $_sqlprev         	= "SELECT id FROM pegawai WHERE id<'$id' order by id desc limit 1";
                    $hasilprev        	= bukaquery($_sqlprev);
                    $barisprev        	= mysql_fetch_row($hasilprev);
                    $prev               = $barisprev[0];

                    echo "<div align='center' class='link'>
                          <a href=?act=InputPotongan&action=$action&id=$prev><<--</a>
                          <a href=?act=ListPotongan>| List Potongan |</a>
                          <a href=?act=InputPotongan&action=$action&id=$next>-->></a>
                          </div>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >NIK</td><td width="">:</td>
                    <td width="67%"><?php echo $baris2[0];?></td>
                </tr>
		<tr class="head">
                    <td width="31%">Nama</td><td width="">:</td>
                    <td width="67%"><?php echo $baris2[1];?></td>
                </tr>
				<tr class="head">
                    <td width="31%">Departemen</td><td width="">:</td>
                    <td width="67%"><?php echo $baris2[2];?></td>
                </tr>
				<tr class="head">
                    <td width="31%">Smp.Wjb Koperasi</td><td width="">:</td>
                    <td width="67%"><input name="simwajib" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $simwajib;?>" size="20" maxlength="15">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Jamsostek</td><td width="">:</td>
                    <td width="67%"><input name="jamsostek" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $jamsostek;?>" size="20" maxlength="15">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Dana Sosial</td><td width="">:</td>
                    <td width="67%"><input name="dansos" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $dansos;?>" size="20" maxlength="15">
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Angsuran Koperasi</td><td width="">:</td>
                    <td width="67%"><input name="angkop" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" type=text id="TxtIsi4" class="inputbox" value="<?php echo $angkop;?>" size="20" maxlength="15">
                    <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Angsuran Lain</td><td width="">:</td>
                    <td width="67%"><input name="angla" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" type=text id="TxtIsi5" class="inputbox" value="<?php echo $angla;?>" size="20" maxlength="15">
                    <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Telepon Pribadi</td><td width="">:</td>
                    <td width="67%"><input name="telpri" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi6'));" type=text id="TxtIsi6" class="inputbox" value="<?php echo $telpri;?>" size="20" maxlength="15">
                    <span id="MsgIsi6" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Pajak</td><td width="">:</td>
                    <td width="67%"><input name="pajak" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" type=text id="TxtIsi7" class="inputbox" value="<?php echo $pajak;?>" size="20" maxlength="15">
                    <span id="MsgIsi7" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Pribadi</td><td width="">:</td>
                    <td width="67%"><input name="pribadi" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi8'));" type=text id="TxtIsi8" class="inputbox" value="<?php echo $pribadi;?>" size="20" maxlength="15">
                    <span id="MsgIsi8" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Lain</td><td width="">:</td>
                    <td width="67%"><input name="lain" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi9'));" type=text id="TxtIsi9" class="inputbox" value="<?php echo $lain;?>" size="20" maxlength="15">
                    <span id="MsgIsi9" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
				<tr class="head">
                    <td width="31%">Keterangan</td><td width="">:</td>
                    <td width="67%"><input name="ktg" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi10'));" type=text id="TxtIsi10" class="inputbox" value="<?php echo $ktg;?>" size="50" maxlength="50">
                    <span id="MsgIsi10" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $id        = trim($_POST['id']);
                    $koperasi  = trim($_POST['koperasi']);
                    $jamsostek = trim($_POST['jamsostek']);
                    $dansos    = trim($_POST['dansos']);
					$simwajib  = trim($_POST['simwajib']);
					$angkop	   = trim($_POST['angkop']);
					$angla	   = trim($_POST['angla']);
					$telpri	   = trim($_POST['telpri']);
					$pajak	   = trim($_POST['pajak']);
					$pribadi   = trim($_POST['pribadi']);
					$lain	   = trim($_POST['lain']);
					$ktg	   = trim($_POST['ktg']);

                    if ((!empty($id))&&(!empty($simwajib))&&(!empty($jamsostek))&&
					   (!empty($simwajib))&&(!empty($angkop))&&(!empty($angla))&&
					   (!empty($telpri))&&(!empty($pajak))&&(!empty($pribadi))&&(!empty($lain))) {
                        switch($action) {
                            case "TAMBAH":
                                Tambah(" potongan ","'$tahun','$bulan','$id','$jamsostek','$dansos','$simwajib',
						     '$angkop','$angla','$telpri','$pajak',
						     '$pribadi','$lain','$ktg' ", " Potongan " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputPotongan&id=$id'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" potongan "," simwajib='$simwajib',jamsostek='$jamsostek',dansos='$dansos',
						   simwajib='$simwajib',angkop='$angkop',angla='$angla',telpri='$telpri',pajak='$pajak',
						   pribadi='$pribadi',lain='$lain',ktg='$ktg' WHERE id='$id' and tahun='$tahun' and bulan='$bulan' ", " Potongan ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=InputPotongan&id=$id'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($id))||(empty($simwajib))||(empty($jamsostek))||
					    (empty($simwajib))||(empty($angkop))||(empty($angla))||
						(empty($telpri))||(empty($pajak))||(empty($pribadi))||(empty($lain))){
                        echo '<b>Semua field harus isi..!!</b>';
						/*echo " simwajib='$simwajib',jamsostek='$jamsostek',dansos='$dansos',simwajib='$simwajib',
						       angkop='$angkop',angla='$angla',telpri='$telpri',pajak='$pajak',
										pribadi='$pribadi',lain='$lain',ktg='$ktg' WHERE id='$id' and tahun='$tahun' and bulan='$bulan'";*/
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