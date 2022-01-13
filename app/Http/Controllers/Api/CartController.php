<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartData = Cart::all();

        if ($cartData->count() > 0 ) {
            return response()->json([
                'result' => true,
                'message' => 'Cart Found.',
                'data' => $cartData
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'Cart not found.',
                'data' => []
            ]);
        }
    }

    public function increaseCart(Request $request)
    {
        $cartData = Cart::all();

        if ($cartData->count() > 0 ) {
            return response()->json([
                'result' => true,
                'message' => 'Cart Found.',
                'data' => $cartData
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'Cart not found.',
                'data' => []
            ]);
        }
    }

    public function decreaseCart(Request $request)
    {
        $cartData = Cart::all();

        if ($cartData->count() > 0 ) {
            return response()->json([
                'result' => true,
                'message' => 'Cart Found.',
                'data' => $cartData
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'Cart not found.',
                'data' => []
            ]);
        }
    }


}
