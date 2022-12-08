<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Gangguan Jaringan</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert" id="alert-delete">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card shadow-none border-0">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Daftar Gangguan</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <!-- <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-gangguan" data-backdrop="static" class="btn btn-block bg-primary">Input Gangguan<i class="fa fa-plus-circle ml-2"></i></button>
                                </div> -->
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
                                            <td data-toggle="modal" data-target="#modal-detail-awal-gangguan<?= $g['id']; ?>">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Detail" class="font-weight-bolder"><?= $g['no_tiket']; ?></a>
                                            </td>
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
                                                <?php if ($g['id_status'] == '1') : ?>
                                                    <!-- Sumbmit -->
                                                    <a href="" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-backdrop="static" data-target="#modal-submit-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Sumbit Perbaikan" class="nav-icon fas fa-edit"></i></a>
                                                    <!-- Stop Clock -->
                                                    <a href="" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modal-stopclock-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Stop Clock" class="nav-icon fas fa-clock"></i></a>
                                                <?php elseif ($g['id_status'] === '2') : ?>
                                                    <!-- Detail -->
                                                    <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modal-detail-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Detail" class="nav-icon fas fa-check"></i></a>
                                                <?php elseif (($g['id_status'] === '4') && ($g['start'] < $now)) : ?>
                                                    <!-- Sumbmit -->
                                                    <a href="" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-backdrop="static" data-target="#modal-submit-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Sumbit Perbaikan" class="nav-icon fas fa-edit"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>


                                        <!-- Start Modal Detail Awal -->
                                        <div class="modal fade" id="modal-detail-awal-gangguan<?= $g['id']; ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Detail Gangguan</h4>
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
                                                                <?php if ($g['keterangan_reject'] !== null) : ?>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-3 ">
                                                                            <b>Keterangan Reject</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8 text-danger">
                                                                            <b class="text-danger">
                                                                                <?= $g['keterangan_reject']; ?>
                                                                            </b>
                                                                        </div>
                                                                    </div>
                                                                <?php else : ?>
                                                                <?php endif; ?>
                                                                <?php if ($g['approval'] === null) : ?>
                                                                    <span></span>
                                                                <?php else : ?>
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
                                                                            <?= $g['waktu_submit']; ?>
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
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Detail -->

                                        <!-- Start Modal Detail Awal -->
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
                                                                            <b>Approval User</b>
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
                                                                            <b>Approval SPV</b>
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
                                                                <?php if ($g['keterangan_submit'] === null) : ?>
                                                                <?php else : ?>
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
                                                                            <?= $g['waktu_submit']; ?>
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
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Detail -->

                                        <!-- Start Modal Submit -->
                                        <div class="modal fade" id="modal-submit-gangguan<?= $g['id']; ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Submit Perbaikan Gangguan</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('gangguanprovider/submit') . '/' . $g['id']; ?>" method="post" enctype="multipart/form-data">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <?php if ($g['keterangan_reject'] === null) : ?>
                                                                        <span></span>
                                                                    <?php else : ?>
                                                                        <div class="form_group">
                                                                            <span>
                                                                                <b>
                                                                                    Keterangan Reject Perbaikan
                                                                                </b>
                                                                                <br>
                                                                                <small class="text-danger">
                                                                                    <b>
                                                                                        <?= $g['keterangan_reject']; ?>
                                                                                    </b>
                                                                                </small>
                                                                            </span>
                                                                        </div>
                                                                        <hr>
                                                                    <?php endif; ?>
                                                                    <div class="form-group">
                                                                        <label for="keterangan_submit">Keterangan Perbaikan</label>
                                                                        <textarea class="form-control text-sm" rows="3" name="keterangan_submit" id="keterangan_submit" placeholder="Masukkan keterangan perbaikan" <?= ($validation->hasError('keterangan_submit')) ? 'is-invalid' : ''; ?> required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('keterangan_submit'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="bukti_submit">Foto Bukti Perbaikan</label>
                                                                        <input type="file" name="bukti_submit" id="bukti_submit" class="form-control-file" <?= ($validation->hasError('bukti_submit')) ? 'is-invalid' : ''; ?>>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('bukti_submit'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex bd-highlight">
                                                            <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Submit -->

                                        <!-- Start Modal Stop Clock -->
                                        <div class="modal fade" id="modal-stopclock-gangguan<?= $g['id']; ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Pengajuan Stopclock</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('/gangguanprovider/stopClock') . '/' . $g['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="keterangan_stopclock">Keterangan StopClock</label>
                                                                        <textarea class="form-control text-sm" rows="3" name="keterangan_stopclock" id="keterangan_stopclock" placeholder="Masukkan keterangan pengajuan stopclock" <?= ($validation->hasError('keterangan_stopclock')) ? 'is-invalid' : ''; ?> required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('keterangan_stopclock'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tambahan Waktu Penyelesaian</label>
                                                                        <select class="form-control text-sm" name="extra_time" id="extra_time" style="width: 100%;">
                                                                            <option disabled="disabled" selected="selected">
                                                                                Pilih Durasi</option>
                                                                            <option value="1">
                                                                                1 Jam
                                                                            </option>
                                                                            <option value="2">
                                                                                2 Jam
                                                                            </option>
                                                                            <option value="3">
                                                                                3 Jam
                                                                            </option>
                                                                            <option value="4">
                                                                                4 Jam
                                                                            </option>
                                                                            <option value="5">
                                                                                5 Jam
                                                                            </option>
                                                                            <option value="6">
                                                                                6 Jam
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex bd-highlight">
                                                            <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Stop Clock -->
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
<?php foreach ($gangguan as $g) : ?>
    <script>
        $("#link").select2({
            dropdownParent: $('#modal-edit-gangguan<?= $g['id'] ?>')
        });
    </script>
<?php endforeach; ?>
<script>
    $(document).ready(function() {
        $('.datetimepickers').datetimepicker();
    });
</script>
<?= $this->endSection(); ?>