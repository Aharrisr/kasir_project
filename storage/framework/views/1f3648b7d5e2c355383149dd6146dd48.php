<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2,
        h4,
        .alamat {
            text-align: center;
            margin: 0;
            padding: 4px;
        }

        .alamat {
            font-size: 16px;
        }

        .keterangan {
            text-align: center;
            margin: 0;
            padding: 4px;
        }

        .keterangan {
            font-size: 15px;
            margin-bottom: 10px;
        }

        .divider {
            border-top: 2px solid #000;
            margin: 10px 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        thead {
            background-color: #007BFF;
            color: white;
        }

        .jenis-penjualan {
            color: green;
            font-weight: bold;
        }

        .jenis-pembelian {
            color: red;
            font-weight: bold;
        }

        .total-row {
            margin-top: 30px;
        }

        .total-row table {
            width: auto;
            margin: 0 auto;
        }

        .total-row td {
            border: none;
            padding: 5px 20px;
            font-weight: bold;
            text-align: center;
            color: black;
            /* biar teks default tetap hitam */
        }

        .total-penjualan {
            color: green;
        }

        .total-pembelian {
            color: red;
        }

        .total-pendapatan {
            color: #007BFF;
        }
    </style>
</head>

<body>
    <?php
        use Carbon\Carbon;
        Carbon::setLocale('id');
        $nama_bulan = Carbon::createFromFormat('m', $bulan)->translatedFormat('F');
    ?>

    <h2><?php echo e($nama_toko); ?></h2>
    <div class="alamat"><?php echo e($alamat); ?></div>
    <div class="keterangan">Laporan Bulan <?php echo e($nama_bulan); ?> Tahun <?php echo e($tahun); ?></div>
    <div class="divider"></div>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Transaksi</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data_transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(date('d-m-Y', strtotime($item->tanggal))); ?></td>
                    <td class="<?php echo e($item->jenis == 'Penjualan' ? 'jenis-penjualan' : 'jenis-pembelian'); ?>">
                        <?php echo e($item->jenis); ?>

                    </td>
                    <td>Rp <?php echo e(number_format($item->bayar ?? $item->total, 0, ',', '.')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="total-row">
        <table>
            <tr>
                <td>
                    Total Penjualan:
                    <span class="total-penjualan">Rp <?php echo e(number_format($total_penjualan, 0, ',', '.')); ?></span>
                </td>
                <td>
                    Total Pembelian:
                    <span class="total-pembelian">Rp <?php echo e(number_format($total_pembelian, 0, ',', '.')); ?></span>
                </td>
                <td>
                    Total Pendapatan:
                    <span class="total-pendapatan">Rp <?php echo e(number_format($total_pendapatan, 0, ',', '.')); ?></span>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/laporan/pdf.blade.php ENDPATH**/ ?>