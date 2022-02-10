<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    use HasFactory;
    protected $table = 'work_schedules';
    protected $fillable = [
        'wor_id',
        'cp_id',
        'ws_day',
        'ws_start_time',
        'ws_end_time',
    ];
}
