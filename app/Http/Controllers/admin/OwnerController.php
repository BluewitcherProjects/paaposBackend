<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owner = User::where('type', 'owner')->get();

        return view('/admin.owner', compact('owner'));
    }

    public function edit(Request $req)
    {
        $owner = User::where('id', $req->id)->first();

        return view('/admin.editowner', ['owne' => $owner]);
    }

    public function editmyowner(Request $req)
    {
        $owner = User::where('id', $req->id)->first();
        $owner->ownerName = $req->owner_name;
        $owner->email = $req->email;
        $owner->WNo = $req->wno;
        $owner->skypeId = $req->skype;
        $owner->businessName = $req->business;
        $owner->GST = $req->gst;
        if ($files = $req->file('input_brand_image')) {
            $name = $files->getClientOriginalName();
            $files->move('input_brand_image', $name);
            $owner->proileImg = $name;
        }

        $q = $owner->update();

        if ($q) {
            return redirect('owner')->with('msg', 'Successfully Edited');
        }

        return view('/admin.editowner', compact('owner'));
    }

    public function deleteowner(Request $req)
    {
        $owner = User::find($req->id);
        $owner->delete();

        return redirect()->back();
    }

    public function verify(Request $req)
    {
        $owner = User::find($req->id);
        $owner->verify = 1;
        $owner->update();

        return redirect()->back()->with('msg', 'Verified');
    }
}
