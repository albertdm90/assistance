<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Device;
use App\Models\Worker;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cod_uuid' => 'required|unique:devices,cod_uuid',
        ]);


        $configuration = Configuration::find(1);
        if(!$configuration->status_register_device)
            return response()->json([
                'message' => 'Error',
            ], 200);
        
        
        $device = Device::create([
            'cod_uuid' => $request->cod_uuid,
            'model' => $request->model,
            'operating' => $request->operating,
            'version' => $request->version,
            'platform' => $request->platform
        ]);


        $configuration->update([
            'status_register_device' => false
        ]);

        $workers = Worker::where('wor_status', 1)->where('wor_pin', '!=', '' )->get(['wor_pin']);
        $workers_pin_list = [];
        foreach ($workers as $worker) {
            $workers_pin_list[] = $worker->wor_pin;
        }
        
        return response()->json([
            'message' => 'Success',
            'worker_pin_list' => [
                'data' => $workers_pin_list,
            ],
            'device' => $device
        ], 200);
    }

    public function updateWorkersPinList($cod_uuid)
    {
        $device = Device::where('cod_uuid', $cod_uuid)->count();
        if($device == 0){
            return response()->json([
                'message' => 'Error',
            ], 401); 
        }

        $workers = Worker::where('wor_status', 1)->where('wor_pin', '!=', '' )->get(['wor_pin']);
        $workers_pin_list = [];
        foreach ($workers as $worker) {
            $workers_pin_list[] = $worker->wor_pin;
        }
        return response()->json([
            'data' => $workers_pin_list,
        ], 200); 
    }

}
