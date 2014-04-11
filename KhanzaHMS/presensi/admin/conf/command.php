<?php
	function title(){
 		$judul ="Digital Payrol RSKIA Sadewa --)(*!!@#$%";
		$judul = ereg_replace("[^A-Za-z0-9_\-\./,|]"," ",$judul);
		$judul = str_replace(array('.','-','/',',')," ",$judul);
		$judul = trim($judul);
		echo "$judul";	
 	}
 
 	function cekSessiKunjung() {
		if (session_is_registered('ses_kunjung'))
			return true;
		else
			return false;
	}

	function cekSessiAdmin() {
		if (session_is_registered('ses_admin'))
			return true;
		else
			return false;
	}

        function cekSessiPegawai() {
		if (session_is_registered('ses_pegawai'))
			return true;
		else
			return false;
	}

        function cekUser() {
		if (session_is_registered('ses_admin'))
			return true;
		elseif (session_is_registered('ses_pegawai'))
			return true;
		elseif (session_is_registered('ses_dosen'))
			return true;
		elseif (session_is_registered('ses_operator'))
			return true;
		else
			return false;
	}
	
	function kunjungAktif() {
		if (cekSessiPakar()) return $_SESSION['ses_kunjung'];
	}

	function adminAktif() {
		if (cekSessiAdmin()) return $_SESSION['ses_admin'];
	}

        function pegawaiAktif() {
		if (cekSessiPegawai()) return $_SESSION['ses_pegawai'];
	}

        function dosenAktif() {
		if (cekSessiDosen()) return $_SESSION['ses_dosen'];
	}

        function operatorAktif() {
		if (cekSessiOperator ()) return $_SESSION['ses_operator'];
	}
	
	function isGuest() {
		if (cekSessiKunjung()|| cekSessiAdmin()) return false;
		else return true;
	}
	
	
	function samping()
	{
            
		if (cekSessiAdmin()):
			echo "<br/>  <h2>.: Menu &nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :.</h2>
                                 <p>
                                 <ul class=\"left_menu\">
					<li class=\"even\"><a href='index.php?act=ListBidang'>Bidang</a></li>
					<li class=\"odd\"><a href='index.php?act=ListPendidikan'>Pendidikan</a></li>
					<li class=\"even\"><a href='index.php?act=ListSttskerja'>Status Kerja</a></li>
					<li class=\"odd\"><a href='index.php?act=ListSttswp'>Status WP</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListJenjang'>Jenjang Jabatan</a></li>
					<li class=\"odd\"><a href='index.php?act=ListDepartemen'>Departemen</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListJam&action=TAMBAH'>Jam Jaga Departemen</a></li>
					<li class=\"odd\"><a href='index.php?act=ListCariPegawai'>Data Pegawai</a></li>
				  </ul>
                                  </p>
                               ";

		
                elseif(cekSessiPegawai ()):
                         echo "<br/>  <h2>.: Menu &nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :.</h2>
                                 <p>
                                 <ul class=\"left_menu\">
					<li class=\"even\"><a href='index.php?act=ListBidang'>Bidang</a></li>
					<li class=\"odd\"><a href='index.php?act=ListPendidikan'>Pendidikan</a></li>
					<li class=\"even\"><a href='index.php?act=ListSttskerja'>Status Kerja</a></li>
					<li class=\"odd\"><a href='index.php?act=ListSttswp'>Status WP</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListJenjang'>Jenjang Jabatan</a></li>
					<li class=\"odd\"><a href='index.php?act=ListDepartemen'>Departemen</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListJam&action=TAMBAH'>Jam Jaga Departemen</a></li>
					<li class=\"odd\"><a href='index.php?act=ListCariPegawai'>Data Pegawai</a></li>
				  </ul>
                                  </p>
                               ";

		elseif(isGuest()):
			menuLogin();
                        //kategori();

		endif;	
	}
	
	function bawah() 
	{
	  echo	"<p id=\"legal\">Copyright &copy; 2011 RSKIA Sadewa. All Rights Reserved. Design by Khanza.Soft Media</p>
                ";
	}
 
 	function tampilMenu() {
		if (cekSessiKunjung()) {
			$menu = array(
				'Home'			=> '?act=HomeKunjung',
				'Data Komentar'		=> '?act=DataKomentar',
				'Sign Out'		=> 'logout.php');
		} elseif (cekSessiAdmin()) {
			$menu = array(
				'Informasi'		=> '?act=ListArtikel',
                                'About Program'	        => '?act=HomeAdmin',
				'Data Admin'	 	=> '?act=InputDataAdmin&action=TAMBAH',
				'Set Tahun & Bulan'	 	=> '?act=InputTahun&action=TAMBAH',
				'Sign Out'		=> 'logout.php');
		}elseif (cekSessiPegawai ()) {
			$menu = array(
                                'About Program'	        => '?act=HomeAdmin',
				'Set Tahun & Bulan'	 	=> '?act=InputTahun&action=TAMBAH',
				'Sign Out'		=> 'logout.php');
		}else {
			$menu = array(
				'Informasi & Pengumuman'=> 'index.php?act=Home',
				'Pencarian Pegawai'	=> 'index.php?act=ListPeg',
	                        'About Program'		=> 'index.php?act=Kontak');
		}		
		echo "<ul id=\"navlist\">";
		$i=0;
		foreach ($menu as $key => $val) {
			$i++;
			if ($key=='Sign Out')	$klik = "onclick=\"return confirm('Yakinkah anda akan logout.?');\""; 
			if (isGuest()) {
				if ($i == 5) $last = "id='current'";
			} else {
				if ($i == 5) $last = "id='current'";
			}
			echo "<li title='$key'><a href='$val' >$key</a></li>";
		}
		echo "</ul>";
	} 	
	
	
	function ListArtikel()
	{
		$x= bukaquery("SELECT * FROM artikel where page='artikel' ORDER BY id DESC LIMIT 4");
		while($row=mysql_fetch_array($x))
		{
		  $judul=$row['1'];
		  $isi  = substr($row['1'],0,160);
		  $post =konversiTanggal((substr($row[4],0,10)));  	
		  echo "<ul><li><b>$judul</b><br />
					<small>posted on $post</small><br/>";
		  echo	"$isi<a href=\"index.php?act=News&id=$row[0]\">...detail</a>";	  	
		  echo "</li></ul>";	
		} 
	}
		
	function calender() {
		echo "  
                        <h2>.: KALENDER :.</h2>                     
                        <p>";
		include_once "include/calender.php";
		echo "    
                        </p>
                        <br>
                      ";
	}

        function kategori() {
		echo "
                        <h2>.: KATEGORI :.</h2>
                      
                      <p>
                          ";
		include_once "pages/subside.php";
		echo "    
                       </p>";
	}
	
	
	function formProtek() {
		if (!cekUser()) {
			$form = array ('HomeAdmin','Pengguna','olahpengguna','InputBidang','InputLokasi',
                                      'ListLokasi','ListBidang','InputBidang','ListPendidikan','InputPendidikan',
                                      'ListSttskerja','InputSttskerja','ListSttswp','InputSttswp','ListJenjang','InputJenjang',
                                      'ListDepartemen','InputDepartemen','ListInsentif','InputInsentif','InputIndex',
                                      'ListAkte','InputAkte','InputPenerimaAkte','ListResume','InputResume','InputPenerimaResume',
                                      'ListWarung','InputWarung','InputPenerimaWarung','ListTuslah','InputTuslah','InputPenerimaTuslah',
                                      'ListPegawai','InputPegawai','ListCariPegawai','ListIndexPegawai','EditIndexPegawai',
                                      'PrintPegawai','ListKeanggotaan','DetailKoperasi','DetailJamsostek','InputKeanggotaan',
                                      'InputPangkat','ListPotongan','InputDansos','InputPotongan','ListTindakan','ListTindakanDokter',
                                      'ListTindakanSpesialis','DetailTindakan','InputTindakan','InputTindakanDokter','InputTindakanSpesialis',
                                      'InputDiklat','ListTunjangan','DetailTunjanganHarian','DetailTunjanganBulanan','DetailPenerimaTunjanganBulanan',
                                      'DetailPenerimaTunjanganHarian','ListLampiran','InputJagaMalam','InputTidakHadir','InputTambahJaga',
                                      'InputSetJagaMalam','InputSetTambahJaga','InputSetTunjanganHadir','InputSetLemburHB','InputSetLemburHR',
                                     'InputJasaLain','InputArtikel','InputDataAdmin','InputTahun','ListArtikel','ListPresensi',
                                     'DetailPresensi','ListKS','InputJasLa','ListJasLa','InputPasien','ListRj','ListPinjam',
                                      'DetailPinjam','BayarPinjam','ListJam');
				foreach ($form as $page) {
					if ($_GET['act']==$page) {
						echo "<META HTTP-EQUIV = 'Refresh' Content = '0; URL = ?act=Home'>";
						exit;
						break;
					}
				}
			}

		if (!cekSessiKunjung()||!cekSessiDosen()||!cekSessiPegawai()||!cekSessiOperator()) {
			$form = array ('HomePelanggan','BasisAturan');
			    foreach ($form as $page) {
					if ($_GET['act']==$page) {
						echo "<META HTTP-EQUIV = 'Refresh' Content = '0; URL = ?act=HomeAdmin'>";
						exit;
						break;
					}
				}
			}
			
		
	}
	
	function actionPages() {
		formProtek();
		switch ($_REQUEST['act']) {
			case 'Kontak'		  	: include_once('pages/kontak.php'); break;
			case 'InputLokasi'              : include_once('pages/lokasi/inputlokasi.php'); break;
			case 'ListLokasi'               : include_once('pages/lokasi/listlokasi.php'); break;
                        case 'ListBidang'		: include_once('pages/bidang/listbidang.php'); break;
			case 'InputBidang'		: include_once('pages/bidang/inputbidang.php'); break;
                        case 'ListPendidikan'		: include_once('pages/pendidikan/listpendidikan.php'); break;
			case 'InputPendidikan'		: include_once('pages/pendidikan/inputpendidikan.php'); break;
                        case 'ListSttskerja'		: include_once('pages/statuskerja/liststatuskerja.php'); break;
			case 'InputSttskerja'		: include_once('pages/statuskerja/inputstatuskerja.php'); break;
                        case 'ListSttswp'		: include_once('pages/statuswp/liststatuswp.php'); break;
			case 'InputSttswp'		: include_once('pages/statuswp/inputstatuswp.php'); break;
                        case 'ListJenjang'		: include_once('pages/jenjang/listjenjang.php'); break;
			case 'InputJenjang'		: include_once('pages/jenjang/inputjenjang.php'); break;
			case 'ListDepartemen'		: include_once('pages/departemen/listdepartemen.php'); break;
			case 'InputDepartemen'		: include_once('pages/departemen/inputdepartemen.php'); break;
			case 'ListInsentif'		: include_once('pages/insentif/listinsentif.php'); break;
			case 'InputInsentif'		: include_once('pages/insentif/inputinsentif.php'); break;
                        case 'InputIndex'		: include_once('pages/insentif/inputindex.php'); break;
                        case 'ListAkte'         	: include_once('pages/akte/listakte.php'); break;
                        case 'InputAkte'		: include_once('pages/akte/inputakte.php'); break;
                        case 'InputPenerimaAkte'	: include_once('pages/akte/inputpenerimaakte.php'); break;

                        case 'ListResume'         	: include_once('pages/resume/listresume.php'); break;
                        case 'InputResume'		: include_once('pages/resume/inputresume.php'); break;
                        case 'InputPenerimaResume'	: include_once('pages/resume/inputpenerimaresume.php'); break;

                        case 'ListWarung'         	: include_once('pages/warung/listwarung.php'); break;
                        case 'InputWarung'		: include_once('pages/warung/inputwarung.php'); break;
                        case 'InputPenerimaWarung'	: include_once('pages/warung/inputpenerimawarung.php'); break;

                        case 'ListTuslah'         	: include_once('pages/tuslah/listtuslah.php'); break;
                        case 'InputTuslah'		: include_once('pages/tuslah/inputtuslah.php'); break;
                        case 'InputPenerimaTuslah'	: include_once('pages/tuslah/inputpenerimatuslah.php'); break;

                        case 'ListPegawai'		: include_once('pages/pegawai/listpegawai.php'); break;
                        case 'ListPeg'		        : include_once('pages/pegawai/listpeg.php'); break;
			case 'InputPegawai'		: include_once('pages/pegawai/inputpegawai.php'); break;
                        case 'ListCariPegawai'		: include_once('pages/pegawai/listcaripegawai.php'); break;
                        case 'ListIndexPegawai'		: include_once('pages/pegawai/listindexpegawai.php'); break;
                        case 'EditIndexPegawai'		: include_once('pages/pegawai/editindex.php'); break;
                        case 'PrintPegawai'		: include_once('pages/pegawai/laporanpegawai.php'); break;
                        case 'ListKeanggotaan'		: include_once('pages/keanggotaan/listkeanggotaan.php'); break;
                        case 'DetailKoperasi'		: include_once('pages/keanggotaan/detailkoperasi.php'); break;
                        case 'DetailJamsostek'		: include_once('pages/keanggotaan/detailjamsostek.php'); break;
                        case 'InputKeanggotaan'		: include_once('pages/keanggotaan/inputkeanggotaan.php'); break;
			case 'InputPangkat'		: include_once('pages/pangkat/inputpangkat.php'); break;
			case 'ListJam'		        : include_once('pages/jam/detailjam.php'); break;
                        
                        case 'ListPotongan'		: include_once('pages/potongan/listpotongan.php'); break;
                        case 'InputDansos'		: include_once('pages/potongan/inputdansos.php'); break;
			case 'InputPotongan'		: include_once('pages/potongan/inputpotongan.php'); break;
			case 'ListTindakan'		: include_once('pages/tindakan/listtindakan.php'); break;
                        case 'ListTindakanDokter'	: include_once('pages/tindakan/listtindakandokter.php'); break;
                        case 'ListTindakanSpesialis'	: include_once('pages/tindakan/listtindakanspesialis.php'); break;
                        case 'DetailTindakan'		: include_once('pages/tindakan/detailtindakan.php'); break;
			case 'InputTindakan'		: include_once('pages/tindakan/inputtindakan.php'); break;
                        case 'InputTindakanDokter'	: include_once('pages/tindakan/inputtindakandokter.php'); break;
                        case 'InputTindakanSpesialis'	: include_once('pages/tindakan/inputtindakanspesialis.php'); break;

                        case 'InputDiklat'		: include_once('pages/diklat/inputdiklat.php'); break;
                        case 'ListTunjangan'		: include_once('pages/tunjangan/listtunjangan.php'); break;
			case 'DetailTunjanganHarian'		: include_once('pages/tunjangan/detailtunjanganharian.php'); break;
			case 'DetailTunjanganBulanan'		: include_once('pages/tunjangan/detailtunjanganbulanan.php'); break;
			case 'DetailPenerimaTunjanganBulanan'	: include_once('pages/tunjangan/detailpenerimatunjanganbulanan.php'); break;
                        case 'DetailPenerimaTunjanganHarian'	: include_once('pages/tunjangan/detailpenerimatunjanganharian.php'); break;
                        case 'ListLampiran'	        : include_once('pages/lampiran/listlampiran.php'); break;
                        case 'InputJagaMalam'	        : include_once('pages/lampiran/detailmalam.php'); break;
                        case 'InputTidakHadir'	        : include_once('pages/lampiran/detailtidakhadir.php'); break;
                        case 'InputTambahJaga'	        : include_once('pages/lampiran/detailtambahjaga.php'); break;
                        case 'InputSetJagaMalam'	: include_once('pages/lampiran/detailsetjgmlm.php'); break;
			case 'InputSetTambahJaga'	: include_once('pages/lampiran/detailsettambahjaga.php'); break;
			case 'InputSetTunjanganHadir'	: include_once('pages/lampiran/detailsethadir.php'); break;
                        case 'InputSetLemburHB'	        : include_once('pages/lampiran/detailsetlemburhb.php'); break;
                        case 'InputSetLemburHR'	        : include_once('pages/lampiran/detailsetlemburhr.php'); break;
                        case 'InputJasaLain'	        : include_once('pages/lampiran/detailjasalain.php'); break;
                        case 'InputPasien'	        : include_once('pages/lampiran/detailpasien.php'); break;

                        case 'InputJasLa'	        : include_once('pages/jasalain/detailjasalain.php'); break;
                        case 'ListJasLa'	        : include_once('pages/jasalain/listjasalain.php'); break;

                        case 'ListPinjam'	        : include_once('pages/pinjam/listpinjam.php'); break;
                        case 'DetailPinjam'	        : include_once('pages/pinjam/detailpinjam.php'); break;
                        case 'BayarPinjam'	        : include_once('pages/pinjam/bayarpinjam.php'); break;
                        
                        case 'InputRj'                  : include_once('pages/rawat/inputrj.php'); break;
                        case 'ListRj'                   : include_once('pages/rawat/listrj.php'); break;
                        case 'DetailTindakanRj'         : include_once('pages/rawat/detailtindakanrj.php'); break;
						
                        case 'HomeAdmin'		: include_once('pages/admin.php'); break;
			case 'BukuTamu'			: include_once('pages/listtamu.php'); break; 
			
			case 'InputArtikel'		: include_once('pages/inputartikel.php'); break;
			case 'InputDataAdmin'		: include_once('pages/aturadmin.php'); break;			
			case 'InputTahun'		: include_once('pages/aturtahun.php'); break;
			case 'ListArtikel'		: include_once('pages/listartikel.php'); break;

                        case 'ListPresensi'                : include_once('pages/presensi/listpresensi.php'); break;
			case 'DetailPresensi'              : include_once('pages/presensi/detailpresensi.php'); break;
			case 'ListKS'		: include_once('pages/ks/detailks.php'); break;

                        case 'ListCetak'                 : include_once('pages/cetak/listcetak.php'); break;
			case 'DetailCetak'              : include_once('pages/cetak/detailcetak.php'); break;

                        case 'ListDepan'                 : include_once('pages/dosendepan/listdepan.php'); break;
			case 'PrevDepan'              : include_once('pages/dosendepan/prevdepan.php'); break;
                        case 'PrevDosen'              : include_once('../dosen/prevdepan.php'); break;

                        default			          : include_once('pages/home.php');
			
		}
	}
	
	
	 
 function menuLogin(){
 
 	echo "  <br>
                <h2>.: LOGIN ADMIN :.</h2>
              
              <p>
              
	     <form name=\"form\" action=\"login.php?act=login\"  method='post'  onSubmit=\"return validasiLogin();\">
		<table>
			<tr>
                            <td class=\"caption\">User</td>
                            <td><input class=\"teks_input\" type=\"text\"  size=\"16\" value=\"$_GET[usere]\" id=\"TxtUser\" name=\"usere\" title=\"Masukkan username kamu...\" onKeyDown=\"setDefault(this, document.getElementById('MsgUser'));\" />
				 <span id=\"MsgUser\" style=\"color:#CC0000; font-size:10px;\"></span>
			    </td>
                        </tr>
			<tr>
                            <td class=\"caption\">Password</td>
                            <td><input class=\"teks_input\" type=\"password\" size=\"16\"value=\"$_GET[passwordte]\" id=\"TxtPassword\" name=\"passwordte\" title=\"Masukkan password kamu...\" onKeyDown=\"setDefault(this, document.getElementById('MsgPassword'));\" />
				 <span id=\"MsgPassword\" style=\"color:#CC0000; font-size:10px;\"></span>
			    </td>
                        </tr>
			<tr>
                            <td></td>
                            <td><input class='register' name=\"BtnOk\" value='Log-in' type='submit' />&nbsp;
                                <input class='register' type='reset' name=\"BtnReset\" value='Reset'/>&nbsp;
                            </td>
                        </tr>
		</table>
	    </form>
            </p>
            <br>
            ";
 }	
?>