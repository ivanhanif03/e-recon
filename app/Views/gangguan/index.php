<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Report Gangguan</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="card shadow-none border">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Data Gangguan</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-user"
                                        data-backdrop="static" class="btn btn-block bg-primary">Input Gangguan<i
                                            class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
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
                                        <th>Close Time</th>
                                        <th>Start Stop Clock</th>
                                        <th>End Stop Clock</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gangguan as $g) : ?>
                                    <tr>
                                        <td><?= $g['no_tiket']; ?></td>
                                        <td><?= $g['provider']; ?></td>
                                        <td><?= $g['pic']; ?></td>
                                        <td><?= $g['alamat']; ?></td>
                                        <td><?= $g['open_time']; ?></td>
                                        <td><?= $g['close_time']; ?></td>
                                        <td><?= $g['start_stop_clock']; ?></td>
                                        <td><?= $g['end_stop_clock']; ?></td>
                                        <td class="text-center">
                                            <!-- Edit -->
                                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-backdrop="static" data-target="#modal-tambah-user"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            <!-- Delete -->
                                            <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-backdrop="static" data-target="#modal-hapus-user"><i
                                                    class=" nav-icon fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <!-- <tr>
                                        <th>Nomor Tiket</th>
                                        <th>Provider</th>
                                        <th>PIC</th>
                                        <th>Alamat</th>
                                        <th>Open Time</th>
                                        <th>Close Time</th>
                                        <th>Start Stop Clock</th>
                                        <th>End Stop Clock</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr> -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Input -->
<div class="modal fade" id="modal-tambah-user">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Gangguan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('gangguan/create'); ?>" id="tambah-user" method="post">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Provider</label>
                                <select class="form-control select2bs4 text-sm" name="dinas" id="dinas"
                                    style="width: 100%;">
                                    <option disabled="disabled" selected="selected">Pilih Provider</option>
                                    <option value="Telkom">Telkom</option>
                                    <option value="Lintasarta">Lintasarta</option>
                                    <option value="Tigatra">Tigatra</option>
                                    <option value="Primalink">Primalink</option>
                                    <option value="IPWAN">IPWAN</option>
                                    <option value="IForte">IForte</option>
                                    <option value="MILE">MILE</option>
                                    <option value="BAS">BAS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Outlet</label>
                                <select class="form-control select2bs4 text-sm" name="outlet" id="outlet"
                                    style="width: 100%;">
                                    <option disabled="disabled" selected="selected">Pilih Outlet</option>
                                    <option value="kc_harmoni">KC Harmoni</option>
                                    <option value="kc_kuningan">KC Kuningan</option>
                                    <option value="kcp_palmerah">KCP Palmerah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pic">PIC</label>
                                <input type="text" class="form-control text-sm" name="pic" id="pic"
                                    placeholder="Masukkan nama PIC">
                            </div>
                            <div class="form-group">
                                <label for="outlet">Alamat</label>
                                <textarea class="form-control text-sm" name="outlet" id="outlet" rows="3"
                                    placeholder="Masukkan alamat"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex bd-highlight">
                    <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary swalSaveSuccess" data-dismiss="modal">Simpan</button>
                </div>
        </div>
        </form>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modal-hapus-user">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger swalDeleteSuccess" data-dismiss="modal">Hapus</button>
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