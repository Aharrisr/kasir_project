<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
                <img src="{{ asset('img/logo-white.png') }}" width="110" height="32" alt="Dashboard"
                    class="navbar-brand-image">
            </a>
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }} " href="/dashboard">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-dashboard">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2.954a10 10 0 0 1 6.222 17.829a1 1 0 0 1 -.622 .217h-11.2a1 1 0 0 1 -.622 -.217a10 10 0 0 1 6.222 -17.829m4.207 5.839a1 1 0 0 0 -1.414 0l-2.276 2.274a2.003 2.003 0 0 0 -2.514 1.815l-.003 .118a2 2 0 1 0 3.933 -.517l2.274 -2.276a1 1 0 0 0 0 -1.414" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); margin-bottom: 10px;">
                </li>
                <li class="nav-title"
                    style="font-size: 15px; margin-left: 16px; display: block; margin-bottom: 10px; cursor: default; text-decoration: underline;text-decoration-color: #ffffff; text-underline-offset: 5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-folders">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 2a1 1 0 0 1 .707 .293l1.708 1.707h4.585a3 3 0 0 1 2.995 2.824l.005 .176v7a3 3 0 0 1 -3 3h-1v1a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3v-9a3 3 0 0 1 3 -3h1v-1a3 3 0 0 1 3 -3zm-6 6h-1a1 1 0 0 0 -1 1v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1 -1v-1h-7a3 3 0 0 1 -3 -3z" />
                    </svg>
                    Data Master
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('supplier') ? 'active' : '' }} " href="/supplier">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-cube-send">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M16 12.5l-5 -3l5 -3l5 3v5.5l-5 3z" />
                                <path d="M11 9.5v5.5l5 3" />
                                <path d="M16 12.545l5 -3.03" />
                                <path d="M7 9h-5" />
                                <path d="M7 12h-3" />
                                <path d="M7 15h-1" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Supplier
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('produk') ? 'active' : '' }} " href="/produk">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                <path d="M12 12l8 -4.5" />
                                <path d="M12 12l0 9" />
                                <path d="M12 12l-8 -4.5" />
                                <path d="M16 5.25l-8 4.5" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Produk
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('member') ? 'active' : '' }} " href="/member">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor"
                                class="icon icon-tabler icons-tabler-filled icon-tabler-credit-card">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M22 10v6a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-6h20zm-14.99 4h-.01a1 1 0 1 0 .01 2a1 1 0 0 0 0 -2zm5.99 0h-2a1 1 0 0 0 0 2h2a1 1 0 0 0 0 -2zm5 -10a4 4 0 0 1 4 4h-20a4 4 0 0 1 4 -4h12z" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Member
                        </span>
                    </a>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); margin-bottom: 10px;">
                </li>
                <li class="nav-title"
                    style="font-size: 15px; margin-left: 16px; display: block; margin-bottom: 10px; cursor: default; text-decoration: underline;text-decoration-color: #ffffff; text-underline-offset: 5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cash-banknote">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M3 6m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                        <path d="M18 12l.01 0" />
                        <path d="M6 12l.01 0" />
                    </svg>
                    Transaksi
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pembelian') ? 'active' : '' }} " href="/pembelian">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-package-import">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                                <path d="M12 12l8 -4.5" />
                                <path d="M12 12v9" />
                                <path d="M12 12l-8 -4.5" />
                                <path d="M22 18h-7" />
                                <path d="M18 15l-3 3l3 3" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Pembelian
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('#') ? 'active' : '' }} " href="/">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-package-export">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                                <path d="M12 12l8 -4.5" />
                                <path d="M12 12v9" />
                                <path d="M12 12l-8 -4.5" />
                                <path d="M15 18h7" />
                                <path d="M19 15l3 3l-3 3" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Penjualan
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('#') ? 'active' : '' }} " href="/">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-dollar">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M13 17h-7v-14h-2" />
                                <path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" />
                                <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                <path d="M19 21v1m0 -8v1" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Transaksi
                        </span>
                    </a>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); margin-bottom: 10px;">
                </li>
                <li class="nav-title"
                    style="font-size: 15px; margin-left: 16px; display: block; margin-bottom: 10px; cursor: default; text-decoration: underline;text-decoration-color: #ffffff; text-underline-offset: 5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-file-text">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 2l.117 .007a1 1 0 0 1 .876 .876l.007 .117v4l.005 .15a2 2 0 0 0 1.838 1.844l.157 .006h4l.117 .007a1 1 0 0 1 .876 .876l.007 .117v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-10a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005zm3 14h-6a1 1 0 0 0 0 2h6a1 1 0 0 0 0 -2m0 -4h-6a1 1 0 0 0 0 2h6a1 1 0 0 0 0 -2m-5 -4h-1a1 1 0 1 0 0 2h1a1 1 0 0 0 0 -2" />
                        <path d="M19 7h-4l-.001 -4.001z" />
                    </svg>
                    Report
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('#') ? 'active' : '' }} " href="/">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                                <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                                <path d="M17 18h2" />
                                <path d="M20 15h-3v6" />
                                <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Laporan
                        </span>
                    </a>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); margin-bottom: 10px;">
                </li>
                <li class="nav-title"
                    style="font-size: 15px; margin-left: 16px; display: block; margin-bottom: 10px; cursor: default; text-decoration: underline;text-decoration-color: #ffffff; text-underline-offset: 5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    </svg>
                    System
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user') ? 'active' : '' }} " href="/user">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="currentColor"
                                class="icon icon-tabler icons-tabler-filled icon-tabler-user">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                                <path
                                    d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            User
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
