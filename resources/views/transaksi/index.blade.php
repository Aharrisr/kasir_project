@extends('layouts.dashboard')
@section('content')
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
        <div class="container-fluid">
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
                                    @if (Session::get('success'))
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
                                                {{ Session::get('success') }}
                                            </div>
                                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                        </div>
                                    @endif
                                    @if (Session::get('warning'))
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
                                                {{ Session::get('warning') }}
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row"><label for="">Kode Transaksi : {{ $kode_transaksi }}</label></div>
                            <div class="row"><label for="">Nama Petugas : {{ $user->nama_user }}</label></div>
                            <form action="/penjualan/{{ $kode_transaksi }}/update" method="POST" id="frmpenjualan"
                                onkeydown="return event.key !== 'Enter';">
                                @csrf
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
                                                                Harga Satuan
                                                            </th>
                                                            <th class="text-center" width="5%">
                                                                Jumlah
                                                            </th>
                                                            <th class="text-center" width="10%">Subtotal</th>
                                                            <th width="8%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($penjualan_detail as $s)
                                                            @if ($s->kode_transaksi == $kode_transaksi)
                                                                <tr>
                                                                    <td class="text-center">
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <span
                                                                            class="badge bg-success">{{ $s->kode_produk }}</span>
                                                                    </td>
                                                                    <td>{{ $s->nama_produk }}</td>
                                                                    <td class="text-center">
                                                                        Rp. {{ number_format($s->harga_jual, 0, ',', '.') }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input type="text" name="jumlah"
                                                                            class="jumlah-input form-control"
                                                                            autocomplete="off"
                                                                            data-harga="{{ $s->harga_jual }}"
                                                                            value="{{ $s->jumlah }}" minlength="1"
                                                                            maxlength="3"
                                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <span class="subtotal-text">
                                                                            <input type="text" name="subtotal"
                                                                                id="subtotal"
                                                                                value="{{ $s->harga_jual * $s->jumlah }}"
                                                                                hidden>
                                                                            <span>Rp.
                                                                                {{ number_format($s->harga_jual * $s->jumlah, 0, ',', '.') }}</span>
                                                                        </span>
                                                                    </td>
                                                                    <td hidden><input type="text"
                                                                            value="{{ $kode_transaksi }}"
                                                                            id="kode_transaksi" name="kode_transaksi">
                                                                        <input type="text"
                                                                            value="{{ $s->id_penjualan_detail }}"
                                                                            id="id_penjualan_detail"
                                                                            name="id_penjualan_detail">
                                                                        <input type="text" value="{{ $s->stok }}"
                                                                            id="stok" name="stok">
                                                                        <input type="text" value="{{ $s->id_produk }}"
                                                                            id="id_produk" name="id_produk">
                                                                        <input type="text" name="petugas"
                                                                            id="petugas"
                                                                            value="{{ $user->nama_user }}">
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm delete-btn"
                                                                            data-id="{{ $s->id_penjualan_detail }}">
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
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{ $penjualan_detail->links('vendor.pagination.bootstrap-5') }}
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
                                                    <label for="" class="me-3 mb-0">Member</label>
                                                    <input class="form-control" list="datalistOptions" id="member"
                                                        name="member" onchange="fetchDiscount()" autocomplete="off">
                                                    <datalist id="datalistOptions">
                                                        @foreach ($member as $d)
                                                            <option
                                                                {{ Request('kode_member') == $d->kode_member ? 'selected' : '' }}
                                                                value="{{ $d->kode_member }}">{{ $d->nama }}
                                                            </option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <label for="diskon" class="me-3 mb-0">Diskon</label>
                                                    <input type="text" class="form-control" placeholder="0%"
                                                        id="diskon_display" name="diskon_display" autocomplete="off"
                                                        value="0%">
                                                    <input type="hidden" id="diskon" name="diskon" value="0">
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <label for="bayar_display" class="me-3 mb-0">Bayar</label>
                                                    <input type="text" class="form-control" placeholder="Rp. 0"
                                                        id="bayar_display" name="bayar_display" autocomplete="off">
                                                    <input type="hidden" id="bayar" name="bayar">
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <label for="bayar_display" class="me-3 mb-0">kembalian</label>
                                                    <input type="text" class="form-control" name="kembalian"
                                                        id="kembalian" placeholder="Rp. 0">
                                                    <p id="error-message" class="text-danger mt-2"></p>
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
                                <form action="/penjualan/{{ $kode_transaksi }}/cancel" method="POST"
                                    style="margin-left:5px">
                                    @csrf
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
                                                <th width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produk as $s)
                                                <form action="/penjualan/{{ $s->kode_produk }}/tambah" method="POST">
                                                    @csrf
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $loop->iteration + $produk->firstItem() - 1 }}
                                                        </td>
                                                        <td hidden> <input type="text" name="kode_transaksi"
                                                                value="{{ $kode_transaksi }}">
                                                        </td>
                                                        <td hidden>
                                                            <input type="text" name="id_produk" id="id_produk"
                                                                value="{{ $s->id_produk }}">
                                                        </td>
                                                        <td class="text-center" id="kode_produk">
                                                            <span class="badge bg-success"><input type="text" hidden
                                                                    name="kode_produk"
                                                                    value="{{ $s->kode_produk }}">{{ $s->kode_produk }}</span>
                                                        </td>
                                                        <td id="nama_produk"><input type="text" hidden
                                                                name="nama_produk"
                                                                value="{{ $s->nama_produk }}">{{ $s->nama_produk }}
                                                        </td>
                                                        <td class="text-center" id="harga"><input type="hidden"
                                                                name="harga_jual"
                                                                value="{{ $s->harga_jual - ($s->harga_jual * $s->diskon) / 100 }}">
                                                            {{ 'Rp ' . number_format($s->harga_jual - ($s->harga_jual * $s->diskon) / 100, 0, ',', '.') }}
                                                        </td>
                                                        <td hidden id="stok"><input type="text" hidden
                                                                name="jumlah" value="1"></td>
                                                        <td hidden id="subtotal"><input type="text" name="subtotal"
                                                                value="{{ $s->harga_jual - ($s->harga_jual * $s->diskon) / 100 }}">
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($s->stok == 0)
                                                                <span class="badge bg-danger">Stok Habis</span>
                                                            @else
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
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </form>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $produk->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    {{-- *Modal Success* --}}
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

    {{-- *Modal Error* --}}
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
@endsection
@push('myscript')
    <script>
        // $(document).ready(function() {
        //     let tooltip = new bootstrap.Tooltip(document.getElementById('member'), {
        //         placement: 'right',
        //         title: "Pilih atau ketik item",
        //         trigger: 'focus'
        //     });
        // });

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
            let id_penjualan_detail = $(this).data("id");
            let row = $("#row-" + id_penjualan_detail);

            $.ajax({
                url: "/penjualan/" + id_penjualan_detail,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: "{{ csrf_token() }}"
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
            let diskonInput = document.getElementById("diskon_display"); // Ambil elemen diskon

            // Event Listener untuk setiap input jumlah barang
            jumlahInputs.forEach((input) => {
                input.addEventListener("input", hitungSubtotal);
            });

            // Gunakan observer untuk mendeteksi perubahan diskon meskipun diubah oleh sistem
            const observer = new MutationObserver(hitungTotal);
            observer.observe(diskonInput, {
                attributes: true,
                childList: true,
                subtree: true
            });

            // Jalankan perhitungan ulang secara berkala jika diskon berubah melalui sistem
            setInterval(() => {
                hitungTotal();
            }, 500); // Cek perubahan diskon setiap 0.5 detik

            function hitungSubtotal() {
                let harga = parseFloat(this.getAttribute("data-harga"));
                let jumlah = parseInt(this.value);
                let subtotalElement = this.closest("tr").querySelector(".subtotal-text");

                if (!isNaN(jumlah) && jumlah > 0) {
                    let subtotal = harga * jumlah;
                    subtotalElement.querySelector("input").value = subtotal;
                    subtotalElement.querySelector("span").textContent = "Rp. " + subtotal.toLocaleString("id-ID");
                } else {
                    subtotalElement.querySelector("input").value = 0;
                    subtotalElement.querySelector("span").textContent = "Rp. 0";
                }

                hitungTotal(); // Panggil hitung total setelah subtotal berubah
            }

            function hitungTotal() {
                let totalHarga = 0;
                let totalJumlah = 0;
                let diskonPersen = parseFloat(diskonInput.value) || 0; // Ambil diskon, default 0

                document.querySelectorAll(".subtotal-text span").forEach(function(element) {
                    let subtotal = parseFloat(element.textContent.replace(/[^\d]/g, "")) || 0;
                    totalHarga += subtotal;
                });

                document.querySelectorAll(".jumlah-input").forEach(function(element) {
                    let jumlah = parseInt(element.value) || 0;
                    totalJumlah += jumlah;
                });

                // Hitung total setelah diskon
                let totalSetelahDiskon = totalHarga - (totalHarga * diskonPersen / 100);

                // Update tampilan total harga dan jumlah barang
                document.getElementById("total-harga").textContent = "Rp. " + totalSetelahDiskon.toLocaleString(
                    "id-ID");
                document.getElementById("total_harga").value = totalSetelahDiskon;
                document.getElementById("total_jumlah").value = totalJumlah;
            }

            hitungTotal(); // Hitung total saat halaman dimuat
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
            @if (session('success_cancel'))
                document.getElementById("successTitle").textContent = 'Berhasil';
                document.getElementById("successMessage").textContent = 'Pembatalan transaksi berhasil';
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                document.getElementById("btnRedirect").addEventListener("click", function() {
                    window.location.href = "/";
                });
            @endif

            @if (session('warning_cancel'))
                document.getElementById("errorMessage").textContent = 'Data gagal diproses. Silakan coba lagi.';
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            @endif

            @if (session('warning_tambah'))
                document.getElementById("errorMessage").textContent = 'Data sudah ada.';
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            @endif

            @if (session('warning_stok'))
                document.getElementById("errorMessage").textContent = 'Jumlah Melebihi dari stok';
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            @endif

            @if (session('success_updatedata'))
                document.getElementById("successMessage").textContent = 'Data Berhasil Simpan.';
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                document.getElementById("btnRedirect").addEventListener("click", function() {
                    window.location.href = "/penjualan/selesai";
                });
            @endif

            @if (session('warning_updatedata'))
                document.getElementById("errorMessage").textContent = 'Data gagal diproses. Silakan coba lagi.';
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            @endif
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

        function fetchDiscount() {
            let memberCode = document.getElementById('member').value;
            document.getElementById('error-message').innerText = '';

            if (memberCode) {
                fetch(`/get-discount?kode_member=${memberCode}`)
                    .then(response => response.json().then(data => ({
                        status: response.status,
                        data
                    })))
                    .then(res => {
                        if (res.status !== 200) {
                            // Tampilkan pesan error jika terjadi error
                            document.getElementById('error-message').innerText = res.data.error || 'Terjadi kesalahan';
                            document.getElementById('diskon').value = 0;
                            document.getElementById('diskon_display').value = '0%';
                        } else {
                            document.getElementById('diskon').value = res.data.diskon;
                            document.getElementById('diskon_display').value = res.data.diskon + '%';
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        document.getElementById('error-message').innerText = 'Terjadi kesalahan saat mengambil data';
                    });
            } else {
                document.getElementById('diskon').value = 0;
                document.getElementById('diskon_display').value = '0%';
            }
        }

        function formatRupiah(angka) {
            return 'Rp. ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function parseRupiah(str) {
            return parseInt(str.replace(/[^0-9]/g, '')) || 0;
        }

        function hitungKembalian() {
            const totalHarga = parseInt(document.getElementById('total_harga').value) || 0;
            const bayar = parseRupiah(document.getElementById('bayar_display').value);

            const kembalian = bayar - totalHarga;

            document.getElementById('bayar').value = bayar;
            document.getElementById('kembalian').value = formatRupiah(kembalian > 0 ? kembalian : 0);
        }

        // Jalankan setiap kali input bayar diubah
        document.getElementById('bayar_display').addEventListener('input', hitungKembalian);
    </script>
@endpush
