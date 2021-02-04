<?php
    $host='localhost';
    $user='root';
    $pass='';
    $database='';
    
    $connect = mysqli_connect($host, $user, $pass);
    
    mysqli_select_db($connect, $database);
    if (!$connect){
        echo "failed";
    }

?>