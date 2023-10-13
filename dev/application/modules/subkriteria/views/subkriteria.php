<!DOCTYPE html>

<html lang="en">
<?php
global $SConfig;
?>
<?= $this->load->view('template/head') ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->load->view('template/nav') ?>
        <div class="content-wrapper">
            <?= $this->load->view('template/content_header') ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?= site_url('subkriteria/aksi') ?>" class="btn btn-success btn-sm">Tambah Subkriteria</a>
                                </div>

                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA KRITERIA</th>
                                                <th>KETERANGAN</th>
                                                <th>NILAI</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($subkriteria as $key => $v) {
                                                ?>
                                                <tr>
                                                    <td><?= ++$key ?></td>
                                                    <td><?= $v->nama_kriteria ?></td>
                                                    <td><?= $v->keterangan ?></td>
                                                    <td><?= $v->nilai ?></td>
                                                    <td>
                                                        <a href="<?= site_url('subkriteria/aksi/' . $v->kode_subkriteria) ?>" class="btn btn-info btn-sm">Ubah</a>
                                                        <button type="button" onclick="hapus('<?=site_url('subkriteria/hapus/' . $v->kode_subkriteria)?>')" class="btn btn-danger btn-sm">Hapus</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
        <?= $this->load->view('template/footer') ?>
    </div>

    <?= $this->load->view('template/script') ?>

</body>

</html>