<?php
    session_start();
    include('../connection.php');
    $sidebar_active_color = '#7366ff';
    if (empty($_SESSION['user_id'])) {
        header("Location: ../");
    }
?>