<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Bandwidth</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert" id="alert-delete">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card shadow-none border-none">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Daftar Bandwidth</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-bandwidth" data-backdrop="static" class="btn btn-block bg-primary">Tambah Bandwidth<i class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableBandwidth" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bandwidth</th>
                                        <th>Biaya Bulanan</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($bandwidth as $b) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <?php if ($b['bandwidth'] < 1000) : ?>
                                                    <?= $b['bandwidth']; ?> Kbps
                                                <?php else : ?>
                                                    <?= ($b['bandwidth'] / 1000); ?> Mbps
                                                <?php endif; ?>
                                            </td>
                                            <td>Rp<?= number_format($b['biaya_bulanan'], 0, '', '.'); ?></td>
                                            <td class="text-center">
                                                <!-- Edit -->
                                                <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-backdrop="static" data-target="#modal-edit-bandwidth<?= $b['id']; ?>"><i class="nav-icon fas fa-edit"></i></a>
                                                <!-- Delete -->
                                                <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-backdrop="static" data-target="#modal-hapus-bandwidth<?= $b['id']; ?>"><i class=" nav-icon fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="modal-hapus-bandwidth<?= $b['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Anda yakin ingin menghapus data?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            Bandwidth :
                                                            <?php if ($b['bandwidth'] < 1000) : ?>
                                                                <?= $b['bandwidth']; ?> Kbps
                                                            <?php else : ?>
                                                                <?= ($b['bandwidth'] / 1000); ?> Mbps
                                                            <?php endif; ?>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                        <form action="<?= base_url('/bandwidth') . '/' . $b['id']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Delete -->

                                        <!-- Start Modal Edit -->
                                        <div class="modal fade" id="modal-edit-bandwidth<?= $b['id']; ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Edit Bandwidth</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('/bandwidth/update') . '/' . $b['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="bandwidth">Bandwidth</label>
                                                                        <input type="text" class="form-control text-sm <?= ($validation->hasError('bandwidth')) ? 'is-invalid' : ''; ?>" name="bandwidth" id="bandwidth" placeholder="Masukkan bandwidth" value="<?= $b['bandwidth']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autofocus required>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('bandwidth'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="biaya_bulanan">Biaya Bulanan</label>
                                                                        <input type="text" class="form-control text-sm <?= ($validation->hasError('biaya_bulanan')) ? 'is-invalid' : ''; ?>" name="biaya_bulanan" id="biaya_bulanan" placeholder="Masukkan nama biaya bulanan" value="<?= $b['biaya_bulanan']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('biaya_bulanan'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex bd-highlight">
                                                            <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                            <!-- swalSaveSuccess -->
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
                                        <th>No</th>
                                        <th>Bandwidth</th>
                                        <th>Biaya Bulanan</th>
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
<!-- Start Modal Input -->
<div class="modal fade" id="modal-tambah-bandwidth">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Bandwidth</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/bandwidth/save') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="bandwidth">Bandwidth</label>
                                <input type="text" class="form-control text-sm" name="bandwidth" id="bandwidth" placeholder="Masukkan bandwidth" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="biaya_bulanan">Biaya Bulanan</label>
                                <input type="text" class="form-control text-sm" name="biaya_bulanan" id="biaya_bulanan" placeholder="Masukkan nama biaya bulanan" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex bd-highlight">
                    <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Input -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(function() {
        $("#tableBandwidth").DataTable({
            "columnDefs": [{
                "width": "8%",
                "targets": 0
            }],
            "responsive": true,
            "lengthChange": false,
            "pageLength": 100,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "searching": false
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableBandwidth_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>