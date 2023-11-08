<!DOCTYPE html>

<html lang="en">
<?php
global $SConfig;
$pengguna = @$pengguna[0];
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

                                <form class="form-horizontal" method="post" action="edit" data-refresh="<?=($is_update ? "false" : "true")?>" data-url="<?= site_url("pengguna/api/ubah") ?>" id="myForm" enctype="multipart/form-data" accept-charset="utf-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id_user" value="<?= @$pengguna->id_user ?>">
                                                <input type="hidden" name="is_update" value="<?= $is_update ?>">
                                                <input type="text" class="form-control" name="username" required="true" id="username" placeholder="Username bersifat unik" value="<?= @$pengguna->username ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" <?= $is_update ? "" : "required" ?> class="form-control" name="password" id="password" placeholder="<?= $is_update ? "Isi jika merubah password" : "Password harus mengandung huruf kecil, huruf besar, dan angka." ?>" value="">
                                                <div id="password-strength-container" class=" mt-3">
                                                    <div class="progress">
                                                        <div id="password-strength" class="progress-bar" role="progressbar" style="width: 0%"></div>
                                                    </div>
                                                    <div id="password-labels" class="text-muted small">
                                                        <span class="badge bg-danger" id="digit-label">Digit</span> |
                                                        <span class="badge bg-danger" id="uppercase-label">Uppercase</span> |
                                                        <span class="badge bg-danger" id="lowercase-label">Lowercase</span> |
                                                        <!-- <span class="badge bg-danger" id="length-label">&gt;8</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="confirm-password" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" <?= $is_update ? "" : "required" ?> class="form-control" name="confirm_password" id="confirm-password" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-10">
                                                <select name="role" id="role" class="form-control" required="true">
                                                    <option value="">-- PILIH ROLE --</option>
                                                    <option value="admin" <?= @$pengguna->role == "admin" ? "selected" : "" ?>>Administrator</option>
                                                    <option value="kepalasekolah" <?= @$pengguna->role == "kepalasekolah" ? "selected" : "" ?>>Kepala Sekolah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="ahgatau" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                <a href="<?= site_url('pengguna') ?>" class="btn btn-danger">Kembali</a>
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
            // var password = $("#password").val();
            var passwordStrengthh = 0;

            // Fungsi untuk memeriksa kekuatan password
            function checkPasswordStrength() {
                var password = $("#password").val();
                var passwordStrength = 0;

                // Pemeriksaan kekuatan password
                if (password.match(/[0-9]+/)) {
                    passwordStrength += 33;
                    $("#digit-label").addClass("bg-success").removeClass("bg-danger");
                } else {
                    $("#digit-label").addClass("bg-danger").removeClass("bg-success");
                }

                if (password.match(/[A-Z]+/)) {
                    passwordStrength += 33;
                    $("#uppercase-label").addClass("bg-success").removeClass("bg-danger");
                } else {
                    $("#uppercase-label").addClass("bg-danger").removeClass("bg-success");
                }

                if (password.match(/[a-z]+/)) {
                    passwordStrength += 34;
                    $("#lowercase-label").addClass("bg-success").removeClass("bg-danger");
                } else {
                    $("#lowercase-label").addClass("bg-danger").removeClass("bg-success");
                }

                // if (password.length >= 8) {
                //     passwordStrength += 25;
                //     $("#length-label").addClass("bg-success").removeClass("bg-danger");
                // } else {
                //     $("#length-label").addClass("bg-danger").removeClass("bg-success");
                // }

                passwordStrengthh = passwordStrength

                if (passwordStrength == 100) {
                    $("#password").addClass("is-valid").removeClass("is-invalid");
                    $("#password-strength").addClass("bg-success").removeClass("bg-danger");
                } else {
                    $("#password").addClass("is-invalid").removeClass("is-valid");
                    $("#password-strength").removeClass("bg-success");
                }

                // Update tampilan progres bar
                $("#password-strength").css("width", passwordStrength + "%");
                $("#password-strength").html(passwordStrength + "%");
            }

            // Pemanggilan fungsi ketika password berubah
            $("#password").on("input", checkPasswordStrength);

            // Pemeriksaan konfirmasi password
            $("#confirm-password").on("input", function() {
                var password = $("#password").val();
                var confirmPassword = $(this).val();

                if (password === confirmPassword) {
                    $(this).removeClass("is-invalid").addClass("is-valid");
                } else {
                    $(this).removeClass("is-valid").addClass("is-invalid");
                }
            });

            // Validasi saat mengirim formulir
            // $("form").submit(function(event) {
            //     var password = $("#password").val();
            //     var confirmPassword = $("#confirm-password").val();

            //     // Pemeriksaan terakhir sebelum mengirim formulir
            //     if (password !== confirmPassword) {
            //         event.preventDefault(); // Mencegah pengiriman formulir jika konfirmasi password tidak sesuai
            //         $("#confirm-password").addClass("is-invalid");
            //         return
            //     }

            //     if (passwordStrengthh != 100) {
            //         event.preventDefault(); // Mencegah pengiriman formulir jika konfirmasi password tidak sesuai
            //         return
            //     }

            //     alert("done")
            // });
        });
    </script>
</body>

</html>