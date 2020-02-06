<?php
$link = mysqli_connect('localhost','root','panembahansenopati123kecilsemuatanpaspasi','helloadam');
if (!$link) {
    die('ada error ' . mysqli_connect_error());
} else {
    echo 'Berhasil terhubung ke database<br>';
}
$query = 'select * from Mahasiswa';
$hasil = mysqli_query($link, $query);
if (mysqli_num_rows($hasil) !== null) {
    while ($data = mysqli_fetch_assoc($hasil)) {
        echo $data['ID'] . ' - ' . $data['nama'] . ' - ' . $data['jurusan'] . '<br>';
    }
}
$query = 'delete from Mahasiswa where id=3';
if (mysqli_query($link, $query)) {
    echo 'Data berhasil di hapus';
} else {
    echo 'Gagal, ada error ' . mysqli_error();
}
mysqli_close($link);
