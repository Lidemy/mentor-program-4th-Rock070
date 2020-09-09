<?php
    require_once('conn.php');
    require_once('utils.php');
    //1. php 內建 session 機制
    session_start();

    if(!empty($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    
    
        if(!empty($_GET['id'])) { 
            $id = $_GET['id'];
        }

        $sql = "UPDATE rock070_comments  SET is_deleted=1 WHERE id = ? AND username = ?" ;

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $id, $username);
        $result = $stmt->execute();
    
        if(!$result) {
            die($conn->error);
        }
        
        header('Location: ./home.php');
    




?>