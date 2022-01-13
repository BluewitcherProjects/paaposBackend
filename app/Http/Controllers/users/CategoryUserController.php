<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class CategoryUserController extends Controller
{
    public function index()
    {
        $category = Category::where('user_id','!=',1)
         // ->where('user_id',Auth::user()->id)
        ->get();

        return view('admin.category', ['collection' => $category]);
    }



    public function add()
    {
        return view('admin.addcategory');
    }

    public function subadd()
    {
        $category = Category::where('user_id',Auth::user()->id)->get();

        return view('admin.subcategory.create', ['category' => $category]);
    }

    public function subindex()
    {
        $category = SubCategory::where('user_id', '!=',1)
        //->where('user_id',Auth::user()->id)
        ->get();

        foreach ($category as $value) {
            
            $catname=Category::where('id',$value->category_id)->first();
            if($catname){
                $value->catname=$catname->name;
            }else{
                $value->catname='No Category';
            }  
        }

        return view('admin.subcategory.index', ['collection' => $category]);
    }

    public function subdelete(Request $req)
    {
        $category = SubCategory::where('id', $req->id)->first();
        $category->delete();

        return redirect()->back()->with('message', 'Category Deleted');
    }

    public function delete(Request $req)
    {
        $category = category::where('id', $req->id)->first();
        $category->delete();

        return redirect()->back()->with('message', 'Category Deleted');
    }

    public function edit(Request $req)
    {
        $category = category::where('id', $req->id)->first();

        return view('admin.editcategory', ['collection' => $category]);
    }

    public function editcategory(Request $req)
    {
        $category_name = $req->name;
        if ($req->hasFile('image')) {
        $category_image = $req->file('image')->getClientOriginalName();
        $category_ext = $req->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/category');
            $image=$req->file('image');
           $image->move($destinationPath, $category_image);  
           /* $category_image_dir = 'public/images/category';
            $category_image = $req->file('image')->getClientOriginalName();
            $category_storage = $req->file('image')->storeAs($category_image_dir, $category_image);*/
            $category = category::where('id', $req->id)->first();
            $category->name = $category_name;
            $category->image = $category_image;
            $category->update();

            return redirect()->back()->with('message', 'successfully Updated');
        } else {
            $category = category::where('id', $req->id)->first();
            $category->name = $category_name;
            $category->update();

            return redirect()->back()->with('message', 'successfully Updated');
        }
    }

    public function create(Request $req)
    {
        $category_name = $req->category_name;
        $category_image_dir = 'public/images/category';
        $category_image = $req->file('category_image')->getClientOriginalName();
        $category_ext = $req->file('category_image')->getClientOriginalExtension();
        $destinationPath = public_path('assets/images/category');
        $image=$req->file('category_image');
        $image->move($destinationPath, $category_image);
        //$category_storage = $req->file('category_image')->storeAs($category_image_dir, $category_image);
        $category = new Category();
        $category->user_id = Auth::user()->id;
        $category->name = $category_name;
        $category->image = $category_image;
        $category->save();
        if ($category) {
            $image_url = Storage::url($category_image_dir, $category_image);
            $collection = ['id' => $category->id, 'name' => $category->category_name, 'image' => $image_url];

            return redirect('admin/category')->with('message', 'Added successfully');
        } else {
            print_r('error');
        }
    }


    public function subcreate(Request $req)
    {
        $category_name = $req->category_name;
        $category_image_dir = 'public/images/subcategory';
        $category_image = $req->file('category_image')->getClientOriginalName();
        $category_ext = $req->file('category_image')->getClientOriginalExtension();
        $destinationPath = public_path('assets/images/subcategory');
        $image=$req->file('category_image');
        $image->move($destinationPath, $category_image);
        //$category_storage = $req->file('category_image')->storeAs($category_image_dir, $category_image);
        $category = new SubCategory();
        $category->user_id = Auth::user()->id;
        $category->name = $category_name;
        $category->category_id = $req->category_id;
        $category->image = $category_image;
        $category->save();
        if ($category) {
            $image_url = Storage::url($category_image_dir, $category_image);
            $collection = ['id' => $category->id, 'name' => $category->category_name, 'image' => $image_url];

            return redirect('admin/subcategory')->with('message', 'Added successfully');
        } else {
            print_r('error');
        }
    }

    public function subedit(Request $req)
    {
      $subcategory = SubCategory::where('id', $req->id)->first();

        return view('admin.subcategory.edit',['collection' => $subcategory]); 
    }
    public function editsubcategory(Request $request, $id)
    {
         $name = $request->name;
         if ($request->hasFile('image')) {
            $subcategory_image = $request->file('image')->getClientOriginalName();
            $subcategory_storage = $request->file('image')->move(public_path('assets/images/subcategory'),$subcategory_image);
            $subcategory = Subcategory::where('id', $request->id)->first();
            $subcategory->name = $name;
            $subcategory->image = $subcategory_image;
            $data = $subcategory->update();
            
            return redirect()->to('admin/subcategory')->with('message', 'successfully Updated');
        } else {
            $subcategory = Subcategory::where('id', $request->id)->first();
            $subcategory->name = $name;
            $subcategory->update();

            return redirect()->to('admin/subcategory')->with('message', 'successfully Updated');
        } 
    
    }
    public function catsearch(Request $request)
    {
       $request->validate([
           'query' => 'required',
        ]);

        $search = $request->input('query');
       
          $category = Category::where('name', 'LIKE', '%'. $search .'%')
            //->where('id', 'LIKE', '%'. $search .'%')
         ->get();
         return view('admin.category', ['collection' => $category]);
            //return view('admin.user',['collection' => $users]);
     }

    public function subcatsearch(Request $request)
    {
       $request->validate([
           'query' => 'required',
        ]);

        $search = $request->input('query');
       
          $category = Subcategory::where('name', 'LIKE', '%'. $search .'%')
            //->where('id', 'LIKE', '%'. $search .'%')
         ->get();
        return view('admin.subcategory.index', ['collection' => $category]);
     }
}
