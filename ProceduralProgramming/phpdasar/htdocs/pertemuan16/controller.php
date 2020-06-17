<?php
/**
 * @param string $query
 * @return array
 */
function select(string $query): array {
    global $link;
    $results = mysqli_query($link, htmlspecialchars(trim($query)));
    $result = [];
    while ($row = mysqli_fetch_assoc($results)):
        $result[] = $row;
    endwhile;
    return $result;
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
    $foto = upload($_FILES);
    if (!$foto): return false; endif;

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, angkatan, foto) VALUES ('$nama','$nim','$jurusan', $angkatan, '$foto')";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

/**
 * @param array $files
 * @return string
 */
function upload(array $files): string {
    $filename = $files['foto']['name'];
    $filesize = $files['foto']['size'];
    $errorfile = $files['foto']['error'];
    $tmpname = $files['foto']['tmp_name'];
    if ($errorfile === 4):
        throw new \RuntimeException("Gagal mengupload gambar karena kesalahan yang tidak diketahui!", 1);
    endif;

    $validextension = ['jpg', 'jpeg', 'png', 'svg'];
    $extensionfile = explode('.', $filename);
    $arrayreverse = array_reverse($extensionfile);
    $prefixfilename = strtolower(end($arrayreverse));
    $extensionfile = strtolower(end($extensionfile));
    if (!in_array($extensionfile, $validextension)):
        throw new \RuntimeException("Yang kamu masukkan bukan gambar!", 1);
    endif;
    if ($filesize > 1000000):
        throw new \RuntimeException("Ukuran gambar kamu terlalu besar!", 1);
    endif;

    $newfilename = uniqid($prefixfilename, true) . ".$extensionfile";
    move_uploaded_file($tmpname, "img/$newfilename");
    return $newfilename;
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
    $fotolama = mysqli_real_escape_string($link, htmlspecialchars($data['fotolama']));
    if ($_FILES['foto']['error'] === 4) {
        $fotobaru = $fotolama;
    } else {
        $fotobaru = upload($_FILES);
    }
    $query = "UPDATE mahasiswa SET nama ='$nama', nim = '$nim', jurusan = '$jurusan', angkatan = $angkatan, foto = '$fotobaru' WHERE id = $id";
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

/**
 * @param array $data
 * @return int
 */
function register(array $data): int {
    global $link;
    $firstname = mysqli_real_escape_string($link, htmlspecialchars(trim($data['firstname'])));
    $lastname = mysqli_real_escape_string($link, htmlspecialchars(trim($data['lastname'])));
    $username = "$firstname $lastname";
    $email = mysqli_real_escape_string($link, htmlspecialchars(trim($data['email'])));
    $password = mysqli_real_escape_string($link, htmlspecialchars(trim($data['password'])));
    $confirmpassword = mysqli_real_escape_string($link, htmlspecialchars(trim($data['confirmpassword'])));

    $query = "SELECT email FROM users WHERE email = '$email'";
    $emailcheck = mysqli_query($link, $query);
    if (mysqli_fetch_assoc($emailcheck)):
        throw new \RuntimeException('Email sudah terdaftar sebelumnya!', 1);
    endif;
    if ($password !== $confirmpassword):
        throw new \RuntimeException('Password tidak sesuai!', 1);
    endif;

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

/**
 * @param array $data
 * @return bool
 */
function login(array $data): bool{
    global $link;
    $email = mysqli_real_escape_string($link, htmlspecialchars(trim($data['email'])));
    $password = mysqli_real_escape_string($link, htmlspecialchars(trim($data['password'])));

    $query = "SELECT * FROM users WHERE email = '$email'";
    $results = mysqli_query($link, $query);
    if (mysqli_num_rows($results) > 0):
        $result = mysqli_fetch_assoc($results);
        if (password_verify($password, $result['password'])):
            $_SESSION['login'] = true;
            $_SESSION['username'] = $result['username'];
            return true;
        else:
            throw new \RuntimeException("Password yang kamu masukkan salah!",1);
        endif;
    else:
        throw new \RuntimeException("Email kamu belum terdaftar!", 1);
    endif;
}