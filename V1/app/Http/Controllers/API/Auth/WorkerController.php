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
}
