<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level_member';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'level',
        'diskon',
    ];
}
