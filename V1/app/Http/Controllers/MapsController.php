<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function show(Request $lat, Request $long)
    {
        return 'hola';
    }
}
