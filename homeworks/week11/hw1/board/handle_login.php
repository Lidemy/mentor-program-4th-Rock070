<?php
    require_once('conn.php');
    require_once('utils.php');
    

    if(empty($_POST['username']) || empty($_POST['password'])) {
        header('Location: ./login.php?errMsg=2');
        exit();
    }

        $username = $_POST['username'];
        $password = $_POST['password'];
        // echo $password, $username;

        $sql = "SELECT * from rock070_users WHERE username = ?";
        

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $result = $stmt->execute();

        if (!$result) {
            die($conn->error);
            header('Location: ./login.php?errMsg=3');
            exit();
        }
        $result = $stmt->get_result();
        
        $row = $result->fetch_assoc();
        
        $password_hash = $row['password'];
        $is_password = password_verify($password, $password_hash);

        if($is_password) {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: ./home.php');
        } else {
            header('Location: ./login.php?errMsg=3');
        }
        //1. php 內建 session

        

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
        

        
        
        
    
    

    


?>