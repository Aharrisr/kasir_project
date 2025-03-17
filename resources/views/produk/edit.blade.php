<form action="/produk/{{ $produk->kode_produk }}/update" method="POST" id="frmproduk" enctype="multipart/form-data">
    @csrf
    <input type="text" hidden value="{{ $produk->kode_produk }}" id="kode_produk" class="form-control" name="kode_produk">
    <div class="row">
        <label for="nama_produk">Nama Produk</label>
        <div class="col-12">
            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-label">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M16.52 7h-10.52a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h10.52a1 1 0 0 0 .78 -.375l3.7 -4.625l-3.7 -4.625a1 1 0 0 0 -.78 -.375" />
                    </svg>
                </span>
                <input type="text" value="{{ $produk->nama_produk }}" id="nama_produk" class="form-control"
                    name="nama_produk" placeholder="Nama Produk">
            </div>
        </div>
    </div>
    <div class="row">
        <label for="harga">Harga</label>
        <div class="col-12">
            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-receipt-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                        <path d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5" />
                    </svg>
                </span>
                <input type="text" value="{{ $produk->harga }}" id="harga" class="form-control" name="harga"
                    placeholder="Harga">
            </div>
        </div>
    </div>
    <div class="row">
        <label for="stok">Stok Produk</label>
        <div class="col-12">
            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                        <path d="M12 12l8 -4.5" />
                        <path d="M12 12l0 9" />
                        <path d="M12 12l-8 -4.5" />
                        <path d="M16 5.25l-8 4.5" />
                    </svg>
                </span>
                <input type="text" value="{{ $produk->stok }}" id="stok" class="form-control" name="stok"
                    placeholder="Stok Produk">
            </div>
        </div>
    </div>
    <div class="row">
        <label for="discount">Discount</label>
        <div class="col-12">
            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-percentage">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M17 17m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M7 7m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M6 18l12 -12" />
                    </svg>
                </span>
                <input type="number" minlength="1" maxlength="3" value="{{ $produk->discount }}" id="discount"
                    class="form-control" name="discount" placeholder="Diskon"
                    oninput="this.value=this.value.slice(0,this.maxLength)">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <label for="kode_splr">Merk</label>
            <select name="kode_splr" id="kode_splr" class="form-select">
                <option value="">Supplier</option>
                @foreach ($supplier as $d)
                    <option {{ $produk->kode_splr == $d->kode_splr ? 'selected' : '' }} value="{{ $d->kode_splr }}">
                        {{ $d->nama_splr }} </option>
                @endforeach
            </select>
        </div>
    </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                        <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M14 4l0 4l-6 0l0 -4" />
                    </svg>
                    Simpan
                </button>
            </div>
        </div>
    </div>
</form>
