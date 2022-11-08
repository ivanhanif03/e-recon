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
                <?= view('Myth\Auth\Views\_message_block') ?>

                <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- Username or Email -->
                    <?php if ($config->validFields === ['email']): ?>
                    <div class="input-group mb-3">
                        <input type="email"
                            class="form-control text-sm <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                            placeholder="<?=lang('Auth.email')?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="input-group mb-3">
                        <input type="text"
                            class="form-control text-sm <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                            placeholder="<?=lang('Auth.emailOrUsername')?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input type="password"
                            class="form-control text-sm <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                            placeholder="<?=lang('Auth.password')?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <?php if ($config->allowRemembering): ?>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" <?php if (old('remember')) : ?> checked
                                    <?php endif ?>>
                                <label for="remember">
                                    <?=lang('Auth.rememberMe')?>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-4">
                            <button type="submit"
                                class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
                        </div>
                    </div>
                </form>
                <?php if ($config->allowRegistration) : ?>
                <p><a href="<?= url_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?= $this->include('layout/footer'); ?>
</body>

</html>