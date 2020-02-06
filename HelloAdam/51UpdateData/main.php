<?php
$link = mysqli_connect('localhost', 'root', 'panembahansenopati123kecilsemuatanpaspasi', 'helloadam');
if (!$link) {
    die('Ada error ' . mysqli_connect_error());
}
$query = 'select * from Mahasiswa';
$hasil = mysqli_query($link, $query);
if (mysqli_num_rows($hasil) !== null) {
    while ($data = mysqli_fetch_assoc($hasil)) {
        print_r($data);
        echo '<br>';
    }
}
$query = "update Mahasiswa set nama = 'Faizal' where id=4";
if (mysqli_query($link, $query)) {
    echo 'berhasil!';
}
mysqli_close($link);