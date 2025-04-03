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

        .total-harga {
            background-color: #2F80ED;
            color: white;
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            padding: 10px;
        }

        .currency-label {
            background-color: #dadada;
            text-align: center;
            font-size: 14px;
            color: #000000;
        }
    </style>
    <div class="page-body">
        <div class="container-xl">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card shadow-lg p-2 mb-5 rounded">
                        <div class="card-header">
                            <h3 class="card-title">Data Produk</h3>
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
                                        <div class="alert alert-success alert-dismissible d-flex align-items-center"
                                            role="alert">
                                            <div class="alert-icon me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon alert-icon icon-2">
                                                    <path d="M5 12l5 5l10 -10"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <?php echo e(Session::get('success')); ?>

                                            </div>
                                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(Session::get('warning')): ?>
                                        <div class="alert alert-danger alert-dismissible d-flex align-items-center"
                                            role="alert">
                                            <div class="alert-icon me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon alert-icon icon-2">
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                    <path d="M12 8v4"></path>
                                                    <path d="M12 16h.01"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <?php echo e(Session::get('warning')); ?>

                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row"><label for="">Nama supplier : <?php echo e($supplier->nama_splr); ?></label>
                            </div>
                            <div class="row"><label for="">No Hp : <?php echo e($supplier->no_hp); ?></label></div>
                            <div class="row"><label for="">Alamat : <?php echo e($supplier->alamat); ?></label></div>
                            <div class="row"><label for="">Kode Transaksi : <?php echo e($kode_transaksi); ?></label></div>
                            <form action="/transaksi/<?php echo e($kode_transaksi); ?>/update" method="POST" id="frmpembelian"
                                onkeydown="return event.key !== 'Enter';">
                                <?php echo csrf_field(); ?>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="table-responsive">
                                                <table class="table table-vcenter card-table table-striped"
                                                    id="tabeldetail">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" width="1%">No</th>
                                                            <th class="text-center" width="5%">
                                                                Kode Produk
                                                            </th>
                                                            <th width="15%">Nama Barang</th>
                                                            <th class="text-center" width="10%">
                                                                Harga beli
                                                            </th>
                                                            <th class="text-center" width="5%">
                                                                Jumlah
                                                            </th>
                                                            <th class="text-center" width="10%">Subtotal</th>
                                                            <th width="8%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $pembelian_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($s->kode_transaksi == $kode_transaksi): ?>
                                                                <tr>
                                                                    <td class="text-center">
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <span
                                                                            class="badge bg-success"><?php echo e($s->kode_produk); ?></span>
                                                                    </td>
                                                                    <td><?php echo e($s->nama_produk); ?></td>
                                                                    <td class="text-center">
                                                                        Rp. <?php echo e(number_format($s->harga_beli, 0, ',', '.')); ?>

                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input type="number" name="jumlah"
                                                                            class="jumlah-input form-control"
                                                                            data-harga="<?php echo e($s->harga_beli); ?>"
                                                                            value="<?php echo e($s->jumlah); ?>" min="1">
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <span class="subtotal-text">
                                                                            <input type="text" name="subtotal"
                                                                                id="subtotal"
                                                                                value="<?php echo e($s->harga_beli * $s->jumlah); ?>"
                                                                                hidden>
                                                                            <span>Rp.
                                                                                <?php echo e(number_format($s->harga_beli * $s->jumlah, 0, ',', '.')); ?></span>
                                                                        </span>
                                                                    </td>
                                                                    <td hidden><input type="text"
                                                                            value="<?php echo e($kode_transaksi); ?>"
                                                                            id="kode_transaksi" name="kode_transaksi">
                                                                    </td>
                                                                    <td hidden>
                                                                        <input type="text"
                                                                            value="<?php echo e($s->id_pembelian_detail); ?>"
                                                                            id="id_pembelian_detail"
                                                                            name="id_pembelian_detail">
                                                                    </td>
                                                                    <td hidden>
                                                                        <input type="text"
                                                                            value="<?php echo e($supplier->kode_splr); ?>"
                                                                            id="kode_splr" name="kode_splr">
                                                                    </td>
                                                                    <td hidden>
                                                                        <input type="text" value="<?php echo e($s->stok); ?>"
                                                                            id="stok" name="stok">
                                                                        <input type="text" value="<?php echo e($s->id_produk); ?>"
                                                                            id="id_produk" name="id_produk">
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm delete-btn"
                                                                            data-id="<?php echo e($s->id_pembelian_detail); ?>">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                viewBox="0 0 24 24" fill="currentColor">
                                                                                <path
                                                                                    d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" />
                                                                                <path
                                                                                    d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" />
                                                                            </svg>
                                                                            Hapus
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php echo e($pembelian_detail->links('vendor.pagination.bootstrap-5')); ?>

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="total-harga">
                                                    <h2 id="total-harga">Rp. 0</h2>
                                                    <input type="hidden" id="total_harga" name="total_harga">
                                                    <input type="hidden" id="total_jumlah" name="total_jumlah">
                                                </div>
                                                <p class="currency-label">Rupiah</p>
                                            </div>
                                            <div class="col-4 d-flex flex-column align-items-end">
                                                <div class="d-flex align-items-center mb-2">
                                                    <label for="diskon" class="me-3 mb-0">Diskon</label>
                                                    <input type="text" class="form-control" placeholder="0%"
                                                        id="diskon_display" name="diskon_display" autocomplete="off">
                                                    <input type="hidden" id="diskon" name="diskon">
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <label for="bayar_display" class="me-3 mb-0">Bayar</label>
                                                    <input type="text" class="form-control" placeholder="Rp. 0"
                                                        id="bayar_display" name="bayar_display" autocomplete="off">
                                                    <input type="hidden" id="bayar" name="bayar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ml-2" style="text-align: right;">
                                    <button id="btnBayar" class="btn btn-primary w-25" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-currency-dollar">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                            <path d="M12 3v3m0 12v3" />
                                        </svg>
                                        Bayar
                                    </button>
                                </div>
                            </form>
                            <div class="form-group mt-2" style="text-align: right;">
                                <form action="/transaksi/<?php echo e($kode_transaksi); ?>/cancel" method="POST"
                                    style="margin-left:5px">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-danger cancel-confirm w-25">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-cancel">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M18.364 5.636l-12.728 12.728" />
                                        </svg>
                                        Batalkan Transaksi
                                    </button>
                                </form>
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
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="1%">No</th>
                                                <th class="text-center" width="10%">
                                                    Kode Produk
                                                </th>
                                                <th width="10%">Nama Barang</th>
                                                <th class="text-center" width="8%">
                                                    Harga Satuan
                                                </th>
                                                <th class="text-center" width="3%">Stok</th>
                                                <th width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <form action="/transaksi/<?php echo e($s->kode_produk); ?>/tambah" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <tr>
                                                        <?php if($s->kode_splr == $supplier->kode_splr): ?>
                                                            <td class="text-center">
                                                                <?php echo e($loop->iteration + $produk->firstItem() - 1); ?>

                                                            </td>
                                                            <td hidden> <input type="text" name="kode_transaksi"
                                                                    value="<?php echo e($kode_transaksi); ?>">
                                                            </td>
                                                            <td hidden>
                                                                <input type="text" name="id_produk" id="id_produk"
                                                                    value="<?php echo e($s->id_produk); ?>">
                                                            </td>
                                                            <td class="text-center" id="kode_produk">
                                                                <span class="badge bg-success"><input type="text"
                                                                        hidden name="kode_produk"
                                                                        value="<?php echo e($s->kode_produk); ?>"><?php echo e($s->kode_produk); ?></span>
                                                            </td>
                                                            <td id="nama_produk"><input type="text" hidden
                                                                    name="nama_produk"
                                                                    value="<?php echo e($s->nama_produk); ?>"><?php echo e($s->nama_produk); ?>

                                                            </td>
                                                            <td class="text-center" id="harga"><input type="text"
                                                                    hidden name="harga_beli"
                                                                    value="<?php echo e($s->harga_beli); ?>">
                                                                <?php echo e(number_format($s->harga_beli, 0, ',', '.')); ?>

                                                            </td>
                                                            <td class="text-center"><?php echo e($s->stok); ?></td>
                                                            <td hidden id="stok"><input type="text" hidden
                                                                    name="jumlah" value="1"></td>
                                                            <td hidden id="subtotal"><input type="text"
                                                                    name="subtotal" value="<?php echo e($s->harga_beli); ?>">
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="btn-group">
                                                                    <button class="btn btn-primary btn-sm">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <line x1="12" y1="5"
                                                                                x2="12" y2="19" />
                                                                            <line x1="5" y1="12"
                                                                                x2="19" y2="12" />
                                                                        </svg>
                                                                        tambah
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                </form>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e($produk->links('vendor.pagination.bootstrap-5')); ?>

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
                    <h3 id="successTitle">Data Berhasil Diperbarui</h3>
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
                    <h3 id="errorTitle">Terjadi Kesalahan</h3>
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
        document.addEventListener("DOMContentLoaded", function() {
            let tabeldetail = document.querySelector("#tabeldetail tbody");

            updateRowNumbers();

            let observer = new MutationObserver(updateRowNumbers);
            observer.observe(tabeldetail, {
                childList: true
            });
        });

        function updateRowNumbers() {
            let tableRows = document.querySelectorAll("#tabeldetail tbody tr"); // Hanya di tabelDetail
            tableRows.forEach((row, index) => {
                let firstCell = row.querySelector("td:first-child");
                if (firstCell) {
                    firstCell.textContent = index + 1;
                }
            });
        }

        $("#btn-tambah").click(function() {
            $("#modal-input").modal("show");
        });

        $(document).on("click", ".delete-btn", function() {
            let id_pembelian_detail = $(this).data("id");
            let row = $("#row-" + id_pembelian_detail);

            $.ajax({
                url: "/transaksi/" + id_pembelian_detail,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    row.fadeOut(300, function() {
                        $(this).remove();
                    });

                    $("#successModal").modal("show");
                    $("#successMessage").text(response.message || "Data berhasil dihapus.");

                    $("#btnRedirect").click(function() {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi Kesalahan:", error);
                    $("#errorModal").modal("show");
                    $("#errorMessage").text(xhr.responseJSON?.message ||
                        "Terjadi kesalahan." + error);
                }
            });
        });

        $(".cancel-confirm").click(function(e) {
            var form = $(this).closest('form');
            e.preventDefault();

            // Set teks konfirmasi dalam modal
            $("#errorTitle").text("Apakah Anda Yakin?")
            $("#errorMessage").text("Anda yakin mau menghapus data ini? Data akan terhapus permanen.");

            // Tampilkan tombol konfirmasi dan batal dalam modal footer
            $("#modalerrorFooter").html(`
        <button id="confirm" class="btn btn-danger px-5">Ya, Hapus</button>
        <button id="cancelDelete" class="btn btn-secondary px-5" data-bs-dismiss="modal">Tidak</button>
    `);

            // Tampilkan modal
            $("#errorModal").modal("show");

            // Event listener untuk tombol konfirmasi (pastikan ID sesuai)
            $("#modalerrorFooter").off("click", "#confirm").on("click", "#confirm", function() {
                form.submit();
                $("#errorModal").modal("hide");
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            let jumlahInputs = document.querySelectorAll(".jumlah-input");

            jumlahInputs.forEach(input => {
                input.addEventListener("input", function() {
                    let harga = parseFloat(this.getAttribute("data-harga"));
                    let jumlah = parseInt(this.value);
                    let subtotalElement = this.closest("tr").querySelector(".subtotal-text");

                    if (!isNaN(jumlah) && jumlah > 0) {
                        let subtotal = harga * jumlah;
                        subtotalElement.querySelector("input").value = subtotal;
                        subtotalElement.querySelector("span").textContent = "Rp. " + subtotal
                            .toLocaleString("id-ID");
                        hitungTotal();
                    }
                });
            });

            function hitungTotal() {
                let totalHarga = 0;
                let totalJumlah = 0;

                document.querySelectorAll(".subtotal-text span").forEach(function(element) {
                    let subtotal = parseFloat(element.textContent.replace(/[^\d]/g, "")) || 0;
                    totalHarga += subtotal;
                });

                document.querySelectorAll(".jumlah-input").forEach(function(element) {
                    let jumlah = parseInt(element.value) || 0;
                    totalJumlah += jumlah;
                });

                document.getElementById("total-harga").textContent = "Rp. " + totalHarga.toLocaleString("id-ID");

                document.getElementById("total_harga").value = totalHarga;
                document.getElementById("total_jumlah").value = totalJumlah;
            }

            hitungTotal();
        });

        document.addEventListener("DOMContentLoaded", function() {
            const bayarDisplay = document.getElementById("bayar_display");
            const bayarHidden = document.getElementById("bayar");

            bayarDisplay.addEventListener("input", function(e) {
                let value = e.target.value.replace(/[^0-9]/g, "");
                let formattedValue = new Intl.NumberFormat("id-ID").format(value);

                e.target.value = "Rp. " + formattedValue;
                bayarHidden.value = value;
            });

            bayarDisplay.addEventListener("focus", function() {
                if (this.value === "Rp. 0") {
                    this.value = "Rp. ";
                }
            });

            bayarDisplay.addEventListener("blur", function() {
                if (this.value === "Rp. ") {
                    this.value = "Rp. 0";
                    bayarHidden.value = "0";
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const diskonDisplay = document.getElementById("diskon_display");
            const diskonHidden = document.getElementById("diskon");

            diskonDisplay.addEventListener("input", function(e) {
                let value = e.target.value.replace(/[^0-9]/g, "");
                let intValue = parseInt(value) || 0;

                if (intValue > 100) intValue = 100;

                e.target.value = value === "" ? "" : intValue + "%";
                diskonHidden.value = value === "" ? "0" : intValue;
            });

            diskonDisplay.addEventListener("focus", function() {
                if (this.value === "0%") {
                    this.value = "";
                }
            });

            diskonDisplay.addEventListener("blur", function() {
                if (this.value === "" || this.value === "%") {
                    this.value = "0%";
                    diskonHidden.value = "0";
                }
            });
        });

        //alert btn cancel
        document.addEventListener("DOMContentLoaded", function() {
            <?php if(session('success_cancel')): ?>
                document.getElementById("successTitle").textContent = 'Berhasil';
                document.getElementById("successMessage").textContent = 'Pembatalan transaksi berhasil';
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                document.getElementById("btnRedirect").addEventListener("click", function() {
                    window.location.href = "/pembelian";
                });
            <?php endif; ?>

            <?php if(session('warning_cancel')): ?>
                document.getElementById("errorMessage").textContent = 'Data gagal diproses. Silakan coba lagi.';
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            <?php endif; ?>

            <?php if(session('warning_tambah')): ?>
                document.getElementById("errorMessage").textContent = 'Data sudah ada.';
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            <?php endif; ?>

            <?php if(session('success_updatedata')): ?>
                document.getElementById("successMessage").textContent = 'Data Berhasil Simpan.';
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                document.getElementById("btnRedirect").addEventListener("click", function() {
                    window.location.href = "/pembelian";
                });
            <?php endif; ?>

            <?php if(session('warning_updatedata')): ?>
                document.getElementById("errorMessage").textContent = 'Data gagal diproses. Silakan coba lagi.';
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            <?php endif; ?>
        });

        $(document).ready(function() {
            $("#bayar_display").on("input", function() {
                let bayarInput = $(this).val().replace(/\D/g, "");
                let bayarFormatted = new Intl.NumberFormat("id-ID").format(bayarInput);

                $(this).val("Rp. " + bayarFormatted);
                $("#bayar").val(bayarInput);

                validatePayment();
            });

            function validatePayment() {
                let totalHarga = parseInt($("#total_harga").val()) || 0;
                let bayar = parseInt($("#bayar").val()) || 0;

                if (bayar >= totalHarga) {
                    $("#btnBayar").prop("disabled", false);
                } else {
                    $("#btnBayar").prop("disabled", true);
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/pembelian/transaksi.blade.php ENDPATH**/ ?>