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



    




    if(empty($_POST['content'])) {
        header('Location: ./comments_edit.php?errMsg=1');
    } else {

        $content = htmlspecialchars($_POST['content']);

        $sql = "UPDATE rock070_comments SET content =? WHERE id=? AND username = ? ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $content, $id, $username);
        $result = $stmt->execute();
    
        if(!$result) {
            die($conn->error);
        }
        
        header('Location: ./home.php');
    }




?>