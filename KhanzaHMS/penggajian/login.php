<?php
	include_once "conf/command.php";
	include_once "conf/conf.php";
  	if (isset($_GET['act']) && ($_GET['act']=="login")){
            $sql = "SELECT nip,usere,passwordte,type FROM user WHERE usere='".$_POST['usere']."' AND passwordte='".$_POST['passwordte']."'";
	    $hasil=bukaquery($sql);
	    $baris=mysql_fetch_row($hasil);

            $nip            = $baris[0];
            $usere          = $baris[1];
            $passwordte     = $baris[2];
            $type           = $baris[3];

            $hasil=bukaquery($sql);
	    $baris=mysql_fetch_row($hasil);
		if (JumlahBaris($hasil)==0) {
			header("Location:index.php");
		} else {
		     session_start();
                     HapusAll(" sesion ");
                     InsertData(" sesion ","'$nip'");
                     /*$ses_admin = $hasil[0];
				session_register("ses_admin");
				$url = "index.php?act=HomeAdmin&type=$type";*/
                     if($type=='ADMIN'){
                         $ses_admin = $hasil[0];
                         session_register("ses_admin");
                         $url = "index.php?act=HomeAdmin&nip=$nip";
                     }elseif($type=='PEGAWAI'){
                         $ses_pegawai = $hasil[0];
                         session_register("ses_pegawai");
                         $url = "index.php?act=HomeAdmin&nip=$nip";
                     }elseif($type=='DOSEN'){
                         $ses_dosen = $hasil[0];
                         session_register("ses_dosen");
                         $url = "index.php?act=HomeAdmin&nip=$nip";
                     }elseif($type=='OPERATOR'){
                         $ses_operator = $hasil[0];
                         session_register("ses_operator");
                         $url = "index.php?act=HomeAdmin&nip=$nip";
                     }
		    header("Location:".$url);
		}
            
	}

    
?>