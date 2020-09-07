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
        $identity = $user['identity'];
    }

    // echo $identity;
    

    
    // 2. 手動 session (cookie) 
    // if(!empty($_COOKIE['token'])){
    //     $user = getLoginUserInfos($_COOKIE['token']);
    //     $usernickname =  $user['nickname'];
    // }

    // 取得 TABLE:board 留言
    
    if(!empty($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1; 
    }

    $item_per_page = 10 ; 
    $offset = ($page-1) * $item_per_page;
    
    
    $stmt = $conn->prepare(
        "SELECT ".
            "C.id as id, ".
            "U.username as username, ".
            "U.nickname as nickname, ". 
            "C.create_at as create_at, ".
            "C.content as content ".
        "FROM rock070_comments as C ".
        "LEFT JOIN rock070_users as U ". 
        "ON C.username = U.username ".
        "WHERE C.is_deleted IS NULL ".
        "ORDER BY C.id DESC ".
        "limit ? offset ?"
    );

    $stmt->bind_param('ss', $item_per_page, $offset);
    $result = $stmt->execute();

    if(!$result) {
       die('error:' . $conn->error);
    }
   
    
    $result = $stmt->get_result();


?>

<html>
<head>
    <title>Rock070留言板</title>
    <link rel="stylesheet" href="./style.css">
    <meta charset='utf-8'>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const changeNicknameBtn = document.querySelector('button.change-nickname-btn');
            const formChangeNickname = document.querySelector('.form-change-nickname');
            const changeNicknameReturnBtn = document.querySelector('.change-nickname-return-btn');
            
            changeNicknameBtn.addEventListener('click', function(){
                formChangeNickname.classList.toggle('hidden');
                // formChangeNickname.classList.toggle('inline-block');
                changeNicknameBtn.classList.toggle('hidden');

            })

            changeNicknameReturnBtn.addEventListener('click', function(){
                formChangeNickname.classList.toggle('hidden');
                // formChangeNickname.classList.toggle('inline-block');
                changeNicknameBtn.classList.toggle('hidden');
            })
        })
    </script>


</head>
<body>
    
    <header>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼。</header>
    <main class='board'>
        <?php if($usernickname) {?>
            <a href="./handle_logout.php"><button class='btn'>登出</button></a>
            <button class="change-nickname-btn btn">更換暱稱</button>
            <span class='hidden form-change-nickname'>
                <form  action="./handle_nickname_change.php" method='POST'>
                    <label for="change_nickname">暱稱： 
                        <input type="text" name='change_nickname' id='change_nickname'>
                    </label>
                    <input type="submit" class='btn-submit' value='提交'>
                </form>
                <button class="change-nickname-return-btn btn">返回</button>
        </span>
            <h2>你好 <?php echo htmlspecialchars($usernickname)?></h2>
           
        <?php } else {?>
            <a href="./register.php"><button class='btn'>註冊</button></a>
            <a href="./login.php"><button class='btn'>登入</button></a>
        <?php }?>
        <h2>Comment</h2>
        <form action="./handle_add_comment.php" method='POST'>
            <textarea name="content" id="" cols="50" rows="10" placeholder='請輸入留言'></textarea>
            <?php if($usernickname && $identity !== 'sys_ban') {?>
                <input type="submit" class='btn-submit' value='提交'>
            <?php } else {?>
                <h2>留言功能未開放</h2>
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
                            <div class="board-card-name"><?= htmlspecialchars($row['nickname']) ?>(＠<?= htmlspecialchars($row['username']) ?>)</div>
                            <span class='board-card-time'><?= htmlspecialchars($row['create_at']) ?></span>
                            <?php if($row['username'] === $username) { ?>
                            <a href='comments_edit.php?id=<?= $row['id']?>'>編輯</a>
                            <a href='handle_comment_delete.php?id=<?= $row['id']?>'>刪除</a>
                            <?php }?>
                            <div class="board-card-content"><?= htmlspecialchars($row['content']) ?></div>
                        </div>
                    </div>
            <?php 
                };
            ?>
        </div>
        <?
            $stmt = $conn->prepare(
                "SELECT count(id) as count FROM rock070_comments WHERE is_deleted is NULL"
            );

            // $stmt->bind_param('ss', $item_per_page, $offset);
            $result = $stmt->execute();
        
            if(!$result) {
               die('error:' . $conn->error);
            }
            
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $total_page =  ceil($row['count'] / 10);
        ?>
        <div class="page-info">
            <span>
                目前在第 <?=$page?> 頁，總共有 <?=$total_page?> 頁
            </span>
        </div>
        <div class="paginator">
            <?php if($page != 1) {?>
                <a href="./home.php">首頁</a>
                <a href="./home.php?page=<?=$page-1?>">上一頁</a>
            <?php } ?>
            <? if($page != $total_page) {?>
                <a href="./home.php?page=<?=$page+1?>">下一頁</a>
                <a href="./home.php?page=<?=$total_page?>">最後一頁</a>
            <?php } ?>
        </div>
    </main>
</body>
</html>