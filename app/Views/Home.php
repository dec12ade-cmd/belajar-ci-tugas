<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Banner Deskripsi -->
<div class="card mb-4 border-0 shadow-sm overflow-hidden">
    <div class="card-body p-0">
        <div class="banner-wrapper">

            <!-- Kiri: Teks Deskripsi -->
            <div class="banner-text">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="banner-badge">🍜 Warung Burjo</span>
                </div>

                <h2 class="banner-title">
                    Selamat Datang di Burjo Bima
                </h2>

                <p class="banner-desc">
                    Nikmati berbagai pilihan makanan dan minuman lezat dengan harga terjangkau.
                    Pesan favorit kamu langsung dari sini, cepat dan mudah!
                </p>

                <div class="d-flex gap-3 flex-wrap">
                    <div class="banner-feature">
                        <div class="banner-icon"><i class="bi bi-egg-fried text-white"></i></div>
                        <span>Menu Lengkap</span>
                    </div>
                    <div class="banner-feature">
                        <div class="banner-icon"><i class="bi bi-bag-check text-white"></i></div>
                        <span>Pesan Mudah</span>
                    </div>
                    <div class="banner-feature">
                        <div class="banner-icon"><i class="bi bi-cash-coin text-white"></i></div>
                        <span>Harga Terjangkau</span>
                    </div>
                </div>
            </div>

            <!-- Kanan: Logo -->
            <div class="banner-logo d-none d-md-block">
                <img src="<?= base_url('img/Logo/logo-burjo.jpg') ?>"
                     alt="Logo Burjo Bima"
                     class="banner-logo-img">
                <p class="banner-logo-label">BURJO BIMA</p>
            </div>

        </div>
    </div>
</div>

<!-- Daftar Menu -->
<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center menu-card-header">
        <h3 class="mb-0 text-white fw-bold">
            <i class="bi bi-egg-fried me-2"></i> Daftar Menu
        </h3>
    </div>

    <div class="card-body">
        <div class="row">
            <?php foreach ($menu as $item) : ?>
                <div class="col-lg-4 mb-3">
                    <div class="card h-100 border-0 shadow-sm menu-card">

                        <div class="menu-card-img-wrapper">
                            <img
                                src="<?= base_url('img/' . $item['foto']) ?>"
                                class="card-img-top menu-img"
                                alt="<?= $item['nama_menu'] ?>"
                            >
                            <span class="menu-card-badge <?= $item['kategori'] === 'Makanan' ? 'badge-makanan' : 'badge-minuman' ?>">
                                <i class="bi <?= $item['kategori'] === 'Makanan' ? 'bi-cup-hot' : 'bi-cup-straw' ?> me-1"></i>
                                <?= $item['kategori'] ?>
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <div class="fw-bold fs-5 mb-1 menu-card-title">
                                <?= $item['nama_menu'] ?>
                            </div>

                            <div class="menu-card-price mb-3">
                                Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                            </div>

                            <?php if (session()->get('role') === 'pelanggan') : ?>
                            <div class="d-flex gap-2 mt-auto">
                                <a href="<?= base_url('menu') ?>" class="btn btn-info btn-sm flex-fill text-white">
                                    <i class="bi bi-eye me-1"></i> Detail
                                </a>

                                <form action="<?= base_url('menu/pesan/' . $item['id']) ?>"
                                      method="post"
                                      class="flex-fill">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-success btn-sm w-100"
                                    onclick="return confirm('Tambahkan <?= $item['nama_menu'] ?> ke pesanan?')">    
                                    <i class="bi bi-cart me-1"></i> Pesan
                                    </button>
                                </form>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>