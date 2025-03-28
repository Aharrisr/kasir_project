<?php $__env->startSection('content'); ?>
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
    <div class="page-body">
        <div class="container-xl">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card shadow-lg p-3 mb-5 rounded">
                        <div class="card-header">
                            <h3 class="card-title">Data Pembelian</h3>
                            <div class="card-actions">
                                <a href="#" class="btn btn-primary" id="btn-tambah">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    tambah
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <?php if(Session::get('success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(Session::get('success')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <?php if(Session::get('warning')): ?>
                                        <div class="alert alert-warning">
                                            <?php echo e(Session::get('warning')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form action="/produk" method="get">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Kode Produk"
                                                        id="kode_produk" name="kode_produk"
                                                        value="<?php echo e(Request('kode_produk')); ?>" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Nama Produk"
                                                        id="nama_produk" name="nama_produk"
                                                        value="<?php echo e(Request('nama_produk')); ?>" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Merk"
                                                        id="nama_splr" name="nama_splr" value="<?php echo e(Request('nama_splr')); ?>"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                            <path d="M21 21l-6 -6" />
                                                        </svg>
                                                        Cari
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <button type="reset" id="reset" name="reset"
                                                        class="btn btn-danger" onclick="window.location.href='/produk'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-restore">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3.06 13a9 9 0 1 0 .49 -4.087" />
                                                            <path d="M3 4.001v5h5" />
                                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                        </svg>
                                                        reset
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="1%">No</th>
                                                        <th class="text-center" width="8%">
                                                            Tanggal
                                                        </th>
                                                        <th class="text-center" width="8%">Kode Transaksi</th>
                                                        <th class="text-center" width="15%">Nama Supplier</th>
                                                        <th class="text-center" width="3%">Total Item</th>
                                                        <th class="text-center" width="12%">
                                                            Total Harga
                                                        </th>
                                                        <th class="text-center" width="1%">
                                                            Discount
                                                        </th>
                                                        <th class="text-center" width="12%">
                                                            Total Bayar
                                                        </th>
                                                        <th class="text-center" width="5%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="hasil-pencarian">
                                                    <?php $__currentLoopData = $pembelian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <input type="hidden" value="<?php echo e($s->id_pembelian); ?>">
                                                            <td class="text-center">
                                                                <?php echo e($loop->iteration + $pembelian->firstItem() - 1); ?>

                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo e(date('d-m-Y', strtotime($s->tanggal))); ?>

                                                            </td>
                                                            <td class="text-center">
                                                                <span
                                                                    class="badge bg-success"><?php echo e($s->kode_transaksi); ?></span>
                                                            </td>
                                                            <td class="text-center"><?php echo e($s->nama_splr); ?></td>
                                                            <td class="text-center"><?php echo e($s->total_item); ?></td>
                                                            <td class="text-center">
                                                                <?php echo e(number_format($s->total_harga, 0, ',', '.')); ?>

                                                            </td>
                                                            <td class="text-center"><?php echo e($s->diskon); ?>%</td>
                                                            <td class="text-center">
                                                                <?php echo e(number_format($s->bayar, 0, ',', '.')); ?>

                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <div class="btn-group">
                                                                        <a href="#"
                                                                            class="btn-detail btn btn-info btn-sm me-2"
                                                                            kode_transaksi="<?php echo e($s->kode_transaksi); ?>">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-eye-search">
                                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                                <path
                                                                                    d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                                <path
                                                                                    d="M12 18c-.328 0 -.652 -.017 -.97 -.05c-3.172 -.332 -5.85 -2.315 -8.03 -5.95c2.4 -4 5.4 -6 9 -6c3.465 0 6.374 1.853 8.727 5.558" />
                                                                                <path
                                                                                    d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                                <path d="M20.2 20.2l1.8 1.8" />
                                                                            </svg>
                                                                            Detail
                                                                        </a>
                                                                        <form
                                                                            action="/pembelian/<?php echo e($s->id_pembelian); ?>/delete"
                                                                            method="POST" style="margin-left:5px ">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('DELETE'); ?>
                                                                            <button
                                                                                class="btn btn-danger btn-sm delete-confirm">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    fill="currentColor"
                                                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-trash">
                                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                                        fill="none" />
                                                                                    <path
                                                                                        d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" />
                                                                                    <path
                                                                                        d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" />
                                                                                </svg>
                                                                                Delete
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <?php echo e($pembelian->links('vendor.pagination.bootstrap-5')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-input" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full-width modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Beli Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="1%">No</th>
                                                <th class="text-center" width="3%">
                                                    Kode Supplier
                                                </th>
                                                <th width="10%">Nama Supplier</th>
                                                <th width="10%">No.Hp</th>
                                                <th width="20%">Alamat</th>
                                                <th width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="hasil-pencarian">
                                            <?php $__currentLoopData = $supplier1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php echo e($loop->iteration + $supplier1->firstItem() - 1); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge bg-success"><?php echo e($d->kode_splr); ?></span>
                                                    </td>
                                                    <td><?php echo e($d->nama_splr); ?></td>
                                                    <td><?php echo e($d->no_hp); ?></td>
                                                    <td><?php echo e($d->alamat); ?></td>
                                                    <td>
                                                        <div class="text-center">
                                                            <div class="btn-group">
                                                                <a href="#" class="btn-pilih btn btn-info btn-sm"
                                                                    data-kode="<?php echo e($d->kode_splr); ?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M5 12l5 5l10 -10" />
                                                                    </svg>
                                                                    Pilih
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <?php echo e($supplier1->links('vendor.pagination.bootstrap-5')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full-width modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loaddetailform">
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-status bg-success"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon mb-2 text-green icon-lg">
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                    <h3>Data Berhasil Diperbarui</h3>
                    <div class="text-secondary" id="successMessage"></div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <button class="btn btn-success w-100" id="btnRedirect">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Ikon Error -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon mb-2 text-danger icon-lg">
                        <path d="M12 9v4"></path>
                        <path
                            d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                        </path>
                        <path d="M12 16h.01"></path>
                    </svg>
                    <h3>Terjadi Kesalahan</h3>
                    <div class="text-secondary" id="errorMessage"></div>
                </div>
                <div class="modal-footer d-flex justify-content-center gap-2" id="modalerrorFooter">
                    <button class="btn btn-secondary w-100" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('myscript'); ?>
    <script>
        $("#btn-tambah").click(function() {
            $("#modal-input").modal("show");
        });

        $(".btn-detail").click(function() {
            var kode_transaksi = $(this).attr('kode_transaksi');
            $.ajax({
                type: 'POST',
                url: '/pembelian/detail',
                cache: false,
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    kode_transaksi: kode_transaksi
                },
                success: function(respond) {
                    $("#loaddetailform").html(respond);
                }
            });
            $("#modal-detail").modal("show");
        });

        $(document).on("click", ".btn-pilih", function(e) {
            e.preventDefault();

            var kode_splr = $(this).data("kode");

            $.ajax({
                type: 'GET',
                url: '/pembelian/' + kode_splr + '/transaksi',
                cache: false,
                success: function(response) {
                    window.location.href = '/pembelian/' + kode_splr + '/transaksi';
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi Kesalahan:", error);
                    $("#errorModal").modal("show");
                    $("#errorMessage").text(xhr.responseJSON?.message ||
                        "Terjadi kesalahan." + error);
                }
            });
        });

        $(".delete-confirm").click(function(e) {
            var form = $(this).closest('form');
            e.preventDefault();

            // Set teks konfirmasi dalam modal
            $("#errorMessage").text("Anda yakin mau menghapus data ini? Data akan terhapus permanen.");

            // Tampilkan tombol konfirmasi dan batal
            $("#modalerrorFooter").html(`
        <button id="confirmDelete" class="btn btn-danger px-5">Ya, Hapus</button>
        <button id="cancelDelete" class="btn btn-secondary px-5" data-bs-dismiss="modal">Tidak</button>
    `);

            // Tampilkan modal
            $("#errorModal").modal("show");

            // Event listener untuk tombol konfirmasi
            $("#modalerrorFooter").off("click", "#confirmDelete").on("click", "#confirmDelete", function() {
                form.submit();
                $("#errorModal").modal("hide");
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/pembelian/index.blade.php ENDPATH**/ ?>