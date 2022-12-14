<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Daftar SLA</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert" id="alert-delete">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card shadow-none border-0">
                        <div class="card-header">
                            <div class="row d-flex justify-content-between">
                                <div class="col-lg-6 col-sm-4 align-self-center">
                                    <h3 class="card-title">Daftar Gangguan</h3>
                                </div>
                                <div class="col-6">
                                    <div class="row d-flext justify-content-end">
                                        <div class="col-4 form-group">
                                            <!-- <label></label> -->
                                            <select class="form-control tahun" name="">
                                                <option value="">-- Pilih Tahun --</option>
                                                <!-- <option value="">Semua Provider</option> -->
                                                <option value="-2022">2022</option>
                                                <option value="-2023">2023</option>
                                                <option value="-2024">2024</option>
                                                <option value="-2025">2025</option>
                                                <option value="-2026">2026</option>
                                                <option value="-2027">2027</option>
                                            </select>
                                        </div>
                                        <div class="col-4 form-group">
                                            <!-- <label></label> -->
                                            <select class="form-control bulan" name="">
                                                <option value="">-- Pilih Bulan --</option>
                                                <!-- <option value="">Semua Provider</option> -->
                                                <option value="-1-">Januari</option>
                                                <option value="-2-">Februari</option>
                                                <option value="-3-">Maret</option>
                                                <option value="-4-">April</option>
                                                <option value="-5-">Mei</option>
                                                <option value="-6-">Juni</option>
                                                <option value="-7-">Juli</option>
                                                <option value="-8-">Agustus</option>
                                                <option value="-9-">September</option>
                                                <option value="-10-">Oktober</option>
                                                <option value="-11-">November</option>
                                                <option value="-12-">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-4 form-group">
                                            <!-- <label></label> -->
                                            <select class="form-control provider" name="">
                                                <option value="">-- Pilih Provider --</option>
                                                <option value="">Semua Provider</option>
                                                <option value="telkom">Telkom</option>
                                                <option value="tigatra">Trigatra</option>
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
                        </div>

                        <div class="card-body">
                            <table id="tableGangguan" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Nama Gangguan</th>
                                        <th>Link</th>
                                        <th>Start</th>
                                        <th>Submit</th>
                                        <th>Offline</th>
                                        <th>SLA</th>
                                        <th>Status</th>
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
                                            <td class="text-primary font-weight-bold"><?= date("d-m-Y H:i:s", strtotime($g['waktu_submit'])); ?></td>
                                            <td><?= $g['offline']; ?> detik</td>
                                            <td><?= $g['sla']; ?>%</td>
                                            <td class="text-uppercase">
                                                <span class="badge badge-pill 
                                                <?php if ($g['id_status'] === '5') : ?>
                                                badge-danger
                                                <?php else : ?>
                                                badge-success
                                                <?php endif ?>">
                                                    <?= $g['kategori']; ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <!-- PERBAIKAN SELESAI -->
                                                <?php if ($g['approval'] === 'YES') : ?>
                                                    <a href="" class="btn btn-sm <?php if ($g['id_status'] === '5') : ?>btn-outline-danger<?php elseif ($g['id_status'] === '7') : ?>btn-outline-success<?php else : ?>btn-outline-secondary<?php endif; ?>" data-toggle="modal" data-target="#modal-detail-gangguan<?= $g['id']; ?>"><i data-toggle="tooltip" data-placement="top" title="Detail" class="nav-icon fas <?php if (($g['id_status'] === '5') || ($g['id_status'] === '7')) : ?>fa-check<?php else : ?>fa-list <?php endif; ?>"></i></a>
                                                <?php else : ?>
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
                                                                        <b>Nomor Tiket</b>
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

                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Jenis Link</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <?= $g['jenis_link']; ?>
                                                                    </div>
                                                                </div>

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

                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <b>Start Gangguan</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8 text-primary">
                                                                        <?= date("d-m-Y H:i:s", strtotime($g['start'])); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-3 ">
                                                                        <b>End Gangguan</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8 text-danger">
                                                                        <?= date("d-m-Y H:i:s", strtotime($g['end'])); ?>
                                                                    </div>
                                                                </div>

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

                                                                <div class="row">
                                                                    <div class="col-3 ">
                                                                        <b>Restitusi</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8">
                                                                        Rp<?= number_format($g['restitusi'], 0, '', '.'); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-3 ">
                                                                        <b>Total Tagihan</b>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        :
                                                                    </div>
                                                                    <div class="col-8 text-success font-weight-bold">
                                                                        Rp<?= number_format($g['tagihan_bulanan'], 0, '', '.'); ?>
                                                                    </div>
                                                                </div>

                                                                <?php if ($g['keterangan_stopclock'] !== null) : ?>
                                                                    <hr>
                                                                    <h6 class="text-danger">
                                                                        <b>
                                                                            STOPCLOCK
                                                                        </b>
                                                                    </h6>

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

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Start StopClock</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8 text-secondary font-weight-bold">
                                                                            <?= date("d-m-Y H:i:s", strtotime($g['start_stopclock'])); ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Durasi StopClock</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['extra_time_stopclock']; ?> Detik
                                                                        </div>
                                                                    </div>

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
                                                                <?php if ($g['waktu_start'] === null) : ?>
                                                                <?php else : ?>
                                                                    <hr>
                                                                    <h6 class="text-warning">
                                                                        <b>
                                                                            START PERBAIKAN
                                                                        </b>
                                                                    </h6>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Keterangan Start</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['keterangan_start']; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Waktu Start</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= date("d-m-Y H:i:s", strtotime($g['waktu_start'])); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Durasi Respon</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['waktu_respon'] ?> Detik
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if ($g['keterangan_reject'] !== null) : ?>
                                                                    <hr>
                                                                    <h6 class="text-danger">
                                                                        <b>
                                                                            REJECT PERBAIKAN
                                                                        </b>
                                                                    </h6>

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

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Waktu Submit</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <b>
                                                                                <?= date("d-m-Y H:i:s", strtotime($g['waktu_submit'])); ?>
                                                                            </b>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <b>Durasi Perbaikan</b>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            :
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <?= $g['waktu_perbaikan']; ?> Detik
                                                                        </div>
                                                                    </div>

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
                                        <th>Nama Gangguan</th>
                                        <th>Link</th>
                                        <th>Start</th>
                                        <th>Submit</th>
                                        <th>Offline</th>
                                        <th>SLA</th>
                                        <th>Status</th>
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

            "order": [
                [3, 'asc']
            ],
            "responsive": true,
            "lengthChange": false,
            "pageLength": 100,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "buttons": ["copy", "csv", "excel", {
                    extend: 'pdf',
                    text: 'PDF',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    },
                    header: true,
                    title: 'Daftar SLA <?= date('Y') ?>'
                }, "print",
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableGangguan').DataTable();

        function filterData() {
            $('#tableGangguan').DataTable().search(
                $('.provider').val()
            ).draw();
        }
        $('.provider').on('change', function() {
            filterData();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableGangguan').DataTable();

        function filterData() {
            $('#tableGangguan').DataTable().search(
                $('.bulan').val()
            ).draw();
        }
        $('.bulan').on('change', function() {
            filterData();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableGangguan').DataTable();

        function filterData() {
            $('#tableGangguan').DataTable().search(
                $('.tahun').val()
            ).draw();
        }
        $('.tahun').on('change', function() {
            filterData();
        });
    });
</script>



<?= $this->endSection(); ?>