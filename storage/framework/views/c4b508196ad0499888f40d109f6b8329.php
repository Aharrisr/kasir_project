<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Masuk</title>
    <!-- CSS files -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>">
    <link href="<?php echo e(asset('tabler/dist/css/tabler.min.css?1668287865')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('tabler/dist/css/tabler-flags.min.css?1668287865')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('tabler/dist/css/tabler-payments.min.css?1668287865')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('tabler/dist/css/tabler-vendors.min.css?1668287865')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('tabler/dist/css/demo.min.css?1668287865')); ?>" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>

<body class=" d-flex flex-column bg-white">
    <script src="<?php echo e(asset('tabler/dist/js/demo-theme.min.js?1668287865')); ?>"></script>
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <div class="text-center mb-2">
                    <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?php echo e(asset('img/logo.png')); ?>"
                            height="80" alt=""></a>
                </div>
                <?php if(Session::get('warning')): ?>
                    <div class="alert alert-danger">
                        <p><?php echo e(Session::get('warning')); ?></p>
                    </div>
                <?php endif; ?>
                <h2 class="h3 text-center mb-3">
                    Masuk ke Akun Anda
                </h2>
                <form action="/proseslogin" method="POST" autocomplete="off" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" name="email" id="email" required
                            placeholder="Tulis email kamu" autocomplete="off" oninput="validateEmail(this)">
                        <small id="emailError" style="color: red;"></small>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                            <span class="form-label-description">
                            </span>
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" name="password" id="password" required
                                placeholder="Kata Sandi" autocomplete="off">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Lihat Password"
                                    onclick="togglePassword()" data-bs-toggle="tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100"
                            onclick="this.disabled=true; this.form.submit();">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="bg-cover h-100 min-vh-100"
                style="background-image: url(<?php echo e(asset('img/mart.jpg')); ?>)">
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?php echo e(asset('tabler/dist/js/tabler.min.js?1668287865')); ?>" defer></script>
    <script src="<?php echo e(asset('tabler/dist/js/demo.min.js?1668287865')); ?>" defer></script>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }

        function validateEmail(input) {
            let errorMessage = document.getElementById("emailError");
            if (!input.value.includes("@")) {
                errorMessage.innerText = "Email harus mengandung '@'";
            } else {
                errorMessage.innerText = ""; // Hapus pesan jika valid
            }
        }
    </script>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/auth/login.blade.php ENDPATH**/ ?>