<?php

if( isset($_POST['submit']) ){

  $email   = $_POST['email'];
  $subject = $_POST['subject'];
  $pesan   = $_POST['pesan'];

  $pesan = "Pengirim: " . $email . "\r\n"
            ."Pesan : ".$pesan;

  if( mail($email, $subject, $pesan) ){
    echo 'email berhasil dikirm';
  }else{
    echo 'email gagal dikirim';
  }

}

?>

<form action="index.php" method="post">
  <input type="email" name="email" placeholder="email"> <br>
  <input type="subject" name="subject" placeholder="subject"> <br>
  <textarea name="pesan" rows="8" cols="40"></textarea>

  <input type="submit" name="submit" value="kirime mail">
</form>
