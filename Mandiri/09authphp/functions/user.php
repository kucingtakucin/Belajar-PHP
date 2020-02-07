<?php

//mendaftarkan user
function register_user($nama, $pass){
  global $link;

  //mencegah sql injection
  $nama = escape($nama);
  $pass = escape($pass);

  $pass  = password_hash($pass, PASSWORD_DEFAULT);
  $query = "INSERT INTO users (username, password) VALUES ('$nama', '$pass')";

  if( mysqli_query($link, $query) ) return true;
  else return false;
}

function cek_nama($nama){
    global $link;
    $nama = escape($nama);

    $query = "SELECT * FROM users WHERE username = '$nama'";

    if( $result = mysqli_query($link, $query) ) return mysqli_num_rows($result);
}

//untuk login
function cek_data($nama, $pass){
  global $link;

    //mencegah sql injection
    $nama = escape($nama);
    $pass = escape($pass);

    $query  = "SELECT password FROM users WHERE username = '$nama'";
    $result = mysqli_query($link, $query);
    $hash   = mysqli_fetch_assoc($result)['password'];

  if( password_verify($pass, $hash) ) return true;
  else return false;

}

//mencegah injection
function escape($data){
  global $link;
  return mysqli_real_escape_string($link, $data);
}

function redirect_login($nama){
    $_SESSION['user'] = $nama;
    header('Location: index.php');
}

function flash_delete($name){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

//menguji status user apakah admin atau bukan
function cek_status($nama){
  global $link;
  $nama = escape($nama);

  $query = "SELECT role FROM users WHERE username='$nama'";

  $result = mysqli_query($link, $query);
  $status = mysqli_fetch_assoc($result)['role'];

  if( $status == 1) return true;
  else return false;
}

?>
