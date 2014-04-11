<?php
	include_once "conf/command.php";
	include_once "conf/conf.php";
  	if (isset($_GET['act']) && ($_GET['act']=="login")){
            $sql = "SELECT aes_decrypt(usere,'nur'),aes_decrypt(usere,'nur'),aes_decrypt(usere,'nur'),aes_decrypt(usere,'nur') FROM admin WHERE aes_decrypt(usere,'nur')='".$_POST['usere']."' AND aes_decrypt(passworde,'windi')='".$_POST['passwordte']."'";
	    $hasil=bukaquery($sql);
	    $baris=mysql_fetch_row($hasil);

            $nip            = $baris[0];
            $usere          = $baris[1];
            $passwordte     = $baris[2];
            $type           = $baris[3];

            $hasil=bukaquery($sql);
	    $baris=mysql_fetch_row($hasil);
		if (JumlahBaris($hasil)==0) {
                        $sql2   = "SELECT aes_decrypt(id_user,'nur'),aes_decrypt(password,'windi) FROM user 
                            where aes_decrypt(id_user,'nur')='".$_POST['usere']."' AND 
                            aes_decrypt(password,'windi)='".$_POST['passwordte']."'";
                        $hasil2  = bukaquery($sql2);
                        $baris2  = mysql_fetch_row($hasil2);

                        $nip     = $baris2[0];

                        $hasil2=bukaquery($sql2);
                        $baris2=mysql_fetch_row($hasil2);
                        if (JumlahBaris($hasil2)==0) {
                            header("Location:index.php");
                        }else{
                            session_start();
                            HapusAll(" sesion ");
                            InsertData(" sesion ","'$nip'");
                            $ses_pegawai = $hasil2[0];
                            session_register("ses_pegawai");
                            $url = "index.php?act=HomeAdmin";                            
                            header("Location:".$url);
                        }                        
			
		} else {
		     session_start();
                     HapusAll(" sesion ");
                     InsertData(" sesion ","'$nip'");
                     /*$ses_admin = $hasil[0];
				session_register("ses_admin");
				$url = "index.php?act=HomeAdmin&type=$type";*/
                    
                         $ses_admin = $hasil[0];
                         session_register("ses_admin");
                         $url = "index.php?act=HomeAdmin";
                    
		    header("Location:".$url);
		}
            
	}

    
?>
