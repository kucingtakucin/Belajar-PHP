<!--  Modal 3: Konfirmasi untuk delete  -->
<?php if (!isset($_GET['status'])): ?>
    <div class="modal fade" id="exampleModal3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    Apakah kamu yakin untuk menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="index.php?id=<?= $student['id'] ?>&status=delete" class="btn btn-danger">Oke</a>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<!--  Modal 4: Pemberitahuan setelah delete data  -->
<?php if (isset($_GET['id'], $_GET['status']) && $_GET['status'] === 'delete'): ?>
    <div class="modal fade" id="exampleModal4" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                    <a href="index.php" class="text-decoration-none">
                        <button type="button" class="close" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </a>
                </div>
                <div class="modal-body text-center">
                    <?php if (delete($_GET['id'])): ?>
                        <h5 class="text-success">Data berhasil dihapus!</h5>
                    <?php else: ?>
                        <h5>Gagal menghapus data!</h5>
                        <h5 class="text-danger"><?= mysqli_error($link) ?></h5>
                    <?php endif ?>
                </div>
                <div class="modal-footer">
                    <a href="index.php" type="button" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>