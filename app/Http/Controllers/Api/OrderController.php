<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;
use Validator;

class OrderController extends Controller
{
    public function index(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'user_id' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }

        $order = Order::where('user_id', $req->user_id)->get();

        return response()->json([
            'result' => true,
            'data' => $order,
            'message' => 'Order fetched successfully.',
        ]);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'product_id' => 'required|min:1',
            'product_name' => 'required|min:1',
            'user_id' => 'required|min:1',
            'UserName' => 'required|min:1',
            'Mobile' => 'required|min:1',
            'Delivery_charge' => 'required|min:1',
            'Pickup_location' => 'required|min:1',
            'Drop_location' => 'required|min:1',
            'Cod' => 'required|min:1',
            'Wallet' => 'required|min:1',
            'Admin_commision' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }

        $order = new Order();
        $order->product_id = $req->product_id;
        $order->user_id = $req->user_id;
        $order->product_name = $req->product_name;
        $order->UserName = $req->UserName;
        $order->Mobile = $req->Mobile;
        $order->Delivery_charge = $req->Delivery_charge;
        $order->Pickup_location = $req->Pickup_location;
        $order->Drop_location = $req->Drop_location;
        $order->status = 'Current';
        $order->Cod = $req->Cod;
        $order->Wallet = $req->Wallet;
        $order->Admin_commision = $req->Admin_commision;
        $order->save();

        return response()->json([
            'result' => true,
            'message' => 'Order added successfully.',
        ]);
    }

    public function edit(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'order_id' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }

        $order = Order::where('id', $req->order_id)->first();

        if (!$order) {
            return response()->json([
                'result' => false,
                'message' => 'Order not found.',
            ]);
        }

        $order->UserName = $req->UserName ? $req->UserName : $order->UserName;
        $order->Mobile = $req->Mobile ? $req->Mobile : $order->Mobile;
        $order->Drop_location = $req->Drop_location ? $req->Drop_location : $order->Drop_location;
        $q = $order->update();

        return response()->json([
            'result' => true,
            'message' => 'Order updated successfully.',
        ]);
    }

    public function cancel(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'order_id' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }

        $order = Order::where('id', $req->order_id)->first();

        if (!$order) {
            return response()->json([
                'result' => false,
                'message' => 'Order not found.',
            ]);
        }

        $order->status = 'Cancelled';

        $q = $order->update();

        return response()->json([
            'result' => true,
            'message' => 'Order Cancelled successfully.',
        ]);
    }

    public function deliverysettings(Request $request)
    {
        $savedelivery = Delivery::where('user_id', $request->user()->id)->first();
        if ($savedelivery != null) 
        {
            $savedelivery->deliver_charge = $request->delivery_charges;
            $savedelivery->free_delivery = $request->free_delivery;
            $savedelivery->gst = $request->gst;
            $savedelivery->minOrderValue = $request->minOrderValue;
            $savedelivery->delivery_timing = $request->delivery_timing;
            $savedelivery->same_day_delivery = $request->same_day_delivery;
            $savedelivery->save();
        } else 
        {
            $savedelivery = new Delivery();
            $savedelivery->user_id = $request->user()->id;
            $savedelivery->deliver_charge = $request->delivery_charges;
            $savedelivery->free_delivery = $request->free_delivery;
            $savedelivery->gst = $request->gst;
            $savedelivery->minOrderValue = $request->minOrderValue;
            $savedelivery->delivery_timing = $request->delivery_timing;
            $savedelivery->same_day_delivery = $request->same_day_delivery;
            $savedelivery->save();
        }
        if ($savedelivery) {
            return response()->json([
                'result' => true,
                'message' => 'Delivery setting updated.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'Delivery setting not updated.',
            ]);
        }
    }

    public function showDelivery(Request $request)
    {
        $id = $request->user()->id;
        $getData = Delivery::where('user_id', $id)->get();
        if ($getData) {
            return response()->json([
                'result' => true,
                'data' => $getData,
                'message' => 'updated.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'failed.',
            ]);
        }
    }
}

