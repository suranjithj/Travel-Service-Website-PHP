<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'resfeber';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



?>

