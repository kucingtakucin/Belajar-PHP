<?php

class Database{
    private static $_instance;
    public $mysqli;
    private $_host = 'localhost';
    private $_username = 'root';
    private $_passwd = 'panembahansenopati123kecilsemuatanpaspasi';
    private $_dbname = 'helloadam';

    public static function getInstance(){
        if (!self::$_instance): self::$_instance = new self(); endif;
        return self::$_instance;
    }

    private function __construct(){
        $this->mysqli = new mysqli($this->_host, $this->_username, $this->_passwd, $this->_dbname);
        if ($this->mysqli->connect_errno): trigger_error('Gagal tersambung ke database! ada error : ' . $this->mysqli->connect_error, E_USER_ERROR); endif;
    }

    public function insert($table, $fields = array()){
        $dataArray = array();
        $i = 0;
        foreach ($fields as $key => $data):
            if (is_int($data)): $dataArray[$i] = $this->mysqli->real_escape_string($data);
            else: $dataArray[$i] = "'" . $this->mysqli->real_escape_string($data) . "'"; endif;
            $i++;
        endforeach;
        $column = implode(', ', array_keys($fields));
        $values = implode(', ', $dataArray);
        $sql = $this->mysqli->prepare("insert into $table ($column) values ($values)");
        if ($sql->execute()): return true;
        else: return false; endif;
    }

    public function select($table, $column = '', $values = ''){
        if (!is_int($values)): $values = "'" . $values . "'"; endif;
        if ($column != '' && $values != ''):
            $query = "select * from $table where $column = $values";
            if ($result = $this->mysqli->query($query)):
                if ($result->num_rows > 1):
                    if ($data = $result->fetch_object()): return $data; endif;
                else:
                    while ($data = $result->fetch_object()): $hasil[] = $data; endwhile;
                    return $hasil;
                endif;
            else: return false; endif;
        else:
            $query = "select * from $table";
            if ($result = $this->mysqli->query($query)):
                while ($data = $result->fetch_object()): $hasil[] = $data; endwhile;
                return $hasil;
            else: return false; endif;
        endif;
    }

    public function update($table, $id, $fields = array()){
        $dataArray = array();
        $i = 0;
        foreach ($fields as $key => $data):
            if (is_int($data)): $dataArray[$i] = $key . ' = ' . $this->mysqli->real_escape_string($data);
            else: $dataArray[$i] = $key . " = '" . $this->mysqli->real_escape_string($data) . "'"; endif;
            $i++;
        endforeach;
        $values = implode(', ', $dataArray);
        $sql = $this->mysqli->prepare("update $table set $values where id = $id");
        if ($sql->execute()): return true;
        else: return false; endif;
    }

}