<?php
    require_once('conn.php');
    require_once('utils.php');
    
    // 1. php 內建 session
    session_start();
    session_destroy();
    header('Location: ./home.php');
    
    
    // 2. 手動刪除 session (cookie)
    // $token = $_COOKIE['token'];
    // $sql = sprintf(
    //     "DELETE from tokens WHERE token = '%s'",
    //     $token
    // );
    // $result = $conn->query($sql);

    // if(!$result) {
    //     die($conn->error);
    // } else {
    //     setcookie('token', "", time() - 3600 );
    //     header('Location: ./home.php');
    // }


?>