<nav class="app-header navbar navbar-expand py-3" style="background: linear-gradient(to right, #28a745, #ffc107, #dc3545);">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list" style="font-size: 1.8rem; line-height: 1;"></i>
                </a>
            </li>
            <li class="nav-item d-flex align-items-center ms-2">
                <a href="<?= base_url('home') ?>" class="d-flex align-items-center text-decoration-none">
<img src="<?= base_url('img/Logo/logo-burjo.jpg') ?>"
     alt="Logo Burjo Bima"
     class="logo-burjo me-2">
                    <span class="fw-bold text-white fs-5" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.4);">Burjo Bima</span>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">
                    <img src="<?= base_url('AdminLTE-master/dist/assets/img/user2-160x160.jpg') ?>"
                         class="user-image rounded-circle shadow"
                         alt="User Image"/>
                    <span class="d-none d-md-inline" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.4);"><?= session()->get('username'); ?> (<?= session()->get('role'); ?>)</span>
                </a>
<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end shadow border-0" style="min-width: 220px;">
    
    <!-- Header -->
    <li class="user-header rounded-top" style="background: linear-gradient(135deg, #fd7e14, #e65c00); padding: 20px 15px;">
        <div class="text-center">
            <img src="<?= base_url('AdminLTE-master/dist/assets/img/user2-160x160.jpg') ?>"
                 class="rounded-circle shadow border border-white border-3"
                 alt="User Image"
                 style="width: 70px; height: 70px; object-fit: cover;"/>
            <p class="mt-2 mb-0 fw-bold text-white" style="font-size: 1rem;">
                <?= session()->get('username'); ?>
            </p>
            <span class="badge mt-1" style="background-color: rgba(255,255,255,0.25); font-size: 0.75rem;">
                <i class="bi <?= session()->get('role') === 'admin' ? 'bi-shield-fill' : 'bi-person-fill' ?> me-1"></i>
                <?= ucfirst(session()->get('role')); ?>
            </span>
        </div>
    </li>

    <!-- Divider -->
    <li><hr class="dropdown-divider m-0"></li>

    <!-- Info -->
    <li class="px-3 py-2">
        <small class="text-muted d-block">
            <i class="bi bi-clock me-1"></i> <?= date('d M Y, H:i') ?>
        </small>
    </li>

    <!-- Divider -->
    <li><hr class="dropdown-divider m-0"></li>

    <!-- Footer -->
    <li class="user-footer p-2">
        <a href="<?= base_url('logout') ?>" 
           class="btn btn-sm w-100 fw-semibold text-white"
           style="background: linear-gradient(135deg, #fd1414, #e60036); border: none;">
            <i class="bi bi-box-arrow-right me-1"></i> Sign Out
        </a>
    </li>

</ul>
            </li>
        </ul>
    </div>
</nav>