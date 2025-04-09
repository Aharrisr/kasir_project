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
                            <h3 class="card-title">Daftar Akun Karyawan</h3>
                            <div class="card-actions">
                                <a href="#" class="btn btn-primary" id="btn-tambah">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    Tambah Akun
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
                            <div class="row">
                                <div class="col-12">
                                    <form action="/user" method="get">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Nama User"
                                                        id="nama_user" name="nama_user" value="{{ Request('nama_user') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Email"
                                                        id="email" name="email" value="{{ Request('email') }}"
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
                                            <button hidden type="submit" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                    <path d="M21 21l-6 -6" />
                                                </svg>
                                                Cari
                                            </button>
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
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="1%">No</th>
                                                        <th width="20%">Nama User</th>
                                                        <th width="20%">email</th>
                                                        <th width="10%">No. wa / telp</th>
                                                        <th class="text-center" width="8%">Status</th>
                                                        <th width="6%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $s)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $loop->iteration + $users->firstItem() - 1 }}
                                                            </td>
                                                            <td>{{ $s->nama_user }}</td>
                                                            <td>{{ $s->email }}</td>
                                                            <td>{{ $s->no_hp }}</td>
                                                            <td>
                                                                <div class="text-center">
                                                                    @if ($s->id_level == 1)
                                                                        <span class="badge bg-success">Admin</span>
                                                                    @elseif ($s->id_level == 2)
                                                                        <span class="badge bg-warning">kasir</span>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            @if ($s->id != $id)
                                                                <td>
                                                                    <div class="text-center">
                                                                        <div class="btn-group">
                                                                            <a href="#"
                                                                                class="edit btn btn-info btn-sm"
                                                                                id="{{ $s->id }}">
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
                                                                                Edit
                                                                            </a>
                                                                            <form
                                                                                action="/user/{{ $s->id }}/delete"
                                                                                method="POST" style="margin-left:5px ">
                                                                                @csrf
                                                                                <button
                                                                                    class="btn btn-danger btn-sm delete-confirm">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="currentColor"
                                                                                        class="icon icon-tabler icons-tabler-filled icon-tabler-trash">
                                                                                        <path stroke="none"
                                                                                            d="M0 0h24v24H0z"
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
                                                                <td>
                                                                    <div class="text-center">
                                                                        <a href="#" class="edit btn btn-info btn-sm"
                                                                            id="{{ $s->id }}">
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
                                                                            Edit
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        {{ $users->links('vendor.pagination.bootstrap-5') }}
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
                                        name="no_hp" placeholder="No. wa / telp" minlength="12" maxlength="13"
                                        oninput="this.value=this.value.slice(0,this.maxLength)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-password">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 10v4" />
                                            <path d="M10 13l4 -2" />
                                            <path d="M10 11l4 2" />
                                            <path d="M5 10v4" />
                                            <path d="M3 13l4 -2" />
                                            <path d="M3 11l4 2" />
                                            <path d="M19 10v4" />
                                            <path d="M17 13l4 -2" />
                                            <path d="M17 11l4 2" />
                                        </svg>
                                    </span>
                                    <div class="input-group input-group-flat">
                                        <input type="password" id="password" class="form-control" autocomplete="off"
                                            name="password" placeholder="Kata Sandi" minlength="8"
                                            oninput="validatePassword()" onblur="validatePassword()">
                                        <span class="input-group-text">
                                            <a href="#" class="link-secondary" title="Lihat Password"
                                                onclick="togglePassword()"
                                                data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <circle cx="12" cy="12" r="2" />
                                                    <path
                                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <p id="error-message" style="color: red; font-size: 14px; margin-top: 5px;"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <select name="id_level" id="id_level1" class="form-select">
                                    <option value="">Pilih Peran</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Kasir</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
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
    <div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadeditform">
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
                    <h3 id="textHeader">Terjadi Kesalahan</h3>
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
        $(function() {
            $("#btn-tambah").click(function() {
                $("#modal-input").modal("show");
            });
        });

        $(".edit").click(function() {
            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: '/user/edit',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(respond) {
                    $("#loadeditform").html(respond);
                }
            });
            $("#modal-edit").modal("show");
        });

        $(".delete-confirm").click(function(e) {
            var form = $(this).closest('form');
            e.preventDefault();

            // Set teks konfirmasi dalam modal
            $('#textHeader').text('Kamu yakin?')
            $("#errorMessage").text("Data bakal hilang permanen. Tetap mau hapus?");

            // Tampilkan tombol konfirmasi dan batal
            $("#modalerrorFooter").html(`
        <button id="confirmDelete" class="btn btn-danger px-5">Iya, Hapus</button>
        <button id="cancelDelete" class="btn btn-secondary px-5" data-bs-dismiss="modal">Kembali</button>
    `);

            // Tampilkan modal
            $("#errorModal").modal("show");

            // Event listener untuk tombol konfirmasi
            $("#modalerrorFooter").off("click", "#confirmDelete").on("click", "#confirmDelete", function() {
                form.submit();
                $("#errorModal").modal("hide");
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
                errorMessage.innerText = "";
            }
        }

        function validatePassword() {
            let input = document.getElementById("password");
            let errorMessage = document.getElementById("error-message");

            if (input.value.length < 8) {
                errorMessage.textContent = "Minimal 8 karakter!";
            } else {
                errorMessage.textContent = "";
            }
        }

        function togglePassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }

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
