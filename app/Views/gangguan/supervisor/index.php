<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Approval StopClock Gangguan Jaringan</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert" id="alert-delete">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card shadow-none border-0">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 align-self-center">
                                    <h3 class="card-title">Daftar Gangguan</h3>
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
                                            <td class="text-danger"><?= date("d-m-Y H:i:s", strtotime($g['end'])); ?></td>
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
                                            <td class="text-center"><?php if ($g['approval_stopclock_spv'] === null) : ?> -
                                                <?php else : ?>
                                                    <?= $g['approval_stopclock_spv']; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <!-- STOPCLOCK APPROVED -->
                                                <?php if ($g['approval'] === 'YES') : ?>
                                                    <a href="" class="btn btn-sm btn-outline-primary" data-backdrop="static" data-toggle="modal" data-target="#modal-detail-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Detail" class="nav-icon fas fa-list"></i></a>

                                                    <!-- STATUS SUBMITTED -->
                                                <?php elseif ($g['id_status'] === '2') : ?>
                                                    <!-- Detail -->
                                                    <a href="" class="btn btn-sm btn-outline-primary" data-backdrop="static" data-toggle="modal" data-target="#modal-detail-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Detail" class="nav-icon fas fa-list"></i></a>

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
                                                                <?php if ($g['keterangan_stopclock'] !== null) : ?>
                                                                    <hr>
                                                                    <h6 class="text-danger">
                                                                        <b>
                                                                            Permohonan StopClock
                                                                        </b>
                                                                    </h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Keterangan StopClock</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['keterangan_stopclock']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Start StopClock</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8 text-secondary font-weight-bold">
                                                                            <?= $g['start_stopclock']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Waktu Tambahan</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['extra_time_stopclock']; ?> Jam
                                                                        </div>
                                                                    </div>
                                                                <?php else : ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex bd-highlight">
                                                        <?php if ($g['ket_reject_stopclock_spv'] === null) : ?>
                                                            <!-- Batal -->
                                                            <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal">Batal</button>

                                                            <!-- Reject -->
                                                            <button type="submit" data-toggle="modal" data-target="#modal-reject-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-danger">Reject</button>

                                                            <!-- Approval -->
                                                            <button type="button" data-toggle="modal" data-target="#modal-approval-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-primary">Approval</button>
                                                        <?php elseif (($g['keterangan_reject'] === null) && ($g['approval'] === 'YES')) : ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Detail -->

                                        <!-- Start Modal Confirmation Reject -->
                                        <div class="modal fade" id="modal-reject-gangguan<?= $g['id'] ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <form action="<?= base_url('/gangguanBtn/reject/') . '/' . $g['id']; ?>" method="POST">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Konfirmasi Reject Perbaikan</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <span> <b>Anda yakin ingin menolak perbaikan?</b> </span><br>
                                                            <span class="text-capitalize font-weight-bolder text-primary">
                                                                <?= $g['no_tiket']; ?>
                                                            </span>
                                                            : <?= $g['nama_gangguan']; ?>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group text-left">
                                                                        <label for="detail">Keterangan Reject</label>
                                                                        <textarea type="text" rows="4" class="form-control text-sm" name="keterangan_reject" id="keterangan_reject" placeholder="Masukkan keterangan" required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Setujui</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Confirmation Reject -->

                                        <!-- Start Modal Confirmation Approval -->
                                        <div class="modal fade" id="modal-approval-gangguan<?= $g['id'] ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <form action="<?= base_url('/gangguanSupervisor/approval/') . '/' . $g['id']; ?>">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Konfirmasi Approval StopClock</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <span> <b>Anda yakin ingin menyetujui permohonan?</b> </span><br>
                                                            <span class="text-capitalize font-weight-bolder text-primary">
                                                                <?= $g['no_tiket']; ?>
                                                            </span>
                                                            : <?= $g['nama_gangguan']; ?>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Setujui</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Confirmation Approval -->
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
            "order": [
                [3, 'asc']
            ],
            "responsive": true,
            "lengthChange": false,
            "pageLength": 100,
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
<script>
    $("#link_tambah").select2({
        dropdownParent: $('#modal-tambah-gangguan')
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