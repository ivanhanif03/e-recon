<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Gangguan Jaringan</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="card shadow-none border-0">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Daftar Gangguan</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-gangguan" data-backdrop="static" class="btn btn-block bg-primary">Input Gangguan<i class="fa fa-plus-circle ml-2"></i></button>
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
                                            <td><?= date("d-m-Y H:i:s", strtotime($g['end'])); ?></td>
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
                                            <td class="text-center"><?php if ($g['approval'] === null) : ?> -
                                                <?php else : ?>
                                                    <?= $g['approval']; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <!-- STATUS ON PROCESS AWAL -->
                                                <?php if ($g['id_status'] === '1') : ?>
                                                    <!-- Edit -->
                                                    <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-backdrop="static" data-target="#modal-edit-gangguan<?= $g['id']; ?>"><i class="nav-icon fas fa-edit"></i></a>
                                                    <!-- Delete -->
                                                    <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-backdrop="static" data-target="#modal-hapus-gangguan<?= $g['id']; ?>"><i class=" nav-icon fas fa-trash"></i></a>

                                                    <!-- STATUS SUBMITTED -->
                                                <?php elseif ($g['id_status'] === '2') : ?>
                                                    <!-- Detail -->
                                                    <a href="" class="btn btn-sm btn-outline-primary" data-backdrop="static" data-toggle="modal" data-target="#modal-detail-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Detail" class="nav-icon fas fa-list"></i></a>

                                                    <!-- STATUS REJECT -->
                                                <?php elseif ($g['id_status'] === '1' && $g['approval'] == 'NO') : ?>
                                                    A
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex bd-highlight">
                                                        <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal">Batal</button>

                                                        <!-- Reject -->
                                                        <button type="submit" data-toggle="modal" data-target="#modal-reject-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-danger">Reject</button>

                                                        <!-- Approval -->
                                                        <button type="button" data-toggle="modal" data-target="#modal-approval-gangguan<?= $g['id']; ?>" data-dismiss="modal" class="btn btn-primary">Approval</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Detail -->

                                        <!-- Start Modal Reject -->
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
                                        <!-- End Modal Reject -->

                                        <!-- Start Modal Approval -->
                                        <div class="modal fade" id="modal-approval-gangguan<?= $g['id'] ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <form action="<?= base_url('/gangguanBtn/approval/') . '/' . $g['id']; ?>">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Konfirmasi Approval</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <span> <b>Anda yakin ingin menyetujui perbaikan?</b> </span><br>
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
                                        <!-- End Modal Approval -->

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="modal-hapus-gangguan<?= $g['id'] ?>">
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
                                                            <?= $g['no_tiket']; ?>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                        <form action="<?= base_url('gangguan/btn') . '/' . $g['id']; ?>" method="post">
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
                                        <div class="modal fade" id="modal-edit-gangguan<?= $g['id']; ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Edit Gangguan</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('/gangguanBtn/update/') . '/' . $g['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="nama_link">Nama
                                                                            Gangguan</label>
                                                                        <input type="text" class="form-control text-sm <?= ($validation->hasError('nama_gangguan')) ? 'is-invalid' : ''; ?>" name="nama_gangguan" id="nama_gangguan" placeholder="Masukkan nama gangguan" value="<?= $g['nama_gangguan']; ?>" required>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('nama_gangguan'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="detail">Detail</label>
                                                                        <textarea type="text" class="form-control text-sm" name="detail" id="detail" placeholder="Masukkan detail" required><?= $g['detail']; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Link</label>
                                                                        <select class="form-control select2bs4 text-sm <?= ($validation->hasError('link')) ? 'is-invalid' : ''; ?>" name="link" id="link_edit" style="width: 100%;">
                                                                            <option disabled="disabled" selected="selected">
                                                                                Pilih Link</option>
                                                                            <?php foreach ($link as $l) : ?>
                                                                                <option value="<?= $l['id']; ?>" <?php if ($l['nama_link'] == $g['nama_link']) : ?>selected<?php endif; ?>>
                                                                                    <?= $l['nama_link']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
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

<!-- Start Modal Input -->
<div class="modal fade" id="modal-tambah-gangguan">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Gangguan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/gangguanBtn/save/') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" id="kode_provider" name="kode_provider" value="kode">
                            <input type="hidden" id="approval" name="approval">
                            <div class="form-group">
                                <label for="nama_gangguan">Nama Gangguan</label>
                                <input type="text" class="form-control text-sm" name="nama_gangguan" id="nama_gangguan" placeholder="Masukkan nama gangguan" required>
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail</label>
                                <textarea type="text" class="form-control text-sm" name="detail" id="detail" placeholder="Masukkan detail" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <select class="form-control select2bs4 text-sm <?= ($validation->hasError('link')) ? 'is-invalid' : ''; ?>" name="link" id="link_tambah" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Link</option>
                                    <?php foreach ($link as $l) : ?>
                                        <!-- <option hidden="hidden" value="<?= $l['nama_link']; ?>"></option> -->
                                        <option value="<?= $l['id'] . "_" . $l['nama_link']; ?>">
                                            <?= $l['nama_link']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
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
        $("#tableGangguan").DataTable({
            "responsive": true,
            "lengthChange": false,
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