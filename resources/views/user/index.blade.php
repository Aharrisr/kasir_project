@extends('layouts.dashboard')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Data User
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
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <form action="/user" method="get">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Nama User"
                                                        id="nama_user" name="nama_user" value="{{ Request('nama_user') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="username"
                                                        id="username" name="email" value="{{ Request('email') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Nomer Hp"
                                                        id="no_hp" name="no_hp" value="{{ Request('no_hp') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <select name="id_level" id="id_level" class="form-select">
                                                        <option value=""
                                                            {{ request('id_level') == '' ? 'selected' : '' }}>Pilih Role
                                                        </option>
                                                        <option value="1"
                                                            {{ request('id_level') == '1' ? 'selected' : '' }}>Admin
                                                        </option>
                                                        <option value="2"
                                                            {{ request('id_level') == '2' ? 'selected' : '' }}>Kasir
                                                        </option>
                                                    </select>
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
                                                        class="btn btn-danger" onclick="window.location.href='/user'">
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
                                                <th>No</th>
                                                <th>Nama User</th>
                                                <th>email</th>
                                                <th>Nomer Hp</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $s)
                                                <tr>
                                                    <td width="1%">{{ $loop->iteration + $users->firstItem() - 1 }}
                                                    </td>
                                                    <td>{{ $s->nama_user }}</td>
                                                    <td>{{ $s->email }}</td>
                                                    <td>{{ $s->no_hp }}</td>
                                                    <td width="8%">
                                                        <div class="text-center">
                                                            @if ($s->id_level == 1)
                                                                <span class="badge bg-success">Admin</span>
                                                            @elseif ($s->id_level == 2)
                                                                <span class="badge bg-warning">kasir</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    @if ($s->id != $id)
                                                        <td width="13%">
                                                            <div class="text-center">
                                                                <div class="btn-group">
                                                                    <a href="#" class="edit btn btn-info btn-sm"
                                                                        id="{{ $s->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
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
                                                                    <form action="/user/{{ $s->id }}/delete"
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
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @else
                                                        <td width="13%">
                                                            <div class="text-center">
                                                                <span class="badge bg-primary">Akun Anda</span>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->links('vendor.pagination.bootstrap-5') }}
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
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/user/tambahuser" method="POST" id="frmtambah" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-abc">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 16v-6a2 2 0 1 1 4 0v6" />
                                            <path d="M3 13h4" />
                                            <path d="M10 8v6a2 2 0 1 0 4 0v-1a2 2 0 1 0 -4 0v1" />
                                            <path d="M20.732 12a2 2 0 0 0 -3.732 1v1a2 2 0 0 0 3.726 1.01" />
                                        </svg>
                                    </span>
                                    <input type="text" value="" id="nama_user1" class="form-control"
                                        autocomplete="off" name="nama_user" placeholder="Nama Lengkap">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor"
                                            class="icon icon-tabler icons-tabler-filled icon-tabler-mail">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z" />
                                            <path
                                                d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z" />
                                        </svg>
                                    </span>
                                    <input type="text" id="email1" class="form-control" autocomplete="off"
                                        name="email" placeholder="Masukkan Email" oninput="validateEmail(this)">
                                </div>
                                <small id="emailError" style="color: red;"></small>
                            </div>
                        </div>
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
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mt-3 mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-phone-call">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                            <path d="M15 7a2 2 0 0 1 2 2" />
                                            <path d="M15 3a6 6 0 0 1 6 6" />
                                        </svg>
                                    </span>
                                    <input type="number" id="no_hp1" class="form-control" autocomplete="off"
                                        name="no_hp" placeholder="Nomer Hp" minlength="8" maxlength="9"
                                        oninput="this.value=this.value.slice(0,this.maxLength)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <select name="id_level" id="id_level1" class="form-select">
                                    <option value="">Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Kasir</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <button class="btn btn-primary w-100">
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
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
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
@endsection
@push('myscript')
    <script>
        $(function() {
            $("#btn-tambah").click(function() {
                $("#modal-input").modal("show");
            });
        });

        $(".delete-confirm").click(function(e) {
            var form = $(this).closest('form');
            e.preventDefault();
            Swal.fire({
                title: "Anda Yakin Mau Menghapus Data Ini ?",
                text: "Data Akan Terhapus Permanen",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus Data Ini !",
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Data Berhasil Dihapus",
                        icon: "success",
                    });
                }
            });
        });

        $("#frmtambah").submit(function() {
            var nama_user1 = $("#nama_user1").val();
            var email1 = $("#email1").val();
            var no_hp1 = $("#no_hp1").val();
            var id_level1 = $("#id_level1").val();
            if (nama_user1 == "") {
                Swal.fire({
                    title: 'Opps!',
                    text: 'Nama Tidak Boleh Kosong',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nama_user1").focus();
                });
                return false;
            } else if (email1 == "") {
                Swal.fire({
                    title: 'Opps!',
                    text: 'email Tidak Boleh Kosong',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#email1").focus();
                });
                return false;
            } else if (no_hp1 == "") {
                Swal.fire({
                    title: 'Opps!',
                    text: 'No Hp Tidak Boleh Kosong',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#no_hp1").focus();
                });
                return false;
            } else if (id_level1 == "") {
                Swal.fire({
                    title: 'Opps!',
                    text: 'Role Tidak Boleh Kosong',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#id_level1").focus();
                });
                return false;
            }
        });

        function validateEmail(input) {
            let errorMessage = document.getElementById("emailError");
            if (!input.value.includes("@")) {
                errorMessage.innerText = "Email harus mengandung '@'";
            } else {
                errorMessage.innerText = ""; // Hapus pesan jika valid
            }
        }
    </script>
@endpush
