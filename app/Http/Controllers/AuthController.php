<?php

namespace App\Http\Controllers;

use App\Models\User;
// app/Http/Controllers/AuthController.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Validator;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        if(!$request->mobile){
            $response = [
                'result' => false,
                'ResponseMsg' => "Please provide correct mobile number!"
            ];
        
             return response($response, 201);
        }

        if(!$request->store_name){
            $response = [
                'result' => false,
                'ResponseMsg' => "Please provide Store name!"
            ];
        
             return response($response, 201);
        }

        if(!$request->name){
            $response = [
                'result' => false,
                'ResponseMsg' => "Please provide name!"
            ];
        
             return response($response, 201);
        }
        
        if(!$request->email){
            $response = [
                'result' => false,
                'ResponseMsg' => "Please provide email!"
            ];
        
             return response($response, 201);
        }

        if(!$request->subdomain){
            $response = [
                'result' => false,
                'ResponseMsg' => "Please provide subdomain name!"
            ];
        
             return response($response, 201);
        }
        
        $otp=1234;//rand(1111,9999);
        
        //otp generation
       
        
        
        
        //end otp generation
        
        
        
        
        $subdomain=$request->subdomain;
        $rand=mt_rand(1000, 9999);
        $subdomain=$subdomain.$rand;
        $domain = parse_url(request()->root())['host'];
        $subdomain=$subdomain.'.'.$domain;
        $subdomain='http://'.$subdomain;
        $user= User::where('mobile', $request->mobile)->first();
         //print_r($request->mobile);
            if (!$user) {
                $new=new user();
                $new->name=$request->name;
                $new->mobile=$request->mobile;
                $new->store=$request->store_name;
                $new->subdomain=$subdomain;
                $new->otp=$otp;
                $new->email=$request->email;
                $new->password= Hash::make('12345678');
                $new->save();
                // return response([
                //     'message' => ['These credentials do not match our records.']
                // ], 404);
            }else{
                $user->otp=$otp;
                $user->update();
            }
        
            
        
            $response = [
                'result' => true,
                'ResponseMsg' => "OTP send successfully!"
            ];
        
             return response($response, 201);
    }



    function otpverify(Request $request)
    {
        $url=URL::to('');
        if(!$request->mobile || !$request->otp){
            return response([
                'result' => false,
                'data'=>[],
                'token'=>null,
                'message' => 'Please provide Mobile and OTP.'
            ], 404);
        }
        $user= User::where('mobile', $request->mobile)->where('otp', $request->otp)->first();
         //print_r($request->mobile);
            if (!$user) {
                return response([
                    'result' => false,
                    'data'=>[],
                    'token'=>null,
                    'message' => 'Wrong OTP.'
                ], 404);
            }
        
             $token = $user->createToken('auth_token')->plainTextToken;
        
            $response = [
                'result' => true,
                'data'=>[$user],
                'domain'=>$url,
                'token'=>$token,
                'ResponseMsg' => "OTP verified successfully!"
            ];
        
             return response($response, 201);
    }







    public function login(Request $request)
    {
        if(!$request->mobile){
            $response = [
                'result' => false,
                'ResponseMsg' => "Please provide mobile number!"
            ];
        
             return response($response, 201);
        }
        
        $otp=1234;//rand(1111,9999);
        $user= User::where('mobile', $request->mobile)->first();
        
        if (!$user) {
            return response([
                'result' => false,
                'message' => ['Mobile not registered. Register first..']
            ], 404);
        }else{
            $user->otp=$otp;
            $user->update();

            return response([
                'result' => true,
                'message' => ['OTP send to registerd mobile please verify.']
            ], 404);
        }
        
        
        
    }

    public function me(Request $request)
    {
        return $request->user();
    }


    public function bankDetail(Request $request)
    {

         $validator = Validator::make($request->all(),[
            'bank_name'=>'required|min:1',
            'account_no'=>'required',
            'ifsc'=>'required',
            'account_holder'=>'required',
            'bank_linked_mobile'=>'required'  
         ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        $id=$request->user()->id;

        $user = User::where('id',$id)->first();
        $user->bankName = $request->bank_name;
        $user->accountNo = $request->account_no;
        $user->ifsc = $request->ifsc;
        $user->accountHolder = $request->account_holder;
        $user->bankLinkedNo = $request->bank_linked_mobile;
        $user->update();

        return response()->json([
            'result' => true,
            'data'=>$user,
            'message' => "Bank Details Added successfully.",
        ]);

    }


    public function businessDetail(Request $request)
    {

         $validator = Validator::make($request->all(),[
            'business_name'=>'required|min:1',
            'location'=>'required'
         ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        $id=$request->user()->id;

        $user = User::where('id',$id)->first();
        $user->business = $request->business_name;
        $user->location = $request->location;
       
        $user->update();

        return response()->json([
            'result' => true,
            'data'=>$user,
            'message' => "Business Details Added successfully.",
        ]);

    }




    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
          'message' => 'Successfully logged out',
      ]);
    }
}
