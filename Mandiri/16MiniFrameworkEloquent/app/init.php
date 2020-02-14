<?php

require_once '../vendor/autoload.php';

spl_autoload_register(function($class){
  require_once 'Core/'.$class.'.php';
});

require_once 'Database.php';

$GLOBALS['path'] = '/tutorialSK/mini-framework/public';
