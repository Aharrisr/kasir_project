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
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Transaksi
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg p-2 mb-5 rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @if (Session::get('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    @if (Session::get('warning'))
                                        <div class="alert alert-warning">
                                            {{ Session::get('warning') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <p class="mb-1"><strong>Nama Supplier:</strong> {{ $pembelian->nama_splr }}</p>
                                <p class="mb-1"><strong>No HP:</strong> {{ $pembelian->no_hp }}</p>
                                <p class="mb-1"><strong>Alamat:</strong> {{ $pembelian->alamat }}</p>
                                <p class="mb-1"><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</p>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group">
                                    <button class="btn btn-primary" id="btn-tambah">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg>
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <form action="/transaksi/{{ $transaksi->kode_transaksi }}/edit" method="POST" id="frmedit"
                                onkeydown="return event.key !== 'Enter';">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th class="text-center" width="1%">No</th>
                                                    <th class="text-center" width="5%">
                                                        Kode Produk
                                                    </th>
                                                    <th width="20%">Nama Barang</th>
                                                    <th class="text-center" width="10%">
                                                        Harga beli
                                                    </th>
                                                    <th class="text-center" width="5%">
                                                        Jumlah
                                                    </th>
                                                    <th width="10%">Subtotal</th>
                                                    <th width="5%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pembelian_detail as $s)
                                                    @if ($s->kode_transaksi == $transaksi->kode_transaksi)
                                                        <tr>
                                                            @php
                                                                $no = 0;
                                                            @endphp
                                                            <td class="text-center">
                                                                {{ $loop->iteration + $no - 1 }}
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="badge bg-success">{{ $s->kode_produk }}</span>
                                                            </td>
                                                            <td>{{ $s->nama_produk }}</td>
                                                            <td class="text-center">
                                                                Rp. {{ number_format($s->harga_beli, 0, ',', '.') }}
                                                            </td>
                                                            <td>
                                                                <input type="number" name="jumlah"
                                                                    class="jumlah-input form-control"
                                                                    data-harga="{{ $s->harga_beli }}"
                                                                    value="{{ $s->jumlah }}" min="1">
                                                            </td>
                                                            <td>
                                                                <span class="subtotal-text">
                                                                    <input type="text" name="subtotal" id="subtotal"
                                                                        value="{{ $s->harga_beli * $s->jumlah }}" hidden>
                                                                    <span>Rp.
                                                                        {{ number_format($s->harga_beli * $s->jumlah, 0, ',', '.') }}</span>
                                                                </span>
                                                            </td>
                                                            <td hidden><input type="text"
                                                                    value="{{ $transaksi->kode_transaksi }}"
                                                                    id="kode_transaksi" name="kode_transaksi">
                                                            </td>
                                                            <td hidden>
                                                                <input type="text" value="{{ $s->id_pembelian_detail }}"
                                                                    id="id_pembelian_detail" name="id_pembelian_detail">
                                                            </td>
                                                            <td hidden>
                                                                <input type="text" value="{{ $pembelian->kode_splr }}"
                                                                    id="kode_splr" name="kode_splr">
                                                            </td>
                                                            <td hidden>
                                                                <input type="text" value="{{ $s->stok }}"
                                                                    id="stok" name="stok">
                                                                <input type="text" value="{{ $s->id_produk }}"
                                                                    id="id_produk" name="id_produk">
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm delete-btn"
                                                                    data-id="{{ $s->id_pembelian_detail }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M4 7l16 0" />
                                                                        <path d="M10 11l0 6" />
                                                                        <path d="M14 11l0 6" />
                                                                        <path
                                                                            d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                        <path
                                                                            d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                    </svg>
                                                                    Hapus
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $produk->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div>
                                <div class="row mt-2">
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
                                                        id="diskon_display" name="diskon_display" autocomplete="off"
                                                        value="{{ $pembelian->diskon }}%">
                                                    <input type="hidden" id="diskon" name="diskon">
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <label for="bayar_display" class="me-3 mb-0">Bayar</label>
                                                    <input type="text" class="form-control" placeholder="Rp. 0"
                                                        id="bayar_display" name="bayar_display" autocomplete="off"
                                                        value="Rp. {{ number_format($pembelian->bayar, 0, ',', '.') }}">
                                                    <input type="hidden" id="bayar" name="bayar"
                                                        value="{{ intval($pembelian->bayar) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ml-2" style="text-align: right;">
                                    <button id="btnsimpan" class="btn btn-primary w-25">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M14 4l0 4l-6 0l0 -4" />
                                        </svg>
                                        Simpan
                                    </button>
                                </div>
                            </form>
                            <form action="/transaksi/{{ $transaksi->kode_transaksi }}/delete" method="POST" style="margin-left:5px ">
                                @csrf
                                <div class="form-group mt-2" style="text-align: right;">
                                    <button class="btn btn-danger delete-confirm w-25">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                        Hapus Transaksi
                                    </button>
                                </div>
                            </form>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" width="1%">No</th>
                                <th class="text-center" width="5%">
                                    Kode Produk
                                </th>
                                <th width="30%">Nama Barang</th>
                                <th class="text-center" width="8%">
                                    Harga
                                </th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $s)
                                <form action="/transaksi/{{ $s->kode_produk }}/tambah" method="POST">
                                    @csrf
                                    <tr>
                                        @if ($s->kode_splr == $pembelian->kode_splr)
                                            <td class="text-center">
                                                {{ $loop->iteration + $produk->firstItem() - 1 }}
                                            </td>
                                            <td hidden> <input type="text" name="kode_transaksi"
                                                    value="{{ $transaksi }}"></td>
                                            <td class="text-center" id="kode_produk">
                                                <span class="badge bg-success"><input type="text" hidden
                                                        name="kode_produk"
                                                        value="{{ $s->kode_produk }}">{{ $s->kode_produk }}</span>
                                            </td>
                                            <td id="nama_produk"><input type="text" hidden name="nama_produk"
                                                    value="{{ $s->nama_produk }}">{{ $s->nama_produk }}</td>
                                            <td class="text-center" id="harga"><input type="text" hidden
                                                    name="harga_beli" value="{{ $s->harga }}">
                                                {{ number_format($s->harga, 0, ',', '.') }}
                                            </td>
                                            <td hidden id="stok"><input type="text" hidden name="jumlah"
                                                    value="1"></td>
                                            <td hidden id="subtotal"><input type="text" hidden name="subtotal"
                                                    value="{{ $s->harga }}">{{ number_format($s->harga, 0, ',', '.') }}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                        tambah
                                                    </button>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $produk->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    {{-- *Modal Success* --}}
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success w-100" id="btnRedirect">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- *Modal Error* --}}
    <div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <div class="modal-footer">
                    <div class="w-100">
                        <button class="btn btn-secondary w-100" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('myscript')
    <script>
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
            @if (session('success_cancel'))
                document.getElementById("successMessage").textContent = 'Pembatalan transaksi berhasil';
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                document.getElementById("btnRedirect").addEventListener("click", function() {
                    window.location.href = "/pembelian";
                });
            @endif

            @if (session('warning_cancel'))
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
                    $("#btnsimpan").prop("disabled", false);
                } else {
                    $("#btnsimpan").prop("disabled", true);
                }
            }
        });
    </script>
@endpush
