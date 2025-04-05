<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id_member';
    protected $fillable = [
        'id_member',
        'nama','no_hp',
        'alamat',
        'kode_member',
    ];
}
