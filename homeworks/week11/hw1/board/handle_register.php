<?php
    require_once('conn.php');

    if(empty($_POST['nickname']) || empty($_POST['username']) || empty($_POST['password'])) {
        header('Location: ./register.php?errMsg=2');
    } else {
        $nickname = htmlspecialchars($_POST['nickname']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $sql = sprintf(
            "INSERT INTO rock070_users(nickname, username, password) VALUES('%s', '%s', '%s')",
            $nickname, $username, $password
        );
        
        $result = $conn->query($sql);

        if(!$result) {
            if($conn->errno === 1062) {
                header('Location: ./register.php?errMsg=3');
            }
            die($conn->error);
        }
        header('Location: ./home.php');
    }
    
    
    


?>