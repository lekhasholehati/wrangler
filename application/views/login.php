<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>_assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="<?=base_url()?>_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?=base_url()?>_assets/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <div class="login-logo">
                        <a href="../../index2.html">
                            <img src="<?=base_url()?>_assets/img/logo_wrangler.png" alt="logo-wrangler" class="center img-fluid">
                        </a>
                    </div>
                    <p class="login-box-msg">Sign in to start your</p>

                    <?= form_open('auth/check_login');?>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>

        <script src="<?=base_url()?>_assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?=base_url()?>_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url()?>_assets/dist/js/adminlte.min.js"></script>
    </body>
</html>
