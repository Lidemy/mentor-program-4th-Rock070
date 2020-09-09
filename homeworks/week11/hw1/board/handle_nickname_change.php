<?php
    require_once('conn.php');
    require_once('utils.php');
    //1. php 內建 session 機制
    session_start();

    if(!empty($_SESSION['username'])){
        $user = getUserFromUsername($_SESSION['username']);
    }
    
    

    
    if(empty($_POST['change_nickname'])) {
        header('Location: ./home.php?errMsg=3');
    } else {

        $change_nickname = $_POST['change_nickname'];

        $sql = "UPDATE rock070_users SET nickname =? WHERE username=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $change_nickname, $user['username']);
        $result = $stmt->execute();
    
        if(!$result) {
            die($conn->error);
        }
        
        header('Location: ./home.php');
    }




?>