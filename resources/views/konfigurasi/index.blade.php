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
                        <div class="card-body p-0">
                            <div class="row mt-3 ms-2">
                                <div class="col-2">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table table-striped">
                                                <thead>
                                                    <th class="text-center">Diskon</th>
                                                </thead>
                                                <tbody>
                                                    <td class="text-center"><input class="form-control" type="text"
                                                            name="diskon" id="diskon" value=""
                                                            oninput="formatPersen(this)">
                                                    </td>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
