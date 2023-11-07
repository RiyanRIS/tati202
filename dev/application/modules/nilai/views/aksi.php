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

                                <form class="form-horizontal" method="post" action="edit" data-refresh="false" data-url="<?= site_url("nilai/api/ubah") ?>" id="formulir" enctype="multipart/form-data" accept-charset="utf-8">
                                    <input type="hidden" name="is_update" value="<?= $is_update ?>">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-10">
                                                <select name="kelas" id="kelas" class="form-control select2" required="true">
                                                    <option value="">-- PILIH KELAS --</option>
                                                    <?php
                                                    foreach ($kelas as $key => $v) { ?>
                                                        <option value="<?= $v->kode_kelas ?>"><?= $v->nama_kelas ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nis" class="col-sm-2 col-form-label">Siswa</label>
                                            <div class="col-sm-10">
                                                <select name="nis" id="nis" class="form-control select2" required="true">
                                                    <option value="">-- PILIH KELAS TERLEBIH DAHULU --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kode_kriteria" class="col-sm-2 col-form-label">Kriteria</label>
                                            <div class="col-sm-10">
                                                <select name="kode_kriteria" id="kode_kriteria" class="form-control" required="true">
                                                    <option value="">-- PILIH SISWA TERLEBIH DAHULU --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="html_nilai">
                                            <label for="kode_subkriteria" class="col-sm-2 col-form-label">Nilai</label>
                                            <div class="col-sm-10">
                                                <select name="nilai" id="kode_subkriteria" class="form-control" required="true">
                                                    <option value="">-- PILIH KRITERIA TERLEBIH DAHULU --</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="btnsubmit2" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" id="btnsubmit" class="btn btn-info">Simpan</button>
                                                <a href="<?= site_url('nilai') ?>" class="btn btn-danger">Kembali</a>
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
            $('#html_nilai').empty();

            $("#kelas").on("change", function() {
                var selectedValue = $(this).val();
                getSiswa(selectedValue)
            })

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
                                let text = '<label for="kode_subkriteria" class="col-sm-2 col-form-label">Nilai</label><div class="col-sm-10"><select name="nilai" id="kode_subkriteria" class="form-control" required="true"></select></div>';
                                $('#html_nilai').empty();
                                $('#html_nilai').html(text);
                                $("#kode_subkriteria").empty();
                                $("#kode_subkriteria").append('<option value="">--- PILIH NILAI ---</option>');
                                $.each(data_subkriteria, function(index, option) {
                                    $("#kode_subkriteria").append('<option value="' + option.nilai + '">' + option.nilai + ' (' + option.keterangan + ')' + '</option>');
                                });
                            } else {
                                $('#html_nilai').empty();
                                let text = '<label for="kode_subkriteria" class="col-sm-2 col-form-label">Nilai</label><div class="col-sm-10"><input type="number" name="nilai" id="kode_subkriteria" class="form-control" required="true" placeholder="1 - 100" min="1" max="100"></div>';
                                $('#html_nilai').html(text);
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
                getKriteria(selectedSiswa);
                refreshTabel(selectedSiswa);
            });

            $('#formulir').submit(function(e) {
                e.preventDefault()
                var dataToSend = new FormData(this)
                var formId = $(this)
                var formIdN = $(this).closest("form").attr('id')
                var submit = $(this).closest('form').find(':submit')
                var action = $(formId).attr('action')
                var url = $(formId).attr('data-url')
                var refresh = $(formId).attr('data-refresh')

                $('#modalnya .modal-footer #submit').prop('disabled', true)
                submit.prop('disabled', true)
                $(".is-invalid").removeClass("is-invalid");

                $.ajax({
                    url: url,
                    dataType: 'json',
                    type: 'post',
                    data: dataToSend,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: async function() {
                        $('#loading').show()
                    },
                    complete: function() {
                        $('#loading').hide()
                        $('.overlay').remove()
                        $("input[type='password']").val("")
                        $('#modalnya .modal-footer #submit').prop('disabled', false)
                        submit.prop('disabled', false)
                    },
                    error: function() {
                        toastr.error("Terjadi Kesalahan Pada Server!", "Error");
                    },
                    success: async function(data) {
                        if (data.status) {
                            if (refresh == true) {
                                window.location.href = data.url
                            } else {
                                await setTimeout(function() {
                                    Swal.fire("Berhasil!", data.message, "success").then(function() {
                                        var selectedSiswa = $('#nis').val();
                                        getKriteria(selectedSiswa);
                                        refreshTabel(selectedSiswa)
                                    })
                                }, 500);
                            }
                        } else {
                            if (data.err_form) {
                                data.err_form.forEach((v, i) => {
                                    $("input[name='" + v + "']").addClass('is-invalid')
                                    $("select[name='" + v + "']").addClass('is-invalid')
                                })
                            }

                            $("#alertText").html(data.message)
                            $("#myAlert").show(300);

                            setTimeout(function() {
                                $("#myAlert").hide(300);
                            }, 5000);
                        }
                    }
                })
            })

            $('#btnsubmit').on('click', function() {
                setTimeout(() => {

                }, 1000);
            })
        });


        function getSiswa(kode_kelas) {
            $.ajax({
                url: "<?= site_url('nilai/api/get_siswa_by_kelas/') ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    kode_kelas: kode_kelas
                },
                success: function(data) {
                    if (data.status) {
                        let data_subkriteria = data.data
                        if (data_subkriteria.length >= 1) {
                            $("#nis").empty();
                            $("#nis").append('<option value="">--- PILIH SISWA ---</option>');
                            $.each(data_subkriteria, function(index, option) {
                                $("#nis").append('<option value="' + option.nis + '">' + option.nama_siswa + '</option>');
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
        }

        function getKriteria(nis) {
            $.ajax({
                url: "<?= site_url('nilai/api/get_kriteria_by_nis/') ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    nis: nis
                },
                success: function(data) {
                    if (data.status) {
                        let data_subkriteria = data.data
                        $("#kode_kriteria").empty();
                        $("#kode_kriteria").append('<option value="">--- PILIH KRITERIA ---</option>');
                        if (data_subkriteria.length >= 1) {
                            $.each(data_subkriteria, function(index, option) {
                                $("#kode_kriteria").append('<option value="' + option.kode_kriteria + '">' + option.nama_kriteria + ' (' + option.bobot + ' %)' + '</option>');
                            });
                        } else {
                            $("#kode_kriteria").empty();
                            $("#kode_kriteria").append('<option value="">--- SUDAH LENGKAP ---</option>');
                        }

                    } else {
                        toastr.error("Gagal mengambil data!", "Error");
                    }
                },
                error: function() {
                    toastr.error("Terjadi Kesalahan Pada Server!", "Error");
                },
            });
        }

        function refreshTabel(nis) {
            $('#html_nilai').empty();
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
                                    '<td>' + nilai.nama_siswa + '</td>' +
                                    '<td>' + nilai.nama_kriteria + '</td>' +
                                    '<td>' + nilai.nilai + '</td>' +
                                    '<td>' +
                                    '<button type="button" onclick="hapus2(\'' + '<?= site_url('nilai/hapus/') ?>' + nilai.kode_nilai + '\')" class="btn btn-danger btn-sm">Hapus</button>' +
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

        function hapus2(url) {
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah anda yakin menghapus data ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        type: 'get',
                        error: function() {
                            Swal.fire("Gagal!", "Terjadi kesalahan dari sisi server.", "error");
                        },
                        success: async function(data) {
                            if (data.status) {
                                Swal.fire("Terhapus!", data.message, "success").then(() => {
                                    var selectedSiswa = $('#nis').val();
                                    getKriteria(selectedSiswa);
                                    refreshTabel(selectedSiswa)
                                })
                            } else {
                                Swal.fire("Gagal!", data.message, "error");
                            }
                        }
                    });
                }
            });
        }
    </script>
</body>

</html>