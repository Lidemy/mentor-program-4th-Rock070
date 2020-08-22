<?php
    require_once('conn.php');
    require_once('utils.php');

    if(empty($_POST['username']) || empty($_POST['password'])) {
        header('Location: ./login.php?errMsg=2');
    } else {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $sql = sprintf(
            "SELECT * from users WHERE username = '%s' AND password = '%s'",
            $username, $password
        );
        
        $result = $conn->query($sql);

        if(!$result) {
          header('Location: ./login.php?errMsg=3');
          die($conn->error);
        } 
        //1. php 內建 session

        session_start();
        $_SESSION['username'] = $username;

        // 2. 手動 session(cookie)
        // $token = getToken();
        // setcookie('token', $token, time() + 3600 * 24 * 30);
        

        // $sql = sprintf(
        //     "INSERT INTO tokens(token, username) VALUES('%s', '%s')",
        //     $token, $username
        // );
        // $result = $conn->query($sql);

        // if(!$result) {
        //     die($conn->error);
        // }
        
        header('Location: ./home.php');

        
        
        
    
    }

    


?>