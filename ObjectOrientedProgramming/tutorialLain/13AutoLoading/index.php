<?php
spl_autoload_register(static function ($class_name){
    include $class_name . '.php';
});
$hero1 = new Hero('Adam Arthur Faizal', 'M3119001', 'Teknik Informatika', 2019);
