<!DOCTYPE html>

<html lang="en">
<?php
global $SConfig;
$subkriteria = @$subkriteria[0];
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
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
                                <span id="alertText"></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><?= @$title ?></h3>
                                </div>

                                <form class="form-horizontal" method="post" action="edit" data-refresh="false" data-url="<?= site_url("subkriteria/api/ubah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                                <input type="hidden" name="is_update" value="<?= $is_update ?>">
                                <input type="hidden" name="kode_subkriteria" value="<?= @$subkriteria->kode_subkriteria ?>">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="kode_kriteria" class="col-sm-2 col-form-label">Kriteria</label>
                                            <div class="col-sm-10">
                                                <select name="kode_kriteria" id="kode_kriteria" class="form-control" required="true">
                                                    <option value="">-- PILIH KRITERIA --</option>
                                                    <?php
                                                    foreach ($kriteria as $key => $v) { ?>
                                                        <option value="<?= $v->kode_kriteria ?>" <?= (@$subkriteria->kode_kriteria == $v->kode_kriteria ? "selected" : "") ?>><?= $v->nama_kriteria ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="keterangan" required="true" id="keterangan" placeholder="" value="<?= @$subkriteria->keterangan ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keterangan" class="col-sm-2 col-form-label">Nilai</label>
                                            <div class="col-sm-10">
                                                <select name="nilai" id="nilai" class="form-control" required="true">
                                                    <option value="">-- PILIH NILAI --</option>
                                                    <option value="1" <?= (@$subkriteria->nilai == '1' ? "selected" : "") ?>>1</option>
                                                    <option value="2" <?= (@$subkriteria->nilai == '2' ? "selected" : "") ?>>2</option>
                                                    <option value="3" <?= (@$subkriteria->nilai == '3' ? "selected" : "") ?>>3</option>
                                                    <option value="4" <?= (@$subkriteria->nilai == '4' ? "selected" : "") ?>>4</option>
                                                    <option value="5" <?= (@$subkriteria->nilai == '5' ? "selected" : "") ?>>5</option>
                                                    <option value="1 - 100" <?= (@$subkriteria->nilai == '1 - 100' ? "selected" : "") ?>>1 - 100</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="ahgatau" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                            </div>
                                        </div>

                                    </div>

                                </form>
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