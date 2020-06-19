<?php
require_once '../init.php';
$jumlahDataPerHalaman = 5;
$jumlahSeluruhData = count(select("SELECT * FROM mahasiswa"));
$jumlahSeluruhHalaman = ceil($jumlahSeluruhData / $jumlahDataPerHalaman);
$halamanAktifSaatIni = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalDataTiapHalaman = ($jumlahDataPerHalaman * $halamanAktifSaatIni) - $jumlahDataPerHalaman;
if (empty($_GET['keyword'])):
    $students = select("SELECT * FROM mahasiswa");
else :
    $keyword = $_GET['keyword'];
    $students = search($keyword, "$awalDataTiapHalaman, $jumlahDataPerHalaman");
endif ?>
<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Foto</th>
        <th scope="col">Nama</th>
        <th scope="col">NIM</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Angkatan</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1 ?>
    <?php foreach ($students as $student): ?>
        <tr>
            <th scope="row"><p class="mt-5"><?= $i ?></p></th>
            <td><img src="img/<?= $student['foto'] ?>" alt="<?= $student['nama']?>" width="150" class="img-fluid"></td>
            <td><p class="mt-5"><?= $student['nama'] ?></p></td>
            <td><p class="mt-5"><?= $student['nim'] ?></p></td>
            <td><p class="mt-5"><?= $student['jurusan'] ?></p></td>
            <td><p class="mt-5"><?= $student['angkatan'] ?></p></td>
            <td><a href="index.php?id=<?= $student['id'] ?>&status=update" class="btn btn-warning text-white mr-2 mt-5">Update</a><a href="index.php?id=<?= $student['id'] ?>&status=confirm-delete" class="btn btn-danger mt-5">Delete</a></td>
        </tr>
        <?php $i++ ?>
    <?php endforeach ?>
    </tbody>
</table>
<ul class="pagination align-items-center justify-content-center">
    <li class="page-item <?php if((int)$halamanAktifSaatIni === 1): ?>disabled<?php endif ?>">
        <a class="page-link" href="index.php?halaman=<?= (int)$halamanAktifSaatIni - 1 ?>">Previous</a>
    </li>
    <?php for($i = 1; $i <= $jumlahSeluruhHalaman; $i++): ?>
        <?php if($i === (int)$halamanAktifSaatIni): ?>
            <?php if($i === (int)$jumlahSeluruhHalaman): ?>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">
                        <?= $i ?>
                    <span class="sr-only">(current)</span>
                    </span>
                </li>
                <li class="page-item disabled">
                    <span class="page-link">Next</span>
                </li>
                <?php break ?>
            <?php else: ?>
                <li class="page-item active" aria-current="page">
                            <span class="page-link">
                                <?= $i ?>
                            <span class="sr-only">(current)</span>
                            </span>
                </li>
            <?php endif ?>
        <?php else: ?>
            <?php if ($i === (int)$jumlahSeluruhHalaman): ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?halaman=<?= $i ?>"><?= $i ?></a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="index.php?halaman=<?= (int)$halamanAktifSaatIni + 1 ?>">Next</a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?halaman=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endif ?>
        <?php endif ?>
    <?php endfor ?>
</ul>
