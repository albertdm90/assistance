<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function show(Worker $worker)
    {
        return view('worker.show', [
            'worker' => $worker
        ]);
    }
}
