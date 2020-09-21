<?php 
   require_once('conn.php');
   header('Content-Type: application/json; charset=utf-8');
   header('Access-Control-Allow-Origin: *');

   if(empty($_GET['site_key'])){
       $json = array(
           'ok'=>false,
           'message'=>'Please input your site key'
       );
       $response = json_encode($json);
       echo $response;
       die();
   }

   if(empty($_GET['limit'])) {
    $limit = 5;
    
    } else {
        $limit = $_GET['limit'];
    }
   
    if(empty($_GET['offset'])) {
        $offset = 0;
        
        } else {
            $offset = $_GET['offset'];
        }

   $site_key = $_GET['site_key'];
   
 

   $sql = 
    "SELECT ".
        "id, nickname, content, create_at, ".
        "(SELECT count(id) from discussions WHERE site_key = ?) as count ".
    "FROM discussions ".
    "WHERE site_key = ? ".
    "ORDER BY id DESC ".
    "limit ? ". 
    "offset ?";

   
   $stmt = $conn->prepare($sql);
   $stmt->bind_param('ssss',$site_key, $site_key, $limit, $offset);

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

   $result = $stmt->get_result();
   $discussions = array();

   while($row = $result->fetch_assoc()) {
       array_push($discussions, array(
        'id'=>$row['id'],
        'nickname'=>$row['nickname'],
        'content'=>$row['content'],
        'create_at'=>$row['create_at'],
        'count'=>$row['count']
        ));
    }



    $json = array(
      'ok'=>true,
      'discussions'=>$discussions,
    );

    $response = json_encode($json);
    echo $response;
    die();

    
?>