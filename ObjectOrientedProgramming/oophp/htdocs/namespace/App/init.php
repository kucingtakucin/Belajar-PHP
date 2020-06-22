<?php
spl_autoload_register(static function ($class) {
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . "/Produk/{$class}.php";
});

spl_autoload_register(static function ($class) {
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . "/Service/{$class}.php";
});