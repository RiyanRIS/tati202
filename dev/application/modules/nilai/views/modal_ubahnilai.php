<div class="row">
  <div class="col-sm-12">
    <input type="hidden" name="is_update" value="1">
    <input type="hidden" name="nis" value="<?= @$record->nis ?>">
    <input type="hidden" name="kode_kriteria" value="<?= @$record->kode_kriteria ?>">
    <input type="hidden" name="kode_nilai" value="<?= @$record->kode_nilai ?>">
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama" required="true" id="nama" placeholder="" disabled="" value="<?= @$record->nama_siswa ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="kriteria" class="col-sm-2 col-form-label">Kriteria</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="kriteria" required="true" id="kriteria" placeholder="" disabled="" value="<?= @$record->nama_kriteria ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nilai" required="true" id="nilai" placeholder="" value="<?= @$record->nilai ?>">
      </div>
    </div>
  </div>
</div>