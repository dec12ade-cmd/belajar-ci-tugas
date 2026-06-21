<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background: linear-gradient(135deg, #fd7e14, #e65c00); border-radius: 8px 8px 0 0;">
        <h3 class="mb-0 text-white fw-bold">
            <i class="bi bi-bag me-2"></i> Daftar Pesanan
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
                        <th>Tanggal Pesanan</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($pesanan as $i => $item): ?>
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
                                <span class="fw-semibold"><?= $item['nama_user'] ?></span>
                            </div>
                        </td>
                        <?php endif; ?>

                        <td>
                            <i class="bi bi-calendar3 me-1 text-muted"></i>
                            <?= $item['tanggal_pesanan'] ?>
                        </td>

                        <td class="fw-bold text-success">
                            Rp <?= number_format($item['total_bayar'], 0, ',', '.') ?>
                        </td>

                        <td>
                            <span class="badge <?= $item['status'] === 'selesai' ? 'bg-success' : 'bg-warning text-dark' ?>">
                                <i class="bi <?= $item['status'] === 'selesai' ? 'bi-check-circle' : 'bi-clock' ?> me-1"></i>
                                <?= ucfirst($item['status']) ?>
                            </span>
                        </td>

                        <td>
                            <?php if (session()->get('role') === 'admin') : ?>
                                <button type="button"
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal-<?= $item['id'] ?>">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <a href="<?= base_url('pesanan/delete/' . $item['id']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus data pesanan ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            <?php endif; ?>

                            <?php if (session()->get('role') === 'pelanggan') : ?>
                                <a href="<?= base_url('detail_pesanan') ?>"
                                   class="btn btn-info btn-sm text-white">
                                    <i class="bi bi-eye me-1"></i> Lihat Detail
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.modal-backdrop.show { opacity: .3 !important; }
</style>

<?php if (session()->get('role') === 'admin') : ?>
    <?= $this->include('pesanan/edit') ?>
<?php endif; ?>

<?= $this->endSection() ?>