@extends('layouts.dashboard')
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row mt-3">
                <div class="col-12">
                    @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                            <div class="alert-icon me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon alert-icon icon-2">
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
                        <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                            <div class="alert-icon me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon alert-icon icon-2">
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M12 8v4"></path>
                                    <path d="M12 16h.01"></path>
                                </svg>
                            </div>
                            <div class="flex-grow-1">
                                {{ Session::get('warning') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card card-sm shadow-lg rounded">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-success text-white avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-currency-dollar">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                            <path d="M12 3v3m0 12v3" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">

                                    </div>
                                    <div class="text-secondary">
                                        Pendapatan Hari Ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card card-sm shadow-lg rounded">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-info text-white avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-file-text">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                            <path d="M9 9l1 0" />
                                            <path d="M9 13l6 0" />
                                            <path d="M9 17l6 0" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                    </div>
                                    <div class="text-secondary">
                                        Jumlah Transaksi Hari Ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card card-sm shadow-lg rounded">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-success text-white avatar">
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
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $stok1->stok_masuk }}
                                    </div>
                                    <div class="text-secondary">
                                        Stok Masuk Hari Ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card card-sm shadow-lg rounded">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-danger text-white avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-package-off">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M8.812 4.793l3.188 -1.793l8 4.5v8.5m-2.282 1.784l-5.718 3.216l-8 -4.5v-9l2.223 -1.25" />
                                            <path d="M14.543 10.57l5.457 -3.07" />
                                            <path d="M12 12v9" />
                                            <path d="M12 12l-8 -4.5" />
                                            <path d="M16 5.25l-4.35 2.447m-2.564 1.442l-1.086 .611" />
                                            <path d="M3 3l18 18" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $stok2->stok_tipis }}
                                    </div>
                                    <div class="text-secondary">
                                        Stok Hampir Habis
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <div class="card shadow-lg p-3 rounded">
                        <div class="card-header">
                            <h3 class="card-title">Pengeluaran</h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-pengeluaran"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card shadow-lg p-3 rounded">
                        <div class="card-header">
                            <h3 class="card-title">Penjualan</h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-pemasukan"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('myscript')
    <script>
        //chart-pengeluaran
        document.addEventListener("DOMContentLoaded", function() {
            let chartContainer = document.getElementById("chart-pengeluaran");

            if (!chartContainer) {
                console.error("Element #chart-pengeluaran tidak ditemukan!");
                return;
            }

            fetch('/api/get-chart-pengeluaran')
                .then(response => response.json())
                .then(data => {
                    if (!data || !data.series || !data.categories) {
                        console.error("Format data salah:", data);
                        return;
                    }

                    // Konversi nilai data ke angka (karena number_format di PHP mengubah ke string)
                    let formattedSeries = data.series.map(series => ({
                        ...series,
                        data: series.data.map(value => parseFloat(value.replace(/\./g, '')))
                    }));

                    let chart = new ApexCharts(chartContainer, {
                        chart: {
                            type: "bar",
                            fontFamily: 'inherit',
                            height: 320,
                            parentHeightOffset: 0,
                            toolbar: {
                                show: false
                            },
                            animations: {
                                enabled: false
                            },
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '50%'
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            opacity: 1
                        },
                        series: formattedSeries,
                        tooltip: {
                            theme: 'dark',
                            y: {
                                formatter: function(value) {
                                    return "Rp " + value.toLocaleString(
                                        "id-ID"); // Format IDR di tooltip
                                }
                            }
                        },
                        grid: {
                            padding: {
                                top: -20,
                                right: 0,
                                left: -4,
                                bottom: -4
                            },
                            strokeDashArray: 4,
                        },
                        xaxis: {
                            labels: {
                                padding: 0
                            },
                            tooltip: {
                                enabled: false
                            },
                            axisBorder: {
                                show: false
                            },
                            categories: data.categories,
                        },
                        yaxis: {
                            labels: {
                                padding: 4,
                                formatter: function(value) {
                                    return "Rp " + value.toLocaleString(
                                        "id-ID"); // Format di sumbu Y
                                }
                            }
                        },
                        colors: [tabler.getColor("primary")],
                        legend: {
                            show: false
                        },
                    });

                    chart.render();
                })
                .catch(error => console.error("Gagal mengambil data:", error));
        });


        //chart-pemasukan
        document.addEventListener("DOMContentLoaded", function() {
            let chartContainer = document.getElementById("chart-pemasukan");

            if (!chartContainer) {
                console.error("Element #chart-pemasukan tidak ditemukan!");
                return;
            }

            fetch('/api/get-chart-pemasukan')
                .then(response => response.json())
                .then(data => {
                    if (!data || !data.series || !data.categories) {
                        console.error("Format data salah:", data);
                        return;
                    }

                    // Konversi nilai data ke angka (karena number_format di PHP mengubah ke string)
                    let formattedSeries = data.series.map(series => ({
                        ...series,
                        data: series.data.map(value => parseFloat(value.replace(/\./g, '')))
                    }));

                    let chart = new ApexCharts(chartContainer, {
                        chart: {
                            type: "bar",
                            fontFamily: 'inherit',
                            height: 320,
                            parentHeightOffset: 0,
                            toolbar: {
                                show: false
                            },
                            animations: {
                                enabled: false
                            },
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '50%'
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            opacity: 1
                        },
                        series: formattedSeries,
                        tooltip: {
                            theme: 'dark',
                            y: {
                                formatter: function(value) {
                                    return "Rp " + value.toLocaleString(
                                        "id-ID"); // Format IDR di tooltip
                                }
                            }
                        },
                        grid: {
                            padding: {
                                top: -20,
                                right: 0,
                                left: -4,
                                bottom: -4
                            },
                            strokeDashArray: 4,
                        },
                        xaxis: {
                            labels: {
                                padding: 0
                            },
                            tooltip: {
                                enabled: false
                            },
                            axisBorder: {
                                show: false
                            },
                            categories: data.categories,
                        },
                        yaxis: {
                            labels: {
                                padding: 4,
                                formatter: function(value) {
                                    return "Rp " + value.toLocaleString(
                                        "id-ID"); // Format di sumbu Y
                                }
                            }
                        },
                        colors: [tabler.getColor("primary")],
                        legend: {
                            show: false
                        },
                    });

                    chart.render();
                })
                .catch(error => console.error("Gagal mengambil data:", error));
        });
    </script>
@endpush
