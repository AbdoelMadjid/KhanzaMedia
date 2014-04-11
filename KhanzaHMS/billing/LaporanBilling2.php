<?php
 include 'conf/conf.php';
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body bgcolor='#ffffff'>

    <?php
        reportsqlinjection();        
         
        $_sql = "select temp1, temp2, temp3, temp4, temp5, temp6, temp7, temp8, temp9, temp10, temp11, temp12, temp13, temp14 from temporary_bayar_ranap order by no asc";   
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
               <hr/>
                <center><font color='333333' size='1'  face='Sans Serif'>NOTA PEMBAYARAN</font> </center>
              </td>
            </tr>
            ";  $z=1;
                while($inapdrpasien = mysql_fetch_array($hasil)) {
                   if($z<=7){
                      echo "<tr class='isi12' padding='0'>
                                <td padding='0' width='18%'><font color='111111' size='2'  face='Sans Serif'>".str_replace("  ","&nbsp;&nbsp;",$inapdrpasien[0])."</td> 
                                <td padding='0' width='40%' colspan='6'><font color='111111' size='3'  face='Sans Serif'>$inapdrpasien[1]</td>              
                             </tr>";  
                   }else if($z>7){
					 if(empty($inapdrpasien[6])&&empty($inapdrpasien[0])){
						 echo "<tr class='isi12' padding='0'>
                                <td padding='0' width='18%'><font color='111111' size='2'  face='Sans Serif'>".str_replace("   ","&nbsp;&nbsp;",$inapdrpasien[0])."</td> 
                                <td padding='0' width='40%' colspan='6' align='right'><font color='111111' size='3'  face='Sans Serif'>$inapdrpasien[1]</td>                
                             </tr>";  
					 }else{
						 echo "<tr class='isi12' padding='0'>
                                <td padding='0' width='18%'><font color='111111' size='2'  face='Sans Serif'>".str_replace("   ","&nbsp;&nbsp;",$inapdrpasien[0])."</td> 
                                <td padding='0' width='40%'><font color='111111' size='2'  face='Sans Serif'>$inapdrpasien[1]</td> 
                                <td padding='0' width='2%'><font color='111111' size='2'  face='Sans Serif'>$inapdrpasien[2]</td>  
                                <td padding='0' width='10%' align='right'><font color='111111' size='2'  face='Sans Serif'>$inapdrpasien[3]</td>  
                                <td padding='0' width='5%' align='right'><font color='111111' size='2'  face='Sans Serif'>$inapdrpasien[4]</td>  
                                <td padding='0' width='10%' align='right'><font color='111111' size='2'  face='Sans Serif'>$inapdrpasien[5]</td>   
                                <td padding='0' width='15%' align='right'><font color='111111' size='3'  face='Sans Serif'>$inapdrpasien[6]</td>                
                              </tr>";  
					 }                     
                   }
                  $z++; 
                                  
                }            
            
            echo "  
                </table>"; 
        } else {echo "<font color='333333' size='3'  face='Times New Roman'><b>Data  Billing masih kosong !</b>";}

    ?>  

    </body>
</html>
