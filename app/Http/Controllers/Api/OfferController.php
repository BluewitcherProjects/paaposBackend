<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Coupon;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function createCoupon(Request $request)
    {
        $coupon = $request->coupon;
        $id = $request->user()->id;
        $offer = $request->offerPrice;
        $discountType = $request->discountType;
        $isOffer = $request->isOffer;
        $onUser = $request->onUser;
        $onAnyUser = $request->onAnyUser;
        $desc = $request->desc;
        $setOffer = new Coupon();
        $setOffer->coupon = $coupon;
        $setOffer->user_id = $id;
        $setOffer->offerPrice = $offer;
        $setOffer->isOffer = $isOffer;
        $setOffer->onUser = $onUser;
        $setOffer->onAnyUser = $onAnyUser;
        $setOffer->discountType = $discountType;
        $setOffer->desc = $desc;
        $setOffer->minOrderValue = $request->minOrderValue ? $request->minOrderValue : $setOffer->minOrderValue;
        $setOffer->save();
        if ($setOffer) {
            return response()->json([
            'result' => true,
            'message' => 'Offer created.',
        ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'Offer not created.',
            ]);
        }
    }

    public function deleteCoupon(Request $request)
    {
        $id = $request->id;
        $get = Coupon::where('id', $id)->first()->delete();
        if ($get) {
            return response()->json([
            'result' => true,
            'message' => 'deleted.',
        ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'deletion failed.',
            ]);
        }
    }

    public function showCoupon(Request $request)
    {
        $id = $request->user()->id;
        $getCoupon = Coupon::where('user_id', $id)->get();
        if ($getCoupon) {
            return response()->json([
            'result' => true,
            'data' => $getCoupon,
            'message' => 'successfully fetched.',
        ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'failed.',
            ]);
        }
    }

    public function updateCoupon(Request $request)
    {
        $id = $request->id;
        $save = Coupon::where('id', $id)->first();
        $save->offerPrice = $request->offerPrice ? $request->offerPrice : $save->offerPrice;
        $save->status = $request->status ? 1 : 0;
        $save->update();
        if ($save) {
            return response()->json([
                'result' => true,
                'message' => 'successfully updated.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'failed.',
            ]);
        }
    }

    public function deleteBanner(Request $request)
    {
        $id = $request->id;
        $get = Banner::where('id', $id)->first()->delete();
        if ($get) {
            return response()->json([
            'result' => true,
            'message' => 'deleted.',
        ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'deletion failed.',
            ]);
        }
    }

    public function createBanner(Request $request)
    {
        $id = $request->user()->id;
        $banner = new Banner();

        $banner->user_id = $id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/banner');
            $image->move($destinationPath, $name);
            $banner->image = '/assets/images/banner/'.$name;
        }
        $banner->save();
        if ($banner) {
            return response()->json([
                'result' => true,
                'message' => 'Offer created.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'Offer not created.',
            ]);
        }
    }

    public function showBanner(Request $request)
    {
        $id = $request->user()->id;
        $showBanner = Banner::where('user_id', $id)->get();
        if ($showBanner) {
            return response()->json([
            'result' => true,
            'data' => $showBanner,
            'message' => 'successfully fetched.',
        ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'failed.',
            ]);
        }
    }

    public function updateBanner(Request $request)
    {
        $id = $request->id;
        $save = Banner::where('id', $id)->first();
        $save->status = $request->status ? 1 : 0;
        $save->update();
        if ($save) {
            return response()->json([
                'result' => true,
                'message' => 'successfully updated.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'failed.',
            ]);
        }
    }
}
