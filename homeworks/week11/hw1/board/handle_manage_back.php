<?php
    require_once('conn.php');
    require_once('utils.php');
    //1. php 內建 session 機制
    session_start();

    if(!empty($_SESSION['username'])){
        $user = getUserFromUsername($_SESSION['username']);
    }
    // 取得使用者的數量
    $sql = "SELECT * FROM rock070_users ORDER BY identity ";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();

    if(!$result) {
       die('error:' . $conn->error);
    }
   
    $result = $stmt->get_result();
        // while($row = $result->fetch_assoc()){
        //     print_r($row);
        // }

    $num = $result->num_rows;

    // echo $_POST['options-1'];
    // 拿到回傳值

    for($i = 1; $i <= $num; $i++){
        $identity = $_POST['options-'.$i];
        $id = $_POST['id-'.$i];

        $sql = "UPDATE rock070_users SET identity =? WHERE id=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $identity, $id);
        $result = $stmt->execute();
    
        if(!$result) {
            die($conn->error);
        }
            
            header('Location: ./manage_back.php?Msg=1');
        // }
        
    }


    // 做 UPDATE rock070_users 裡面的 Identity
    // 回 manage_back 做分頁功能 

    // var_dump($_POST);
    // echo htmlentities($_POST['options'], ENT_QUOTES, "UTF-8");

 




?>