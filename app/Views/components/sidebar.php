<aside class="app-sidebar shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="<?= base_url('home') ?>" class="brand-link">
            <img src="<?= base_url('img/Logo/logo-burjo.jpg') ?>"     
            alt="Logo Burjo Bima"class="logo-burjo me-2">
            <span class="brand-text fw-bold text-white">Burjo Bima</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2" aria-label="Main navigation">
            <ul class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                data-accordion="false"
                id="navigation">

                <li class="nav-item">
                    <a href="<?= base_url('home') ?>" class="nav-link text-white">
                        <i class="nav-icon bi bi-speedometer text-white"></i>
                        <p class="text-white fw-semibold">Home</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('menu') ?>" class="nav-link text-white">
                        <i class="nav-icon bi bi-egg-fried text-white"></i>
                        <p class="text-white fw-semibold">Menu</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('pesanan') ?>" class="nav-link text-white">
                        <i class="nav-icon bi bi-bag text-white"></i>
                        <p class="text-white fw-semibold">Pesanan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('detail_pesanan') ?>" class="nav-link text-white">
                        <i class="nav-icon bi bi-receipt text-white"></i>
                        <p class="text-white fw-semibold">Detail Pesanan</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>

