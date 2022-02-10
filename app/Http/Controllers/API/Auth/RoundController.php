<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Checkpoint;
use App\Models\Device;
use App\Models\Round;
use App\Models\Worker;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoundController extends Controller
{
    public function index() 
    {
        $checkpoints = Checkpoint::select('id', 'cp_description', 'cp_code')->where('cp_status', true)->get();
        return response()->json([
            'checkpoints' => $checkpoints
        ], 200);
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'cp_code' => 'required',
            'cod_uuid' => 'required',
            'wor_pin' => 'required',
        ]);

        $device = Device::where('cod_uuid', $request->cod_uuid)->count();
        $worker = Worker::where('wor_pin', $request->wor_pin)->first();
        
        $checkpoint = Checkpoint::where('cp_code', Str::lower($request->cp_code))->first();

        if(!isset($worker->id) || !isset($checkpoint->id) || $device == 0)    
            return response()->json([
                'message' => 'Error'
            ], 200);

        $time = date('H:i:s', strtotime($request->rou_time));
        $day = date('N', strtotime($request->rou_date)) - 1;
        $workScheduleStatus = WorkSchedule::where('wor_id', $worker->id)
            ->where('cp_id', $checkpoint->id)
            ->where('ws_day', $day)
            ->where(function($query) use ($time){
                $query->whereTime('ws_start_time', '<=', $time)
                    ->whereTime('ws_end_time', '>=', $time);
                })
            ->count();

        $round = Round::create([
            'wor_id' => $worker->id,
            'cp_id' => $checkpoint->id,
            'rou_date' => $request->rou_date,
            'rou_time' => $request->rou_time,
            'cod_uuid' => $request->cod_uuid,
            'rou_lat' => $request->rou_lat,
            'rou_long' => $request->rou_long,
            'rou_status' => $workScheduleStatus,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $round
        ], 200);

    }
}
