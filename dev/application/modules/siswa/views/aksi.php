<!DOCTYPE html>

<html lang="en">
<?php
global $SConfig;
$siswa = @$siswa[0];
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
                                <form class="form-horizontal" method="post" action="edit" data-refresh="false" data-url="<?= site_url("siswa/api/ubah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="nis" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="is_update" value="<?= $is_update ?>">
                                                <input type="text" class="form-control" name="nis" required="true" id="nis" placeholder="" <?= ($is_update == 1 ? "readonly title='Tidak dapat mengubah nomor induk siswa.'" : "") ?> value="<?= @$siswa->nis ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Lengkap Siswa</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_siswa" required="true" id="nama_siswa" placeholder="" value="<?= @$siswa->nama_siswa ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kode_kelas" class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-10">
                                                <select name="kode_kelas" id="kode_kelas" class="form-control" required="true">
                                                    <option value="">-- PILIH KELAS --</option>
                                                    <?php
                                                    foreach ($kelas as $key => $v) { ?>
                                                        <option value="<?= $v->kode_kelas ?>" <?= (@$siswa->kode_kelas == $v->kode_kelas ? "selected" : "") ?>><?= $v->nama_kelas ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="jk_siswa" id="laki" required="true" checked="true" value="laki-laki">
                                                    <label for="laki" class="custom-control-label">Laki-laki</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="jk_siswa" id="perem" required="true" <?= (@$siswa->jk_siswa == "perempuan" ? "checked" : "") ?> value="perempuan">
                                                    <label for="perem" class="custom-control-label">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" required="true"> <?= @$siswa->alamat ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tempat_lahir" required="true" id="tempat_lahir" placeholder="" value="<?= @$siswa->tempat_lahir ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_lahir" required="true" id="tanggal_lahir" placeholder="" value="<?= @$siswa->tanggal_lahir ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto Siswa</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="foto" id="foto" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ahgatau" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                <a href="<?=site_url('siswa')?>" class="btn btn-danger">Kembali</a>
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