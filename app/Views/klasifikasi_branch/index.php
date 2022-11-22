<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Klasifikasi Branch</h1>
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
                                    <h3 class="card-title">Daftar Klasifikasi Branch</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-klasifikasi"
                                        data-backdrop="static" class="btn btn-block bg-primary">Tambah Klasifikasi<i
                                            class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableKlasifikasiBranch" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Klasifikasi Branch</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($klasifikasi as $reg) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $reg['kode_regional']; ?></td>
                                        <td><?= $reg['nama_regional']; ?></td>
                                        <td class="text-center">
                                            <!-- Edit -->
                                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-backdrop="static"
                                                data-target="#modal-edit-regional<?= $reg['id']; ?>"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            <!-- Delete -->
                                            <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-backdrop="static"
                                                data-target="#modal-hapus-regional<?= $reg['id']; ?>"><i
                                                    class=" nav-icon fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Start Modal Delete -->
                                    <div class="modal fade" id="modal-hapus-regional<?= $reg['id'] ?>">
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
                                                        <?= $reg['nama_regional']; ?>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Batal</button>
                                                    <form action="/regional/<?= $reg['id']; ?>" method="post">
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
                                    <div class="modal fade" id="modal-edit-regional<?= $reg['id']; ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content border-0">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Form Edit Regional</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/regional/update/<?= $reg['id']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="kode_regional">Kode Regional</label>
                                                                    <input type="text"
                                                                        class="form-control text-sm <?= ($validation->hasError('kode_regional')) ? 'is-invalid' : ''; ?>"
                                                                        name="kode_regional" id="kode_regional"
                                                                        placeholder="Masukkan kode regional"
                                                                        maxlength="3"
                                                                        value="<?= $reg['kode_regional']; ?>"
                                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                                                        autofocus required>
                                                                    <div class="invalid-feedback">
                                                                        <?= $validation->getError('kode_regional'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_regional">Nama Regional</label>
                                                                    <input type="text"
                                                                        class="form-control text-sm <?= ($validation->hasError('nama_regional')) ? 'is-invalid' : ''; ?>"
                                                                        name="nama_regional" id="nama_regional"
                                                                        placeholder="Masukkan nama regional"
                                                                        value="<?= $reg['nama_regional']; ?>" required>
                                                                    <div class="invalid-feedback">
                                                                        <?= $validation->getError('nama_regional'); ?>
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
                                        <th>Kode Regional</th>
                                        <th>Nama Regional</th>
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
<div class="modal fade" id="modal-tambah-regional">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Regional</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/regional/save" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kode_regional">Kode Regional</label>
                                <input type="text" class="form-control text-sm" name="kode_regional" id="kode_regional"
                                    placeholder="Masukkan kode regional" maxlength="3"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                    autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="nama_regional">Nama Regional</label>
                                <input type="text" class="form-control text-sm" name="nama_regional" id="nama_regional"
                                    placeholder="Masukkan nama regional" required>
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
        $("#tableRegional").DataTable({
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
        }).buttons().container().appendTo('#tableRegional_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>