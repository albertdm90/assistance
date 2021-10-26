<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::select('id',  'wor_id_number', 'wor_name', 'wor_lastname')->where('wor_status', 2)->get();
        return response()->json([
            'workers' => $workers
        ], 200);
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'wor_id_number' => 'required',
        ]);
        $worker = Worker::where('wor_id_number', $request->wor_id_number)->where('wor_status', 2)->first();
        if(isset($worker->id))
        {
            $worker->update([
                'wor_status' => 1
            ]);
            return response()->json([
                'message' => 'Success'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Error'
            ], 200);
        }
    }
}
