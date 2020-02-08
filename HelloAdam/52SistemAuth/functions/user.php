<?php
function register_user($user, $pass){
    global $link;
    $user = escape($user);
    $pass = escape($pass);

    $pass = password_hash($pass, CRYPT_BLOWFISH);
    $query = "insert into users (username, password) values ('$user', '$pass')";
    if (mysqli_query($link, $query)) {
        return true;
    }
    return false;
}

function cek_nama($user){
    global $link;
    $user = escape($user);
    $query = "select * from users where username = '$user'";
    if ($hasil = mysqli_query($link, $query)) {
        return mysqli_num_rows($hasil);
    }
}

function cek_data($user, $pass){
    global $link;
    $user = escape($user);
    $query = "select password from users where username = '$user'";
    $hasil = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($hasil)['password'];

    if (password_verify($pass, $hash)) {
        return true;
    } else {
        return false;
    }
}

function escape($data){
    global $link;
    return mysqli_real_escape_string($link, $data);
}