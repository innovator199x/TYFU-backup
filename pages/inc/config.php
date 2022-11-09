<?php
    session_start();
    $id = $_SESSION['user_id'];
    include('../connection.php');
    $sidebar_active_color = '#7366ff';
    if (empty($_SESSION['user_id'])) {
        header("Location: ../");
    }
?>