<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gangguan Jaringan</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url(''); ?>">
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Gangguan Jaringan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?= view('Myth\Auth\Views\_message_block') ?>
            <div class="row">
                <section class="col-lg-12 connectedSortable">

                    <div class="card shadow-none border-none">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Daftar Gangguan</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tableDashboard" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Link</th>
                                        <th>Jenis Link</th>
                                        <th>Open</th>
                                        <th>Close</th>
                                        <th>Offline</th>
                                        <th>SLA</th>
                                        <th>Status</th>
                                        <th>Restitusi</th>
                                        <th>Tagihan Bulanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($total_gangguan_all as $g) : ?>
                                        <tr>
                                            <td data-toggle=" tooltip" data-placement="top" title="Detail">
                                                <a class="font-weight-bold" href="" data-backdrop="static" data-toggle="modal" data-target="#modal-detail-gangguan<?= $g['id']; ?>">
                                                    <?= $g['no_tiket']; ?>
                                                </a>
                                            </td>
                                            <td><?= $g['nama_link']; ?></td>
                                            <td><?= $g['jenis_link']; ?></td>
                                            <td class=" text-primary"><?= $g['start']; ?></td>
                                            <td class="text-danger"><?= $g['waktu_submit']; ?></td>
                                            <td>
                                                <?php if ($g['offline'] === null) : ?>

                                                <?php else : ?>
                                                    <?= $g['offline']; ?> dtk
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($g['sla'] === null) : ?>

                                                <?php else : ?>
                                                    <?= $g['sla']; ?> %
                                                <?php endif; ?>
                                            </td>
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
                                            <td>Rp<?= number_format((float)$g['restitusi'], 0, '', '.'); ?></td>
                                            <td>Rp<?= number_format((float)$g['tagihan_bulanan'], 0, '', '.'); ?></td>
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
                                                                    <div class="col-3 ">
                                                                        <b>Offline</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <?= $g['offline']; ?> detik
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3 ">
                                                                        <b>SLA</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8 text-primary font-weight-bold">
                                                                        <?= $g['sla']; ?>%
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
                                                                    <div class="col-3 ">
                                                                        <b>Restitusi</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        Rp<?= number_format((float)$g['restitusi'], 0, '', '.'); ?>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-3 ">
                                                                        <b>Total Tagihan</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8 text-success font-weight-bold">
                                                                        Rp<?= number_format((float)$g['tagihan_bulanan'], 0, '', '.'); ?>
                                                                    </div>
                                                                </div>

                                                                <?php if ($g['keterangan_stopclock'] !== null) : ?>
                                                                    <hr>
                                                                    <h6 class="text-danger">
                                                                        <b>
                                                                            STOPCLOCK
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
                                                                    <hr>
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
                                                                    <hr>
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
                                                                    <hr>
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
                                                                <?php if ($g['keterangan_reject'] !== null) : ?>
                                                                    <hr>
                                                                    <h6 class="text-danger">
                                                                        <b>
                                                                            REJECT PERBAIKAN
                                                                        </b>
                                                                    </h6>
                                                                    <hr>
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
                                                                            <b>Waktu Submit</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <b>
                                                                                <?= $g['waktu_submit']; ?>
                                                                            </b>
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
                                                                <?php else : ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex bd-highlight">
                                                        <?php if (($g['approval_stopclock'] !== null) && ($g['approval_stopclock_spv'] !== null) && ($g['id_status'] !== 2)) : ?>
                                                            <span></span>
                                                        <?php elseif (($g['approval_stopclock'] !== null) && ($g['approval_stopclock_spv'] !== null)) : ?>
                                                            <!-- Batal -->
                                                            <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal">Batal</button>

                                                            <!-- Reject -->
                                                            <button type="submit" data-toggle="modal" data-target="#modal-reject-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-danger">Reject</button>

                                                            <!-- Approval -->
                                                            <button type="button" data-toggle="modal" data-target="#modal-approval-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-primary">Approval</button>
                                                        <?php elseif (($g['keterangan_reject'] === null) && ($g['approval'] === null) && ($g['keterangan_stopclock'] !== null)) : ?>
                                                            <!-- Batal -->
                                                            <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal">Batal</button>

                                                            <!-- Reject -->
                                                            <button type="submit" data-toggle="modal" data-target="#modal-reject-stopclock<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-danger">Reject StopClock</button>

                                                            <!-- Approval -->
                                                            <button type="button" data-toggle="modal" data-target="#modal-approval-stopclock<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-secondary">Approval StopClock</button>
                                                        <?php elseif (($g['keterangan_reject'] === null) && ($g['approval'] === null)) : ?>
                                                            <!-- Batal -->
                                                            <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal">Batal</button>

                                                            <!-- Reject -->
                                                            <button type="submit" data-toggle="modal" data-target="#modal-reject-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-danger">Reject</button>

                                                            <!-- Approval -->
                                                            <button type="button" data-toggle="modal" data-target="#modal-approval-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-primary">Approval</button>
                                                        <?php elseif (($g['keterangan_reject'] === null) && ($g['approval'] === 'YES')) : ?>
                                                            <span></span>
                                                        <?php elseif (($g['keterangan_reject'] !== null) && ($g['approval'] === 'NO') && ($g['id_status'] === '2')) : ?>
                                                            <!-- Batal -->
                                                            <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal">Batal</button>

                                                            <!-- Reject -->
                                                            <button type="submit" data-toggle="modal" data-target="#modal-reject-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-danger">Reject</button>

                                                            <!-- Approval -->
                                                            <button type="button" data-toggle="modal" data-target="#modal-approval-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-primary">Approval</button>
                                                        <?php elseif (($g['keterangan_reject'] !== null) && ($g['approval'] === 'NO') && ($g['id_status'] !== '2')) : ?>
                                                        <?php else : ?>
                                                            <span></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Detail -->
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Link</th>
                                        <th>Jenis Link</th>
                                        <th>Open</th>
                                        <th>Close</th>
                                        <th>Offline</th>
                                        <th>SLA</th>
                                        <th>Status</th>
                                        <th>Restitusi</th>
                                        <th>Tagihan Bulanan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
    $(function() {
        $("#tableDashboard").DataTable({
            "order": [
                [3, 'asc']
            ],
            "responsive": true,
            "lengthChange": false,
            "pageLength": 100,
            "pageLength": 100,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "excel", {
                extend: 'print',
                customize: function(doc) {
                    $(doc.document.body).find('h1').css('font-size', '20pt');
                    $(doc.document.body).find('h1').css('font-weight', 'bold');
                    $(doc.document.body).find('h1').css('text-align', 'center');
                }
            }, "colvis"]
        }).buttons().container().appendTo('#tableDashboard_wrapper .col-md-6:eq(0)');
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableDashboard').DataTable();

        function filterData() {
            $('#tableDashboard').DataTable().search(
                $('.provider').val()
            ).draw();
        }
        $('.provider').on('change', function() {
            filterData();
        });
    });
</script>
<?= $this->endSection(); ?>