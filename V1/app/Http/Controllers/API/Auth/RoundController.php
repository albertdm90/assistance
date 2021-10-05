<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Checkpoint;
use App\Models\Round;
use App\Models\Worker;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function checkpointsIndex() 
    {
        $checkpoints = Checkpoint::all(['id', 'cp_description']);
        return response()->json([
            'ckeckpoints' => $checkpoints
        ], 200);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'wor_id_number' => 'required',
            'cp_id' => 'required',
            'wor_pin' => 'required',
        ]);

        $worker = Worker::where('wor_id_number', $request->wor_id_number)->where('wor_pin', $request->wor_pin)->first();
        $checkpoint = Checkpoint::where('id', $request->cp_id)->count();

        if(!isset($worker->id) || $checkpoint == 0)    
            return response()->json([
                'message' => 'Error, no hubo coincidencias'
            ], 404);

        $round = Round::create([
            'wor_id' => $worker->id,
            'cp_id' => $request->cp_id,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $round
        ], 200);

    }
}
