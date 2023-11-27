<?php
 
    $db_host = 'localhost';
 
    $db_user = 'root';
 
    $db_pass = '';
 
    $db_name = 'db_soal';
 
    $dbh = mysql_connect($db_host, $db_user, $db_pass);
 
    if ($dbh) {
 
        mysql_select_db($db_name);
 
    }else{
 
        echo "database tidak tersedia";
 
    }
 
?>