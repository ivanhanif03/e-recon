<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Hak Akses</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="card shadow-none border-none">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Data Hak Akses</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-3">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-3 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-hak-akses"
                                        data-backdrop="static" class="btn btn-block bg-primary">Tambah Hak Akses<i
                                            class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableHakAkses" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hak Akses</th>
                                        <th>Username</th>
                                        <!-- <th>Hak Akses</th> -->
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($hak_akses as $ha) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $ha['name']; ?></td>
                                        <td><?= $ha['username']; ?></td>
                                        <td class="text-center">
                                            <!-- Edit -->
                                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-backdrop="static" data-target="#modal-tambah-regional"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            <!-- Delete -->
                                            <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-backdrop="static" data-target="#modal-hapus-regional"><i
                                                    class=" nav-icon fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Hak Akses</th>
                                        <th>Username</th>
                                        <!-- <th>Hak Akses</th> -->
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

<!-- Modal Input -->
<div class="modal fade" id="modal-tambah-hak-akses">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Hak Akses</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="tambah-order">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Username</label>
                                <select class="form-control select2bs4 text-sm" name="username" id="username"
                                    style="width: 100%;">
                                    <option disabled="disabled" selected="selected">Pilih Username</option>
                                    <option>adminsatu</option>
                                    <option>admindua</option>
                                    <option>telkomsatu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hak Akses</label>
                                <select class="form-control select2bs4 text-sm" name="outlet" id="outlet"
                                    style="width: 100%;">
                                    <option disabled="disabled" selected="selected">Pilih Hak Akses</option>
                                    <option>Admin</option>
                                    <option>User BTN</option>
                                    <option>User Provider</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex bd-highlight">
                    <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary swalSaveSuccess" data-dismiss="modal">Simpan</button>
                </div>
        </div>
        </form>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modal-hapus-user">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger swalDeleteSuccess" data-dismiss="modal">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(function () {
        $("#tableHakAkses").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableHakAkses_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>