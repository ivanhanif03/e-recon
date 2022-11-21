<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Provider</h1>
                    <!-- <h1 class="mb-4">Daftar User</h1> -->
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
                                    <h3 class="card-title">Data Provider</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-provider"
                                        data-backdrop="static" class="btn btn-block bg-primary">Tambah Provider<i
                                            class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableProvider" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Provider</th>
                                        <th>Nama Provider</th>
                                        <th>Alamat</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($provider as $p) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $i++; ?></td>
                                        <td class="align-middle"><?= $p['kode_provider']; ?></td>
                                        <td class="align-middle"><?= $p['nama_provider']; ?></td>
                                        <td class="align-middle"><?= $p['alamat']; ?></td>
                                        <td class="text-center">
                                            <!-- Edit -->
                                            <a href="/provider/edit/<?= $p['id']; ?>"
                                                class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-backdrop="static"
                                                data-target="#modal-edit-provider<?= $p['id'] ?>"><i
                                                    class="nav-icon fas fa-edit"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-target="#modal-hapus-provider<?= $p['id'] ?>"><i
                                                    class=" nav-icon fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Start Modal Delete -->
                                    <div class="modal fade" id="modal-hapus-provider<?= $p['id'] ?>">
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
                                                        <?= $p['nama_provider']; ?>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Batal</button>
                                                    <form action="/provider/<?= $p['id']; ?>" method="post">
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
                                    <div class="modal fade" id="modal-edit-provider<?= $p['id']; ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content border-0">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Form Edit Provider</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/provider/update/<?= $p['id']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="kode_provider">Kode Provider</label>
                                                                    <input type="text" class="form-control text-sm"
                                                                        name="kode_provider" id="kode_provider"
                                                                        placeholder="Masukkan kode provider"
                                                                        maxlength="3"
                                                                        value="<?= $p['kode_provider']; ?>" autofocus
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_provider">Nama Provider</label>
                                                                    <input type="text" class="form-control text-sm"
                                                                        name="nama_provider" id="nama_provider"
                                                                        placeholder="Masukkan nama provider"
                                                                        value="<?= $p['nama_provider']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <textarea class="form-control text-sm" name="alamat"
                                                                        id="alamat" rows="3"
                                                                        placeholder="Masukkan alamat"
                                                                        required><?= $p['alamat']; ?></textarea>
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
                                        <th>Kode Provider</th>
                                        <th>Nama Provider</th>
                                        <th>Alamat</th>
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
<div class="modal fade" id="modal-tambah-provider">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Provider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/provider/save" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kode_provider">Kode Provider</label>
                                <input type="text" class="form-control text-sm" name="kode_provider" id="kode_provider"
                                    placeholder="Masukkan kode provider" maxlength="3" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="nama_provider">Nama Provider</label>
                                <input type="text" class="form-control text-sm" name="nama_provider" id="nama_provider"
                                    placeholder="Masukkan nama provider" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control text-sm" name="alamat" id="alamat" rows="3"
                                    placeholder="Masukkan alamat" required></textarea>
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
        $("#tableProvider").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableProvider_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>