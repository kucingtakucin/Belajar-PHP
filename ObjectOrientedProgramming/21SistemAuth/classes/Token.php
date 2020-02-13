<?php

class Token{
    public static function generate(){
        return Session::set('token', md5(uniqid(mt_rand(), true)));
    }

    public static function check($token){
        if ($token == Session::get('token')): return true;
        else: return false; endif;
    }
}