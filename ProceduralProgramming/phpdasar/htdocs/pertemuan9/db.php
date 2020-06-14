<?php

$host = '127.0.0.1';
$user = 'root';
$password = 'namaku123';
$database = 'phpdasar';
$conn = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_error()) :
    die(mysqli_error($conn));
endif;

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
