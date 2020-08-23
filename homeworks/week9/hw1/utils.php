<?
    function getToken() {
        $token = '';
        for($i = 0; $i < 16; $i ++) {
            $token .=chr(rand(65, 90));
        }
        return $token;
    }

    // function getLoginUserInfos($token) {
    //     global $conn;
    //     $username = NULL;
    //     $sql = sprintf("SELECT * from tokens WHERE token = '%s'", $token);
    //     $result =  $conn->query($sql);

    //     if(!$result) {
    //         die($conn->error);
    //     }

    //     if($result->num_rows) {
    //         $username = $result->fetch_assoc()['username'];

    //         $sql = sprintf("SELECT * from users WHERE username = '%s'", $username);
    //         $result = $conn->query($sql);

    //         if(!$result) {
    //             die($conn->error);
    //         }

    //         $row = $result->fetch_assoc();

    //         return $row;

    //     }

    // }

    function getUserFromUsername($username) {
        global $conn;

        $sql = sprintf(
            "SELECT * from rock070_users WHERE username = '%s'",
            $username
        );

        $result = $conn->query($sql);

        if(!$result) {
            die($conn->error);
        }

        $row = $result->fetch_assoc();

        return $row;
    }



?>