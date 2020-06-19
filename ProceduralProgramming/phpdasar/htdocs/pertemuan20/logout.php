<?php
session_start();
session_unset();
session_destroy();
setcookie('key', null, time() - (60 ** 2));
setcookie('value', null, time() - (60 ** 2));
header('Location: login.php');
exit(0);