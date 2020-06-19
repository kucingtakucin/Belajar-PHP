<?php
/**
 * @return array
 */
function index(): array{
    if (!isset($_SESSION['login'])):
        header('Location: login.php');
        exit(0);
    endif;
    $jumlahDataPerHalaman = 2;
    $jumlahSeluruhData = count(select("SELECT * FROM mahasiswa"));
    $jumlahSeluruhHalaman = ceil($jumlahSeluruhData / $jumlahDataPerHalaman);
    $halamanAktifSaatIni = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $awalDataTiapHalaman = ($jumlahDataPerHalaman * $halamanAktifSaatIni) - $jumlahDataPerHalaman;
    $students = select("SELECT * FROM mahasiswa LIMIT $awalDataTiapHalaman, $jumlahDataPerHalaman");
    if (isset($_POST['search'])): $students = search("$awalDataTiapHalaman, $jumlahDataPerHalaman"); endif;
    return ['students' => $students, 'jumlahSeluruhHalaman' => $jumlahSeluruhHalaman, 'halamanAktifSaatIni' => $halamanAktifSaatIni];
}

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
 * @param string $limit
 * @return array
 */
function search(string $limit): array {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR angkatan LIKE '%$keyword%' LIMIT $limit";
    return select($query);
}

/**
 * @return int
 */
function insert(): int {
    global $link;
    $nim = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['nim'])));
    $nama = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['nama'])));
    $jurusan = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['jurusan'])));
    $angkatan = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['angkatan'])));
    $foto = upload();
    if (!$foto): return false; endif;

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, angkatan, foto) VALUES ('$nama','$nim','$jurusan', $angkatan, '$foto') ";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

/**
 * @param array $files
 * @return string
 */
function upload(): string {
    $filename = $_FILES['foto']['name'];
    $filesize = $_FILES['foto']['size'];
    $errorfile = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];
    if ($errorfile === 4):
        throw new \RuntimeException("Gagal mengupload gambar karena kesalahan yang tidak diketahui!", 1);
    endif;

    $validextension = ['jpg', 'jpeg', 'png', 'svg'];
    $array = explode('.', $filename);
    $prefixfilename = strtolower($array)[0];
    $extensionfile = strtolower(end($array));
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
function update(): int {
    global $link;
    $id = $_GET['id'];
    $nim = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['nim'])));
    $nama = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['nama'])));
    $jurusan = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['jurusan'])));
    $angkatan = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['angkatan'])));
    $fotolama = mysqli_real_escape_string($link, htmlspecialchars($_POST['fotolama']));
    if ($_FILES['foto']['error'] === 4) {
        $fotobaru = $fotolama;
    } else {
        $fotobaru = upload();
    }
    $query = "UPDATE mahasiswa SET nama ='$nama', nim = '$nim', jurusan = '$jurusan', angkatan = $angkatan, foto = '$fotobaru' WHERE id = $id ";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

/**
 * @return int
 */
function delete(): int {
    global $link;
    $id = $_GET['id'];
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

/**
 * @param array $data
 * @return int
 */
function register(): int {
    global $link;
    $firstname = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['firstname'])));
    $lastname = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['lastname'])));
    $username = "$firstname $lastname";
    $email = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['email'])));
    $password = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['password'])));
    $confirmpassword = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['confirmpassword'])));

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
 * @return bool
 */
function login(): bool{
    global $link;
    $email = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['email'])));
    $password = mysqli_real_escape_string($link, htmlspecialchars(trim($_POST['password'])));

    $query = "SELECT * FROM users WHERE email = '$email'";
    $results = mysqli_query($link, $query);
    if (mysqli_num_rows($results) > 0):
        $result = mysqli_fetch_assoc($results);
        if (password_verify($password, $result['password'])):
            $_SESSION['login'] = true;
            $_SESSION['username'] = $result['username'];
            if (isset($_POST['rememberme'])):
                setcookie('key', base64_encode($result['id']), time() + (60 ** 2));
                setcookie('value', hash('sha512', $result['username']), time() + (60 ** 2));
            endif;
            return true;
        else:
            throw new \RuntimeException("Password yang kamu masukkan salah!",1);
        endif;
    else:
        throw new \RuntimeException("Email kamu belum terdaftar!", 1);
    endif;
}

/**
 * @return bool
 */
function session(): bool {
    global $link;
    if (isset($_COOKIE['key'], $_COOKIE['value'])):
        $id = base64_decode($_COOKIE['key']);
        $username = $_COOKIE['value'];
        $query = "SELECT username FROM users WHERE id = '$id'";
        $results = mysqli_query($link, $query);
        $result = mysqli_fetch_assoc($results);
        if ($username === hash('sha512', $result['username'])):
            $_SESSION['login'] = true;
            $_SESSION['username'] = $result['username'];
            return true;
        endif;
    endif;
    return false;
}