<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Daftar User</h1>

                    <div class="card shadow-none border-none">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Data Order</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-user"
                                        data-backdrop="static" class="btn btn-block bg-primary">Input Order<i
                                            class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableOrder" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor Handphone</th>
                                        <th>Alamat</th>
                                        <th>Provider</th>
                                        <th>Hak Akses</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($user as $p) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['email']; ?></td>
                                        <td><?= $p['no_hp']; ?></td>
                                        <td><?= $p['alamat']; ?></td>
                                        <td><?= $p['provider']; ?></td>
                                        <td><?= $p['hak_akses']; ?></td>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor Handphone</th>
                                        <th>Alamat</th>
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
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="tambah-user">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control text-sm" name="nama" id="nama"
                                    placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control text-sm" name="email" id="email"
                                    placeholder="Masukkan email">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor Handphone</label>
                                <input type="email" class="form-control text-sm" name="no_hp" id="no_hp"
                                    placeholder="Masukkan nomor handphone" maxlength="13"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control text-sm" name="alamat" id="alamat" rows="3"
                                    placeholder="Masukkan alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Provider</label>
                                <!-- <select class="form-control select2bs4 text-sm" name="provider" id="provider" -->
                                <select class="form-control text-sm" name="provider" id="provider" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">Pilih Provider</option>
                                    <option>Telkom</option>
                                    <option>Lintasarta</option>
                                    <option>Tigatra</option>
                                    <option>Primalink</option>
                                    <option>IPWAN</option>
                                    <option>IForte</option>
                                    <option>MILE</option>
                                    <option>BAS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hak Akses</label>
                                <select class="form-control text-sm" name="hak_akses" id="hak_akses"
                                    style="width: 100%;">
                                    <option disabled="disabled" selected="selected">Pilih Hak Akses</option>
                                    <option>Admin</option>
                                    <option>User</option>
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