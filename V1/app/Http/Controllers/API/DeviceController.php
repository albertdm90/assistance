<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cod_uuid' => 'required|unique:devices,cod_uuid',
        ]);

        $device = Device::create([
            'cod_uuid' => $request->cod_uuid
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $device
        ], 200);
    }
}
