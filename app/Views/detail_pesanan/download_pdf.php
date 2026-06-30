<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail Pesanan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #28a745; color: white; }
        tfoot td { font-weight: bold; }
    </style>
</head>
<body>
    <h2>Detail Pesanan</h2>
    <p>Tanggal cetak: <?= date('d-m-Y H:i:s') ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detail as $i => $item) : ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $item['nama_menu'] ?></td>
                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                <td><?= $item['jumlah'] ?></td>
                <td>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right;">Total</td>
                <td>Rp <?= number_format(array_sum(array_column($detail, 'subtotal')), 0, ',', '.') ?></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>