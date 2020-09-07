<?php
    session_start();
    require_once('conn.php');

    if(empty($_POST['nickname']) || empty($_POST['username']) || empty($_POST['password'])) {
        header('Location: ./register.php?errMsg=2');
    } else {
        $identity = 'sys_user';
        $nickname = $_POST['nickname'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO rock070_users(identity, nickname, username, password) VALUES(?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $identity, $nickname, $username, $password);
        $result = $stmt->execute();

        // if(!$result) {
        //     die($conn->error);
        // }
        
        // $result = $stmt->get_result();

        if(!$result) {
            // $code = 
            if ($conn->errno === 1062) {
                header('Location: ./register.php?errMsg=3');
            }
            die($conn->error);
        }
        

        

        $_SESSION['username'] = $username;
        header('Location: ./home.php');
    }
    
    
    


?>