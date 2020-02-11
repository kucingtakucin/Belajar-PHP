<?php
$host = 'localhost';
$username = 'root';
$passwd = 'panembahansenopati123kecilsemuatanpaspasi';
$dbname = 'helloadam';

$mysqli = new mysqli($host, $username, $passwd, $dbname);
if (!$mysqli->connect_errno) echo 'Berhasil tersambung ke database!<br>';
else echo 'Gagal tersambung! ada error ' . $mysqli->error;

$query = 'select * from murid';
$result = $mysqli->query($query);
if ($result->num_rows != null) {
    while ($data = $result->fetch_object()) {
        echo $data->nama . ' - ' . $data->alamat . '<br>';
    }
} else {
    echo 'Data kosong!';
}

$mysqli->close();