<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;

class Owner extends Controller
{
    public function index()
    {
        return view('/owner.dashboard');
    }
}
