<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all(['id',  'wor_id_number', 'wor_name', 'wor_lastname']);
        return response()->json([
            'workers' => $workers
        ], 200);
    }
}
