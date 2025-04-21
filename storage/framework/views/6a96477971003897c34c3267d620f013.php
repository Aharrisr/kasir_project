<header class="navbar navbar-expand-md navbar-dark d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown me-2 ms-2">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-bolt">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4c.267 0 .529 .026 .781 .076" />
                            <path d="M19 16l-2 3h4l-2 3" />
                        </svg>
                    </span>
                    <div class="d-none d-xl-block ps-2">
                        <div><?php echo e($user->nama_user); ?></div>
                        <div class="mt-1 small text-muted">
                            <?php if(Auth::user()->id_level == 1): ?>
                                Admin
                            <?php endif; ?>
                            <?php if(Auth::user()->id_level == 2): ?>
                                Kasir
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="/profile" class="dropdown-item">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="/proseslogout" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/layouts/header.blade.php ENDPATH**/ ?>