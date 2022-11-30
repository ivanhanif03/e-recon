<!DOCTYPE html>
<html lang="en">
<?= $this->include('layout/header'); ?>

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

                    <button type="submit"
                        class="btn pt-2 pb-2 btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
                </form>
            </div>
        </div>
    </div>
    <?= $this->include('layout/footer'); ?>
</body>

</html>