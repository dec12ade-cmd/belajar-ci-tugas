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
    <title>Burjo Bima - <?= $hlm ?></title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
        href="<?= base_url('AdminLTE-master/dist/css/adminlte.css') ?>">
    <link rel="stylesheet"
        href="<?= base_url('css/admin.css') ?>">
</head>

<body style="height: 100%;">

    <?= $this->renderSection('content') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('AdminLTE-master/dist/js/adminlte.js') ?>"></script>

    <?= $this->renderSection('script') ?>

</body>
</html>