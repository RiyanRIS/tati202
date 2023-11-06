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
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Alternatif Nilai</h3>
                                </div>

                                <form class="form-horizontal" method="post" action="edit" data-refresh="false" data-url="<?= site_url("nilai/api/ubah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                                    <input type="hidden" name="is_update" value="<?= $is_update ?>">
                                    <input type="hidden" name="kode_nilai" value="<?= @$nilai->kode_nilai ?>">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="nis" class="col-sm-2 col-form-label">Siswa</label>
                                            <div class="col-sm-10">
                                                <select name="nis" id="nis" class="form-control select2" required="true">
                                                    <option value="">-- PILIH SISWA --</option>
                                                    <?php
                                                    foreach ($siswa as $key => $v) { ?>
                                                        <option value="<?= $v->nis ?>" <?= (@$nilai->nis == $v->nis ? "selected" : "") ?>><?= $v->nama_siswa ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kode_kriteria" class="col-sm-2 col-form-label">Kriteria</label>
                                            <div class="col-sm-10">
                                                <select name="kode_kriteria" id="kode_kriteria" class="form-control" required="true">
                                                    <option value="">-- PILIH KRITERIA --</option>
                                                    <?php
                                                    foreach ($kriteria as $key => $v) { ?>
                                                        <option value="<?= $v->kode_kriteria ?>" <?= (@$nilai->kode_kriteria == $v->kode_kriteria ? "selected" : "") ?>><?= $v->nama_kriteria ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row" id="html_nilai">
                                            <label for="kode_subkriteria" class="col-sm-2 col-form-label">Nilai</label>
                                            <div class="col-sm-10">
                                                <select name="nilai" id="kode_subkriteria" class="form-control" required="true">
                                                    <option value="">-- PILIH SUBKRITERIA --</option>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="nilaiTable" class="table table-bordered table-hover ">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA SISWA</th>
                                                <th>KRITERIA</th>
                                                <th>NILAI</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            // Ketika elemen select berubah
            $("#kode_kriteria").on("change", function() {
                var selectedValue = $(this).val();
                $.ajax({
                    url: "<?= site_url('nilai/api/get_subkriteria/') ?>", // Ganti dengan URL server yang sesuai
                    method: "POST", // Sesuaikan metode HTTP yang diperlukan
                    dataType: 'json',
                    data: {
                        kode_kriteria: selectedValue
                    },
                    success: function(data) {
                        if (data.status) {
                            let data_subkriteria = data.data
                            if (data_subkriteria.length >= 1) {
                                $("#kode_subkriteria").empty();
                                $.each(data_subkriteria, function(index, option) {
                                    $("#kode_subkriteria").append('<option value="' + option.nilai + '">' + option.nilai + ' (' + option.keterangan + ')' + '</option>');
                                });
                            } else {

                            }

                        } else {
                            toastr.error("Gagal mengambil data!", "Error");
                        }
                    },
                    error: function() {
                        toastr.error("Terjadi Kesalahan Pada Server!", "Error");
                    },
                });
            });

            $("#nis").on("change", function() {
                var selectedSiswa = $(this).val();
                refreshTabel(selectedSiswa)
            });

            function refreshTabel(nis){
                $.ajax({
                    url: "<?= site_url('nilai/api/get_nilai_siswa/') ?>",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        nis: nis,
                    },
                    success: function(data) {
                        $("#nilaiTable tbody").empty();
                        if (data.status) {
                            let nilaiSiswa = data.data;
                            if (nilaiSiswa.length >= 1) {
                                // Bersihkan dan tampilkan data dalam tabel "nilaiTable"
                                $.each(nilaiSiswa, function(index, nilai) {
                                    $("#nilaiTable tbody").append('<tr>' +
                                        '<td>' + (index + 1) + '</td>' +
                                        '<td>' + nilai.nis + '</td>' +
                                        '<td>' + nilai.kode_kriteria + '</td>' +
                                        '<td>' + nilai.nilai + '</td>' +
                                        '<td>' +
                                        '<button type="button" onclick="hapus(\'' + '<?= site_url('nilai/hapus/') ?>' + nilai.kode_nilai + '\')" class="btn btn-danger btn-sm">Hapus</button>' +
                                        '</td>' +
                                        '</tr>');
                                });
                            }
                        }
                        $("#nilaiTable").DataTable()
                    },
                    error: function() {
                        toastr.error("Terjadi Kesalahan Pada Server!", "Error");
                    },
                });
            }
        });
    </script>
</body>

</html>