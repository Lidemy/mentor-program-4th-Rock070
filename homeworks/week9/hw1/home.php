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
    }
    // 確認是否有登入狀態
    // 1. php 內建 session

    if(!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user = getUserFromUsername($username);
        $usernickname = $user['nickname'];
    }

    
    // 2. 手動 session (cookie) 
    // if(!empty($_COOKIE['token'])){
    //     $user = getLoginUserInfos($_COOKIE['token']);
    //     $usernickname =  $user['nickname'];
    // }

    // 取得 TABLE:board 留言
    $sql = "SELECT * from board ORDER BY id DESC";
    $result = $conn->query($sql);

    if(!$result) {
        echo $conn->error;
    }

?>

<html>
<head>
    <title>Rock070留言板</title>
    <link rel="stylesheet" href="./style.css">
    <meta charset='utf-8'>
</head>
<body>
    
    <header>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼。</header>
    <main class='board'>
        <?php if($usernickname) {?>
            <a href="./handle_logout.php"><button class='btn'>登出</button></a>
            <h2>你好 <?php echo $usernickname?></h2>
        <?php } else {?>
            <a href="./register.php"><button class='btn'>註冊</button></a>
            <a href="./login.php"><button class='btn'>登入</button></a>
        <?php }?>
        <h2>Comment</h2>
        <form action="./handle_add_comment.php" method='POST'>
            <textarea name="content" id="" cols="30" rows="10" placeholder='請輸入留言'></textarea>
            <?php if($usernickname) {?>
                <input type="submit" class='btn-submit' value='提交'>
            <?php } else {?>
                <h2>請登入以開啟留言功能。</h2>
            <?php }?>
        </form>
        <hr>
        <div class="board-list">
            <?php 
                while($row = $result->fetch_assoc()){
                 ?>
                    <div class="board-card">
                        <div class="board-card-avatar"></div>
                        <div class="board-card-infos">
                            <div class="board-card-name"><? echo $row['nickname'] ?></div>
                            <span class='board-card-time'><? echo $row['create_at'] ?></span>
                            <div class="board-card-content"><? echo $row['content'] ?></div>
                        </div>
                    </div>
            <?php 
                };
            ?>
        </div>
    </main>
</body>
</html>