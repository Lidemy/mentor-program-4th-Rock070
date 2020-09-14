<?php
    require_once('conn.php');
    // require_once('utils.php');

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $register = htmlspecialchars($_POST['register']);
    $howKnow = htmlspecialchars($_POST['howKnow']);
    $advice = htmlspecialchars($_POST['advice']);
   

    $sql = sprintf(
        "INSERT INTO sign_up_data(name, email, phone, register, howknow, advice) VALUES('%s', '%s', '%s', '%s', '%s', '%s')",
        $name, $email, $phone, $register, $howKnow, $advice
    );

    // echo $sql;
    
    $result = $conn->query($sql);

    if(!$result) {
        die($conn->error);
    }
    
    header('Location: ./index.php?code=1');

?>