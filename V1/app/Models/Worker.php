<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'workers';
    protected $fillable = [
        'wor_nacionality',
        'wor_id_number',
        'wor_name',
        'wor_lastname',
        'wor_email',
        'wor_home_address',
        'wor_type_contract',
        'wor_status',
        'wor_pin',
        'wor_location',
        'pos_id',
    ];

    public function position()
    {
        return $this->hasOne('App\Models\Position');
    }
}
