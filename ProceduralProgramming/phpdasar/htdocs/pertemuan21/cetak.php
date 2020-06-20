<?php
require_once 'vendor/autoload.php';
require_once 'init.php';

$mpdf = new Mpdf\Mpdf();
$html = '
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <header>
        <h1 class="font-weight-bold mt-3 mb-0">Daftar Mahasiswa</h1>
    </header>
    <main>
        <table class="table table-striped" border="1" cellpadding="10" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Angkatan</th>
                </tr>
            </thead>
            <tbody></html>';
                $i = 1;
                $students = select('SELECT * FROM mahasiswa');
                foreach ($students as $student):
                    $html .= '
                    <tr>
                        <th scope="row"><p class="mt-5">' . $i . '</p></th>
                        <td><img src="img/' . $student['foto'] . '" alt="'.$student['nama'].'" width="150" class="img-fluid"></td>
                        <td><p class="mt-5">' . $student['nama'] . '</p></td>
                        <td><p class="mt-5">' . $student['nim'] . '</p></td>
                        <td><p class="mt-5">' . $student['jurusan'] . '</p></td>
                        <td><p class="mt-5">' . $student['angkatan'] . '</p></td>
                    </tr>';
                    $i++;
                endforeach;
$html .= '  </tbody>
        </table>
    </main>
    <footer></footer>
</body>
</html>
';
try {
    $mpdf->WriteHTML($html);
    $mpdf->Output('Daftar-Mahasiswa', \Mpdf\Output\Destination::INLINE);
} catch (\Mpdf\MpdfException $e) {
    echo $e;
    die;
}