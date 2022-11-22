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
                <li class="nav-item <?php if ($menu == 'pengguna' || $menu == 'hak_akses'){echo 'menu-open';}?>">
                    <a href="#"
                        class="nav-link mb-2 <?php if ($menu == 'pengguna' || $menu == 'hak_akses'){echo 'active';}?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item mb-2">
                            <a href="<?= base_url('pengguna'); ?>"
                                class="nav-link <?php if ($menu == 'pengguna'){echo 'active';}?>">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Daftar User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="<?= base_url('hak_akses'); ?>"
                                class="nav-link <?php if ($menu == 'hak_akses'){echo 'active';}?>">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Hak Akses
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
      
                <li class="nav-item mb-2">
                    <a href="<?= base_url('provider'); ?>"
                        class="nav-link <?php if ($menu == 'provider'){echo 'active';}?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Provider
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('regional'); ?>"
                        class="nav-link <?php if ($menu == 'regional'){echo 'active';}?>">
                        <i class="nav-icon fas fa-globe-asia"></i>
                        <p>
                            Regional
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('branch'); ?>"
                        class="nav-link <?php if ($menu == 'branch'){echo 'active';}?>">
                        <i class="nav-icon fas fa-globe-asia"></i>
                        <p>
                            Branch
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
                <li class="nav-item mb-2">
                    <a href="<?= base_url('sla'); ?>" class="nav-link <?php if ($menu == 'sla'){echo 'active';}?>">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Daftar SLA
                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <!-- User -->
                <?php if( in_groups('user-provider')) : ?>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('gangguan'); ?>"
                        class="nav-link <?php if ($menu == 'gangguan'){echo 'active';}?>">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>
                            Gangguan Provider
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('order'); ?>" class="nav-link <?php if ($menu == 'order'){echo 'active';}?>">
                        <i class="nav-icon fas fa-truck-loading"></i>
                        <p>
                            Order Provider
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('sla'); ?>" class="nav-link <?php if ($menu == 'sla'){echo 'active';}?>">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Daftar SLA
                        </p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>