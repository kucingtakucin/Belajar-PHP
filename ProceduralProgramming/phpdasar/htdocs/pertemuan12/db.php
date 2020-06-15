<?php
$host = '127.0.0.1';
$user = 'root';
$password = 'namaku123';
$database = 'phpdasar';
$link = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_error()) :
    die(mysqli_error($link));
endif;

/**
 * @param string $query
 * @return array
 */
function select(string $query): array {
    global $link;
    $result = mysqli_query($link, htmlspecialchars(trim($query)));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

/**
 * @param string $keyword
 * @return array
 */
function search(string $keyword): array {
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR angkatan LIKE '%$keyword%'";
    return select($query);
}

/**
 * @param array $data
 * @return int
 */
function insert(array $data): int {
    global $link;
    $nim = mysqli_real_escape_string($link, htmlspecialchars(trim($data['nim'])));
    $nama = mysqli_real_escape_string($link, htmlspecialchars(trim($data['nama'])));
    $jurusan = mysqli_real_escape_string($link, htmlspecialchars(trim($data['jurusan'])));
    $angkatan = mysqli_real_escape_string($link, htmlspecialchars(trim($data['angkatan'])));

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, angkatan) VALUES ('$nama','$nim','$jurusan',$angkatan)";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

/**
 * @param int $id
 * @param array $data
 * @return int
 */
function update(int $id, array $data): int {
    global $link;
    $nim = mysqli_real_escape_string($link, htmlspecialchars(trim($data['nim'])));
    $nama = mysqli_real_escape_string($link, htmlspecialchars(trim($data['nama'])));
    $jurusan = mysqli_real_escape_string($link, htmlspecialchars(trim($data['jurusan'])));
    $angkatan = mysqli_real_escape_string($link, htmlspecialchars(trim($data['angkatan'])));

    $query = "UPDATE mahasiswa SET nama ='$nama', nim = '$nim', jurusan = '$jurusan', angkatan = $angkatan WHERE id = $id";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

/**
 * @param $id
 * @return int
 */
function delete(int $id): int {
    global $link;
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}