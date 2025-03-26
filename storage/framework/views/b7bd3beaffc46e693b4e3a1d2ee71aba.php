<form action="/supplier/<?php echo e($supplier->kode_splr); ?>/update" method="POST" id="frmproduk" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-barcode">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7v-1a2 2 0 0 1 2 -2h2" />
                        <path d="M4 17v1a2 2 0 0 0 2 2h2" />
                        <path d="M16 4h2a2 2 0 0 1 2 2v1" />
                        <path d="M16 20h2a2 2 0 0 0 2 -2v-1" />
                        <path d="M5 11h1v2h-1z" />
                        <path d="M10 11l0 2" />
                        <path d="M14 11h1v2h-1z" />
                        <path d="M19 11l0 2" />
                    </svg>
                </span>
                <input type="text" value="<?php echo e($supplier->kode_splr); ?>" id="kode_splr" class="form-control" minlength="1" maxlength="4"
                    autocomplete="off" name="kode_splr" placeholder="Kode Supplier" oninput="KodesplrInput(this)">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-label">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M16.52 7h-10.52a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h10.52a1 1 0 0 0 .78 -.375l3.7 -4.625l-3.7 -4.625a1 1 0 0 0 -.78 -.375" />
                    </svg>
                </span>
                <input type="text" value="<?php echo e($supplier->nama_splr); ?>" id="nama_splr" class="form-control" autocomplete="off"
                    name="nama_splr" placeholder="Nama Supplier" oninput="capitalizeFirstLetter(this)">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-device-mobile">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z" />
                        <path d="M11 4h2" />
                        <path d="M12 17v.01" />
                    </svg>
                </span>
                <input type="text" value="<?php echo e($supplier->no_hp); ?>" id="no_hp" class="form-control" autocomplete="off"
                    name="no_hp" placeholder="Nomer Hp" minlength="1" maxlength="13"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-address-book">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                        <path d="M10 16h6" />
                        <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M4 8h3" />
                        <path d="M4 12h3" />
                        <path d="M4 16h3" />
                    </svg>
                </span>
                <input type="text" value="<?php echo e($supplier->alamat); ?>" name="alamat" id="alamat" class="form-control" placeholder="Alamat"
                    autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row mt-4">
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
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
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
<?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/supplier/edit.blade.php ENDPATH**/ ?>