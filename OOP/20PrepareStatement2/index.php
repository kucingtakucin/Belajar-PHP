<?php
$host = 'localhost';
$username = 'root';
$passwd = 'panembahansenopati123kecilsemuatanpaspasi';
$dbname = 'helloadam';

$mysqli = new mysqli($host, $username, $passwd, $dbname);
if (!$mysqli->connect_errno) echo 'Berhasil tersambung ke database!<br>';
else echo 'Gagal tersambung! ada error ' . $mysqli->error;

$sql = $mysqli->prepare('select nama, alamat from murid');
//$sql->bind_param('s', $param);
$sql->execute();
$sql->bind_result($data1, $data2);
while ($sql->fetch()) {
    echo $data1 . ' - ' . $data2 . '<br>';
}
