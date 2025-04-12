@extends('layouts.dashboard')
@section('content')
    <div class="container-xl">
        <div class="col-12 mt-3">
            <form action="/profile/{{ $user->id }}/update" method="POST" class="card">
                @csrf
                <div class="card-header">
                    <Profile class="card-title">Profile</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Email</label>
                                <input class="form-control" placeholder="your-email@domain.com" value="{{ $user->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
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
                                <label class="form-label">Password lama</label>
                                <div class="input-group input-group-flat">
                                    <input type="password" id="password_lama" class="form-control" autocomplete="off"
                                        name="password_lama" placeholder="Kata Sandi" oninput="validatePassword()"
                                        onblur="validatePassword()">
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
                                <label class="form-label">Password Baru</label>
                                <div class="input-group input-group-flat">
                                    <input type="password" id="password_baru" class="form-control" autocomplete="off"
                                        name="password_baru" placeholder="Kata Sandi" minlength="8"
                                        oninput="validatePassword()" onblur="validatePassword()">
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
                            <p id="error-message" style="color: red; font-size: 14px; margin-top: 5px;"></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary"> Save </button>
                    <a href="." class="btn btn-danger ms-2"> Kembali </a>
                </div>
            </form>
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
                    <h3 id="successTitle">Data Berhasil Diperbarui</h3>
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
        function validatePassword() {
            let input = document.getElementById("password_baru");
            let errorMessage = document.getElementById("error-message");

            if (input.value.length < 8) {
                errorMessage.textContent = "Minimal 8 karakter!";
            } else {
                errorMessage.textContent = "";
            }
        }

        function togglePassword() {
            var passwordInput = document.getElementById("password_baru");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success_pass'))
                document.getElementById("successTitle").textContent = 'Berhasil';
                document.getElementById("successMessage").textContent = 'Ubah Password Berhasil.';
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                document.getElementById("btnRedirect").addEventListener("click", function() {
                    window.location.href = ".";
                });
            @endif

            @if (session('warning_pass'))
                document.getElementById("errorMessage").textContent = 'Password lama Salah.';
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            @endif

            @if (session('warning_null'))
                document.getElementById("errorMessage").textContent = 'Password baru tidak boleh kosong.';
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            @endif
        });
    </script>
@endpush
