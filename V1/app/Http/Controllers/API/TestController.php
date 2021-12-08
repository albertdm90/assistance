<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checkpoint;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');
        $dataTotal = Checkpoint::select('id')->count();
        
        $data = Checkpoint::select('created_at', 'updated_at')
            ->where('created_at', '>=', $date)
            // ->where('updated_at', '<=', $date)
            ->get();

        return [
            $date => [
                'total' => $dataTotal,
                'encontrado' => $data->count(),
                'data' => $data
            ]
        ];
    }
}
