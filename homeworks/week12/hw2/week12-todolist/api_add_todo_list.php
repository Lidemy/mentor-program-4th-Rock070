<?
require_once('conn.php');
header("Content-Type: application/json; charset=utf-8");

 $data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO todos(value, status, todo_list_id) VALUES(?, ?, ?)";
$stmt = $conn->prepare($sql);
$todo_list_id = $_GET['todo_list_id'];

for($i = 0; $i < sizeof($data); $i++) {
    $value = $data[$i]['value']  ;
    $status = $data[$i]['status'];
    $stmt->bind_param('sss', $value, $status, $todo_list_id);
    $result = $stmt->execute();
    if(!$result) {
        $json = array(
            'ok'=> false,
            'message'=> $conn->error
        );
        $response = json_encode($json);
        echo $response;
        die();
    }
    
}

$json = array(
    'ok'=> true,
    'message'=> 'Success!'
);
$response = json_encode($json);
echo $response;

?>