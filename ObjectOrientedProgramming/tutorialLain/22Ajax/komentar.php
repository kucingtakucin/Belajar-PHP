<?php
require_once 'core/init.php';

$data = $mysqli->real_escape_string($_POST['komentar']);
$sql = $mysqli->prepare("insert into komentar (isi_komentar,id_user) values('$data',1)");