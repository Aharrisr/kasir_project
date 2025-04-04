<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $table = 'diskon_member';
    protected $primaryKey = 'id_diskon';
    protected $fillable = [
        'id_diskon',
        'diskon',
    ];
}
