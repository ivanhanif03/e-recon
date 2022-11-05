<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-4 col-4">

                    <div class="small-box bg-danger shadow-none border">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Jumlah Gangguan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-4">

                    <div class="small-box bg-primary shadow-none border">
                        <div class="inner">
                            <h3>53</h3>
                            <p>Jumlah Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-4">

                    <div class="small-box bg-warning shadow-none border">
                        <div class="inner">
                            <h3>27</h3>
                            <p>Jumlah SLA</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>


            <div class="row">
                <section class="col-lg-7 connectedSortable">

                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Sales
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">

                                <div class="chart tab-pane active" id="revenue-chart"
                                    style="position: relative; height: 300px;">
                                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="col-lg-5 connectedSortable">

                    <div class="card bg-gradient-primary shadow-none border">
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
                </section>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>