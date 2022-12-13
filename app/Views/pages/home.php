<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Bulan </li>
                        <li class="breadcrumb-item active text-primary font-weight-bold"><?= $month; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <?= view('Myth\Auth\Views\_message_block') ?>
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12">

                    <div class="small-box bg-white shadow-none border-none">
                        <div class="inner">
                            <h3><?= $total_gangguan; ?></h3>
                            <p>Total Gangguan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-wifi"></i>
                        </div>
                        <a href="<?= base_url('gangguan'); ?>" class="small-box-footer bg-warning" style="color: white !important; ">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">

                    <div class="small-box bg-white shadow-none border-none">
                        <div class="inner">
                            <h3>Rp<?= number_format($sum_denda, 0, '', '.'); ?></h3>
                            <p>Total Restitusi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= base_url('restitusi'); ?>" class="small-box-footer bg-success" style="color: white !important; ">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">

                    <div class="small-box bg-white shadow-none border-none">
                        <div class="inner">
                            <h3>Rp<?= number_format($sum_tagihan_bulanan, 0, '', '.'); ?></h3>
                            <p>Total Tagihan All</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= base_url('tagihan'); ?>" class="small-box-footer bg-primary" style="color: white !important; ">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">

                    <div class="small-box bg-white shadow-none border-none">
                        <div class="inner">
                            <h3><?= $avg_sla; ?>%</h3>
                            <p>Avg Persentase SLA</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <a href="<?= base_url('sla'); ?>" class="small-box-footer bg-danger" style="color: white !important; ">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-none border-none">
                        <div class="card-header">
                            <h5 class="card-title">Report Rekap Bulanan</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Grafik Perbandingan Jumlah Gangguan Finish dan Over SLA <?= date('Y'); ?> </strong>
                                    </p>
                                    <div class="chart">

                                        <canvas id="gangguanChart" height="300" style="height: 300px;"></canvas>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Jumlah Gangguan</strong>
                                    </p>
                                    <div class="progress-group">
                                        Telkom
                                        <span class="float-right"><b><?= $gangguan_provider_telkom; ?></b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: <?= $gangguan_provider_telkom; ?>%"></div>
                                        </div>
                                    </div>

                                    <div class="progress-group">
                                        Tigatra
                                        <span class="float-right"><b><?= $gangguan_provider_tigatra; ?></b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: <?= $gangguan_provider_tigatra; ?>%"></div>
                                        </div>
                                    </div>

                                    <div class="progress-group">
                                        <span class="progress-text">Primalink</span>
                                        <span class="float-right"><b><?= $gangguan_provider_primalink; ?></b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: <?= $gangguan_provider_primalink; ?>%"></div>
                                        </div>
                                    </div>

                                    <div class="progress-group">
                                        LintasArta
                                        <span class="float-right"><b><?= $gangguan_provider_lintasarta; ?></b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: <?= $gangguan_provider_lintasarta; ?>%"></div>
                                        </div>
                                    </div>

                                    <div class="progress-group">
                                        IPWAN
                                        <span class="float-right"><b><?= $gangguan_provider_ipwan; ?></b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: <?= $gangguan_provider_ipwan; ?>%"></div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        BAS
                                        <span class="float-right"><b><?= $gangguan_provider_bas; ?></b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: <?= $gangguan_provider_bas; ?>%"></div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        IForte
                                        <span class="float-right"><b><?= $gangguan_provider_iforte; ?></b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: <?= $gangguan_provider_iforte; ?>%"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i class="fas fa-check-circle"></i></span>
                                        <h5 class="description-header"><?= $finish; ?></h5>
                                        <span class="description-text">TOTAL GANGGUAN FINISH</span>
                                    </div>

                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-danger"><i class="fas fa-exclamation-circle"></i></span>
                                        <h5 class="description-header"><?= $over; ?></h5>
                                        <span class="description-text">TOTAL GANGGUAN OVER</span>
                                    </div>

                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-warning"><i class="fas fa-hourglass-half"></i></span>
                                        <h5 class="description-header"><?= $process; ?></h5>
                                        <span class="description-text">TOTAL GANGGUAN ON PROCESS</span>
                                    </div>

                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-secondary"><i class="fas fa-clock"></i></span>
                                        <h5 class="description-header"><?= $stop_clock; ?></h5>
                                        <span class="description-text">TOTAL GANGGUAN STOPCLOCK</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <section class="col-lg-12 connectedSortable">

                    <div class="card shadow-none border-none">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Daftar Gangguan</h3>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="col-4 mt-2 form-group">
                                        <!-- <label></label> -->
                                        <select class="form-control provider" name="">
                                            <option value="">-- Pilih Provider --</option>
                                            <option value="">Semua Provider</option>
                                            <option value="telkom">Telkom</option>
                                            <option value="tigatra">Tigatra</option>
                                            <option value="primaLink">PrimaLink</option>
                                            <option value="lintasArta">LintasArta</option>
                                            <option value="ipwan">IPWAN</option>
                                            <option value="bas">BAS</option>
                                            <option value="comnet">ComNet</option>
                                            <option value="iforte">IForte</option>
                                            <option value="millenial">Millenial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tableDashboard" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor Tiket</th>
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
                                    <?php foreach ($current_gangguan as $gc) : ?>
                                        <tr>
                                            <td><?= $gc['no_tiket']; ?></td>
                                            <td><?= $gc['nama_link']; ?></td>
                                            <td><?= $gc['jenis_link']; ?></td>
                                            <td class="text-primary"><?= $gc['start']; ?></td>
                                            <td class="text-danger"><?= $gc['waktu_submit']; ?></td>
                                            <td><?= $gc['offline']; ?> s</td>
                                            <td><?= $gc['sla']; ?>%</td>
                                            <td class="text-uppercase">
                                                <span class="badge badge-pill 
                                                <?php if ($gc['id_status'] === '1') : ?>
                                                badge-warning
                                                <?php elseif ($gc['id_status'] === '2') : ?>
                                                badge-primary
                                                <?php elseif ($gc['id_status'] === '3') : ?>
                                                badge-danger
                                                <?php elseif ($gc['id_status'] === '4') : ?>
                                                badge-secondary
                                                <?php else : ?>
                                                badge-success
                                                <?php endif ?>">
                                                    <?= $gc['kategori']; ?>
                                                </span>
                                            </td>
                                            <td>Rp<?= number_format($gc['restitusi'], 0, '', '.'); ?></td>
                                            <td>Rp<?= number_format($gc['tagihan_bulanan'], 0, '', '.'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nomor Tiket</th>
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
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": [
                "copy",
                "excel",
                {
                    extend: 'print',
                    customize: function(doc) {
                        $(doc.document.body).find('h1').css('font-size', '20pt');
                        $(doc.document.body).find('h1').css('font-weight', 'bold');
                        $(doc.document.body).find('h1').css('text-align', 'center');
                    }
                }, "colvis"
            ]
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

<!-- GRAFIK -->
<script>
    $(function() {
        'use strict'
        var arrayFinish = <?= json_encode($gangguan_finish_month); ?>;
        var arrayOver = <?= json_encode($gangguan_over_month); ?>;
        var gangguanChartCanvas = $('#gangguanChart').get(0).getContext('2d')
        var gangguanChartData = {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Gangguan sesuai SLA',
                backgroundColor: 'rgba(0, 123, 255,0.9)',
                borderColor: 'rgba(0, 123, 255,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(0, 123, 255,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(0, 123, 255,1)',
                data: arrayFinish
            }, {
                label: 'Gangguan Over SLA',
                backgroundColor: 'rgba(220, 53, 69, 1)',
                borderColor: 'rgba(220, 53, 69, 1)',
                pointRadius: false,
                pointColor: 'rgba(220, 53, 69, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220, 53, 69,1)',
                data: arrayOver
            }]
        }
        var gangguanChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: true
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true
                    }
                }]
            }
        }

        var gangguanChart = new Chart(gangguanChartCanvas, {
            type: 'line',
            data: gangguanChartData,
            options: gangguanChartOptions
        })
    })
</script>
<?= $this->endSection(); ?>