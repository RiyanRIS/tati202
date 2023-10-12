<!DOCTYPE html>
<html lang="en">
<?php
global $SConfig;
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in | <?= $SConfig->_site_name ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?= $SConfig->_site_image ?>" width="200" alt="<?= $SConfig->_site_name ?>"> <br>
            <a href="#"><b><?= $SConfig->_site_name ?></b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?= $this->view('messages') ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
                    <span id="alertText"></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="login" method="post" id="myForm">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required="true" name="username" autofocus="true" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required="true" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" id="btn-signin">Sign In</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.js"></script>
    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script>
        let site_url = '<?= site_url() ?>auth/'
        $("#myAlert").hide();
        $('#myForm').submit(function(e) {
            e.preventDefault()
            var dataToSend = new FormData(this)
            var formId = $(this)
            var action = $(formId).attr('action')

            $.ajax({
                url: site_url + '/action/' + action,
                dataType: 'json',
                type: 'post',
                data: dataToSend,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btn-signin').prop('disabled', true);
                },
                complete: function() {
                    $('#btn-signin').prop('disabled', false);
                },
                success: function(data) {
                    if (data.status) {
                        window.location.href = data.url
                    } else {
                        $("#alertText").html(data.message)
                        $("#myAlert").show(300);

                        setTimeout(function() {
                            $("#myAlert").hide(500);
                        }, 3000);

                    }
                },
                error: function() {
                    $("#alertText").html("Terjadi kesalahan diserver.")
                    $("#myAlert").show(300);

                    setTimeout(function() {
                        $("#myAlert").hide(500);
                    }, 3000);
                }
            })
        })
    </script>
</body>

</html>