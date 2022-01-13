<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\UsersExport;
use PDF;


class UserController extends Controller
{
    public function index()
    {
       $users = User::where('id' ,'!=', 1)->get();
       return view('admin.user',['collection' => $users]);
    }

    public function edit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return view('admin.edituser', ['collection' => $user]);
    }
    public function add()
    {
        return view('admin.adduser');
    }
    /*public function create(Request $request)
    {
        $name = $request->name;

        $email = $request->email;
        $mobile = $request->mobile;
        $profile_image = $request->file('profile')->getClientOriginalName();
        $profile_ext = $request->file('profile')->getClientOriginalExtension();
        $profile_image_dir = $request->file('profile')->move(public_path('assets/profile'),$profile_image);
         $business = $request->business;
         $location = $request->location;
         $store = $request->store;
         $bankName = $request->bankName;
         $accountNo = $request->accountNo;
         $ifsc = $request->ifsc;
         $accountHolder = $request->accountHolder;
         $bankLinkedNo = $request->bankLinkedNo;
         $adhar = $request->aadhar_no;

        $adharFront = $request->file('aadharFront')->getClientOriginalName();
        $adharFront_ext = $request->file('aadharFront')->getClientOriginalExtension();
        $adharFront_image_dir = $request->file('aadharFront')->move(public_path('assets/aadhar'),$adharFront);
          
        $adharBack = $request->file('aadharBack')->getClientOriginalName();
        $adharBack_ext = $request->file('aadharBack')->getClientOriginalExtension();
        $adharBack_image_dir = $request->file('aadharBack')->move(public_path('assets/aadhar'),$adharBack);

        $pan = $request->pan;
        
        $pandoc = $request->file('pandoc')->getClientOriginalName();
        $pandoc_ext = $request->file('pandoc')->getClientOriginalExtension();
        $pandoc_image_dir = $request->file('pandoc')->move(public_path('assets/pancard'),$pandoc);
         
        $gst = $request->gst;

        $gstDoc = $request->file('gstDoc')->getClientOriginalName();
        $gstDoc_ext = $request->file('gstDoc')->getClientOriginalExtension();
        $gstDoc_image_dir = $request->file('gstDoc')->move(public_path('assets/gst'),$gstDoc);
        $password = Hash::make($request->password);

        $User = new User();
        $User->name = $name;
        $User->email = $email;
        $User->mobile = $mobile;
        $User->profile = $profile_image;
        $User->business = $business;
        $User->location = $location;
        $User->store = $store;
        $User->bankName = $bankName;
        $User->accountNo = $accountNo;
        $User->ifsc = $ifsc;
        $User->accountHolder = $accountHolder;
        $User->bankLinkedNo = $bankLinkedNo;
        $User->aadhar_no = $adhar;
        $User->aadharFront = $adharFront;
        $User->aadharBack = $adharBack;
        $User->pan = $pan;
        $User->pandoc = $pandoc;
        $User->gst = $gst;
        $User->gstDoc = $gstDoc;
        $User->password = $password;
       
        $data =  $User->save();
        if ($data == true) {
          return redirect('admin/user')->with('message', 'User Added successfully');
        } 
        else {
            print_r('error');
        }
    }*/

    public function editUserData(Request $request)
    {
        //$user_id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $store = $request->store;
        $business = $request->business;
       if($request->hasFile('profile')) 
        {
         $profile_image_dir = 'assets/images/profile';
         $profile_image = $request->file('profile')->getClientOriginalName();
        $profile_storage = $request->file('profile')->move(public_path('assets/images/profile'),$profile_image);

          
        $users = User::findOrFail($request->id);

       // $User->id = $user_id;
        $users->name = $name;
        $users->email = $email;
        $users->mobile = $mobile;
        $users->profile = $profile_image;
        $users->business = $business;
        $users->store = $store;
        $users->update();
        
        return redirect()->to('admin/user')->with('message', 'successfully Updated');
        } else {
            $users = User::findOrFail($request->id);
            //$User->id = $user_id;
            $users->name = $name;
            $users->email = $email;
            $users->mobile = $mobile;
            $users->business = $business;
            $users->store = $store;
           
            $users->update();
            return redirect()->to('admin/user')->with('message', 'successfully Updated');
        } 
    }

    public function delete(Request $request, $id)
    {
        $user = User::where('id', $request->id)->first();
        $user->delete();

        return redirect()->back()->with('message', 'User Deleted');
    }
    public function view(Request $req)
    {
        $user = User::where('id', $req->id)->first();
        //$catname=Category::where('id',$product->category_id)->first()->name ?? 'No Category';
       
       // $subcatname=SubCategory::where('id',$product->sub_category_id)->first()->name ?? 'No Sub Category';
       
       return view('admin.viewuser', ['user' => $user]);
    }

    public function search(Request $request)
    {
       $request->validate([
           'query' => 'required',
        ]);

        $search = $request->input('query');
       
          $users = User::where('name', 'LIKE', '%'. $search .'%')
          //->where('id', 'LIKE', '%'. $search .'%')
         ->get();
         
            return view('admin.user',['collection' => $users]);
     }

    public function statusUpdate(Request $request)
    {
        $user = User::select('verified')->where('id', $request->id)->first();
        if($user->verified == 'no')
         {
           $status = 'yes';
         }
         else{
            $status = 'no';
         }
         $data = array('verified' => $status);
         $user->where('id',$request->id)->update($data);
        return redirect()->to('admin/user')->with('message', 'Status Updated successfully');
    } 

    public function profile(Request $request)
    {
        $user = User::where('id', 1)->first();
        return view('admin.profile',['collection' => $user]);
    }
    public function profilEdit(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $store = $request->store;
        $business = $request->business;
       if($request->hasFile('profile')) 
        {
         $profile_image_dir = 'assets/images/profile';
         $profile_image = $request->file('profile')->getClientOriginalName();
        $profile_storage = $request->file('profile')->move(public_path('assets/images/profile'),$profile_image);

          
        $users = User::findOrFail($request->id);

       // $User->id = $user_id;
        $users->name = $name;
        $users->email = $email;
        $users->mobile = $mobile;
        $users->profile = $profile_image;
        $users->business = $business;
        $users->store = $store;
        $users->update();
        
        return redirect()->to('admin/profile')->with('message', 'successfully Updated');
        } else {
            $users = User::findOrFail($request->id);
            //$User->id = $user_id;
            $users->name = $name;
            $users->email = $email;
            $users->mobile = $mobile;
            $users->business = $business;
            $users->store = $store;
           
            $users->update();
            return redirect()->to('admin/profile')->with('message', 'successfully Updated');
        } 
    }

    public function forgetPassword(Request $request)
    {
        $user = User::where('id', 1)->first();
        return view('admin.forgetpassword',['collection' => $user]); 
    }

    public function forgetAdminPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'cnf_password' => 'required|same:new_password', 
         ]);
        $oldPwd = Hash::make($request->password);
      /*  echo "<pre>";
        print_r($oldPwd);
        echo "</pre>";
        exit();*/
        $user = Auth::user();
       
        if (!Hash::check($oldPwd, $user->new_password)) {
            return back()->with('error', 'old password does not match!');
        }

        $user->new_password = Hash::make($request->new_password);
        $user->update();

        return back()->with('success', 'Password successfully changed!');
       /* $oldPwd = Hash::make($request->password);
        $newPwd = Hash::make($request->new_password);
        $cnfPwd = Hash::make($request->cnf_password);
        
        $user = User::select('password')->where('id', 1)->first();
         if($oldPwd != $user->password)
         {
            echo '<script>alert("your old password not matched")</script>';
         }
         else{
             if($newPwd != $cnfPwd)
             {
                echo '<script>alert("your New password not matched")</script>';
             }
             else{
                  $user->password = $newPwd;
                  $user->update();
             }
         }
        */
        
    }

    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users-collection.csv');
    }
     // Generate PDF
    public function userCreatePDF() 
    {
      // retreive all records from db
         $data = User::where('id' ,'!=', 1)->get();
     // $data = User::where('user_id',Auth::user()->id)->get();

      // share data to view
      view()->share('users',$data);
      $pdf = PDF::loadView('admin.pdf.users', $data);

      // download PDF file with download method
      return $pdf->download('users.pdf');
    }
}
