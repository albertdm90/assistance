<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    use HasFactory;

    protected $table = 'checkpoints';
    protected $fillable = [
        'cp_description',
        'cp_status',
        'cp_lat',
        'cp_long',
    ];
}
