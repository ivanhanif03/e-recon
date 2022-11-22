<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Branch</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert" id="alert-delete">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="card shadow-none border-none">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Daftar Branch</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-regional"
                                        data-backdrop="static" class="btn btn-block bg-primary">Tambah Branch<i
                                            class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableBranch" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Branch</th>
                                        <th>Nama Branch</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($branch as $brch) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $brch['kode_branch']; ?></td>
                                        <td><?= $brch['nama_branch']; ?></td>
                                        <td><?= $brch['alamat']; ?></td>
                                        <td><?= $brch['no_telp']; ?></td>
                                        <td class="text-center">
                                            <!-- Edit -->
                                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-backdrop="static"
                                                data-target="#modal-edit-branch<?= $brch['id']; ?>"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            <!-- Delete -->
                                            <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-backdrop="static"
                                                data-target="#modal-hapus-branch<?= $brch['id']; ?>"><i
                                                    class=" nav-icon fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Start Modal Delete -->
                                    <div class="modal fade" id="modal-hapus-branch<?= $brch['id'] ?>">
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
                                                        <?= $brch['nama_branch']; ?>
                                                        <?= $brch['alamat']; ?>
                                                        <?= $brch['no_telp']; ?>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Batal</button>
                                                    <form action="/branch/<?= $brch['id']; ?>" method="post">
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
                                    <div class="modal fade" id="modal-edit-branch<?= $brch['id']; ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content border-0">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Form Edit Branch</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/branch/update/<?= $brch['id']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="kode_branch">Kode Branch</label>
                                                                    <input type="text"
                                                                        class="form-control text-sm <?= ($validation->hasError('kode_branch')) ? 'is-invalid' : ''; ?>"
                                                                        name="kode_branch" id="kode_branch"
                                                                        placeholder="Masukkan kode branch"
                                                                        maxlength="3"
                                                                        value="<?= $brch['kode_branch']; ?>"
                                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                                                        autofocus required>
                                                                    <div class="invalid-feedback">
                                                                        <?= $validation->getError('kode_branch'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_branch">Nama Branch</label>
                                                                    <input type="text"
                                                                        class="form-control text-sm <?= ($validation->hasError('nama_branch')) ? 'is-invalid' : ''; ?>"
                                                                        name="nama_branch" id="nama_branch"
                                                                        placeholder="Masukkan nama branch"
                                                                        value="<?= $brch['nama_branch']; ?>" required>
                                                                    <div class="invalid-feedback">
                                                                        <?= $validation->getError('nama_branch'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <input type="text"
                                                                        class="form-control text-sm <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                                                                        name="alamat" id="alamat"
                                                                        placeholder="Masukkan Alamat"
                                                                        value="<?= $brch['alamat']; ?>" required>
                                                                    <div class="invalid-feedback">
                                                                        <?= $validation->getError('alamat'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_telp">No Telp</label>
                                                                    <input type="text"
                                                                        class="form-control text-sm <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>"
                                                                        name="no_telp" id="no_telp"
                                                                        placeholder="Masukkan nomor telpon"
                                                                        value="<?= $brch['no_telp']; ?>" required>
                                                                    <div class="invalid-feedback">
                                                                        <?= $validation->getError('no_telp'); ?>
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
                                        <th>Kode Branch</th>
                                        <th>Nama Branch</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
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
<div class="modal fade" id="modal-tambah-branch">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Branch</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/branch/save" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kode_branch">Kode Branch</label>
                                <input type="text" class="form-control text-sm" name="kode_branch" id="kode_branch"
                                    placeholder="Masukkan kode branch" maxlength="3"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                    autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="nama_branch">Nama Branch</label>
                                <input type="text" class="form-control text-sm" name="nama_branch" id="nama_branch"
                                    placeholder="Masukkan nama branch" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control text-sm" name="alamat" id="alamat"
                                    placeholder="Masukkan alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input type="text" class="form-control text-sm" name="no_telp" id="no_telp"
                                    placeholder="Masukkan nomor telpon" required>
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
        $("#tableBranch").DataTable({
            "columnDefs": [{
                "width": "8%",
                "targets": 0
            }],
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableBranch_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>