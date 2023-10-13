<!DOCTYPE html>

<html lang="en">
<?php
global $SConfig;
$kriteria = @$kriteria[0];
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

                                <form class="form-horizontal" method="post" action="edit" data-refresh="false" data-url="<?= site_url("kriteria/api/ubah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="kode_kriteria" class="col-sm-2 col-form-label">Kode Kriteria</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="is_update" value="<?=$is_update?>">
                                                <input type="text" class="form-control" name="kode_kriteria" required="true" id="kode_kriteria" placeholder="Kode kriteria unik, tidak boleh sama" <?=($is_update == 1 ? "readonly title='Tidak dapat mengubah kode kriteria.'" : "")?> value="<?=@$kriteria->kode_kriteria?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_kriteria" required="true" id="nama_kriteria" placeholder="" value="<?=@$kriteria->nama_kriteria?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sifat" class="col-sm-2 col-form-label">Sifat</label>
                                            <div class="col-sm-10">
                                                <select name="sifat" id="sifat" class="form-control" required="true">
                                                    <option value="">-- PILIH SIFAT --</option>
                                                    <option value="Cost" <?=@$kriteria->sifat == "Cost" ? "selected" : ""?>>Cost</option>
                                                    <option value="Benefit" <?=@$kriteria->sifat == "Benefit" ? "selected" : ""?>>Benefit</option>
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