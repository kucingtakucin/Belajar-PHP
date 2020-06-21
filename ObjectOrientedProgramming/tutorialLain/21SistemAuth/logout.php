<?php
require_once 'core/init.php';
unset($_SESSION['User']);
session_destroy();
header('Location: login.php');