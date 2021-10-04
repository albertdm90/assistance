<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'positions';
    protected $fillable = [
        'pos_name',
        'pos_description',
    ];

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }
}
