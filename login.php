<?php
    session_start();
    include("./connection.php");
    // date_default_timezone_set('Asia/Manila');

    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
  
        $results = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1");
        $data = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            // $_SESSION['logo'] = $data['logo'];
            $_SESSION['source'] = $data['source'];
            echo 'success';
        } else {
            echo 'failed';
        }
  
    }

    if (isset($_REQUEST['logout'])) {
        session_destroy();
        header("Location:./");
    }
?>