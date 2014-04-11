
        <div id="post">
            <h1 class="title">::[ Input Presensi Pegawai ]::</h1>
            <div class="entry">
            <form name="frmPresensi" id="frmPresensi" method="post" onsubmit="gambar()">
            <table  width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                
              <tr class='head'>
                <td width=50% align="center" style=" background: #FFFFFF ;">
                    <!-- First, include the JPEGCam JavaScript Library -->
                    <script type="text/javascript" src="webcam.js"></script>

                    <!-- Configure a few settings -->
                    <script language="JavaScript">
                            webcam.set_api_url( 'test.php' );
                            webcam.set_quality( 90 ); // JPEG quality (1 - 100)
                            webcam.set_shutter_sound( true ); // play shutter click sound
                    </script>

                    <!-- Next, write the movie to the page at 320x240 -->
                    
                    <script language="JavaScript">
                            document.write( webcam.get_html(370, 300) );
                    </script>

                    <!-- Code to handle the server response (see test.php) -->
                    <script language="JavaScript">
                            var gambar="gambar";
                            webcam.set_hook( 'onComplete', 'my_completion_handler' );

                            function take_snapshot() {
                                    // take snapshot and upload to server
                                    //document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
                                    webcam.snap();
                            }

                            function my_completion_handler(msg) {
                                    // extract URL out of PHP output
                                    if (msg.match(/(http\:\/\/\S+)/)) {
                                            var image_url = RegExp.$1;
                                            // show JPEG image in page
                                            gambar=image_url;
                                            document.frmPresensi.urlnya.value = gambar;
                                            webcam.reset();
                                    }
                                    //else alert("PHP Error: " + msg);
                            }
                            function gambar(){
                                document.frmPresensi.urlnya.value = gambar;
                            }                            
                    </script>
                     
                    <input type="hidden" id="urlnya" name="urlnya" value=""/>
                            <!--<input type=button value="Configure..." onClick="webcam.configure()"/>-->
                    <!--<input type="button" class="button" value="&nbsp;&nbsp;&nbsp;Ambil Photo&nbsp;&nbsp;&nbsp;" onClick="take_snapshot();"/>-->                   
               </td>
                <td width=50%>
                        <!--<div id="upload_results" style="background-color:#eee;"></div>-->
                     <table width="100%" align="center">
                          <tr class="head4">
                                <td width="31%" >Jam Masuk Departemen</td><td width="">:</td>
                                <td width="67%">
                                    <select name="jam_masuk" class="text7" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" onClick="take_snapshot();" id="TxtIsi1">
                                        <!-- <option id='TxtIsi2' value=' '>- Jenis Kelamin -</option> --> 
                                        <option id='TxtIsi1' value=''>&nbsp;</option>
                                        <option id='TxtIsi1' value='04:00:00'>04.00</option>
                                        <option id='TxtIsi1' value='07:00:00'>07.00</option>
                                        <option id='TxtIsi1' value='07:30:00'>07.30</option>
                                        <option id='TxtIsi1' value='08:00:00'>08.00</option>
                                        <option id='TxtIsi1' value='09:00:00'>09.00</option>
                                        <option id='TxtIsi1' value='10:00:00'>10.00</option>
                                        <option id='TxtIsi1' value='12:00:00'>12.00</option>
                                        <option id='TxtIsi1' value='13:00:00'>13.00</option>
                                        <option id='TxtIsi1' value='14:00:00'>14.00</option>
                                        <option id='TxtIsi1' value='15:00:00'>15.00</option>                                        
                                        <option id='TxtIsi1' value='16:00:00'>16.00</option>
                                        <option id='TxtIsi1' value='17:00:00'>17.00</option>
                                        <option id='TxtIsi1' value='19:00:00'>19.00</option>
                                        <option id='TxtIsi1' value='21:00:00'>21.00</option>
                                        <option id='TxtIsi1' value='22:00:00'>22.00</option>
                                        <option id='TxtIsi1' value='23:00:00'>23.00</option>
                                    </select>
                                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                                </td>
                          </tr>
                          <tr class="head4">
                              <td width="31%" >Nmr.Kartu</td><td width="">:</td>
                              <td width="67%"><input name="barcode" class="text7" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=password id="TxtIsi2" class="inputbox" value="" size="20" maxlength="70"/>
                              <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                              </td>
                          </tr>
                      </table>
                      <div align="center"><input name=BtnSimpan type=submit class="button" value="Simpan"/>&nbsp<input name=BtnKosong type=reset class="button" value="Kosong"/></div><br/>
               </td>
              </tr>
            </table> 
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $urlnya         = trim($_POST['urlnya']);
                    $jam_masuk      = trim($_POST['jam_masuk']);  
                    $barcode        = trim($_POST['barcode']);
                    
                    $_sqlbar        = "select id from barcode where barcode='$barcode'";
                    $hasilbar       = bukaquery($_sqlbar);
                    $barisbar       = mysql_fetch_array($hasilbar);  
                    $idpeg          = $barisbar["id"];
                    
                    $_sqljamdatang  = "select jam_jaga.shift,CURRENT_DATE() as hariini,pegawai.departemen from jam_jaga inner join pegawai on pegawai.departemen=jam_jaga.dep_id 
                                       where jam_jaga.jam_masuk='$jam_masuk' and pegawai.id='$idpeg'";
                    $hasiljamdatang = bukaquery($_sqljamdatang);
                    $barisjamdatang = mysql_fetch_array($hasiljamdatang);  
                    $shift          = $barisjamdatang["shift"];
                    $hariini        = $barisjamdatang["hariini"];
                    $departemen     = $barisjamdatang["departemen"];
                    
                    //echo "Jam Masuk : ".$jam_masuk." ID : ".$idpeg."departemen : $departemen  Shift : $shift";
                    
                    $jam="now()";
                    if(!empty($jam_masuk)){
                        $jam="CONCAT(CURRENT_DATE(),' $jam_masuk')";
                    }
                    
                    $_sqlvalid        = "select id from rekap_presensi where id='$idpeg' and shift='$shift' and jam_datang like '%$hariini%'";
                    $hasilvalid       = bukaquery($_sqlvalid);
                    $barisvalid       = mysql_fetch_array($hasilvalid);  
                    $idvalid          = $barisvalid["id"];  
                    
                    if(!empty($idvalid)){
                        echo"<font size='9'>Anda sudah presensi untuk tanggal ".date('Y-m-d')."</font> <html><head><title></title><meta http-equiv='refresh' content='5;URL=?page=Input'></head><body></body></html>";
                    }elseif((!empty($idpeg))&&(!empty($shift))&&(empty($idvalid))) {
                        $_sqlcek        = "select id, shift, jam_datang, jam_pulang, status, keterlambatan, durasi, photo from temporary_presensi where id='$idpeg'";
                        $hasilcek       = bukaquery($_sqlcek);
                        $bariscek       = mysql_fetch_array($hasilcek);  
                        $idcek          = $bariscek["id"];         
                        
                        
                        if(empty($idcek)){
                            if(empty($urlnya)){
                                echo "<font size='9'>Pilih shift dulu !!!!!!!</font>";
                            }else{
                                Tambah("temporary_presensi","'$idpeg','$shift',NOW(),NULL,
                                if(TIME_TO_SEC(now())-TIME_TO_SEC($jam)>600,'Terlambat','Tepat Waktu'),
                                if(TIME_TO_SEC(now())-TIME_TO_SEC($jam)>600,SEC_TO_TIME(TIME_TO_SEC(now())-TIME_TO_SEC($jam)),''),'','$urlnya'", " Presensi Masuk jam $jam_masuk" );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='5;URL=?page=Input'></head><body></body></html>";
                            }                            
                        }elseif(!empty($idcek)){  
                            if(empty($urlnya)){
                                echo "<font size='9'>Pilih shift dulu !!!!!!!</font>";
                            }else{
                                Ubah2(" temporary_presensi "," jam_pulang=NOW(),
                                    durasi=(SEC_TO_TIME(unix_timestamp(now()) - unix_timestamp(jam_datang))) where id='$idpeg'  ");                            
                                $_sqlcek        = "select id, shift, jam_datang, jam_pulang, status, keterlambatan, durasi, photo from temporary_presensi where id='$idpeg'";
                                $hasilcek       = bukaquery($_sqlcek);
                                $bariscek       = mysql_fetch_array($hasilcek);  
                                $idcek          = $bariscek["id"];                                                      
                                $shift          = $bariscek["shift"];
                                $jam_datang     = $bariscek["jam_datang"];
                                $jam_pulang     = $bariscek["jam_pulang"];
                                $status         = $bariscek["status"];
                                $keterlambatan  = $bariscek["keterlambatan"];
                                $durasi         = $bariscek["durasi"];
                                Tambah("rekap_presensi","'$idcek','$shift','$jam_datang','$jam_pulang','$status','$keterlambatan','$durasi','','$urlnya'", " Presensi Pulang jam $jam_pulang" );
                                hapusinput(" delete from temporary_presensi where id ='$idcek' ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='5;URL=?page=Input'></head><body></body></html>";
                            } 
                            
                        } 
                    }elseif (empty($idpeg)||empty($shift)){
                        echo "<b>ID Pegawai atau Jam Masuk ada yang salah, Silahkan pilih berdasarkan shift departemen anda</b>";
                    }
                }
            ?>
            </form>
           </div>
        </div>
