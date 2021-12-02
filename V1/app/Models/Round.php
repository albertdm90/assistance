<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $table = 'rounds';
    protected $fillable = [
        'wor_id',
        'cp_id',
        'rou_date',
        'rou_time',
        'rou_status',
        'rou_lat',
        'rou_long',
        'cod_uuid',
    ];

    public function worker()
    {
        // return $this->hasOne(Worker::class,'id', 'wor_name');
        return $this->hasOne(Worker::class, 'id');
    }

    public function checkpoints()
    {
        return $this->hasMany(Checkpoint::class);
    }
}
