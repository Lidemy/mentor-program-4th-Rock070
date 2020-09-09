<?php

  require_once('conn.php');
  

  $usernickname = NULL;
  $username = Null;

  
  // 2. 手動 session (cookie) 
  // if(!empty($_COOKIE['token'])){
  //     $user = getLoginUserInfos($_COOKIE['token']);
  //     $usernickname =  $user['nickname'];
  // }

  // 取得 TABLE:board 留言
  $sql = "SELECT * from sign_up_data";
  $result = $conn->query($sql);

  if(!$result) {
      echo $conn->error;
  }
  
  

?>

<!DOCTYPE html>

<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset='utf-8'>
    <title>管理後台</title>
    <link rel="stylesheet" href="./style.css">
    <style>
      * {
        /* border: solid 1px #000000; */
        position: relative;
        box-sizing: border-box;
      }

      body {
        height: 100%;
      }
      .content {
        padding: 30px;
        
      }
      header {
        height: 10vh;
      }
      .content .content-box .inner{
        min-height: calc(80vh - 90px);
        padding: 40px;
      }
      .content .content-box .inner table{
        width: 100%;
        text-align: center;
        white-space: pre-line;
        word-break: break-word;
        
        /* height: 200px ; */
          border-collapse: collapse;
      }

      .content .content-box .inner-adjust{
        padding: 30px 50px;
      }
      th {
        background-color: #e5e5e5;
      }
      td, th {
        padding: 16px;
      }
      table, th, td {
        border: 1px solid #d0d0d0;
      }

      footer{
        /* position: absolute;
        bottom: 0px;   */
        height: 10vh;  
      }
    </style>
  </head>  
  
  <body>
  <header> </header>
  <div class="content">
    
    <div class="content-box">
      <div class="topYellow"></div>
      <div class="inner-adjust inner">
        <h3>新拖延運動報名結果一覽</h3>

        <table>
          <tr>
            <th>＃</th>
            <th>暱稱</th>
            <th>電子郵件</th>
            <th>手機號碼</th>
            <th>報名類型</th>
            <th>怎麼知道這個活動的</th>
            <th>其他</th>
          </tr>
          <?php while($row = $result->fetch_assoc()) {
            
          ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['register'] ?></td>
              <td><?= $row['howKnow'] ?></td>
              <td><?= $row['advice'] ?></td>
            </tr>

        <?php } ?>

        </table>
      </div>
    </div>
  </div>

  <footer>
    <p>© 2020 © Copyright. All rights Reserved.</p>
  </footer>

  
  </body>

</html>