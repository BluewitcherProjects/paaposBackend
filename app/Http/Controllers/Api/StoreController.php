<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StoreController extends Controller
{

    public function edit(Request $req){
        $id=$request->user()->id;
    }

    public function status(Request $req){
        $id=$request->user()->id;

        $user=User::where('id',$id)->first();

        $user->is_open=$req->is_open ? 1 : $user->is_open;
        $user->is_deliver=$req->is_deliver ? 1 : $user->is_deliver;

        $user->update();
    }
}
