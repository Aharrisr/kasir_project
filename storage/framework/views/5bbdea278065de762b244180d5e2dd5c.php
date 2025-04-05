<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota</title>

    <?php
    $style = '
                                <style>
                                    * {
                                        font-family: "consolas", sans-serif;
                                    }
                                    p {
                                        display: block;
                                        margin: 3px;
                                        font-size: 10pt;
                                    }
                                    table td {
                                        font-size: 9pt;
                                    }
                                    .text-center {
                                        text-align: center;
                                    }
                                    .text-right {
                                        text-align: right;
                                    }

                                    @media print {
                                        @page {
                                            margin: 0;
                                            size: 75mm
                                ';
    ?>
    <?php
    $style .= !empty($_COOKIE['innerHeight']) ? $_COOKIE['innerHeight'] . 'mm; }' : '}';
    ?>
    <?php
    $style .= '
                                        html, body {
                                            width: 70mm;
                                        }
                                        .btn-print {
                                            display: none;
                                        }
                                    }
                                </style>
                                ';
    ?>

    <?php echo $style; ?>

</head>

<body onload="window.print()">
    <button class="btn-print" style="position: absolute; right: 1rem; top: rem;" onclick="window.print()">Print</button>
    <div class="text-center">
        <h3 style="margin-bottom: 5px;"><?php echo e(strtoupper($setting->nama_perusahaan)); ?></h3>
        <p><?php echo e(strtoupper($setting->alamat)); ?></p>
    </div>
    <br>
    <div>
        <p style="float: left;"><?php echo e(date('d-m-Y')); ?></p>
        <p style="float: right"><?php echo e($penjualan->petugas); ?></p>
    </div>
    <div class="clear-both" style="clear: both;"></div>
    <p>Member : <?php echo e(optional($penjualan->member)->nama ?? '-'); ?></p>
    <p>No: <?php echo e($penjualan->kode_transaksi); ?></p>
    <p class="text-center">===================================</p>

    <br>
    <table width="100%" style="border: 0;">
        <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="3"><?php echo e($item->produk->nama_produk); ?></td>
            </tr>
            <tr>
                <td><?php echo e($item->jumlah); ?> x <?php echo e('Rp ' . number_format($item->harga_jual)); ?></td>
                <td></td>
                <td class="text-right"><?php echo e('Rp ' . number_format($item->jumlah * $item->harga_jual)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <p class="text-center">-----------------------------------</p>

    <table width="100%" style="border: 0;">
        <tr>
            <td>Total Harga:</td>
            <td class="text-right"><?php echo e('Rp ' . number_format($penjualan->total_harga)); ?></td>
        </tr>
        <tr>
            <td>Total Item:</td>
            <td class="text-right"><?php echo e($penjualan->total_item); ?></td>
        </tr>
        <tr>
            <td>Diskon:</td>
            <td class="text-right"><?php echo e($penjualan->diskon); ?>%</td>
        </tr>
        <tr>
            <td>Total Bayar:</td>
            <td class="text-right"><?php echo e('Rp ' . number_format($penjualan->total_harga)); ?></td>
        </tr>
        <tr>
            <td>Diterima:</td>
            <td class="text-right"><?php echo e('Rp ' . number_format($penjualan->bayar)); ?></td>
        </tr>
        <tr>
            <td>Kembali:</td>
            <td class="text-right"><?php echo e('Rp ' . number_format($penjualan->bayar - $penjualan->total_harga)); ?></td>
        </tr>
    </table>

    <p class="text-center">===================================</p>
    <p class="text-center">-- TERIMA KASIH --</p>

    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
            body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight
        );

        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight=" + ((height + 50) * 0.264583);
    </script>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/penjualan/nota.blade.php ENDPATH**/ ?>