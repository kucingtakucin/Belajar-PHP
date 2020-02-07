<?php
function register_user($user, $pass){
    global $link;
    $user = mysqli_real_escape_string($link, $user);
    $pass = mysqli_real_escape_string($link, $pass);

    $pass = password_hash($pass, CRYPT_BLOWFISH);
    $query = "insert into users (username, password) values ('$user', '$pass')";
    if (mysqli_query($link, $query)) {
        return true;
    }
    return false;
}

function register_cek_nama($user){
    global $link;
    $user = mysqli_real_escape_string($link, $user);
    $query = "select * from users where username='$user'";
    if ($hasil = mysqli_query($link, $query)) {
        if (mysqli_num_rows($hasil) == 0) {
            return true;
        } else {
            return false;
        }
    }
}


function login_cek_nama($user){
    global $link;
    $user = mysqli_real_escape_string($link, $user);
    $query = "select * from users where username = '$user'";
    if ($hasil = mysqli_query($link, $query)) {
        if (mysqli_num_rows($hasil) != 0) {
            return true;
        } else {
            return false;
        }
    }
}

function cek_data($user, $pass){
    global $link;
    $user = mysqli_real_escape_string($link, $user);
    $query = "select password from users where username = '$user'";
    $hasil = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($hasil)['password'];
    if (password_verify($pass, $hash)) {
        return true;
    } else {
        return false;
    }
}
