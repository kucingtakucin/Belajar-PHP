<?php
spl_autoload_register(static function ($class) {
    require_once __DIR__ . "/Produk/{$class}.php";
});