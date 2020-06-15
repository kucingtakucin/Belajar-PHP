<?php

$host = '127.0.0.1';
$user = 'root';
$password = 'namaku123';
$database = 'phpdasar';
$link = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_error()) :
    die(mysqli_error($link));
endif;

function query($query){
    global $link;
    $result = mysqli_query($link, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function add($data){
    global $link;
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $angkatan = htmlspecialchars($data['angkatan']);

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, angkatan) VALUES ('$nama','$nim','$jurusan',$angkatan)";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

function delete($id){
    global $link;
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}