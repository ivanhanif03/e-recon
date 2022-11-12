<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Daftar User</h1>
                    <!-- <h1 class="mb-4">Daftar User</h1> -->
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="card shadow-none border-none mt-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Data Order</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-user"
                                        data-backdrop="static" class="btn btn-block bg-primary">Tambah User<i
                                            class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableOrder" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Foto</th> -->
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <!-- <th>Alamat</th> -->
                                        <th>Provider</th>
                                        <th>Hak Akses</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($user as $u) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $i++; ?></td>
                                        <!-- <td class="align-middle text-capitalize"><img src="/img/<?= $u['user_image']; ?>" class="img-circle" width="50" alt="User Image"></td> -->
                                        <td class="align-middle text-capitalize"><?= $u['fullname']; ?></td>
                                        <td class="align-middle"><?= $u['email']; ?></td>
                                        <td class="align-middle"><?= $u['no_hp']; ?></td>
                                        <!-- <td class="align-middle text-capitalize"><?= $u['alamat']; ?></td> -->
                                        <td class="align-middle text-capitalize"><?= $u['provider']; ?></td>
                                        <td class="align-middle text-capitalize"><?= $u['hak_akses']; ?></td>
                                        <td class="text-center">
                                            <!-- Edit -->
                                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-backdrop="static" data-target="#modal-tambah-user"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            <!-- Delete -->
                                            <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-backdrop="static" data-target="#modal-hapus-user"><i
                                                    class=" nav-icon fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Foto</th> -->
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <!-- <th>Alamat</th> -->
                                        <th>Provider</th>
                                        <th>Hak Akses</th>
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
<div class="modal fade" id="modal-tambah-user">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= url_to('register') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email"><?=lang('Auth.email')?></label>
                                <input type="email"
                                    class="form-control text-sm <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                    name="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan email"
                                    value="<?= old('email') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text"
                                    class="form-control text-sm <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                    name="username" id="username" placeholder="Masukkan username"
                                    value="<?= old('username') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><?=lang('Auth.password')?></label>
                                <input type="password"
                                    class="form-control text-sm <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                    name="password" id="password" placeholder="Masukkan password" autocomplete="off"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                                <input type="password"
                                    class="form-control text-sm <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                    name="pass_confirm" id="pass_confirm" placeholder="Masukkan ulang password"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input type="text"
                                    class="form-control text-sm <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>"
                                    name="fullname" id="fullname" placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor Handphone</label>
                                <input type="text"
                                    class="form-control text-sm <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>"
                                    name="no_hp" id="no_hp" placeholder="Masukkan nomor handphone" maxlength="13"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea
                                    class="form-control text-sm <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>"
                                    name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Provider</label>
                                <!-- <select class="form-control select2bs4 text-sm" name="provider" id="provider" -->
                                <select
                                    class="form-control text-sm <?php if (session('errors.provider')) : ?>is-invalid<?php endif ?>"
                                    name="provider" id="provider" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">Pilih Provider</option>
                                    <option value="btn">BTN</option>
                                    <option value="telkom">Telkom</option>
                                    <option value="lintasarta">Lintasarta</option>
                                    <option value="tigatra">Tigatra</option>
                                    <option value="primalink">Primalink</option>
                                    <option value="ipwan">IPWAN</option>
                                    <option value="iforte">IForte</option>
                                    <option value="mile">MILE</option>
                                    <option value="bas">BAS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hak Akses</label>
                                <select
                                    class="form-control text-sm <?php if (session('errors.hak_akses')) : ?>is-invalid<?php endif ?>"
                                    name="hak_akses" id="hak_akses" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">Pilih Hak Akses</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex bd-highlight">
                    <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <!-- swalSaveSuccess -->
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modal-hapus-user">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border-0">
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
                <button type="button" class="btn btn-danger " data-dismiss="modal">Hapus</button>
                <!-- swalDeleteSuccess -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(function () {
        $("#tableOrder").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableOrder_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>