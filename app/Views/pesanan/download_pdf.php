<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Pesanan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; }
        h2 { text-align: center; }
        p { text-align: center; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #28a745; color: white; }
        .badge-pending { background: #ffc107; color: #000; padding: 2px 8px; border-radius: 4px; }
        .badge-selesai { background: #28a745; color: #fff; padding: 2px 8px; border-radius: 4px; }
        tfoot td { font-weight: bold; background: #f9f9f9; }
    </style>
</head>
<body>
    <h2>Data Pesanan</h2>
    <p>Tanggal cetak: <?= date('d-m-Y H:i:s') ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pesanan</th>
                <th>Total Bayar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesanan as $i => $item) : ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $item['nama_user'] ?? '-' ?></td>
                <td><?= $item['tanggal_pesanan'] ?></td>
                <td>Rp <?= number_format($item['total_bayar'], 0, ',', '.') ?></td>
                <td>
                    <span class="badge-<?= $item['status'] ?>">
                        <?= ucfirst($item['status']) ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;">Total Keseluruhan</td>
                <td>Rp <?= number_format(array_sum(array_column($pesanan, 'total_bayar')), 0, ',', '.') ?></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>