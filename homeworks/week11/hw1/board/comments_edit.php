<?php
    require_once('conn.php');
    require_once('utils.php');

    session_start();

    $usernickname = NULL;
    $username = Null;

    if(!empty($_GET['errMsg'])) {
        if($_GET['errMsg'] === '1') {
        echo "<script> alert('請輸入留言。')</script>";
        }
        elseif($_GET['errMsg'] === '3') {
            echo "<script> alert('請輸入要更換的暱稱。')</script>";
        }
    }
    // 確認是否有登入狀態
    // 1. php 內建 session

    if(!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user = getUserFromUsername($username);
        $usernickname = $user['nickname'];
    }

    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    }

    
    // 2. 手動 session (cookie) 
    // if(!empty($_COOKIE['token'])){
    //     $user = getLoginUserInfos($_COOKIE['token']);
    //     $usernickname =  $user['nickname'];
    // }

    // 取得 TABLE:board 留言
  

    $stmt = $conn->prepare(
        "SELECT * from rock070_comments WHERE id=? AND username = ?"
    );

    // print_r($stmt);

    $stmt->bind_param('ss', $id, $username);
    $result = $stmt->execute();

    if(!$result) {
       die('error:' . $conn->error);
    }
    


    $result = $stmt->get_result();

    if($result->num_rows < 1) {
        header('Location: ./home.php');
    }
    $row = $result->fetch_assoc();




?>

<html>
<head>
    <title>Rock070留言板</title>
    <link rel="stylesheet" href="./style.css">
    <meta charset='utf-8'>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const textarea =  document.querySelector('.board form textarea');
            // console.log(textarea);
            textarea.value = '<?= $row['content'];?>';
        })
        
    </script>
   

</head>
<body>
    
    <header>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼。</header>
    <main class='board'>

            <a href="./handle_logout.php"><button class='btn'>登出</button></a>
            <a href='./home.php'><button class="change-nickname-return-btn btn">返回</button></a>
            <h2>你好 <?php echo htmlspecialchars($usernickname)?></h2>
        <h2>Comment</h2>
        <form action="./handle_comment_edit.php?id=<?= $row['id']?>" method='POST'>
            <textarea name="content" id="" cols="50" rows="10"></textarea>
            <?php if($usernickname) {?>
                <input type="submit" class='btn-submit' value='提交'>
            <?php } else {?>
                <h2>請登入以開啟留言功能。</h2>
            <?php }?>
        </form>
        <hr>
    </main>
</body>
</html>