<!DOCTYPE html>
<html lang="en">
<?= $this->include('layout/header'); ?>

<body class="hold-transition login-page text-sm" style="background-image: url('<?= base_url('/img/bg_login.png'); ?>'); background-repeat: no-repeat;
    background-size: 100%;">
    <div class="login-box shadow-none">
        <div class="card card-outline card-primary shadow-none">
            <div class="card-header text-center">
                <div class="col-12 text-center">
                    <img class="w-50 rounded mb-3 mt-2" src="<?= base_url('/img/logo_erecon.png'); ?>">
                </div>
            </div>
            <div class="card-body">

                <?= view('Myth\Auth\Views\_message_block') ?>

                <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <?php if ($config->validFields === ['email']): ?>
                    <div class="form-group">
                        <label for="login"><?=lang('Auth.email')?></label>
                        <input type="email"
                            class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                            name="login" placeholder="<?=lang('Auth.email')?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="form-group">
                        <label for="login"><?=lang('Auth.emailOrUsername')?></label>
                        <input type="text"
                            class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                            name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="password"><?=lang('Auth.password')?></label>
                        <input type="password" name="password"
                            class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                            placeholder="<?=lang('Auth.password')?>">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>

                    <?php if ($config->allowRemembering): ?>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="remember" class="form-check-input"
                                <?php if (old('remember')) : ?> checked <?php endif ?>>
                            <?=lang('Auth.rememberMe')?>
                        </label>
                    </div>
                    <?php endif; ?>

                    <br>

                    <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
                </form>
            </div>
        </div>
    </div>
    <?= $this->include('layout/footer'); ?>
</body>

</html>