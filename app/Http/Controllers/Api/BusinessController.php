<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function addSocial(Request $request)
    {
        $id = $request->user()->id;
        $save = User::where('id', $id)->first();
        $save->fb_link = $request->fb_link ? $request->fb_link : $save->fb_link;
        $save->insta_link = $request->insta_link ? $request->insta_link : $save->insta_link;
        $save->p_policy = $request->p_policy ? $request->p_policy : $save->p_policy;
        $save->r_policy = $request->r_policy ? $request->r_policy : $save->r_policy;
        $save->t_c = $request->t_c ? $request->t_c : $save->t_c;
        $save->pay_policy = $request->pay_policy ? $request->pay_policy : $save->pay_policy;
        $save->about = $request->about ? $request->about : $save->about;
        $save->location = $request->location ? $request->location : $save->location;
        $save->save();
        if ($save) {
            return response()->json([
                'result' => true,
                'message' => 'added successfully.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'failed.',
            ]);
        }
    }

    public function Contact(Request $request)
    {
        $id = $request->user()->id;
        $save = new Contact();
        $save->user_id = $id;
        $save->name = $request->name;
        $save->mobile = $request->mobile;
        $save->email = $request->email;
        $save->subject = $request->subject;
        $save->remark = $request->remark;
        $save->save();
        if ($save) {
            return response()->json([
                'result' => true,
                'message' => 'Thank you for Contact us! we will connect you soon.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'failed.',
            ]);
        }
    }

    public function Kyc(Request $request)
    {
        $id = $request->user()->id;
        $save = User::where('id', $id)->first();
        if ($request->hasFile('pandoc')) {
            $image = $request->file('pandoc');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/kyc');
            $image->move($destinationPath, $name);
            $save->pandoc = '/assets/images/kyc/'.$name;
        } else {
            $save->pandoc = $save->pandoc;
        }
        if ($request->hasFile('aadharFront')) {
            $image = $request->file('aadharFront');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/kyc');
            $image->move($destinationPath, $name);
            $save->aadharFront = '/assets/images/kyc/'.$name;
        } else {
            $save->aadharFront = $save->aadharFront;
        }
        if ($request->hasFile('aadharBack')) {
            $image = $request->file('aadharBack');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/kyc');
            $image->move($destinationPath, $name);
            $save->aadharBack = '/assets/images/kyc/'.$name;
        } else {
            $save->aadharBack = $save->aadharBack;
        }
        if ($request->hasFile('gstDoc')) {
            $image = $request->file('gstDoc');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/kyc');
            $image->move($destinationPath, $name);
            $save->gstDoc = '/assets/images/kyc/'.$name;
        } else {
            $save->gstDoc = $save->gstDoc;
        }
        $save->gst = $request->gst ? $request->gst : $save->gst;
        $save->pan = $request->pan ? $request->pan : $save->pan;
        $save->aadhar_no = $request->aadhar_no ? $request->aadhar_no : $save->aadhar_no;
        $save->save();
        if ($save) {
            return response()->json([
                'result' => true,
                'message' => 'added successfully.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'failed.',
            ]);
        }
    }
}
