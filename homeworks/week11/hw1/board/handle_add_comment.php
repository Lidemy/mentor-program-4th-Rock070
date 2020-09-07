<?php
    require_once('conn.php');
    require_once('utils.php');
    //1. php 內建 session 機制
    session_start();

    if(!empty($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    
    // 2. 手做 session (cookie)
    // if(!empty($_COOKIE['token'])){
    //     $user = getLoginUserInfos($_COOKIE['token']);

    // }

    
    if(empty($_POST['content'])) {
        header('Location: ./home.php?errMsg=1');
    } else {
        // $content = htmlspecialchars($_POST['content']);
        $content = $_POST['content'];

        $sql = "INSERT INTO rock070_comments(username, content) VALUES(?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $content);
        $result = $stmt->execute();
    
        if(!$result) {
            die($conn->error);
        }
        
        header('Location: ./home.php');
    }




?>