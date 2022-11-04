<!-- Header -->
<?= $this->include('layout/header'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?= $this->include('layout/navbar'); ?>

        <!-- Sidebar -->
        <?= $this->include('layout/sidebar'); ?>
    </div>

    <!-- Content -->
    <?= $this->renderSection('content'); ?>

    <!-- Footer -->
    <?= $this->include('layout/footer'); ?>

</body>

</html>