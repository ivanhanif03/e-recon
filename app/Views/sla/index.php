<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar SLA</h1>
                </div>
                <div class="col-sm-6">

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
                            <h3 class="card-title">
                                <!-- <i class="fas fa-chart mr-1"></i> -->
                                By Finopse
                            </h3>
                            <!-- <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <table id="tableOrder" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Provider</th>
                                        <th>PIC</th>
                                        <th>Alamat</th>
                                        <th>Gangguan</th>
                                        <th>SLA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>T11</td>
                                        <td>Telkom</td>
                                        <td>Ivan</td>
                                        <td>Jakarta</td>
                                        <td>Kabel Rusak</td>
                                        <td>99,95%</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Provider</th>
                                        <th>PIC</th>
                                        <th>Alamat</th>
                                        <th>Gangguan</th>
                                        <th>SLA</th>
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

<!-- <section class="col-lg-5 connectedSortable">

                    <div class="card bg-gradient-primary shadow-none border-none">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                Visitors
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                    <i class="far fa-calendar-alt"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div id="world-map" style="height: 250px; width: 100%;"></div>
                        </div>

                        <div class="card-footer bg-transparent">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div id="sparkline-1"></div>
                                    <div class="text-white">Visitors</div>
                                </div>

                                <div class="col-4 text-center">
                                    <div id="sparkline-2"></div>
                                    <div class="text-white">Online</div>
                                </div>

                                <div class="col-4 text-center">
                                    <div id="sparkline-3"></div>
                                    <div class="text-white">Sales</div>
                                </div>

                            </div>

                        </div>
                    </div>
                </section> -->
</div>
</div>
</section>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
    $(function() {
        $("#tableOrder").DataTable({
            "responsive": true,
            "lengthChange": false,
            "pageLength": 100,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableOrder_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>