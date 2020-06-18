<!--  Modal 3: Konfirmasi untuk delete  -->
<?php if (isset($_GET['id'], $_GET['status']) && $_GET['status'] === 'confirm-delete'):
$student_id = $_GET['id']; ?>
    <div class="modal fade" id="deleteModal1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Pemberitahuan</h5>
                    <a href="index.php" class="text-decoration-none">
                        <button type="button" class="close" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </a>
                </div>
                <div class="modal-body text-center">
                    Apakah kamu yakin untuk menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="index.php?id=<?= $student_id ?>&status=delete" class="btn btn-danger">Oke</a>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<!--  Modal 4: Pemberitahuan setelah delete data  -->
<?php if (isset($_GET['id'], $_GET['status']) && $_GET['status'] === 'delete'): ?>
    <div class="modal fade" id="deleteModal2" role="dialog" aria-labelledby="deleteModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal2Label">Pemberitahuan</h5>
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