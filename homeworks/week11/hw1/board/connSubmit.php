<?php 
    $servername = 'localhost';
    $username = 'mtr04group5';
    $password = 'Lidemymtr04group5'; 
    $dbname = 'mtr04group5';
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        echo '資料庫連結錯誤: ' . $conn->connect_error;
    }

    $conn->query("SET NAMES 'utf8'");
    $conn->query("SET time_zone = '+8:00'");
    
?>