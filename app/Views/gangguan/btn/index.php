<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Gangguan Jaringan</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="card shadow-none border-0">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Daftar Gangguan</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-gangguan" data-backdrop="static" class="btn btn-block bg-primary">Input Gangguan<i class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableGangguan" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor Tiket</th>
                                        <th>Nama Gangguan</th>
                                        <th>Link</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Status</th>
                                        <th>Approval</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gangguan as $g) : ?>
                                        <tr>
                                            <td><?= $g['no_tiket']; ?></td>
                                            <td><?= $g['nama_gangguan']; ?></td>
                                            <td><?= $g['nama_link']; ?></td>
                                            <td><?= date("d-m-Y H:i:s", strtotime($g['start'])); ?></td>
                                            <td><?= date("d-m-Y H:i:s", strtotime($g['end'])); ?></td>
                                            <td><span class="badge badge-pill badge-success"><?= $g['kategori']; ?></span></td>
                                            <td><?= $g['approval']; ?></td>
                                            <td class="text-center">
                                                <!-- Edit -->
                                                <a href="/gangguan/edit/<?= $g['id'] ?>" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-backdrop="static" data-target="#modal-edit-gangguan<?= $g['id']; ?>"><i class="nav-icon fas fa-edit"></i></a>
                                                <!-- Delete -->
                                                <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-backdrop="static" data-target="#modal-hapus-gangguan<?= $g['id']; ?>"><i class=" nav-icon fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="modal-hapus-gangguan<?= $g['id'] ?>">
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
                                                            <?= $g['no_tiket']; ?>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                        <form action="/gangguan/<?= $g['id']; ?>" method="post">
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
                                        <div class="modal fade" id="modal-edit-gangguan<?= $g['id']; ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Edit Gangguan</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/gangguanBtn/update/<?= $g['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="nama_link">Nama
                                                                            Gangguan</label>
                                                                        <input type="text" class="form-control text-sm <?= ($validation->hasError('nama_gangguan')) ? 'is-invalid' : ''; ?>" name="nama_gangguan" id="nama_gangguan" placeholder="Masukkan nama gangguan" value="<?= $g['nama_gangguan']; ?>" required>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('nama_gangguan'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_link">Detail</label>
                                                                        <textarea type="text" class="form-control text-sm name=" detail" id="detail" placeholder="Masukkan detail" required><?= $g['detail']; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Link</label>
                                                                        <select class="form-control select2bs4 text-sm <?= ($validation->hasError('link')) ? 'is-invalid' : ''; ?>" name="link" id="link" style="width: 100%;">
                                                                            <option disabled="disabled" selected="selected">
                                                                                Pilih Link</option>
                                                                            <?php foreach ($link as $l) : ?>
                                                                                <option value="<?= $l['id']; ?>" <?php if ($l['nama_link'] == $g['nama_link']) : ?>selected<?php endif; ?>>
                                                                                    <?= $l['nama_link']; ?></option>
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
                                        <th>Nomor Tiket</th>
                                        <th>Nama Gangguan</th>
                                        <th>Link</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Status</th>
                                        <th>Approval</th>
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
<div class="modal fade" id="modal-tambah-gangguan">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Gangguan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/gangguanBtn/save" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" id="kode_provider" name="kode_provider" value="kode">
                            <input type="hidden" id="approval" name="approval">
                            <div class="form-group">
                                <label for="nama_gangguan">Nama Gangguan</label>
                                <input type="text" class="form-control text-sm" name="nama_gangguan" id="nama_gangguan" placeholder="Masukkan nama gangguan" required>
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail</label>
                                <textarea type="text" class="form-control text-sm" name="detail" id="detail" placeholder="Masukkan detail" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <select class="form-control select2bs4 text-sm <?= ($validation->hasError('link')) ? 'is-invalid' : ''; ?>" name="link" id="link" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Link</option>
                                    <?php foreach ($link as $l) : ?>
                                        <!-- <option hidden="hidden" value="<?= $l['nama_link']; ?>"></option> -->
                                        <option value="<?= $l['id'] . "_" . $l['nama_link']; ?>">
                                            <?= $l['nama_link']; ?>
                                        </option>
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
        $("#tableGangguan").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print",
                "colvis"
            ]
        }).buttons().container().appendTo(
            '#tableGangguan_wrapper .col-md-6:eq(0)');
    });
</script>
<?php foreach ($gangguan as $g) : ?>
    <script>
        $("#link").select2({
            dropdownParent: $('#modal-edit-gangguan<?= $g['id'] ?>')
        });
    </script>
<?php endforeach; ?>

<?= $this->endSection(); ?>