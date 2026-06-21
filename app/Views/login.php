<?= $this->extend('layout_clear') ?>
<?= $this->section('content') ?>

<div class="login-wrapper">
    <div class="login-box-custom">

        <!-- Header -->
        <div class="login-header">
            <img src="<?= base_url('img/Logo/logo-burjo.jpg') ?>"
                 alt="Logo Burjo Bima"
                 class="login-logo">
            <h2 class="login-title">Burjo Bima</h2>
            <p class="login-subtitle">Sistem Manajemen Pemesanan</p>
        </div>

        <!-- Body -->
        <div class="login-body">

            <p class="login-msg">Silakan masuk untuk melanjutkan</p>

            <?php if (session()->getFlashData('failed')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?= session()->getFlashData('failed') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Username -->
                <div class="input-group mb-3">
                    <div class="form-floating flex-grow-1">
                        <input type="text"
                               name="username"
                               id="username"
                               class="form-control login-input"
                               placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <span class="input-group-text login-input-icon">
                        <i class="bi bi-person-fill"></i>
                    </span>
                </div>

                <!-- Password -->
                <div class="input-group mb-3">
                    <div class="form-floating flex-grow-1">
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control login-input"
                               placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <span class="input-group-text login-input-icon">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                </div>

                <!-- Remember Me -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label text-muted" for="remember">
                            Ingat Saya
                        </label>
                    </div>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="btn login-btn w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Sign In
                </button>

            </form>
        </div>

        <!-- Footer -->
        <div class="login-footer">
            <p class="mb-0">© 2026 <strong>Burjo Bima</strong>. All rights reserved.</p>
        </div>

    </div>
</div>

<?= $this->endSection() ?>