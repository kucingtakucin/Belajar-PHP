<?php

class User
{
    private $_db;

    public function __construct(){
        $this->_db = Database::getInstance();
    }

    public function register_user($fields = array()){
        if ($this->_db->insert('users', $fields)): return true;
        else: return false; endif;
    }

    public function login_user($username, $password){
        if ($data = $this->_db->select('users', 'username', $this->_db->mysqli->real_escape_string($username))):
            if (password_verify($this->_db->mysqli->real_escape_string($password), $data->password)): return true;
            else: return false; endif;
        else: return false; endif;
    }

    public function cek_nama($username){
        if ($data = $this->_db->select('users', 'username', $this->_db->mysqli->real_escape_string($username))):
            if (!empty($data)): return true;
            else: return false; endif;
        else: return false; endif;
    }

    public function is_admin($username){
        if ($data = $this->_db->select('users', 'username', $this->_db->mysqli->real_escape_string($username))):
            if ($data->role == 1): return true;
            else: return false; endif;
        endif;
    }

    public function is_logged_in(){
        if (Session::isExist('User')): return true;
        else: return false; endif;
    }

    public function get_data($username){
        if ($this->cek_nama($username)): return $this->_db->select('users', 'username', $username);
        else: return false; endif;
    }

    public function ganti_password_user($id, $fields = array()){
        if ($this->_db->update('users', $id,$fields)): return true;
        else: return false; endif;
    }

    public function get_users(){
        return $this->_db->select('users');
    }
}