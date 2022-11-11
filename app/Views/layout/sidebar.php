<!-- Color Sidebar -->
<style>
    .nav-item>a.active {
        /* background-color: #cf061a !important; */
        border-radius: 10px;
        padding: 12px;
    }

    .main-sidebar {
        background-color: #182638 !important
    }
</style>
<!-- 182638 -->
<aside class="main-sidebar sidebar-dark-primary">
    <a href="<?= base_url(''); ?>" class="brand-link">
        <img src="<?= base_url('/img/icon_erecon.png'); ?>" alt="E-Recon Logo" class="brand-image">
        <img src="<?= base_url('/img/text_erecon.png'); ?>" alt="E-Recon Logo" class="brand-text" width="100">
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header" style="color: #46586e ;">Menu</li>

                <li class="nav-item mb-2 mt-2">
                    <a href="<?= base_url(''); ?>" class="nav-link <?php if ($menu == 'dashboard'){echo 'active';}?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Admin -->
                <?php if( in_groups('admin')) : ?>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('pengguna'); ?>"
                        class="nav-link <?php if ($menu == 'pengguna'){echo 'active';}?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Daftar User
                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <!-- User -->
                <?php if( in_groups('user-btn')) : ?>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('gangguan'); ?>"
                        class="nav-link <?php if ($menu == 'gangguan'){echo 'active';}?>">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>
                            Report Gangguan
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('order'); ?>" class="nav-link <?php if ($menu == 'order'){echo 'active';}?>">
                        <i class="nav-icon fas fa-truck-loading"></i>
                        <p>
                            Report Order
                        </p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>