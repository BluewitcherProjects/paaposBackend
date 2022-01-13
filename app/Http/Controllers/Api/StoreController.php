<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\CheckoutControll;
use App\Models\Feedback;
use App\Models\Ppolicy;
use App\Models\Tc;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function edit(Request $request)
    {
        $id = $request->user()->id;
        $user = User::where('id', $id)->first();
        $user->email = $request->email ? $request->email : $user->email;
        $user->mobile = $request->mobile ? $request->mobile : $user->mobile;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/profile');
            $image->move($destinationPath, $name);
            $user->profile = '/assets/images/profile/'.$name;
        } else {
            $user->profile = $user->profile;
        }
        $user->update();
        if ($user) {
            return response()->json([
                'result' => true,
                'profile' => $user->profile,
                'message' => 'store updated.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'store not updated.',
            ]);
        }
    }

    public function userProfile(Request $request)
    {
        $id = $request->user()->id;
        $getdata = User::where('id', $id)->first();
        if ($getdata) {
            $domain = $request->getHttpHost();
            $sub = $getdata->subdomain;
            $subdomain = 'http://'.$sub.'.'.$domain.'/public';

            return response()->json([
                'result' => true,
                'data' => $getdata,
                'subdomain' => $subdomain,
                'message' => 'Profile fetched.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'something went wrong.',
            ]);
        }
    }

    public function status(Request $request)
    {
        $id = $request->user()->id;

        $user = User::where('id', $id)->first();

        $user->is_open = $request->is_open ? 1 : 0;
        $user->is_deliver = $request->is_deliver ? 1 : 0;

        $user->update();
        if ($user) {
            return response()->json([
                'result' => true,
                'message' => 'store updated.',
            ]);
        } else {
            return response()->json([
                'result' => true,
                'message' => 'store not updated.',
            ]);
        }
    }

    //search store APIs

    public function searchStore(Request $request)
    {
        $filterData = User::select('id', 'name', 'store', 'profile', 'subdomain', 'location', 'is_open', 'is_deliver')->where('store', 'LIKE', $request->name.'%')
                      ->get();

        if ($filterData->count() > 0) {
            return response()->json([
                'result' => true,
                'message' => 'store found.',
                'data' => $filterData,
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'store not found.',
                'data' => [],
            ]);
        }
    }

    public function storeDetail(Request $request)
    {
        $filterData = User::where('id', $request->id)
                      ->first();

        if ($filterData) {
            return response()->json([
                'result' => true,
                'message' => 'store found.',
                'data' => $filterData,
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'store not found.',
                'data' => [],
            ]);
        }
    }

    public function checkoutController(Request $request)
    {
        $id = $request->user()->id;
        $getdata = CheckoutControll::where('user_id', $id)->first();
        if ($getdata != null) {
            $getdata->COD = $request->cod ? 1 : 0;
            $getdata->PaymentGateway = $request->online ? 1 : 0;
            $getdata->save();
        } else {
            $getdata = new CheckoutControll();
            $getdata->user_id = $id;
            $getdata->COD = $request->cod;
            $getdata->PaymentGateway = $request->online;
            $getdata->sava();
        }
        if ($getdata) {
            return response()->json([
            'result' => true,
            'message' => 'updated.',
        ]);
        } else {
            return response()->json([
            'result' => false,
            'message' => 'failed.',
        ]);
        }
    }

    public function showPay(Request $request)
    {
        $id = $request->user()->id;
        $getdata = CheckoutControll::where('user_id', $id)->first();
        if ($getdata) {
            return response()->json([
            'result' => true,
            'data' => $getdata,
            'message' => 'fetched.',
        ]);
        }
    }

    public function getUserPolicies(Request $request)
    {
        $getdata = Ppolicy::where('user_id', 1)->get();
        $getdata1 = About::where('user_id', 1)->get();
        $getdata2 = Tc::where('user_id', 1)->get();

        return response()->json([
                'result' => true,
                'pPolicy' => $getdata,
                'about' => $getdata1,
                'tc' => $getdata2,
                'message' => 'updated.',
            ]);
    }

    public function Feedback(Request $request)
    {
        $id = $request->user()->id;
        $getdata = Feedback::where('user_id', $id)->first();
        if ($getdata) {
            $getdata->rating = $request->rating ? $request->rating : $getdata->rating;
            $getdata->feedback = $request->feedback ? $request->feedback : $getdata->feedback;
            $getdata->save();

            return response()->json([
            'result' => true,
            'message' => 'updated.',
        ]);
        } else {
            $getdata = new Feedback();
            $getdata->user_id = $id;
            $getdata->rating = $request->rating;
            $getdata->feedback = $request->feedback;
            $getdata->save();

            return response()->json([
            'result' => true,
            'message' => 'new added.',
        ]);
        }
    }
}
