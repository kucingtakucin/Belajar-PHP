<?php

class Database{
    private static $_instance;
    private $mysqli;
    private $_host = 'localhost';
    private $_username = 'root';
    private $_passwd = 'panembahansenopati123kecilsemuatanpaspasi';
    private $_dbname = 'helloadam';

    public static function getInstance(){
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct(){
        $this->mysqli = new mysqli($this->_host, $this->_username, $this->_passwd, $this->_dbname);
        if ($this->mysqli->connect_errno) {
            trigger_error('Gagal tersambung ke database! ada error : ' . $this->mysqli->connect_error, E_USER_ERROR);
        }
    }

    private function __clone(){}
}