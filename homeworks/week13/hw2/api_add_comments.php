<?php 
   require_once('conn.php');
   header('Content-Type: application/json; charset=utf-8');

   if(empty($_POST['content']) ||
      empty($_POST['nickname']) ||
      empty($_POST['site_key'])) {

       $json = array(
           'ok'=>false,
           'message'=>'Please input missing fields'
       );
       
       $response = json_encode($json);
       echo $response;
       die();
   }
    
   $nickname = $_POST['nickname'];
   $content = $_POST['content'];
   $site_key = $_POST['site_key'];


   $sql = "INSERT INTO rock070_discussions(nickname, site_key, content) VALUES(?, ?, ?)";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param('sss', $nickname, $site_key, $content);

   $result = $stmt->execute();

   if(!$result) {
        $json = array(
            'ok'=>false,
            'message'=>$conn->error
        );
        $response = json_encode($json);
        echo $response;
        die();
   }


   $json = array(
    'ok'=>true,
    'message'=>'success!'
    );
    $response = json_encode($json);
    echo $response;
    die();
?>