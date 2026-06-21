<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background: linear-gradient(135deg, #fd7e14, #e65c00); border-radius: 8px 8px 0 0;">
        <h3 class="mb-0 text-white fw-bold">
            <i class="bi bi-egg-fried me-2"></i> Daftar Menu
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

        <?php if (session()->get('role') === 'admin') : ?>
        <div class="mb-3">
            <button type="button" class="btn btn-warning fw-semibold" data-bs-toggle="modal" data-bs-target="#add">
                <i class="bi bi-plus-circle me-1"></i> Tambah Menu
            </button>
        </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="table-header-custom">
                        <th width="50">No</th>
                        <th width="120">Foto</th>
                        <th>Nama Menu</th>
                        <th width="120">Kategori</th>
                        <th width="150">Harga</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($menu as $i => $item): ?>
                    <tr>
                        <td class="text-center fw-semibold text-muted">
                            <?= $i + 1 ?>
                        </td>

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

                        <td>
                            <span class="badge <?= $item['kategori'] === 'Makanan' ? 'badge-makanan' : 'badge-minuman' ?>">
                                <i class="bi <?= $item['kategori'] === 'Makanan' ? 'bi-cup-hot' : 'bi-cup-straw' ?> me-1"></i>
                                <?= $item['kategori'] ?>
                            </span>
                        </td>

                        <td class="fw-bold text-success">
                            Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                        </td>

                        <td>
                            <?php if (session()->get('role') === 'admin') : ?>
                                <button type="button"
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal-<?= $item['id'] ?>">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <a href="<?= base_url('menu/delete/' . $item['id']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus data menu ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            <?php endif; ?>

                            <?php if (session()->get('role') === 'pelanggan') : ?>
                                <form action="<?= base_url('menu/pesan/' . $item['id']) ?>"
                                      method="post"
                                      class="d-flex align-items-center gap-2">
                                    <?= csrf_field() ?>
                                    <input type="number"
                                           name="jumlah"
                                           value="1"
                                           min="1"
                                           max="99"
                                           class="form-control form-control-sm input-jumlah">
                                    <button type="submit"
                                            class="btn btn-success btn-sm"
                                            onclick="return confirm('Tambahkan <?= $item['nama_menu'] ?> ke pesanan?')">
                                        <i class="bi bi-bag-plus"></i> Pesan
                                    </button>
                                </form>
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

<?= $this->include('menu/add') ?>
<?= $this->include('menu/edit') ?>

<?= $this->endSection() ?>