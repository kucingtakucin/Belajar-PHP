<?php
session_start();
if (isset($_SESSION['data_session'])) {
    echo 'Ini adalah halaman profil '.$_SESSION['data_session'];
} else {
    echo 'Login dulu ya';
}