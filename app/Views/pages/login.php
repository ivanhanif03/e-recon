<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="60"> -->
    <title>Login I-SLAN</title>
    <link rel="icon" href="/img/icon.png">
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Manrope' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/jqvmap/jqvmap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/summernote/summernote-bs4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/toastr/toastr.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/datatables-bs4/css/datatables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/adminlte/css/adminlte.min.css'); ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/gijgo/gijgo.min.css'); ?>"> -->
    <link rel="stylesheet" href="<?= base_url('/adminlte/css/adminlte.min.css?v=3.2.0'); ?>">
    <link rel="stylesheet" href="<?= base_url('/css/style.css'); ?>">
</head>

<body class="hold-transition bg-login login-page text-sm">
    <div class="login-box">
        <div class="card card-outline border-0 shadow-30 card-primary">
            <div class="card-header text-center">
                <div class="col-12 text-center">
                    <img class="w-50 rounded mb-3 mt-2" src="<?= base_url('/img/logo-islan.png'); ?>">
                </div>
            </div>
            <div class="card-body p-4">

                <?= view('Myth\Auth\Views\_message_block') ?>

                <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <?php if ($config->validFields === ['email']) : ?>
                        <div class="form-group">
                            <label for="login"><?= lang('Auth.email') ?></label>
                            <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="password"><?= lang('Auth.password') ?></label>
                        <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>

                    <?php if ($config->allowRemembering) : ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                <?= lang('Auth.rememberMe') ?>
                            </label>
                        </div>
                    <?php endif; ?>

                    <br>

                    <button type="submit" class="btn pt-2 pb-2 btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                </form>
            </div>
        </div>
    </div>
    <?= $this->include('layout/footer'); ?>
</body>

</html>