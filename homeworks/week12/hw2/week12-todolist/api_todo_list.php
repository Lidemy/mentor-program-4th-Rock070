<?
require_once('conn.php');
header("Content-Type: application/json; charset=utf-8");

// $data = json_decode(file_get_contents('php://input'), true);


// 根據 todo_list_id 去找 todo;

if(empty($_GET['todo_list_id'])) {
    header('Location: ./index.html');
}

$todo_list_id = $_GET['todo_list_id'];
$sql = "SELECT * FROM rock070_todos WHERE todo_list_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $todo_list_id);
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
$result = $stmt->get_result();

$todos = array();
// print_r($row['todo']);

while($row = $result->fetch_assoc()) {
    array_push($todos, array(
        'id'=>$row['id'],
        'value'=>$row['value'],
        'status'=>$row['status'],
        'create_at'=>$row['create_at'],
    ));
}


// 找到最大 todo_list_id


$sql = "SELECT MAX(todo_list_id) as max_todo_list_id FROM rock070_todos";

$stmt = $conn->prepare($sql);

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
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$max_todo_list_id = $row['max_todo_list_id'];

$json = array(
    'ok'=> true,
    'message'=> 'Success!',
    'max_todo_list_id'=> $max_todo_list_id,
    'todo_list'=>$todos
);

$response = json_encode($json);

echo $response;





?>