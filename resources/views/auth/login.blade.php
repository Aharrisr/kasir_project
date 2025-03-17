<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in</title>
    <!-- CSS files -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link href="{{ asset('tabler/dist/css/tabler.min.css?1668287865') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css?1668287865') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css?1668287865') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css?1668287865') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/demo.min.css?1668287865') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <script src="{{ asset('tabler/dist/js/demo-theme.min.js?1668287865') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img
                        src="{{ asset('tabler/static/logo.svg') }}" height="36" alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    @if (Session::get('warning'))
                        <div class="alert alert_warning">
                            <p>{{ Session::get('warning') }}</p>
                        </div>
                    @endif
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form action="/proseslogin" method="post" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Masukan Email" autocomplete="off" oninput="validateEmail(this)">
                            <small id="emailError" style="color: red;"></small>
                        </div>
                        <div class="mb-2 mt-3">
                            <div class="mb-2">
                                <label class="form-label">Password</label>
                            </div>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" autocomplete="off">
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Lihat Password"
                                        onclick="togglePassword()"
                                        data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="12" r="2" />
                                            <path
                                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('tabler/dist/js/tabler.min.js?1668287865') }}" defer></script>
    <script src="{{ asset('tabler/dist/js/demo.min.js?1668287865') }}" defer></script>
    <script>
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
</body>

</html>
