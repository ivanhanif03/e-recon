<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Report Gangguan</h1>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Gangguan</h3>
                        </div>

                        <div class="card-body">
                            <table id="tableGangguan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor Tiket</th>
                                        <th>Provider</th>
                                        <th>PIC</th>
                                        <th>Alamat</th>
                                        <th>Open Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($provider as $p) : ?>
                                    <tr>
                                        <td><?= $p['no_tiket']; ?></td>
                                        <td><?= $p['provider']; ?></td>
                                        <td><?= $p['pic']; ?></td>
                                        <td><?= $p['alamat']; ?></td>
                                        <td><?= $p['open_time']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nomor Tiket</th>
                                        <th>Provider</th>
                                        <th>PIC</th>
                                        <th>Alamat</th>
                                        <th>Open Time</th>
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
    $(function () {
        $("#tableGangguan").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableGangguan_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>