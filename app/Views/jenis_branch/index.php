<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Jenis Branch</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert" id="alert-delete">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="card shadow-none border-none mt-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Jenis Branch</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-jenis_branch"
                                        data-backdrop="static" class="btn btn-block bg-primary">Tambah Jenis Branch<i
                                            class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableJenisBranch" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Branch</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($jenisBranch as $jb) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $i++; ?></td>
                                        <td class="align-middle"><?= $jb['jenis_branch']; ?></td>
                                        <td class="text-center">
                                            <!-- Edit -->
                                            <a href="/jenis_branch/edit/<?= $jb['id']; ?>"
                                                class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-backdrop="static"
                                                data-target="#modal-edit-jenis_branch<?= $jb['id'] ?>"><i
                                                    class="nav-icon fas fa-edit"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-target="#modal-hapus-jenis_branch<?= $jb['id'] ?>"><i
                                                    class=" nav-icon fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Start Modal Delete -->
                                    <div class="modal fade" id="modal-hapus-jenis_branch<?= $jb['id'] ?>">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content border-0">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <span>Anda yakin ingin menghapus data?</span><br>
                                                    <span class="text-capitalize font-weight-bolder text-primary">
                                                        <?= $jb['jenis_branch']; ?>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Batal</button>
                                                    <form action="/jenis_branch/<?= $jb['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Delete -->

                                    <!-- Start Modal Edit -->
                                    <div class="modal fade" id="modal-edit-jenis_branch<?= $jb['id']; ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content border-0">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Form Edit Jenis Branch</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/jenis_branch/update/<?= $jb['id']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="jenis_branch">Jenis Branch</label>
                                                                    <input type="text"
                                                                        class="form-control text-sm <?= ($validation->hasError('jenis_branch')) ? 'is-invalid' : ''; ?>"
                                                                        name="jenis_branch" id="jenis_branch"
                                                                        placeholder="Masukkan jenis branch"
                                                                        maxlength="3"
                                                                        value="<?= $jb['jenis_branch']; ?>" autofocus
                                                                        required>
                                                                    <div class="invalid-feedback">
                                                                        <?= $validation->getError('jenis_branch'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex bd-highlight">
                                                        <button type="button" class="btn btn-danger mr-auto"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                        <!-- swalSaveSuccess -->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Edit -->

                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Branch</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Modal Input -->
<div class="modal fade" id="modal-tambah-jenis_branch">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Jenis Branch</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/jenis_branch/save" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="jenis_branch">Jenis Branch</label>
                                <input type="text"
                                    class="form-control text-sm <?= ($validation->hasError('jenis_branch')) ? 'is-invalid' : ''; ?>"
                                    name="jenis_branch" id="jenis_branch" maxlength="3" minlength="3"
                                    style="text-transform:uppercase" autofocus required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenis_branch'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex bd-highlight">
                    <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Input -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(function () {
        $("#tableJenisBranch").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableJenisBranch_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>