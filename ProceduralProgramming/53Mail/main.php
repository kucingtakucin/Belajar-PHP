<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $pesan = $_POST['pesan'];
    if (mail($email, $subject, $pesan)) echo 'email berhasil di kirim';
    else echo "email gagal dikirim";
}
?>
<form action="main.php" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="email"><br><br>
    <label for="subject">Subject</label>
    <input type="text" name="subject" placeholder="subject"><br><br>
    <label for="pesan">Pesan</label>
    <textarea name="pesan" id="textarea" cols="8" rows="10"></textarea><br><br>
    <input type="submit" name="submit" value="Kirim email!">
</form>
