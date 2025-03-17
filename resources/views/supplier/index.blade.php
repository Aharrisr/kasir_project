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
                        Supplier
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                            <div class="row mt-2">
                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="1%">No</th>
                                                <th class="text-center" width="3%">
                                                    Kode Supplier
                                                </th>
                                                <th width="15%">Nama Supplier</th>
                                                <th width="10%">No.Hp</th>
                                                <th width="30%">Alamat</th>
                                                <th width="5%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="hasil-pencarian">
                                            @foreach ($supplier as $s)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration + $supplier->firstItem() - 1 }}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge bg-success">{{ $s->kode_splr }}</span>
                                                    </td>
                                                    <td>{{ $s->nama_splr }}</td>
                                                    <td>{{ $s->no_hp }}</td>
                                                    <td>{{ $s->alamat }}</td>
                                                    <td>
                                                        <div class="text-center">
                                                            <div class="btn-group">
                                                                <a href="#" class="edit btn btn-info btn-sm"
                                                                    kode_produk="{{ $s->kode_produk }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                                        <path
                                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                                        <path d="M16 5l3 3" />
                                                                    </svg>
                                                                    Edit
                                                                </a>
                                                                <form action="/produk/{{ $s->kode_produk }}/delete"
                                                                    method="POST" style="margin-left:5px ">
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm delete-confirm">
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
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $supplier->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-input" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/produk/tambah" method="POST" id="frmtambah" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-label">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M16.52 7h-10.52a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h10.52a1 1 0 0 0 .78 -.375l3.7 -4.625l-3.7 -4.625a1 1 0 0 0 -.78 -.375" />
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="nama_produk1" class="form-control"
                                        autocomplete="off" name="nama_produk" placeholder="Nama Produk">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-receipt-2">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                                            <path
                                                d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5" />
                                        </svg>
                                    </span>
                                    <input type="number" value="" id="harga" class="form-control"
                                        autocomplete="off" name="harga" placeholder="Harga">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                            <path d="M12 12l8 -4.5" />
                                            <path d="M12 12l0 9" />
                                            <path d="M12 12l-8 -4.5" />
                                            <path d="M16 5.25l-8 4.5" />
                                        </svg>
                                    </span>
                                    <input type="number" value="" id="stok" class="form-control"
                                        autocomplete="off" name="stok" placeholder="Stok">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-percentage">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M17 17m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M7 7m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M6 18l12 -12" />
                                        </svg>
                                    </span>
                                    <input type="number" minlength="1" maxlength="3" id="discount"
                                        autocomplete="off" class="form-control" name="discount" placeholder="Diskon"
                                        oninput="this.value=this.value.slice(0,this.maxLength)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <select name="kode_splr" id="kode_splr2" class="form-select">
                                    <option value="-">Supplier</option>
                                    @foreach ($supplier as $d)
                                        <option {{ Request('kode_splr') == $d->kode_splr ? 'selected' : '' }}
                                            value="{{ $d->kode_splr }}">{{ $d->nama_splr }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button class="btn btn-primary w-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-danger w-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-restore">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3.06 13a9 9 0 1 0 .49 -4.087" />
                                                    <path d="M3 4.001v5h5" />
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                </svg>
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-editproduk" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadeditform">
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

        $("#tanggal").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        });

        $(".edit").click(function() {
            var kode_produk = $(this).attr('kode_produk');
            $.ajax({
                type: 'POST',
                url: '/produk/edit',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    kode_produk: kode_produk
                },
                success: function(respond) {
                    $("#loadeditform").html(respond);
                }
            });
            $("#modal-editproduk").modal("show");
        });

        $("#frmtambah").submit(function() {
            var nama_produk1 = $("#nama_produk1").val();
            var harga = $("#harga").val();
            var stok = $("#stok").val();
            var kode_splr2 = $("#kode_splr2").val();
            if (nama_produk1 == "") {
                Swal.fire({
                    title: 'Opps!',
                    text: 'Nama Produk Tidak Boleh Kosong',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nama_produk1").focus();
                });
                return false;
            } else if (harga == "") {
                Swal.fire({
                    title: 'Opps!',
                    text: 'Harga Tidak Boleh Kosong',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#harga").focus();
                });
                return false;
            } else if (stok == "") {
                Swal.fire({
                    title: 'Opps!',
                    text: 'Stok Tidak Boleh Kosong',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#stok").focus();
                });
                return false;
            } else if (kode_splr2 == "-") {
                Swal.fire({
                    title: 'Opps!',
                    text: 'Supplier Tidak Boleh Kosong',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#kode_splr2").focus();
                });
                return false;
            }
        });
    </script>
@endpush
