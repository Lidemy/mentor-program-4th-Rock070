<?php
    require_once('conn.php');



    if(!empty($_GET['errMsg'])) {
        if($_GET['errMsg'] === '2') {
        echo "<script> alert('資料不齊全。')</script>";
        }
        if($_GET['errMsg'] === '3') {
            echo "<script> alert('帳號或密碼輸入錯誤。')</script>";
            }
    }
    // 取得 TABLE:rock070_comments 留言
    $sql = "SELECT * from rock070_comments";
    $result = $conn->query($sql);

    if(!$result) {
        echo $conn->error;
    }


?>

<html>
<head>
    <title>Rock070留言板-登入</title>
    <link rel="stylesheet" href="./style.css">
    <meta charset='utf-8'>
</head>
<body>
    
    <header>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼。</header>
    <main class='board'>
        <a href="./home.php"><button class='btn'>回留言板</button></a>
        <a href="./register.php"><button class='btn'>註冊</button></a>
        <h2>登入</h2>
        <form action="./handle_login.php" method='POST'>
            <label for="username">帳號： 
                <input type="text" name='username' id='username'>
            </label>

            <label for="password">密碼： 
                <input type="password" name='password' id='password'>
            </label>

            <input type="submit" class='btn-submit' value='提交'>
        </form>
        
    
    </main>
</body>
</html>