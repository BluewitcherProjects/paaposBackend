<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class Orders extends Controller
{
    public function index()
    {
        $order = Order::all();

        return view('owner.order', compact('order'));
    }

    public function deleteorder(Request $req)
    {
        $order = Order::find($req->id);
        $order->delete();

        return redirect()->back()->with('msg', 'Successfully deleted');
    }
}
