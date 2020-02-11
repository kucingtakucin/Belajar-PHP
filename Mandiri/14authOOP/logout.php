<?php

require_once 'core/init.php';
session_destroy();
Redirect::to('login');

?>
