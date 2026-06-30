<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background: linear-gradient(135deg, #fd7e14, #e65c00); border-radius: 8px 8px 0 0;">
        <h3 class="mb-0 text-white fw-bold">
            <i class="bi bi-receipt me-2"></i>
            <?php if (session()->get('role') === 'admin') : ?>
                Detail Pesanan Pelanggan
            <?php else : ?>
                Detail Pesanan Anda
            <?php endif; ?>
        </h3>
    </div>

    <div class="card-body">

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('failed')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= session()->getFlashdata('failed') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="table-header-custom">
                        <th width="50">No</th>
                        <?php if (session()->get('role') === 'admin') : ?>
                        <th>Username</th>
                        <?php endif; ?>
                        <th width="100">Foto</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($detail as $i => $item) : ?>
                    <tr>
                        <td class="text-center fw-semibold text-muted">
                            <?= $i + 1 ?>
                        </td>

                        <?php if (session()->get('role') === 'admin') : ?>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                     style="width:32px; height:32px; background:#fff3e6;">
                                    <i class="bi bi-person-fill" style="color:#e65c00;"></i>
                                </div>
                                <span class="fw-semibold"><?= $item['nama_user'] ?? '-' ?></span>
                            </div>
                        </td>
                        <?php endif; ?>

                        <td>
                            <?php if (!empty($item['foto'])) : ?>
                                <img src="<?= base_url('img/' . $item['foto']) ?>"
                                     class="menu-table-img"
                                     alt="<?= $item['nama_menu'] ?>">
                            <?php else : ?>
                                <div class="menu-table-img-placeholder">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </td>

                        <td>
                            <span class="fw-semibold"><?= $item['nama_menu'] ?></span>
                        </td>

                        <td class="text-muted">
                            Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                        </td>

                        <td>
                            <span class="badge bg-secondary"><?= $item['jumlah'] ?>x</span>
                        </td>

                        <td class="fw-bold text-success">
                            Rp <?= number_format($item['subtotal'], 0, ',', '.') ?>
                        </td>

                        <td>
                            <a href="<?= base_url('detail_pesanan/delete/' . $item['id']) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Hapus detail pesanan ini?')">
                                <i class="bi bi-trash me-1"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

                <tfoot>
                    <tr style="background: #fff8f3;">
                        <th colspan="<?= session()->get('role') === 'admin' ? '6' : '5' ?>"
                            class="text-end" style="color: #e65c00;">
                            <i class="bi bi-calculator me-1"></i> Total Bayar
                        </th>
                        <th class="text-success fs-6">
                            Rp <?= number_format(array_sum(array_column($detail, 'subtotal')), 0, ',', '.') ?>
                        </th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
                <div class="mt-3">
            <a href="<?= base_url('detail_pesanan/download') ?>" class="btn btn-success">
                <i class="bi bi-file-earmark-pdf"></i> Download Data Ke PDF
            </a>
        </div>
    </div>
</div>

<style>
.modal-backdrop.show { opacity: .3 !important; }
</style>

<?= $this->endSection() ?>