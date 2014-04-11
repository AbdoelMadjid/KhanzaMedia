<?php
    $x=bukaquery("select * from artikel where page='home' order by post");
    while ($row=mysql_fetch_row($x)){
    echo "<div class=\"t\">
        <div class=\"b\">
        <div class=\"l\">
        <div class=\"r\">
        <div class=\"bl\">
        <div class=\"br\">
        <div class=\"tl\">
        <div class=\"tr\">
        <div class=\"y\">
                <h1>$row[1]</h1>
                
                <div class=\"entry\">
                    <img src=\"$row[6]\" alt=\"\" class=\"productPic\"/>
                    <p>$row[2]</p>
                </div>
        
                <div id=\"post\">
                    <p>Diposkan pada $row[3], oleh $row[4]</p>
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
        <br /> ";
    }
?>
