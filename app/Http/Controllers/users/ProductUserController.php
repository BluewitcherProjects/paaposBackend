<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

use App\Models\gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class ProductUserController extends Controller
{
    public function index()
    {
        $product = Product::where('user_id', '!=' ,1)
         //->where('user_id',Auth::user()->id)
        ->get();

        foreach ($product as $value) {
            $catname=Category::where('id',$value->category_id)->first();
            if($catname){
                $value->catname=$catname->name;
            }else{
                $value->catname='No Category';
            }
            $subcatname=SubCategory::where('id',$value->sub_category_id)->first();
            if($subcatname){
                $value->subcatname=$subcatname->name;
            }else{
                $value->subcatname='No Subcat';
            }
        }

        return view('admin.product', ['collection' => $product]);
    }

    public function view(Request $req)
    {
        $product = Product::where('id', $req->id)->first();
        $catname=Category::where('id',$product->category_id)->first()->name ?? 'No Category';
       
        $subcatname=SubCategory::where('id',$product->sub_category_id)->first()->name ?? 'No Sub Category';
       

        return view('admin.viewproduct', ['product' => $product, 'category' => $catname,'subcategory'=>$subcatname]);
    }

    public function add()
    {
        $category = Category::where('user_id',Auth::user()->id)->get();
        return view('admin.addproduct', ['category' => $category]);
    }


    public function getSubCat(Request $req)
    {
        $category = SubCategory::where('category_id',$req->cat_id)->get();
        $data='';
        foreach ($category as $value) {
           $data=$data.'<option value="'.$value->id.'">'.$value->name.'</option>';
        }

        return $data;


    }

    public function delete(Request $req)
    {
        $product = product::where('id', $req->id)->first();
        $product->delete();

        return redirect()->back()->with('message', 'successfully deleted');
    }

    public function deleteimage(Request $req)
    {
        $gallery = gallery::where('id', $req->id)->first();
        $gallery->delete();

        return redirect()->back()->with('message', 'successfully deleted');
    }

    public function verify(Request $req)
    {
        $product = product::where('id', $req->id)->first();
        $product->status = 'on';
        $product->update();
        if ($product) {
            return redirect()->back()->with('message', 'Product verified');
        } else {
            return redirect()->back()->with('message', 'Product not verified');
        }
    }

    public function edit(Request $req)
    {
        $product = product::where('id', $req->id)->first();
        $category = Category::where('user_id',Auth::user()->id)->get();
        $gallery = gallery::where('product_id', $req->id)->get();

        return view('admin.editproduct', ['product' => $product, 'category' => $category, 'collection' => $gallery]);
    }

    public function updateProduct(Request $request)
    {
        $video_path = 'public/videos';
        $product_thumbnail_path = 'public/images/products';
        $product_gallery_path = 'public/images/productgallery';
        $videofilename = '';
        $product_thumbnail = '';
        $products = Product::where('id', $request->id)->first();

        $products->category_id=$request->category_id;
        $products->sub_category_id=$request->sub_category_id;
        $products->name=$request->name;
        $products->price=$request->price;
        $products->description=$request->description;
        $products->sku=$request->sku;
        
        $products->unit=$request->unit;
        $products->status=$request->status;
        $products->quantity=$request->quantity;
        $products->in_stock=$request->in_stock ;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/product');
            $image->move($destinationPath, $name);
            $products->image=$name;;
        }
        
        $products->update();
        if ($products) {
            return redirect()->route('product')->with('message', 'Product updated successfully');
               
            } else {
                return redirect()->back()->with('message', 'product updation failed');
            }
        
    }

    public function addProduct(Request $request)
    {
        
        $id=Auth::user()->id;
        $products = new Product();
        $products->user_id=$id;
        $products->category_id=$request->category_id;
        $products->sub_category_id=$request->sub_category_id;
        $products->name=$request->name;
        $products->price=$request->price;
        $products->description=$request->description;
        $products->sku=$request->sku;
        
        $products->unit=$request->unit;
        $products->status=$request->status;
        $products->quantity=$request->quantity;
        $products->in_stock=$request->in_stock ;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/product');
            $image->move($destinationPath, $name);
            $products->image=$name;;
        }
        $products->save();
         if ($products) {
        //     if ($request->hasFile('product_gallery')) {
        //         foreach ($request->file('product_gallery') as $productgallery) {
        //             $gallery = new gallery();
        //             $productgalleryname = $productgallery->getClientOriginalName();
        //             $store = $productgallery->storeAs($product_gallery_path, $productgalleryname);
        //             $gallery->product_id = $product->id;
        //             $gallery->product_gallery = $productgalleryname;
        //             $gallery->save();
        return redirect('/admin/product')->with('message', 'Product added successfully');
                 }

        //         return redirect('/product')->with('message', 'product added successfully');
        //     } else {
        //         return redirect('/product')->with('message', 'gallery creation failed! ');
        //     }
         else {
           return redirect('/admin/product')->with('message', 'Product creation failed');
        }
    }

    public function productsearch(Request $request)
    {
       $request->validate([
           'query' => 'required',
        ]);

        $search = $request->input('query');
       
          $product = Product::where('name', 'LIKE', '%'. $search .'%')
            //->where('id', 'LIKE', '%'. $search .'%')
         ->get();
        return view('admin.product', ['collection' => $product]);
     }
}
