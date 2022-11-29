<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Link</h1>
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
                                    <h3 class="card-title">Daftar Link</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-link" data-backdrop="static" class="btn btn-block bg-primary">Tambah Link<i class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableLink" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Link</th>
                                        <th>Branch</th>
                                        <th>Provider</th>
                                        <th>PIC</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($link as $l) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $l['nama_link']; ?></td>
                                            <td><?= $l['nama_branch']; ?></td>
                                            <td><?= $l['nama_provider']; ?></td>
                                            <td><?= $l['fullname']; ?></td>
                                            <td class="text-center">
                                                <!-- Edit -->
                                                <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-backdrop="static" data-target="#modal-edit-link<?= $l['id']; ?>"><i class="nav-icon fas fa-edit"></i></a>
                                                <!-- Delete -->
                                                <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-backdrop="static" data-target="#modal-hapus-link<?= $l['id']; ?>"><i class=" nav-icon fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="modal-hapus-link<?= $l['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Anda yakin ingin menghapus data?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $l['nama_link']; ?>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                        <form action="/link/<?= $l['id']; ?>" method="post">
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
                                        <div class="modal fade" id="modal-edit-link<?= $l['id']; ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Edit Link</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/link/update/<?= $l['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="nama_link">Nama
                                                                            Link</label>
                                                                        <input type="text" class="form-control text-sm <?= ($validation->hasError('nama_link')) ? 'is-invalid' : ''; ?>" name="nama_link" id="nama_link" placeholder="Masukkan nama link" value="<?= $l['nama_link']; ?>" required>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('nama_link'); ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Branch</label>
                                                                        <select class="form-control select2bs4 text-sm" name="nama_branch" id="nama_branch" style="width: 100%;">
                                                                            <option disabled="disabled" selected="selected">
                                                                                Pilih Branch
                                                                            </option>
                                                                            <?php foreach ($branch as $b) : ?>
                                                                                <option value="<?= $b['id']; ?>" <?php if ($b['nama_branch'] == $l['nama_branch']) : ?>selected<?php endif; ?>>
                                                                                    <?= $b['nama_branch']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Provider</label>
                                                                        <select class="form-control select2bs4 text-sm" name="nama_provider" id="nama_provider" style="width: 100%;">
                                                                            <option disabled="disabled" selected="selected">
                                                                                Pilih Provider
                                                                            </option>
                                                                            <?php foreach ($provider as $p) : ?>
                                                                                <option value="<?= $p['id']; ?>" <?php if ($p['nama_provider'] == $l['nama_provider']) : ?>selected<?php endif; ?>>
                                                                                    <?= $p['nama_provider']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>PIC</label>
                                                                        <select class="form-control select2bs4 text-sm" name="fullname" id="fullname" style="width: 100%;">
                                                                            <option disabled="disabled" selected="selected">
                                                                                Pilih PIC
                                                                            </option>
                                                                            <?php foreach ($users as $u) : ?>
                                                                                <option value="<?= $u['id']; ?>" <?php if ($u['fullname'] == $l['fullname']) : ?>selected<?php endif; ?>>
                                                                                    <?= $u['fullname']; ?></option>
                                                                            <?php endforeach; ?>
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
                                        <!-- End Modal Edit -->
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Link</th>
                                        <th>Branch</th>
                                        <th>Provider</th>
                                        <th>PIC</th>
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
<div class="modal fade" id="modal-tambah-link">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Link</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/link/save" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama_link">Nama Link</label>
                                <input type="text" class="form-control text-sm" name="nama_link" id="nama_link" placeholder="Masukkan nama link" required>
                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <select class="form-control select2bs4 text-sm <?= ($validation->hasError('nama_branch')) ? 'is-invalid' : ''; ?>" name="nama_branch" id="nama_branch" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Nama Branch</option>
                                    <?php foreach ($branch as $b) : ?>
                                        <option value="<?= $b['id']; ?>">
                                            <?= $b['nama_branch']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Provider</label>
                                <select class="form-control select2bs4 text-sm <?= ($validation->hasError('nama_provider')) ? 'is-invalid' : ''; ?>" name="nama_provider" id="nama_provider" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Nama Provider</option>
                                    <?php foreach ($provider as $p) : ?>
                                        <option value="<?= $p['id']; ?>">
                                            <?= $p['nama_provider']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>PIC</label>
                                <select class="form-control select2bs4 text-sm <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" name="fullname" id="fullname" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Nama PIC</option>
                                    <?php foreach ($users as $u) : ?>
                                        <option value="<?= $u['id']; ?>">
                                            <?= $u['fullname']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
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
    $(function() {
        $("#tableLink").DataTable({
            "columnDefs": [{
                "width": "8%",
                "targets": 0
            }],
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            // "searching": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableLink_wrapper .col-md-6:eq(0)');
    });
</script>
<?php foreach ($link as $l) : ?>
    <script>
        $("#nama_branch").select2({
            dropdownParent: $('#modal-edit-link<?= $l['id'] ?>')
        });
        $("#nama_provider").select2({
            dropdownParent: $('#modal-edit-link<?= $l['id'] ?>')
        });
        $("#fullname").select2({
            dropdownParent: $('#modal-edit-link<?= $l['id'] ?>')
        });
    </script>
<?php endforeach; ?>
<?= $this->endSection(); ?>