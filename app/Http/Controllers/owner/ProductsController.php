<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\gallery;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $product = product::All();

        return view('owner.product', ['collection' => $product]);
    }

    public function view(Request $req)
    {
        $product = product::where('id', $req->id)->first();
        $gallery = gallery::where('product_id', $req->id)->get();

        return view('owner.viewproduct', ['product' => $product, 'collection' => $gallery]);
    }

    public function add()
    {
        $category = category::All();

        return view('owner.addproduct', ['collection' => $category]);
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
        $category = category::All();
        $gallery = gallery::where('product_id', $req->id)->get();

        return view('owner.editproduct', ['product' => $product, 'category' => $category, 'collection' => $gallery]);
    }

    public function updateProduct(Request $request)
    {
        $video_path = 'public/videos';
        $product_thumbnail_path = 'public/images/products';
        $product_gallery_path = 'public/images/productgallery';
        $videofilename = '';
        $product_thumbnail = '';
        $product = product::where('id', $request->id)->first();
        $product->product_name = $request->product_name;
        $product->author_name = $request->author;
        $product->category = $request->product_category;
        $product->product_price = $request->product_price;
        $product->product_currency = $request->product_currency;
        $product->product_discount = $request->product_discount;
        $product->product_description = $request->product_description;
        $product->product_features = $request->product_features;
        $product->user_url = $request->demo_user;
        $product->admin_url = $request->demo_admin;
        $product->trial_period = $request->free_trial;
        $product->admin_credential = $request->admin_credential;
        $product->user_credential = $request->user_credential;
        $product->sold = $request->sold_product;
        if ($request->hasFile('demo_video')) {
            $videofilename = $request->file('demo_video')->getClientOriginalName();
            $video_upload = $request->file('demo_video')->storeAs($video_path, $videofilename);
            $product->product_video = $videofilename;
        }
        if ($request->hasFile('product_thumbnail')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png'];
            $product_thumbnail = $request->file('product_thumbnail')->getClientOriginalName();
            $extension = $request->file('product_thumbnail')->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $thumbnail_upload = $request->file('product_thumbnail')->storeAs($product_thumbnail_path, $product_thumbnail);
                $product->product_thumbnail = $product_thumbnail;
            } else {
                return redirect()->back()->with('message', 'allowed extention jpg , png , jpeg');
            }
        }
        $product->update();
        if ($product) {
            if ($product) {
                if ($request->hasFile('product_gallery')) {
                    foreach ($request->file('product_gallery') as $productgallery) {
                        $gallery = new gallery();
                        $productgalleryname = $productgallery->getClientOriginalName();
                        $store = $productgallery->storeAs($product_gallery_path, $productgalleryname);
                        $gallery->product_id = $product->id;
                        $gallery->product_gallery = $productgalleryname;
                        $gallery->save();
                    }

                    return redirect()->back()->with('message', 'product added successfully');
                } else {
                    return redirect()->back()->with('message', 'gallery creation failed! ');
                }
            } else {
                return redirect()->back()->with('message', 'product updation failed');
            }
        }
    }

    public function addProduct(Request $request)
    {
        $uploaded_by = auth::id();
        $video_path = 'public/videos';
        $product_thumbnail_path = 'public/images/products';
        $product_gallery_path = 'public/images/productgallery';
        $videofilename = '';
        $product_thumbnail = '';
        $product = new product();
        $product->uploaded_by = $uploaded_by;
        $product->product_name = $request->product_name;
        $product->author_name = $request->author;
        $product->category = $request->product_category;
        $product->product_price = $request->product_price;
        $product->product_currency = $request->product_currency;
        $product->product_discount = $request->product_discount;
        $product->product_description = $request->product_description;
        $product->product_features = $request->product_features;
        $product->user_url = $request->demo_user;
        $product->admin_url = $request->demo_admin;
        $product->trial_period = $request->free_trial;
        $product->admin_credential = $request->admin_credential;
        $product->user_credential = $request->user_credential;
        $product->sold = $request->sold_product;
        if ($request->hasFile('demo_video')) {
            $videofilename = $request->file('demo_video')->getClientOriginalName();
            $video_upload = $request->file('demo_video')->storeAs($video_path, $videofilename);
            $product->product_video = $videofilename;
        }
        if ($request->hasFile('product_thumbnail')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png'];
            $product_thumbnail = $request->file('product_thumbnail')->getClientOriginalName();
            $extension = $request->file('product_thumbnail')->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $thumbnail_upload = $request->file('product_thumbnail')->storeAs($product_thumbnail_path, $product_thumbnail);
                $product->product_thumbnail = $product_thumbnail;
            } else {
                return redirect()->back()->with('message', 'allowed extention jpg , png , jpeg');
            }
        }
        $product->save();
        if ($product) {
            if ($request->hasFile('product_gallery')) {
                foreach ($request->file('product_gallery') as $productgallery) {
                    $gallery = new gallery();
                    $productgalleryname = $productgallery->getClientOriginalName();
                    $store = $productgallery->storeAs($product_gallery_path, $productgalleryname);
                    $gallery->product_id = $product->id;
                    $gallery->product_gallery = $productgalleryname;
                    $gallery->save();
                }

                return redirect('/product')->with('message', 'product added successfully');
            } else {
                return redirect('/product')->with('message', 'gallery creation failed! ');
            }
        } else {
            return redirect('/product')->with('message', 'product creation failed');
        }
    }
}
