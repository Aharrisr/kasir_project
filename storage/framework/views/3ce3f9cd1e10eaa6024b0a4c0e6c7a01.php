<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" width="1%">No</th>
                            <th class="text-center" width="8%">Kode Produk</th>
                            <th class="text-center" width="8%">Nama Produk</th>
                            <th class="text-center" width="10%">Harga Satuan</th>
                            <th class="text-center" width="5%">Total Item</th>
                            <th class="text-center" width="10%">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody id="hasil-pencarian">
                        <?php if($detail->isNotEmpty()): ?>
                            <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($detail->firstItem() + $index); ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-success"><?php echo e($s->kode_produk); ?></span>
                                    </td>
                                    <td class="text-center"><?php echo e($s->nama_produk); ?></td>
                                    <td class="text-center"><?php echo e(number_format($s->harga_jual, 0, ',', '.')); ?></td>
                                    <td class="text-center"><?php echo e($s->jumlah); ?></td>
                                    <td class="text-center"><?php echo e(number_format($s->subtotal, 0, ',', '.')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if($detail->hasPages()): ?>
            <div class="d-flex justify-content-center">
                <?php echo e($detail->links('vendor.pagination.bootstrap-5')); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/penjualan/detail.blade.php ENDPATH**/ ?>