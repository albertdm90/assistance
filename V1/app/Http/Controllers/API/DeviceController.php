<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Device;
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

        return response()->json([
            'message' => 'Success',
            'data' => $device
        ], 200);
    }
}
