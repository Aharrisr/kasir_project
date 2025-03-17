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
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Pembelian
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg p-3 mb-5 rounded">
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
                                    <a href="#" class="btn btn-primary" id="btn-tambah">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg>
                                        Tambah
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-3">
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
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th class="text-center" width="1%">No</th>
                                                    <th class="text-center" width="8%">
                                                        Tanggal
                                                    </th>
                                                    <th class="text-center" width="8%">Kode Transaksi</th>
                                                    <th width="15%">Nama Supplier</th>
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
                                                    <th class="text-center" width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="hasil-pencarian">
                                                @foreach ($pembelian as $s)
                                                    <tr>
                                                        <input type="text" hidden value="{{ $s->id_pembelian }}">
                                                        <td class="text-center">
                                                            {{ $loop->iteration + $pembelian->firstItem() - 1 }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ date('d-m-Y', strtotime($s->tanggal)) }}
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge bg-success">{{ $s->kode_transaksi }}</span>
                                                        </td>
                                                        <td>{{ $s->nama_splr }}</td>
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
                                                                    <a href="#" class="detail btn btn-info btn-sm"
                                                                        kode_transaksi="{{ $s->kode_transaksi }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-eye-search">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                            <path
                                                                                d="M12 18c-.328 0 -.652 -.017 -.97 -.05c-3.172 -.332 -5.85 -2.315 -8.03 -5.95c2.4 -4 5.4 -6 9 -6c3.465 0 6.374 1.853 8.727 5.558" />
                                                                            <path
                                                                                d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                            <path d="M20.2 20.2l1.8 1.8" />
                                                                        </svg>
                                                                        Detail
                                                                    </a>
                                                                    <form
                                                                        action="/pembelian/{{ $s->id_pembelian }}/delete"
                                                                        method="POST" style="margin-left:5px ">
                                                                        @csrf
                                                                        <button
                                                                            class="btn btn-danger btn-sm delete-confirm">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="currentColor"
                                                                                class="icon icon-tabler icons-tabler-filled icon-tabler-trash">
                                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                                <path
                                                                                    d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" />
                                                                                <path
                                                                                    d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" />
                                                                            </svg>
                                                                            Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $pembelian->links('vendor.pagination.bootstrap-5') }}
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
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center" width="1%">No</th>
                                        <th width="15%">Nama Supplier</th>
                                        <th width="10%">NO.Hp</th>
                                        <th width="30%">Alamat</th>
                                        <th class="text-center" width="5%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplier1 as $d)
                                        <tr>
                                            <input type="hidden" id="kode_splr" name="kode_splr"
                                                value="{{ $d->kode_splr }}">
                                            <td class="text-center">
                                                {{ $loop->iteration + $supplier1->firstItem() - 1 }}
                                            </td>
                                            <td>{{ $d->nama_splr }}</td>
                                            <td>{{ $d->no_hp }}</td>
                                            <td>{{ $d->alamat }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="btn-pilih btn btn-info btn-sm"
                                                        data-kode="{{ $d->kode_splr }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                        </svg>
                                                        Pilih
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $supplier1->links('vendor.pagination.bootstrap-5') }}
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
@endsection
@push('myscript')
    <script>
        $("#btn-tambah").click(function() {
            $("#modal-input").modal("show");
        });

        $(".detail").click(function() {
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
                    alert("Gagal memilih supplier!");
                }
            });
        });
    </script>
@endpush
