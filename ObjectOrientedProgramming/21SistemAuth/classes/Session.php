<?php

class Session{
    public static function set($name, $value){
        return $_SESSION[$name] = $value;
    }

    public static function get($name){
        return $_SESSION[$name];
    }

    public static function isExist($name){
        if (isset($_SESSION[$name])): return true;
        else: return false; endif;
    }

    public static function flash($name, $message = ''){
        if (self::isExist($name)):
            $session = self::get($name);
            self::delete($name);
            return $session;
        else: self::set($name, $message); endif;
    }

    public static function delete($name){
        if (self::isExist($name)): unset($_SESSION[$name]); endif;
    }
}