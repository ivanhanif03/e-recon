<!-- Color Sidebar -->
<style>
    .nav-item>a.active {
        background-color: #bd1111 !important;
    }

    .main-sidebar {
        background-color: #182638 !important
    }
</style>
<aside class="main-sidebar sidebar-dark-primary">
    <a href="index3.html" class="brand-link">
        <i class="brand-image nav-icon fas fa-link mt-1"></i>
        <span class="brand-text font-weight-light">E-Recon</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= base_url(''); ?>" class="nav-link <?php if ($menu == 'dashboard'){echo 'active';}?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('gangguan'); ?>"
                        class="nav-link <?php if ($menu == 'gangguan'){echo 'active';}?>">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>
                            Report Gangguan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('order'); ?>" class="nav-link <?php if ($menu == 'order'){echo 'active';}?>">
                        <i class="nav-icon fas fa-truck-loading"></i>
                        <p>
                            Report Order
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>