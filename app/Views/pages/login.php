<!DOCTYPE html>
<html lang="en">
<?= $this->include('layout/header'); ?>

<body class="hold-transition login-page text-sm" style="background-image: url('<?= base_url('/img/bg_login.png'); ?>'); background-repeat: no-repeat;
    background-size: 100%;">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <div class="col-12 text-center">
                    <img class="w-50 rounded mb-3 mt-2" src="<?= base_url('/img/logo_erecon.png'); ?>">
                </div>
            </div>
            <div class="card-body">

                <form action="<?= base_url(''); ?>" method="">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control text-sm" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control text-sm" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= $this->include('layout/footer'); ?>
</body>

</html>