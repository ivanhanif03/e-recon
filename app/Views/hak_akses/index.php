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
                                    <h3 class="card-title">Daftar Hak Akses</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-3">

                                </div>
                                <!-- <div class="col-sm-4 col-md-4 col-lg-3 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-hak-akses"
                                        data-backdrop="static" class="btn btn-block bg-primary">Tambah Hak Akses<i
                                            class="fa fa-plus-circle ml-2"></i>
                                    </button>
                                </div> -->
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableHakAkses" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Hak Akses</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($hak_akses as $ha) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $ha['username']; ?></td>
                                        <td><?= $ha['name']; ?></td>
                                        <td class="text-center">
                                            <!-- Edit -->
                                            <a href="/hak_akses/edit/<?= $ha['user_id']; ?>"
                                                class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-backdrop="static"
                                                data-target="#modal-edit-hak-akses<?= $ha['user_id'] ?>"><i
                                                    class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <!-- Delete -->
                                            <!-- <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-target="#modal-hapus-hak-akses<?= $ha['user_id'] ?>"><i
                                                    class=" nav-icon fas fa-trash"></i>
                                            </a> -->
                                        </td>
                                    </tr>

                                    <!-- Start Modal Delete -->
                                    <div class="modal fade" id="modal-hapus-hak-akses<?= $ha['user_id'] ?>">
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
                                                    <span>Anda yakin ingin menghapus hak akses?</span><br>
                                                    <span class="text-capitalize font-weight-bolder text-primary">
                                                        <?= $ha['username']; ?> <br>
                                                        <?= $ha['name']; ?> <br>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Batal</button>
                                                    <form action="/hak_akses/<?= $ha['user_id']; ?>" method="post">
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
                                    <div class="modal fade" id="modal-edit-hak-akses<?= $ha['user_id'] ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ubah Hak Akses</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/hakakses/update/<?= $ha['user_id'] ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="username">Username</label>
                                                                    <input type="hidden" name="user_id" id="user_id"
                                                                        value="<?= $ha['user_id']; ?>">
                                                                    <input type="text" class="form-control text-sm"
                                                                        name="username" id="username"
                                                                        value="<?= $ha['username']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Hak Akses</label>
                                                                    <select class="form-control select2bs4 text-sm"
                                                                        name="group_id" id="group_id"
                                                                        style="width: 100%;">
                                                                        <option disabled="disabled" selected="selected">
                                                                            Pilih Hak Akses
                                                                        </option>
                                                                        <?php foreach ($role as $r) : ?>
                                                                        <option value="<?= $r['id']; ?>"
                                                                            <?php if ($r['name'] == $ha['name']) : ?>selected<?php endif; ?>>
                                                                            <?= $r['name']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex bd-highlight">
                                                        <button type="button" class="btn btn-danger mr-auto"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Modal Edit -->
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Hak Akses</th>
                                        <th style=" width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
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

<!-- Start Modal Edit -->
<div class="modal fade" id="modal-tambah-hak-akses">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Hak Akses</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/hakakses/save" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <select class="form-control select2bs4 text-sm" name="user_id" id="user_id"
                                    style="width: 100%;">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Username
                                    </option>
                                    <?php foreach ($pengguna as $p) : ?>
                                    <option value="<?= $p['id']; ?>"
                                        <?php if($p['username'] == $ha['username']) : ?>hidden <?php endif; ?>>
                                        <?= $p['username']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hak Akses</label>
                                <select class="form-control select2bs4 text-sm" name="group_id" id="group_id"
                                    style="width: 100%;">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Hak Akses
                                    </option>
                                    <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id']; ?>"
                                        <?php if ($r['name'] == $ha['name']) : ?>selected<?php endif; ?>>
                                        <?= $r['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex bd-highlight">
                    <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- End Modal Edit -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(function () {
        $("#tableHakAkses").DataTable({
            "columnDefs": [{
                "width": "5%",
                "targets": 0
            }],
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableHakAkses_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>