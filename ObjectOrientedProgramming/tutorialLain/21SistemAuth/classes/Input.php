<?php

class Input{

    public static function get($name){
        if (isset($_GET[$name])) return $_GET[$name];
        else return false;
    }

    public static function post($name){
        if (isset($_POST[$name])) return $_POST[$name];
        else return false;
    }
}