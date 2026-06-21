<?php
$hlm = "Home";
if (uri_string() != "") {
    $hlm = ucwords(uri_string());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko - <?= $hlm ?></title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet"
        href="<?= base_url('AdminLTE-master/dist/css/adminlte.css') ?>">
</head>

<body class="layout-fixed sidebar-expand-lg">

<div class="app-wrapper">

    <?= $this->include('components/header') ?>

    <?= $this->include('components/sidebar') ?>

    <main class="app-main">

        <div class="app-content">
            <div class="container-fluid">

                <?= $this->renderSection('content') ?>

            </div>
        </div>

    </main>

    <?= $this->include('components/footer') ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('AdminLTE-master/dist/js/adminlte.js') ?>"></script>

<?= $this->renderSection('script') ?>

</body>
</html>