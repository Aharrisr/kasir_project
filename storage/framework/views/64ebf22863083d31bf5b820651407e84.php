<form action="/user/<?php echo e($user->id); ?>/update" method="POST" id="frmproduk" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-abc">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 16v-6a2 2 0 1 1 4 0v6" />
                        <path d="M3 13h4" />
                        <path d="M10 8v6a2 2 0 1 0 4 0v-1a2 2 0 1 0 -4 0v1" />
                        <path d="M20.732 12a2 2 0 0 0 -3.732 1v1a2 2 0 0 0 3.726 1.01" />
                    </svg>
                </span>
                <input type="text" value="<?php echo e($user->nama_user); ?>" id="nama_user1" class="form-control"
                    autocomplete="off" name="nama_user" placeholder="Nama Lengkap">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-mail">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z" />
                        <path
                            d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z" />
                    </svg>
                </span>
                <input type="text" value="<?php echo e($user->email); ?>" id="email1" class="form-control" autocomplete="off"
                    name="email" placeholder="Masukkan Email" oninput="validateEmail(this)">
            </div>
            <small id="emailError" style="color: red;"></small>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mt-3 mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-phone-call">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                        <path d="M15 7a2 2 0 0 1 2 2" />
                        <path d="M15 3a6 6 0 0 1 6 6" />
                    </svg>
                </span>
                <input type="number" value="<?php echo e($user->no_hp); ?>" id="no_hp1" class="form-control" autocomplete="off"
                    name="no_hp" placeholder="Nomer Hp" minlength="12" maxlength="13"
                    oninput="this.value=this.value.slice(0,this.maxLength)">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <select name="id_level" id="id_level1" class="form-select">
                <option value="">Role</option>
                <?php $__currentLoopData = [1 => 'Admin', 2 => 'Kasir']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($user->id_level == $id ? 'selected' : ''); ?> value="<?php echo e($id); ?>">
                        <?php echo e($role); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <button class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
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
<?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/user/edit.blade.php ENDPATH**/ ?>