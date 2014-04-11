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
    <h1 class="title">::[ Detail Tunjangan Bulanan Diterima ]::</h1>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
				$id                 =$_GET['id'];
                $id_tnj             =$_GET['id_tnj'];
                echo "<input type=hidden name=id  value=$id><input type=hidden name=action value=$action>";
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
                          <a href=?act=DetailPenerimaTunjanganBulanan&action=TAMBAH&id=$prev><<--</a>
                          <a href=?act=ListTunjangan>| List Penerima |</a>
                          <a href=?act=DetailPenerimaTunjanganBulanan&action=TAMBAH&id=$next>-->></a>
                          </div>";
            ?>
            <table width="100%" align="center">
				<tr class="head">
                    <td width="31%" >NIK</td><td width="">:</td>
                    <td width="67%"><?php echo $baris[0];?></td>
                </tr>
				<tr class="head">
                    <td width="31%">Nama</td><td width="">:</td>
                    <td width="67%"><?php echo $baris[1];?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Nama Tunjangan</td><td width="">:</td>
                    <td width="67%">
                        <select name="id_tnj" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php
                                $_sql = "SELECT id,nama,tnj FROM master_tunjangan_bulanan ORDER BY nama";
                                $hasil=bukaquery($_sql);
                                while($baris = mysql_fetch_array($hasil)) {
                                    echo "<option id='TxtIsi1' value='$baris[0]'>$baris[1]  ".formatDuit($baris[2])."</option>";
                                }
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
				    $id                 =trim($_POST['id']);
                    $id_tnj             =trim($_POST['id_tnj']);
                    if ((!empty($id))&&(!empty($id_tnj))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" pnm_tnj_bulanan ","'$id','$id_tnj'", " Detail tunjangan bulanan diterima " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=DetailPenerimaTunjanganBulanan&action=TAMBAH&id=$id'>";
                                break;
                        }
                    }else if ((empty($id))||(empty($id_tnj))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 300px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "SELECT pnm_tnj_bulanan.id,
				         pnm_tnj_bulanan.id_tnj,
				         master_tunjangan_bulanan.nama,
						 master_tunjangan_bulanan.tnj 
						 from master_tunjangan_bulanan inner join pnm_tnj_bulanan
						 where pnm_tnj_bulanan.id_tnj=master_tunjangan_bulanan.id
						 and pnm_tnj_bulanan.id='$id'
						 ORDER BY master_tunjangan_bulanan.nama ASC ";
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
                                    <center>";?>
                                    <a href="?act=DetailPenerimaTunjanganBulanan&action=HAPUS&id=<?php print $baris[0] ?>&id_tnj=<?php print $baris[1]; ?>" onClick="if (!confirm('Anda yakin menghapus <?php print $baris[2]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$baris[2]</td>
                                <td>".formatDuit($baris[3])."</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data detail tunjangan bulanan yang diterima masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" pnm_tnj_bulanan "," id ='".$id."' and id_tnj='".$id_tnj."'  ","?act=DetailPenerimaTunjanganBulanan&action=TAMBAH&id=".$id);
            }

        if(mysql_num_rows($hasil)!=0) {
                $hasil1=bukaquery("SELECT pnm_tnj_bulanan.id,pnm_tnj_bulanan.id_tnj,
				         master_tunjangan_bulanan.nama,master_tunjangan_bulanan.tnj 
						 from master_tunjangan_bulanan inner join pnm_tnj_bulanan
						 where pnm_tnj_bulanan.id_tnj=master_tunjangan_bulanan.id
						 and pnm_tnj_bulanan.id='$id'
						 ORDER BY master_tunjangan_bulanan.nama ASC  ");
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