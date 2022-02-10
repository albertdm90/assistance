<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    protected $fillable = [
        'cod_uuid',
        'model',
        'operating',
        'version',
        'platform',
    ];

    use HasFactory;
}
