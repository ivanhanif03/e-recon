<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">StopClock Gangguan Jaringan</h1>
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
                                        <th>No. Tiket</th>
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
                                                badge-success
                                                <?php elseif ($g['id_status'] === '4') : ?>
                                                badge-success
                                                <?php elseif ($g['id_status'] === '5') : ?>
                                                badge-danger
                                                <?php elseif ($g['id_status'] === '6') : ?>
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
                                                <?php if ($g['approval_stopclock_spv'] === 'YES') : ?>
                                                    <a href="" class="btn btn-sm <?php if ($g['id_status'] === '5') : ?>btn-outline-danger<?php elseif ($g['id_status'] === '7') : ?>btn-outline-success<?php else : ?>btn-outline-secondary<?php endif; ?>" data-toggle="modal" data-target="#modal-detail-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Detail" class="nav-icon fas <?php if (($g['id_status'] === '5') || ($g['id_status'] === '7')) : ?>fa-check<?php else : ?>fa-list <?php endif; ?>"></i></a>
                                                <?php else : ?>
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
                                                                        <b>Nomor Tiket</b>
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

                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Start Gangguan</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8 ">
                                                                        <?= date("d-m-Y H:i:s", strtotime($g['start'])); ?> </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-3 ">
                                                                        <b>End Gangguan</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8 text-danger">
                                                                        <?= date("d-m-Y H:i:s", strtotime($g['end'])); ?> </div>
                                                                </div>

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
                                                                        badge-success
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
                                                                    <h6 class="text-secondary">
                                                                        <b>
                                                                            STOPCLOCK
                                                                        </b>
                                                                    </h6>

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

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Start StopClock</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8 text-secondary font-weight-bold">
                                                                            <?= date("d-m-Y H:i:s", strtotime($g['start_stopclock'])); ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Durasi StopClock</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['extra_time_stopclock']; ?> Detik
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Approval StopClock</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['approval_stopclock']; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Approval Supervisor</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['approval_stopclock_spv']; ?>
                                                                        </div>
                                                                    </div>
                                                                <?php else : ?>
                                                                <?php endif; ?>
                                                                <?php if ($g['ket_reject_stopclock'] !== null) : ?>
                                                                    <hr>
                                                                    <h6 class="text-danger">
                                                                        <b>
                                                                            REJECT STOPCLOCK
                                                                        </b>
                                                                    </h6>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Keterangan Reject</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8 text-danger">
                                                                            <?= $g['ket_reject_stopclock']; ?>
                                                                        </div>
                                                                    </div>
                                                                <?php else : ?>
                                                                <?php endif; ?>
                                                                <?php if ($g['waktu_start'] === null) : ?>
                                                                <?php else : ?>
                                                                    <hr>
                                                                    <h6 class="text-warning">
                                                                        <b>
                                                                            START PERBAIKAN
                                                                        </b>
                                                                    </h6>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Keterangan Start</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['keterangan_start']; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Waktu Start</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= date("d-m-Y H:i:s", strtotime($g['waktu_start'])); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Durasi Respon</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['waktu_respon'] ?> Detik
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if ($g['keterangan_reject'] !== null) : ?>
                                                                    <hr>
                                                                    <h6 class="text-danger">
                                                                        <b>
                                                                            REJECT PERBAIKAN
                                                                        </b>
                                                                    </h6>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Keterangan</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8 text-danger">
                                                                            <?= $g['keterangan_reject']; ?>
                                                                        </div>
                                                                    </div>
                                                                <?php else : ?>
                                                                <?php endif; ?>
                                                                <?php if ($g['keterangan_submit'] !== null) : ?>
                                                                    <hr>
                                                                    <h6 class="text-primary">
                                                                        <b>
                                                                            SUBMIT PERBAIKAN
                                                                        </b>
                                                                    </h6>

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

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Waktu Submit</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8 text-primary">
                                                                            <b>
                                                                                <?= date("d-m-Y H:i:s", strtotime($g['waktu_submit'])); ?>
                                                                            </b>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Durasi Perbaikan</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['waktu_perbaikan'] ?> Detik
                                                                        </div>
                                                                    </div>

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
                                                                <?php else : ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex bd-highlight">
                                                        <?php if ($g['id_status'] == '2') : ?>
                                                        <?php elseif ($g['id_status'] == '3') : ?>
                                                            <!-- Batal -->
                                                            <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal">Batal</button>

                                                            <!-- Reject -->
                                                            <button type="submit" data-toggle="modal" data-target="#modal-reject-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-danger">Reject</button>

                                                            <!-- Approval -->
                                                            <button type="button" data-toggle="modal" data-target="#modal-approval-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-primary">Approval</button>
                                                        <?php elseif (($g['id_status'] == '4') && ($g['approval_stopclock'] == 'YES')) : ?>
                                                        <?php elseif ($g['id_status'] == '4') : ?>
                                                            <!-- Batal -->
                                                            <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal">Batal</button>

                                                            <!-- Reject -->
                                                            <button type="submit" data-toggle="modal" data-target="#modal-reject-stopclock<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-danger">Reject StopClock</button>

                                                            <!-- Approval -->
                                                            <button type="button" data-toggle="modal" data-target="#modal-approval-stopclock<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-secondary">Approval StopClock</button>

                                                        <?php elseif (($g['approval_stopclock'] == 'NO') && ($g['approval_stopclock_spv'] == 'NO') && ($g['id_status'] == 1) && ($g['approval'] == 'NO')) : ?>
                                                        <?php elseif (($g['approval_stopclock'] == 'YES') && ($g['approval_stopclock_spv'] == 'NO') && ($g['id_status'] == 2) && ($g['approval'] !== 'YES')) : ?>
                                                        <?php else : ?>
                                                            <span></span>
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
                                        <th>No. Tiket</th>
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