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

                                <form class="form-horizontal" method="post" action="edit" data-refresh="true" data-url="<?= site_url("nilai/api/ubah") ?>" id="formulir" enctype="multipart/form-data" accept-charset="utf-8">
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

                                        <?php foreach ($kriteria as $key => $v) { ?>
                                            <div class="form-group row">
                                                <label for="nis" class="col-sm-2 col-form-label"><?= $v->nama_kriteria ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nilai[<?= $v->kode_kriteria ?>]" id="nilai" class="form-control" required="">
                                                </div>
                                            </div>
                                        <?php } ?>



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

            $("#kelas").on("change", function() {
                var selectedValue = $(this).val();
                getSiswa(selectedValue)
            })

            $("#nis").on("change", function() {
                var selectedValue = $(this).val();
                cekNilai(selectedValue)
            })

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
                        console.log(data)
                        if (data.status) {
                            if (refresh == 'true') {
                                window.location.href = data.url
                            } else {
                                await setTimeout(function() {
                                    Swal.fire("Berhasil!", data.message, "success")
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

        function cekNilai(nis) {
            $.ajax({
                url: "<?= site_url('nilai/api/get_nilai_siswa/') ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    nis: nis
                },
                success: function(data) {
                    $('input[type=text]').val('')
                    $('input[name=is_update]').val('0')
                    if (data.status) {
                        if (data.kode_status == 200) {
                            toastr.info("Nilai siswa sudah ada!", "Informasi!");

                            $('input[name=is_update]').val('1')
                            data.data.forEach((obj) => {
                                const {
                                    kode_kriteria,
                                    nilai
                                } = obj;

                                const inputSelector = `input[name="nilai[${kode_kriteria}]"]`;

                                const inputElement = document.querySelector(inputSelector);
                                if (inputElement) {
                                    inputElement.value = nilai;
                                }
                            });

                        }
                    }
                },
                error: function() {
                    toastr.error("Terjadi Kesalahan Pada Server!", "Error");
                },
            });
        }
    </script>
</body>

</html>