<!--  Modal 1: Form untuk insert data  -->
<div class="modal fade" id="insertModal1" role="dialog" aria-labelledby="insertModal1Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModal1Label">Insert Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" required id="nim" autocomplete="off" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" required id="nama" autocomplete="off" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" required id="jurusan" autocomplete="off" name="jurusan">
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" required id="angkatan" autocomplete="off" name="angkatan">
                    </div>
                    <div class="custom-file">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" required id="foto" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="insert" class="btn btn-primary" name="insert">Insert Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--  Modal 2: Pemberitahuan setelah insert data  -->
<?php if (isset($_POST['insert'])): ?>
    <div class="modal fade" id="insertModal2" role="dialog" aria-labelledby="insertModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModal2Label">Pemberitahuan</h5>
                    <a href="index.php" class="text-decoration-none">
                        <button type="button" class="close" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </a>
                </div>
                <div class="modal-body text-center">
                <?php try { ?>
                    <?php if (insert($_POST) > 0): ?>
                        <h5 class="text-success">Data berhasil ditambahkan!</h5>
                    <?php else: ?>
                        <h5>Gagal menambahkan data!</h5>
                        <h5 class="text-danger">Error! <?= mysqli_error($link) ?></h5>
                    <?php endif ?>
                <?php } catch (\RuntimeException $exception) { ?>
                    <h5>Gagal menambahkan data!</h5>
                    <h5 class="text-danger">Exception! <?= $exception->getMessage() ?></h5>
                <?php } ?>
                </div>
                <div class="modal-footer">
                    <a href="index.php" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

