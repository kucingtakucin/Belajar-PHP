<?php
$link = mysqli_connect('localhost','root','panembahansenopati123kecilsemuatanpaspasi', 'classicmodels');

if (!$link) {
    die('Ada error'.mysqli_connect_error());
}
mysqli_close($link);