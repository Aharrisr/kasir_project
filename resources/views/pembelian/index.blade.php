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
                            <div class="row">
                                <div class="col-12">
                                    <form action="/produk" method="get">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Kode Produk"
                                                        id="kode_produk" name="kode_produk"
                                                        value="{{ Request('kode_produk') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Nama Produk"
                                                        id="nama_produk" name="nama_produk"
                                                        value="{{ Request('nama_produk') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Merk"
                                                        id="nama_splr" name="nama_splr" value="{{ Request('nama_splr') }}"
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
                                                    @foreach ($pembelian as $s)
                                                        <tr>
                                                            <input type="hidden" value="{{ $s->id_pembelian }}">
                                                            <td class="text-center">
                                                                {{ $loop->iteration + $pembelian->firstItem() - 1 }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ date('d-m-Y', strtotime($s->tanggal)) }}
                                                            </td>
                                                            <td class="text-center">
                                                                <span
                                                                    class="badge bg-success">{{ $s->kode_transaksi }}</span>
                                                            </td>
                                                            <td class="text-center">{{ $s->nama_splr }}</td>
                                                            <td class="text-center">{{ $s->total_item }}</td>
                                                            <td class="text-center">
                                                                {{ number_format($s->total_harga, 0, ',', '.') }}
                                                            </td>
                                                            <td class="text-center">{{ $s->diskon }}%</td>
                                                            <td class="text-center">
                                                                {{ number_format($s->bayar, 0, ',', '.') }}
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <div class="btn-group">
                                                                        <a href="#"
                                                                            class="btn-detail btn btn-info btn-sm me-2"
                                                                            kode_transaksi="{{ $s->kode_transaksi }}">
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
                                                                        <a href="#"
                                                                            class="btn-edit btn btn-success btn-sm"
                                                                            data-kode="{{ $s->kode_transaksi }}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                                <path
                                                                                    d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                                                <path
                                                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                                                <path d="M16 5l3 3" />
                                                                            </svg>
                                                                            edit
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        {{ $pembelian->links('vendor.pagination.bootstrap-5') }}
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
                    @csrf
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
                                            @foreach ($supplier1 as $d)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration + $supplier1->firstItem() - 1 }}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge bg-success">{{ $d->kode_splr }}</span>
                                                    </td>
                                                    <td>{{ $d->nama_splr }}</td>
                                                    <td>{{ $d->no_hp }}</td>
                                                    <td>{{ $d->alamat }}</td>
                                                    <td>
                                                        <div class="text-center">
                                                            <div class="btn-group">
                                                                <a href="#" class="btn-pilih btn btn-info btn-sm"
                                                                    data-kode="{{ $d->kode_splr }}">
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
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        {{ $supplier1->links('vendor.pagination.bootstrap-5') }}
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
        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.pushState(null, null, location.href);
        };

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
                    _token: "{{ csrf_token() }}",
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

        $(document).on("click", ".btn-edit", function(e) {
            e.preventDefault();

            var kode_transaksi = $(this).data("kode");

            $.ajax({
                type: 'GET',
                url: '/pembelian/' + kode_transaksi + '/editform',
                cache: false,
                success: function(response) {
                    window.location.href = '/pembelian/' + kode_transaksi + '/editform';
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi Kesalahan:", error);
                    $("#errorModal").modal("show");
                    $("#errorMessage").text(xhr.responseJSON?.message ||
                        "Terjadi kesalahan." + error);
                }
            });
        });
    </script>
@endpush
