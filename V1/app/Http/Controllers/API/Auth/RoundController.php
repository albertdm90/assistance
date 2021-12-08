<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Checkpoint;
use App\Models\Device;
use App\Models\Round;
use App\Models\Worker;
use Illuminate\Http\Request;

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
        
        $checkpoint = Checkpoint::where('cp_code', $request->cp_code)->first();

        if(!isset($worker->id) || !isset($checkpoint->id) || $device == 0)    
            return response()->json([
                'message' => 'Error'
            ], 200);

        $round = Round::create([
            'wor_id' => $worker->id,
            'cp_id' => $checkpoint->id,
            'rou_date' => $request->rou_date,
            'rou_time' => $request->rou_time,
            'cod_uuid' => $request->cod_uuid,
            'rou_lat' => $request->rou_lat,
            'rou_long' => $request->rou_long,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $round
        ], 200);

    }
}
