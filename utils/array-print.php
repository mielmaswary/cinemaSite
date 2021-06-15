<?php
     function arrPrint($arr){
        echo "[";
        echo "<br/>";
        foreach($arr as $key=>$value){
               echo "&nbsp&nbsp $key: $value";
               echo "<br/>"; 
        }
        echo "]";
    }
?>