<?php

function register_user($nama, $pass){
  $nama = escape($nama);
  $pass = escape($pass);
  //hash
  $pass = md5($pass);

  $query = "INSERT INTO users (username, password, status) VALUES ('$nama', '$pass', 0)";
  return run($query);
}

function register_cek_nama($nama){
   $nama = escape($nama);

   $query = "SELECT * FROM users WHERE username='$nama'";
   global $link;

   if($result= mysqli_query($link, $query)){
     if(mysqli_num_rows($result) == 0)return true;
     else return false;
   }
}

function cek_data($nama, $pass){
 $nama = escape($nama);
 $pass = escape($pass);

 $pass = md5($pass);

 $query = "SELECT * FROM users WHERE username='$nama' AND password='$pass'";
 global $link;

 if($result= mysqli_query($link, $query)){
   if(mysqli_num_rows($result) != 0)return true;
   else return false;
 }

}

function cek_status($username){
  $nama = escape($username);

  $query = "SELECT status FROM users WHERE username='$nama'";
  global $link;

  if($result= mysqli_query($link, $query)){
     while($row = mysqli_fetch_assoc($result)){
       $status = $row['status'];
     }

     return $status;
  }

}

?>
