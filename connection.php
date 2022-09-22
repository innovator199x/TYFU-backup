<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "tyfu_db";
} else { //live db
    $db_host = "localhost";
    $db_user = "dreeve_tyfu";
    $db_pass = "!eHbk?*q^[2F";
    $db_name = "dreeve_tyfu_db";
}

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno())
{
	echo 'Unknown Database : '.mysqli_connect_error();
}
?>
