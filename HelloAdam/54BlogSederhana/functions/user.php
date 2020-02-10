<?php
function cek_untuk_login($username, $password){
    global $link;
//    $username = escape($username);
//    $password = escape($password);
//    $password = md5($password);
    $query = "select * from users where username = '$username' and password = '$password'";
//    $query = "select password from users where username = '$username'";
    if ($data = mysqli_query($link, $query)) {
//        $hasil = mysqli_fetch_assoc($data)['password'];
//        if ($password == $hasil) return true;
//        else return false;
        if (mysqli_num_rows($data) != null) return true;
        else return false;
    } else {
        die(mysqli_error($link));
    }
}

function cek_untuk_register($username, $password){
    $username = escape($username);
    $password = escape($password);
    $password = md5($password);
    $query = "insert into users(username, password) values('$username','$password')";
    return run_query($query);
}

function cek_nama($username){
    global $link;
    $query = "select * from users where username = '$username'";
    $data = mysqli_query($link, $query);
    if (mysqli_fetch_assoc($data) == null) return true;
    else return false;
}