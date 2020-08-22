<?php
    require_once('conn.php');
    require_once('utils.php');
    //1. php 內建 session 機制
    session_start();

    if(!empty($_SESSION['username'])){
        $user = getUserFromUsername($_SESSION['username']);
    }
    
    // 2. 手做 session (cookie)
    // if(!empty($_COOKIE['token'])){
    //     $user = getLoginUserInfos($_COOKIE['token']);

    // }

    if(empty($_POST['content'])) {
        header('Location: ./home.php?errMsg=1');
    } else {
        $content = htmlspecialchars($_POST['content']);

        $sql = sprintf(
            "INSERT INTO board(nickname, username, content) VALUES('%s', '%s', '%s')",
            $user['nickname'], $user['username'], $content
        );
        
        $result = $conn->query($sql);
    
        if(!$result) {
            die($conn->error);
        }
        
        header('Location: ./home.php');
    }




?>