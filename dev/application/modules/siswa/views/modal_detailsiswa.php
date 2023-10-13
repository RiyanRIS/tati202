<div class="row">
    <div class="col-sm-4">
        <img src="<?= base_url('uploads/siswa/' . @$siswa->foto) ?>" alt="..." width="100%" class="border rounded" onerror="this.src='https://as1.ftcdn.net/v2/jpg/03/53/11/00/1000_F_353110097_nbpmfn9iHlxef4EDIhXB1tdTD0lcWhG9.jpg'" >
        <?php if(!empty(@$siswa->foto)){ ?>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="hapus_foto('<?= site_url('siswa/hapus_foto/' . $siswa->nis) ?>')" class="btn btn-sm btn-danger mt-3">Hapus Foto</button>
        </div>
        <?php } ?>
    </div>
    <div class="col-sm-8">
        <form class="form-horizontal" method="post" action="edit" data-refresh="false" data-url="<?= site_url("siswa/api/ubah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="nis" required="true" id="nis" placeholder="" readonly="" value="<?= @$siswa->nis ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="nama_siswa" required="true" id="nama_siswa" readonly="" placeholder="" value="<?= @$siswa->nama_siswa ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="kelas" required="true" id="kelas" readonly="" placeholder="" value="<?= @$siswa->nama_kelas ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="jk_siswa" id="laki" disabled="" required="true" checked="true" value="laki-laki">
                        <label for="laki" class="custom-control-label">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="jk_siswa" id="perem" disabled="" required="true" <?= (@$siswa->jk_siswa == "perempuan" ? "checked" : "") ?> value="perempuan">
                        <label for="perem" class="custom-control-label">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" readonly="" required="true"> <?= @$siswa->alamat ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="tempat_lahir" required="true" readonly="" id="tempat_lahir" placeholder="" value="<?= @$siswa->tempat_lahir ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="date" class="form-control" name="tanggal_lahir" required="true" readonly="" id="tanggal_lahir" placeholder="" value="<?= @$siswa->tanggal_lahir ?>">
                </div>
            </div>

        </form>
    </div>
</div>