<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="mb-4">Branch</h1>
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
                                    <h3 class="card-title">Daftar Branch</h3>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-4">

                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-2 float-end">
                                    <button type="button" data-toggle="modal" data-target="#modal-tambah-branch" data-backdrop="static" class="btn btn-block bg-primary">Tambah Branch<i class="fa fa-plus-circle ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tableBranch" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Branch</th>
                                        <th>Nama Branch</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Regional</th>
                                        <th>Jenis Branch</th>
                                        <th>Klasifikasi Branch</th>
                                        <th style="width: 80px" class="text-center"><i class="nav-icon fas fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($branch_all as $brch) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $brch['kode_branch']; ?></td>
                                            <td><?= $brch['nama_branch']; ?></td>
                                            <td><?= $brch['no_telp']; ?></td>
                                            <td><?= $brch['alamat']; ?></td>
                                            <td><?= $brch['nama_regional']; ?></td>
                                            <td><?= $brch['jenis_branch']; ?></td>
                                            <td><?= $brch['nama_klasifikasi']; ?></td>
                                            <td class="text-center">
                                                <!-- Edit -->
                                                <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-backdrop="static" data-target="#modal-edit-branch<?= $brch['id']; ?>"><i class="nav-icon fas fa-edit"></i></a>
                                                <!-- Delete -->
                                                <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-backdrop="static" data-target="#modal-hapus-branch<?= $brch['id']; ?>"><i class=" nav-icon fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="modal-hapus-branch<?= $brch['id'] ?>">
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
                                                            <?= $brch['nama_branch']; ?> :
                                                            <?= $brch['nama_regional']; ?> <br>
                                                            <?= $brch['jenis_branch']; ?>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                        <form action="<?= base_url('/branch') . '/' . $brch['id']; ?>" method="post">
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
                                        <div class="modal fade" id="modal-edit-branch<?= $brch['id']; ?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Form Edit Branch</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('/branch/update/') . '/' . $brch['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="kode_branch">Kode Branch</label>
                                                                        <input type="text" class="form-control text-sm <?= ($validation->hasError('kode_branch')) ? 'is-invalid' : ''; ?>" name="kode_branch" id="kode_branch" placeholder="Masukkan kode branch" maxlength="3" value="<?= $brch['kode_branch']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autofocus required>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('kode_branch'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_branch">Nama Branch</label>
                                                                        <input type="text" class="form-control text-sm <?= ($validation->hasError('nama_branch')) ? 'is-invalid' : ''; ?>" name="nama_branch" id="nama_branch" placeholder="Masukkan nama branch" value="<?= $brch['nama_branch']; ?>" required>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('nama_branch'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <textarea rows="3" class="form-control text-sm <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat" placeholder="Masukkan Alamat" required><?= $brch['alamat']; ?></textarea>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('alamat'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_telp">No Telp</label>
                                                                        <input type="text" class="form-control text-sm <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" name="no_telp" id="no_telp" oninput="this.value = this.value.replace(/[^0-9,-()]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Masukkan nomor telpon" value="<?= $brch['no_telp']; ?>" required>
                                                                        <div class="invalid-feedback">
                                                                            <?= $validation->getError('no_telp'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Regional</label>
                                                                        <select class="form-control select2bs4 text-sm" name="regional" id="regional" style="width: 100%;">
                                                                            <option disabled="disabled" selected="selected">
                                                                                Pilih Regional
                                                                            </option>
                                                                            <?php foreach ($regional as $r) : ?>
                                                                                <option value="<?= $r['id']; ?>" <?php if ($r['nama_regional'] == $brch['nama_regional']) : ?>selected<?php endif; ?>>
                                                                                    <?= $r['nama_regional']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jenis Branch</label>
                                                                        <select class="form-control select2bs4 text-sm" name="jenis_branch" id="jenis_branch" style="width: 100%;">
                                                                            <option disabled="disabled" selected="selected">
                                                                                Pilih Jenis Branch
                                                                            </option>
                                                                            <?php foreach ($jenis_branch as $jb) : ?>
                                                                                <option value="<?= $jb['id']; ?>" <?php if ($jb['jenis_branch'] == $brch['jenis_branch']) : ?>selected<?php endif; ?>>
                                                                                    <?= $jb['jenis_branch']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Klasifikasi Branch</label>
                                                                        <select class="form-control select2bs4 text-sm" name="klasifikasi_branch" id="klasifikasi_branch" style="width: 100%;">
                                                                            <option disabled="disabled" selected="selected">
                                                                                Pilih Klasifikasi Branch
                                                                            </option>
                                                                            <?php foreach ($klasifikasi_branch as $kb) : ?>
                                                                                <option value="<?= $kb['id']; ?>" <?php if ($kb['nama_klasifikasi'] == $brch['nama_klasifikasi']) : ?>selected<?php endif; ?>>
                                                                                    <?= $kb['nama_klasifikasi']; ?></option>
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
                                        <th>No</th>
                                        <th>Kode Branch</th>
                                        <th>Nama Branch</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Regional</th>
                                        <th>Jenis Branch</th>
                                        <th>Klasifikasi Branch</th>
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
<div class="modal fade" id="modal-tambah-branch">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Branch</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/branch/save/') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kode_branch">Kode Branch</label>
                                <input type="text" class="form-control text-sm" name="kode_branch" id="kode_branch" placeholder="Masukkan kode branch" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="nama_branch">Nama Branch</label>
                                <input type="text" class="form-control text-sm" name="nama_branch" id="nama_branch" placeholder="Masukkan nama branch" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control text-sm" name="alamat" id="alamat" placeholder="Masukkan alamat" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input type="text" class="form-control text-sm" name="no_telp" id="no_telp" placeholder="Masukkan nomor telpon" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                            <div class="form-group">
                                <label>Regional</label>
                                <select class="form-control select2bs4 text-sm <?= ($validation->hasError('regional')) ? 'is-invalid' : ''; ?>" name="regional" id="regional" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Regional</option>
                                    <?php foreach ($regional as $r) : ?>
                                        <option value="<?= $r['id']; ?>">
                                            <?= $r['nama_regional']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Branch</label>
                                <select class="form-control select2bs4 text-sm <?= ($validation->hasError('jenis_branch')) ? 'is-invalid' : ''; ?>" name="jenis_branch" id="jenis_branch" style="width: 100%;" onchange="showDiv('klasifikasi', this)">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Jenis Branch</option>
                                    <?php foreach ($jenis_branch as $jb) : ?>
                                        <option value="<?= $jb['id']; ?>">
                                            <?= $jb['jenis_branch']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group" id="klasifikasi" style="display: none;">
                                <label>Klasifikasi Branch</label>
                                <select class="form-control select2bs4 text-sm <?= ($validation->hasError('klasifikasi_branch')) ? 'is-invalid' : ''; ?>" name="klasifikasi_branch" id="klasifikasi_branch" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">
                                        Pilih Klasifikasi Branch</option>
                                    <?php foreach ($klasifikasi_branch as $kb) : ?>
                                        <option value="<?= $kb['id']; ?>">
                                            <?= $kb['nama_klasifikasi']; ?>
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
        $("#tableBranch").DataTable({
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
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableBranch_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 2 ? 'block' : 'none';
    }
</script>
<?= $this->endSection(); ?>