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
                <div class="col-md-12">
                    <div class="card shadow-lg p-3 mb-5 rounded">
                        <div class="card-header">
                            <h3 class="card-title">Konfigurasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <form action="/konfigurasi/update" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="table-responsive">
                                                <table class="table table-vcenter card-table table-striped">
                                                    <thead>
                                                        <th class="text-center" width="5%">Diskon Member</th>
                                                        <th class="text-center" width="30%">Nama Toko</th>
                                                        <th class="text-center" width="35%">Alamat</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($setting as $s)
                                                            <td hidden><input type="text" name="id_setting"
                                                                    id="id_setting" value="{{ $s->id_setting }}"></td>
                                                            <td class="text-center"><input class="form-control text-center"
                                                                    type="text" name="diskon_member" id="diskon_member"
                                                                    value="{{ $s->diskon_member }}%"
                                                                    oninput="formatPersen(this)" autocomplete="off">
                                                            </td>
                                                            <td class="text-center"><input class="form-control"
                                                                    type="text" name="nama_toko" id="nama_toko"
                                                                    value="{{ $s->nama_toko }}" autocomplete="off">
                                                            </td>
                                                            <td class="text-center"><input class="form-control"
                                                                    type="text" name="alamat" id="alamat"
                                                                    value="{{ $s->alamat }}" autocomplete="off">
                                                            </td>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group" style="text-align: right;">
                                            <button id="btn-simpan" class="btn btn-primary w-25">
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('myscript')
    <script>
        function formatPersen(input) {
            let value = input.value.replace(/[^0-9]/g, "");
            if (value > 100) value = 100;
            input.value = value + "%";
        }
    </script>
@endpush
