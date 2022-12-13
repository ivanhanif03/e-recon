<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SLA</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url(''); ?>">
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">SLA</li>
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
                                <div class="col-lg-12 d-flex justify-content-between">
                                    <h3 class="card-title">Daftar SLA</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tableDashboard" class="table table-striped display">
                                <thead>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Branch</th>
                                        <th>Provider</th>
                                        <th>Jenis Link</th>
                                        <th>Open</th>
                                        <th>Close</th>
                                        <th>Offline</th>
                                        <th>SLA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($current_gangguan as $g) : ?>
                                        <tr>
                                            <td> <?= $g['no_tiket']; ?></td>
                                            <td> <?= $g['nama_branch']; ?></td>
                                            <td> <?= $g['nama_provider']; ?></td>
                                            <td> <?= $g['jenis_link']; ?></td>
                                            <td class="text-primary"> <?= date("d-m-Y H:i:s", strtotime($g['start'])); ?></td></td>
                                            <td class="text-danger"> <?= date("d-m-Y H:i:s", strtotime($g['waktu_submit'])); ?></td></td>
                                            <td> <?= $g['offline']; ?> detik</td>
                                            <td> <?= $g['sla']; ?>%</td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Branch</th>
                                        <th>Provider</th>
                                        <th>Jenis Link</th>
                                        <th>Open</th>
                                        <th>Close</th>
                                        <th>Offline</th>
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

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
    $(function() {
        $("#tableDashboard").DataTable({
            "order": [
                [4, 'asc']
            ],
            "responsive": true,
            "lengthChange": false,
            "pageLength": 100,
            "pageLength": 100,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": [
                "copy",
                "excel",
                "pdf",
                {
                    extend: 'print',
                    customize: function(doc) {
                        $(doc.document.body).find('h1').css('font-size', '20pt');
                        $(doc.document.body).find('h1').css('font-weight', 'bold');
                        $(doc.document.body).find('h1').css('text-align', 'center');
                    },
                    footer: true
                },
                "colvis"
            ],
            // "footerCallback": function(row, data, start, end, display) {
            //     var api = this.api()

            //     // Remove the formatting to get integer data for summation
            //     var intVal = function(i) {
            //         // console.log(i)
            //         return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            //     };

            //     // Total over all pages
            //     total = api
            //         .column(7)
            //         .data()
            //         .reduce(function(a, b) {
            //             return intVal(a) + intVal(b);
            //         }, 0);

            //     // Total over this page
            //     pageTotal = api
            //         .column(7, {
            //             page: 'current'
            //         })
            //         .data()
            //         .reduce(function(a, b) {
            //             return intVal(a) + intVal(b);
            //         }, 0);

            //     // Update footer
            //     $(api.column(7).footer()).html(total + '%');
            //     // $(api.column(8).footer()).html('Rp' + pageTotal + ' (Rp' + total + ' total)');
            // },
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