<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $primaryKey = 'id_setting';
    protected $fillable = [
        'id_setting',
        'alamat',
        'nama_toko',
        'diskon_member'
    ];
}
