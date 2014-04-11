<?php
 include 'conf/conf.php';
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body bgcolor='#ffffff'>

    <?php
        $petugas = str_replace("_"," ",$_GET['petugas']); 
        reportsqlinjection();        
         
        $_sql = "select temp1, temp2, temp3, temp4, temp5, temp6, temp7, temp8, temp9, temp10, temp11, temp12, temp13, temp14 from temporary_bayar_ralan order by no asc";   
        $hasil=bukaquery($_sql);
        
        if(mysql_num_rows($hasil)!=0) { 
            //cari biling
            echo "   
            <table width='100%' bgcolor='#ffffff' align='left' border='0' padding='0' class='tbl_form'>
            <tr class='isi12' padding='0'>
            <td colspan='7' padding='0'>
                   <table width='100%' bgcolor='#ffffff' align='left' border='0' class='tbl_form' border=1>
                        <tr>
                            <td  width='20%'>
                                <img width='40' height='40' src='images/LOGO.png'/>
                            </td>
                            <td>
                            <center>
                                    <font color='333333' size='1'  face='Tahoma'>RUMAH SAKIT AMAL SEHAT WONOGIRI</font><br/>
                                    <font color='333333' size='1'  face='Tahoma'>
                                    Jl.Ngerjopuro-Slogohimo, Slogohimo, Wonogiri 57694<br/>
                                    Telp. : 0273-5316677, 5316688, SMS AMAL SEHAT : 08132952199
                                    </font> 
                            </center>
                            </td>
                            <td  width='20%'>
                              <center>&nbsp;
                              </center>
                            </td>
                        </tr>
                  </table>
            </td>
            </tr>
            <tr>
              <td colspan='7' padding='0'>
                <center><font color='333333' size='1'  face='Tahoma'>KWITANSI</font> </center>
              </td>
            </tr>
            ";  $z=1;
                while($inapdrpasien = mysql_fetch_array($hasil)) {
                   if($z<=6){
                      echo "<tr class='isi12' padding='0'>
                                <td padding='0' width='30%'><font color='000000' size='2'  face='Tahoma'>".str_replace("  ","&nbsp;&nbsp;",$inapdrpasien[0])."</td> 
                                <td padding='0' width='40%' colspan='6'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[1]</td>              
                             </tr>";  
                   }
                   $z++; 
                                  
                }  
                
                $_sql = "select temp2 from temporary_bayar_ralan where temp8='Dokter' group by temp2 order by no asc";   
                $hasil=bukaquery($_sql);
                echo "<tr class='isi12' padding='0'>
                       <td padding='0' width='30%'><font color='000000' size='2'  face='Tahoma'>Dokter</td> 
                       <td padding='0' width='40%' colspan='6'>:";
                       while($inapdrpasien = mysql_fetch_array($hasil)) {
			  echo "<font color='000000' size='2'  face='Tahoma'>&nbsp;$inapdrpasien[0]</font></br>";				                    
                       }
                  echo "</td>              
                      </tr>";   
                   
                $hasil2=bukaquery("select temp1,temp2,temp3,temp7 from temporary_bayar_ralan where temp8='Registrasi' group by temp2 order by no asc");
                while($inapdrpasien = mysql_fetch_array($hasil2)) {
                    echo "<tr class='isi12' padding='0'>
                       <td padding='0' width='30%'><font color='000000' size='2'  face='Tahoma'>Administrasi Rekam Medik</td> 
                       <td padding='0' width='55%' colspan='4'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[1]</font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='right'><font color='000000' size='3'  face='Tahoma'>$inapdrpasien[3]</font></td>              
                      </tr>"; 			                    
                } 
                
                $hasil3=bukaquery("select temp1,temp2,temp3,temp7 from temporary_bayar_ralan where temp8='Ralan Dokter' or temp8='Ralan Paramedis' group by temp2 order by no asc");
                echo "<tr class='isi12' padding='0'>
                       <td padding='0' width='30%' valign='top'><font color='000000' size='2'  face='Tahoma'>Tindakan</td> 
                       <td padding='0' width='40%' colspan='6'>
                       <table border='0' width='100%' padding='0'>
                             ";                      
                       while($inapdrpasien = mysql_fetch_array($hasil3)) {
                           if(!empty($inapdrpasien[3])){
                                echo "<tr class='isi12' padding='0'> 
                                         <td padding='0' width='80%'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[1]</font></td>   
                                         <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>   
                                         <td padding='0' width='19%' align='right'><font color='000000' size='3'  face='Tahoma'>$inapdrpasien[3]</font></td>              
                                     </tr>";                            
                           }
                       }
                   echo"</table>
                        </td>               
                      </tr>"; 
                   
                $hasil4=bukaquery("select temp1,temp2,temp3,temp7,temp8 from temporary_bayar_ralan where temp8='Obat' or temp8='TtlObat' group by temp2 order by no asc");
                $inapdrpasien = mysql_fetch_array($hasil4);
                if(!empty($inapdrpasien[1])){
                    echo "<tr class='isi12' padding='0'>
                            <td padding='0' width='30%' valign='top'><font color='000000' size='2'  face='Tahoma'>Obat & BHP</td> 
                            <td padding='0' width='40%' colspan='6'>
                            <table border='0' width='100%' padding='0'>";
                            while($inapdrpasien = mysql_fetch_array($hasil4)) {
                                if(!empty($inapdrpasien[3])){
                                     echo "<tr class='isi12' padding='0'> 
                                              <td padding='0' width='80%'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[1]</font></td>   
                                              <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>   
                                              <td padding='0' width='19%' align='right'><font color='000000' size='3'  face='Tahoma'>$inapdrpasien[3]</font></td>              
                                          </tr>";                            
                                }else if($inapdrpasien["temp8"]=="TtlObat"){
                                    echo "<tr class='isi12' padding='0'> 
                                              <td padding='0' width='80%'><font color='000000' size='2'  face='Tahoma'></font></td>   
                                              <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>   
                                              <td padding='0' width='19%' align='right'><font color='000000' size='3'  face='Tahoma'><b>".$inapdrpasien["temp2"]."<b></font></td>              
                                          </tr>";                                    
                                }
                            }
                        echo"</table>
                             </td>               
                           </tr>"; 
                } 
                
                $hasil5=bukaquery("select temp1,temp2,temp3,temp7 from temporary_bayar_ralan where temp8='Potongan' group by temp2 order by no asc");
                while($inapdrpasien = mysql_fetch_array($hasil5)) {
                    echo "<tr class='isi12' padding='0'>
                       <td padding='0' width='30%'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[0]</td> 
                       <td padding='0' width='55%' colspan='4'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[1]</font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='right'><font color='000000' size='3'  face='Tahoma'>$inapdrpasien[3]</font></td>              
                      </tr>"; 			                    
                } 
                
                $hasil6=bukaquery("select temp1,temp2,temp3,temp7 from temporary_bayar_ralan where temp8='Tambahan' group by temp2 order by no asc");
                while($inapdrpasien = mysql_fetch_array($hasil6)) {
                    echo "<tr class='isi12' padding='0'>
                       <td padding='0' width='30%'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[0]</td> 
                       <td padding='0' width='55%' colspan='4'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[1]</font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='right'><font color='000000' size='3'  face='Tahoma'>$inapdrpasien[3]</font></td>              
                      </tr>"; 			                    
                } 
                
                $hasil7=bukaquery("select temp1,temp2,temp3,temp7 from temporary_bayar_ralan where temp8='-' and temp7<>'' group by temp2 order by no asc");
                while($inapdrpasien = mysql_fetch_array($hasil7)) {
                    echo "<tr class='isi12' padding='0'>
                       <td padding='0' width='30%'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[0]</td> 
                       <td padding='0' width='55%' colspan='4'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[1]</font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='right'><font color='000000' size='3'  face='Tahoma'>$inapdrpasien[3]</font></td>              
                      </tr>"; 			                    
                } 
                
                $hasil8=bukaquery("select temp1,temp2,temp3,temp7 from temporary_bayar_ralan where temp1='TOTAL BAYAR' group by temp2 order by no asc");
                while($inapdrpasien = mysql_fetch_array($hasil8)) {
                    echo "<tr class='isi12' padding='0'>
                       <td padding='0' width='30%'><font color='000000' size='2'  face='Tahoma'>$inapdrpasien[0]</td> 
                       <td padding='0' width='55%' colspan='4'><font color='000000' size='2'  face='Tahoma'>".  Terbilang(str_replace(".","",$inapdrpasien[3]))." rupiah</font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='right'><font color='000000' size='4'  face='Tahoma'><b>$inapdrpasien[3]</b></font></td>              
                      </tr>"; 
                } 
                   
            echo "<tr class='isi12' padding='0'>
                       <td padding='0' width='30%' align=center><font color='000000' size='2'  face='Tahoma'>&nbsp;</td> 
                       <td padding='0' width='55%' colspan='4' align='center'><font color='000000' size='2'  face='Tahoma'>&nbsp;</font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='center'><font color='000000' size='2'  face='Tahoma'>Martapura, ".date('d-m-Y')."</font></td>              
                      </tr>  
                      <tr class='isi12' padding='0'>
                       <td padding='0' width='30%' align=center><font color='000000' size='2'  face='Tahoma'>Petugas</td> 
                       <td padding='0' width='55%' colspan='4' align='center'><font color='000000' size='2'  face='Tahoma'>&nbsp;</font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='center'><font color='000000' size='2'  face='Tahoma'>Penanggung Jawab Pasien</font></td>              
                      </tr>  
                      <tr class='isi12' padding='0'>
                       <td padding='0' width='30%'><font color='000000' size='2'  face='Tahoma'>&nbsp;</td> 
                       <td padding='0' width='55%' colspan='4'><font color='000000' size='2'  face='Tahoma'></font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='right'><font color='000000' size='2'  face='Tahoma'></font></td>              
                      </tr> 
                      <tr class='isi12' padding='0'>
                       <td padding='0' width='30%'><font color='000000' size='2'  face='Tahoma'>&nbsp;</td> 
                       <td padding='0' width='55%' colspan='4'><font color='000000' size='2'  face='Tahoma'></font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='right'><font color='000000' size='2'  face='Tahoma'></font></td>              
                      </tr> 
                      <tr class='isi12' padding='0'>
                       <td padding='0' width='30%' align=center><font color='000000' size='2'  face='Tahoma'>( ".
                          getOne("select nama from petugas where nip='$petugas'")." )</td> 
                       <td padding='0' width='55%' colspan='4' align='center'><font color='000000' size='2'  face='Tahoma'></font></td>   
                       <td padding='0' width='1%'><font color='000000' size='2'  face='Tahoma'></font></td>     
                       <td padding='0' width='14%' align='center'><font color='000000' size='2'  face='Tahoma'>(.............)</font></td>              
                      </tr>                      
                </table>"; 
        } else {echo "<font color='333333' size='2'  face='Times New Roman'><b>Data  Billing masih kosong !</b>";}

    ?>  

    </body>
</html>
