<?php
    require_once('conn.php');
    require_once('utils.php');

    session_start();
    if(!empty($_GET['Msg'])) {
        if($_GET['Msg'] === '1') {
        echo "<script> alert('更改權限成功')</script>";
        }
    }
    $usernickname = NULL;
    $username = Null;

   

    if(!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user = getUserFromUsername($username);
        $usernickname = $user['nickname'];
        $identity = $user['identity'];
    }
    // echo $identity;
    if($identity != 'sys_admin'){
        header('Location: ./home.php');
    }

    if(!empty($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1; 
    }

    
    $sql = "SELECT * FROM rock070_users ORDER BY identity ";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();

    if(!$result) {
       die('error:' . $conn->error);
    }
   

    $result = $stmt->get_result();
    $num = 1;

?>

<html>
<head>
    <title>Rock070留言板</title>
    <link rel="stylesheet" href="./style.css">
    <meta charset='utf-8'>

    <style>
        .board {
            width: 90%;
            text-align: center;
            padding: 20px 50px;
        }
        .board-list {
            
        }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const select = (document.querySelector('select').value)
        })
    </script>
</head>
<body>
    
    <header>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼。</header>
    <main class='board'>
        
        <h3>使用者管理</h3>
        <div class="board-list">

        <form action="handle_manage_back.php" method='POST'>
            <table>
                <tr>
                    <th>identity</th>
                    <th>username</th>
                    <th>nickname</th>
                    <th>id</th>
                    <th>create_at</th>
                </tr>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>                        
                        <td>
                            <? 
                                $type=array('sys_admin','sys_user','sys_ban');
                                $type_position = array_search($row['identity'], $type);
                                unset($type[$type_position]);
                                $type = array_values($type);
                                $type_object = array(
                                    'sys_admin' => '1',
                                    'sys_user' => '2',
                                    'sys_ban' => '3'
                                );
                                // print_r($type_object);
                                // print_r($result->num_rows);
                            // echo $type_object['sys_admin'];
                            ?>
                            
                                <select name='options-<?=$num?>'>
                                    <option value= '<?= $row['identity']?>' > <?=$row['identity']?> </option>
                                    <option value= '<?= $type[0]        ?>' > <?=$type[0]        ?> </option>
                                    <option value= '<?= $type[1]        ?>' > <?=$type[1]        ?> </option>
                                </select>

                                <input style='display: none;' type="text" name='id-<?=$num?>' value='<?=$row['id']?>'>
                                <? 
                                    $num++
                                ?>
                                
                                

                        </td>
                        <td><?=$row['username']?></td>
                        <td ><?=$row['nickname'] ?></td>
                        <td > <?=$row['id'] ?></td>
                        <td><?=$row['create_at'] ?></td>
                    </tr>
                <?php }?>
            </table>
            <input type="submit"> 
                            </form>
        </div>
        <?

            $item_per_page = 10 ; 
            $offset = ($page-1) * $item_per_page;
            $stmt = $conn->prepare(
                "SELECT count(id) as count FROM rock070_users"
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
                <a href="./manage_back.php">首頁</a>
                <a href="./manage_back.php?page=<?=$page-1?>">上一頁</a>
            <?php } ?>
            <? if($page != $total_page) {?>
                <a href="./manage_back.php?page=<?=$page+1?>">下一頁</a>
                <a href="./manage_back.php?page=<?=$total_page?>">最後一頁</a>
            <?php } ?>
        </div>
    </main>
</body>
</html>