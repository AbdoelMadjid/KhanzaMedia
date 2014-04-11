<?php
 include 'conf/conf.php';
?>
<html>
    <isi>
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </isi>
    <body>

    <?php
    reportsqlinjection();      
        $nonota    =str_replace("_"," ",$_GET['nonota']); 
        $tanggal   =$_GET['tanggal']; 
        $catatan = str_replace("_"," ",$_GET['catatan']); 
        $petugas = str_replace("_"," ",$_GET['petugas']); 
        $norm = str_replace("_"," ",$_GET['norm']);
        $pasien = str_replace("_"," ",$_GET['pasien']); 

        $_sql = "SELECT no,temp1, temp2, temp3, temp4, temp5, temp6, temp7, temp8, temp9 from temporary order by no asc";            
        $hasil=bukaquery($_sql);
        
        if(mysql_num_rows($hasil)!=0) { 
          echo "<table width='100%'  border='0' align='left' cellpadding='0' cellspacing='0' class='tbl_form'>
                 <tr class='isi14'>
                       <td width=50% colspan=4 align=left>
                           <table width='100%' bgcolor='#ffffff' padding='0' align='left' border='0' class='tbl_form'>
								<tr>
									<td padding='0'>
										<img width='50' height='50' src='images/LOGO.png'/>
									</td>
									<td>
									<center>
											<font color='000000' size='2'  face='Cambria'>RUMAH SAKIT AMAL SEHAT WONOGIRI</font> <br/>
											<font color='000000' size='2'  face='Cambria'>
											Jl.Ngerjopuro-Slogohimo, Slogohimo, Wonogiri 57694<br/>
											Telp. : 0273-5316677, 5316688, SMS AMAL SEHAT : 08132952199<br/>
											Email : amal_sehat@telkom.net
											</font> 
									</center>
									</td>
								</tr>
						   </table>
                       </td>
                 </tr>
                 <tr>
					 <td colspan='6'><hr/>
						 <table width=100%>
							 <tr class='isi14'>
								<td width='25%'>
								   <font color='000000' size='2' face='Cambria'>No.RM</font>
								</td>
                                                                <td width='25%'>
								   <font color='000000' size='2' face='Cambria'>: $norm</font>
								</td>
                                                                <td width='25%'>
								   <font color='000000' size='2' face='Cambria'>No.Nota</font>
								</td>
                                                                <td width='25%'>
								   <font color='000000' size='2' face='Cambria'>: $nonota</font>
								</td>                                                                
							 </tr> 
                                                         <tr class='isi14'>
								<td width='25%'>
								   <font color='000000' size='2' face='Cambria'>Nama Pasien</font>
								</td>
                                                                <td width='25%'>
								   <font color='000000' size='2' face='Cambria'>: $pasien</font>
								</td>
                                                                <td width='25%'>
								   <font color='000000' size='2' face='Cambria'>Tanggal</font>
								</td>
                                                                <td width='25%'>
								   <font color='000000' size='2' face='Cambria'>: $tanggal</font>
								</td>                                                                
							 </tr> 
                                                         <tr class='isi14'>
								<td width='25%'>
								   <font color='000000' size='2' face='Cambria'>Alamat Pasien</font>
								</td>
                                                                <td width='25%'>
								   <font color='000000' size='2' face='Cambria'>: ".getOne(
                                                                           "select alamat from pasien where no_rkm_medis='$norm'")."</font>
								</td>
                                                                <td width='25%'>
								   <font color='000000' size='2' face='Cambria'>Petugas</font>
								</td>
                                                                <td width='25%'>
								   <font color='000000' size='2' face='Cambria'>: $petugas</font>
								</td>                                                                
							 </tr> 
                                                         
                                                         <tr class='isi14'>
								<td width='25%'>
								   <font color='000000' size='2' face='Cambria'>Catatan</font>
								</td>
                                                                <td width='25%' colspan='3'>
								   <font color='000000' size='2' face='Cambria'>: $catatan</font>
								</td>                                                              
							 </tr> 
						 </table>
					 </td>
                 </tr>
                 <tr class='isi14'>
                       <td colspan=4 height='100%' valign=top>
                            <table width=100% cellpadding='0' cellspacing='0'>
                               <tr class=isi15>
                                   <td width='5%' align=center><font color='000000' size='2'  face='Cambria'>No</font></td>
                                   <td width='20%' align=center><font color='000000' size='2'  face='Cambria'>Jml</font></td>
                                   <td width='55%' align=center><font color='000000' size='2'  face='Cambria'>Nama Barang</font></td>
                                   <td width='20%' align=center><font color='000000' size='2'  face='Cambria'>Total</font></td>
                               </tr>";
                                      $ttlpesan=0;
                                      $i=1;
                                      while($barispesan = mysql_fetch_array($hasil)) { 
                                          $ttlpesan=$ttlpesan+$barispesan[9];
                                          echo "
                                            <tr class='isi15'>
                                                <td><font color='000000' size='2'  face='Cambria'>$i</font></td>
                                                <td><font color='000000' size='2'  face='Cambria'>$barispesan[1] $barispesan[5]</font></td>
                                                <td><font color='000000' size='2'  face='Cambria'>$barispesan[3] </font></td>
                                                <td align=right><font color='000000' size='2'  face='Cambria'>".formatDuit2($barispesan[9])."</font></td>
                                           </tr>";$i++;
                                      }    
                             echo " <tr class='isi14'>
                                      <td colspan=2></td>
                                      <td align='right'><font color='000000' size='2'  face='Cambria'>Jumlah</font></td>
                                      <td align='right'><font color='000000' size='2'  face='Cambria'>".formatDuit2($ttlpesan)."</font></td>
                                    </tr>     
                          </table>
                      </td>
                    </tr>
                 </table>";
            
        } else {echo "<b>Data pesan masih kosong !</b>";}
    ?>

    </body>
</html>
