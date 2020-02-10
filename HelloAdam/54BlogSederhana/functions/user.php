<?php
function cek_untuk_login($username, $password){
    global $link;
    $username = escape($username);
    $password = escape($password);
//    $password = md5($password);
//    $query = "select * from users where username = '$username' and password = '$password'";
    $query = "select password from users where username = '$username'";
    if ($data = mysqli_query($link, $query)) {
        if ($hash = mysqli_fetch_assoc($data)) {
            if (password_verify($password, $hash['password'])) return true;
            else return false;
        } else return false;
//        if (mysqli_num_rows($data) != null) return true;
//        else return false;
    } else {
//        die(mysqli_error($link));
        return false;
    }
}

function cek_untuk_register($username, $password){
    $username = escape($username);
    $password = escape($password);
//    $password = md5($password);
    $password = password_hash($password, CRYPT_BLOWFISH);
    $query = "insert into users(username, password) values('$username','$password')";
    return run_query($query);
}

function cek_nama($username){
    global $link;
    $query = "select * from users where username = '$username'";
    if ($data = mysqli_query($link, $query)) {
        if ($hasil = mysqli_fetch_assoc($data)) {
            if ($hasil == null) return true;
            else return false;
        } else return false;
    } else return false;
}