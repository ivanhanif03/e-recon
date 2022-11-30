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
                                                <?php if ($g['id_status'] === '1') : ?>
                                                badge-warning
                                                <?php elseif ($g['id_status'] === '2') : ?>
                                                badge-primary
                                                <?php elseif ($g['id_status'] === '3') : ?>
                                                badge-danger
                                                <?php elseif ($g['id_status'] === '4') : ?>
                                                badge-secondary
                                                <?php else : ?>
                                                badge-success
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
                                                <?php if ($g['id_status'] == 1) : ?>
                                                    <!-- Sumbmit -->
                                                    <a href="" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-backdrop="static" data-target="#modal-submit-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Sumbit Perbaikan" class="nav-icon fas fa-check-square"></i></a>
                                                <?php else : ?>
                                                    <!-- Detail -->
                                                    <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modal-detail-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Detail" class="nav-icon fas fa-list"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Detail -->
                                        <div class="modal fade" id="modal-detail-gangguan<?= $g['id']; ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Data Detail Gangguan</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Nomor Tiker</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <b>
                                                                            <?= $g['no_tiket']; ?>
                                                                        </b>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Nama Gangguan</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <?= $g['nama_gangguan']; ?>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Link</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <?= $g['nama_link']; ?>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Detail Gangguan</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <?= $g['detail']; ?>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Start</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8 text-primary">
                                                                        <?= $g['start']; ?>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3 ">
                                                                        <b>End</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8 text-danger">
                                                                        <?= $g['end']; ?>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Status</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <span class="badge badge-pill text-uppercase 
                                                                        <?php if ($g['id_status'] === '1') : ?>
                                                                        badge-warning
                                                                        <?php elseif ($g['id_status'] === '2') : ?>
                                                                        badge-primary
                                                                        <?php elseif ($g['id_status'] === '3') : ?>
                                                                        badge-danger
                                                                        <?php elseif ($g['id_status'] === '4') : ?>
                                                                        badge-secondary
                                                                        <?php else : ?>
                                                                        badge-success
                                                                        <?php endif ?>">
                                                                            <?= $g['kategori']; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Keterangan Submit</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <?= $g['keterangan_submit']; ?>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Bukti Submit</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <img class="rounded" src="<?= base_url('img_submit') . '/' . $g['bukti_submit']; ?>" alt="Bukti Submit" width="100%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Detail -->

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
                                                    <form action="<?= base_url('gangguanprovider/submit') . '/' . $g['id']; ?>" method="post" enctype="multipart/form-data">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="keterangan_submit">Keterangan Perbaikan</label>
                                                                        <textarea class="form-control text-sm" rows="3" name="keterangan_submit" id="keterangan_submit" placeholder="Masukkan keterangan perbaikan" <?= ($validation->hasError('keterangan_submit')) ? 'is-invalid' : ''; ?> required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('keterangan_submit'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="bukti_submit">Foto Bukti Perbaikan</label>
                                                                        <input type="file" name="bukti_submit" id="bukti_submit" class="form-control-file" <?= ($validation->hasError('bukti_submit')) ? 'is-invalid' : ''; ?>>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('bukti_submit'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex bd-highlight">
                                                            <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
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