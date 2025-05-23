<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard Admin</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>">
    <!-- CSS files -->
    <link href="<?php echo e(asset('tabler/dist/css/tabler.min.css?1674944402')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('tabler/dist/css/tabler-flags.min.css?1674944402')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('tabler/dist/css/tabler-payments.min.css?1674944402')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('tabler/dist/css/tabler-vendors.min.css?1674944402')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('tabler/dist/css/demo.min.css?1674944402')); ?>" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="<?php echo e(asset('tabler/dist/js/demo-theme.min.js?1674944402')); ?>"></script>
    <div class="page">
        <!-- Sidebar -->
        <?php if(
            !Route::is('transaksi-pembelian') &&
                !Route::is('transaksi-penjualan') &&
                !Route::is('selesai') &&
                !Route::is('profile')): ?>
            <?php echo $__env->make('layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>

        <!-- Navbar -->
        <?php if(
            !Route::is('transaksi-pembelian') &&
                !Route::is('transaksi-penjualan') &&
                !Route::is('selesai') &&
                !Route::is('profile')): ?>
            <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
        <div class="page-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
            <?php if(
                !Route::is('transaksi-pembelian') &&
                    !Route::is('transaksi-penjualan') &&
                    !Route::is('selesai') &&
                    !Route::is('profile')): ?>
                <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- Libs JS -->
    <script src="<?php echo e(asset('tabler/dist/libs/apexcharts/dist/apexcharts.min.js?1674944402')); ?>" defer></script>
    <script src="<?php echo e(asset('tabler/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1674944402')); ?>" defer></script>
    <script src="<?php echo e(asset('tabler/dist/libs/litepicker/dist/litepicker.js?1668287865')); ?>" defer></script>
    <script src="<?php echo e(asset('tabler/dist/libs/jsvectormap/dist/maps/world.js?1674944402')); ?>" defer></script>
    <script src="<?php echo e(asset('tabler/dist/libs/jsvectormap/dist/maps/world-merc.js?1674944402')); ?>" defer></script>
    <!-- Tabler Core -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('tabler/dist/js/tabler.min.js?1674944402')); ?>" defer></script>
    <script src="<?php echo e(asset('tabler/dist/js/demo.min.js?1674944402')); ?>" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <?php echo $__env->yieldPushContent('myscript'); ?>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>