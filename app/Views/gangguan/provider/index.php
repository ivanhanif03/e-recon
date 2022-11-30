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
                                            <td class="text-uppercase">
                                                <span class="badge badge-pill 
                                                <?php if ($g['kategori'] === 'on process') : ?>
                                                badge-primary
                                                <?php elseif ($g['kategori'] === 'finish') : ?>
                                                badge-success
                                                <?php elseif ($g['kategori'] === 'stop clock') : ?>
                                                badge-warning
                                                <?php else : ?>
                                                badge-danger
                                                <?php endif ?>">
                                                    <?= $g['kategori']; ?>
                                                </span>
                                            </td>
                                            <td class="text-center"><?php if ($g['approval'] === null) : ?> -
                                                <?php else : ?>
                                                    <?= $g['approval']; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <!-- Sumbmit -->
                                                <a href="" class="btn btn-sm btn-outline-success" data-toggle="modal" data-backdrop="static" data-target="#modal-submit-gangguan<?= $g['id']; ?>"><i class="nav-icon fas fa-clipboard-check"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Edit -->
                                        <div class="modal fade" id="modal-submit-gangguan<?= $g['id']; ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Submit Perbaikan Gangguan</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/gangguanProvider/update/<?= $g['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="nama_link">Keterangan Perbaikan</label>
                                                                        <input type="text" class="form-control text-sm <?= ($validation->hasError('keterangan_submit')) ? 'is-invalid' : ''; ?>" name="keterangan_submit" id="keterangan_submit" placeholder="Masukkan keterangan perbaikan" value="<?= $g['keterangan_submit']; ?>" required>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('keterangan_submit'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Example file input</label>
                                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
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