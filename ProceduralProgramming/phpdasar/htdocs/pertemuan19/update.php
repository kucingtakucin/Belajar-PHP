<!--  Modal 5: Form update data  -->
<?php if (isset($_GET['id'], $_GET['status']) && $_GET['status'] === 'update' && !isset($_POST['update'])):
$student_id = $_GET['id'];
$student_detail = select("SELECT * FROM mahasiswa WHERE id = '$student_id'")[0]; ?>
    <div class="modal fade" id="updateModal1" role="dialog" aria-labelledby="updateModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModal1Label">Update Data Mahasiswa</h5>
                        <a href="index.php" class="text-decoration-none">
                            <button type="button" class="close" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </a>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="fotolama" value="<?= $student_detail['foto'] ?>">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" required autocomplete="off" autofocus id="nim" name="nim" value="<?= $student_detail['nim'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" required autocomplete="off" id="nama" name="nama" value="<?= $student_detail['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" required autocomplete="off" id="jurusan" name="jurusan" value="<?= $student_detail['jurusan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Angkatan</label>
                            <input type="text" class="form-control" required autocomplete="off" id="angkatan" name="angkatan" value="<?= $student_detail['angkatan'] ?>">
                        </div>
                        <div class="custom-file">
                            <label for="foto">Foto</label>
                            <img src="img/<?= $student_detail['foto'] ?>" alt="<?= $student_detail['nama'] ?>" class="img-fluid" width="250px">
                            <input type="file" class="form-control-file" id="fotobaru" name="foto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php" class="btn btn-secondary text-decoration-none text-white">Close</a>
                        <button type="submit" id="update" class="btn btn-primary" name="update">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif ?>

<!--  Modal 6: Pemberitahuan setelah pemberitahuan  -->
<?php if (isset($_POST['update'])): ?>
    <div class="modal fade" id="updateModal2" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Pemberitahuan</h5>
                    <a href="index.php" class="text-decoration-none">
                        <button type="button" class="close" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </a>
                </div>
                <div class="modal-body text-center">
                    <?php try { ?>
                        <?php if(update() >= 0): ?>
                            <h5 class="text-success">Data berhasil diupdate!</h5>
                        <?php else: ?>
                            <h5>Gagal mengupdate data!</h5>
                            <h5 class="text-danger"><?= mysqli_error($link)  ?></h5>
                        <?php endif ?>
                    <?php } catch (\RuntimeException $exception) { ?>
                        <h5>Gagal mengupdate data,!</h5>
                        <h5 class="text-danger">Exception! <?= $exception->getMessage() ?></h5>
                    <?php }?>
                </div>
                <div class="modal-footer">
                    <a href="index.php" type="button" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
