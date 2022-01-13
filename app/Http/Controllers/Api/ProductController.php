<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->user()->id;

        $category = Product::where('user_id', $id)->get();

        return response()->json([
            'result' => true,
            'message' => 'Product fetched successfully.',
            'data' => $category,
        ]);
    }

    public function productByCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
        $id = $request->category_id;

        $products = Product::where('category_id', $id)->where('user_id', 1)->get();

        return response()->json([
            'result' => true,
            'data' => $products,
            'message' => 'Products fetched successfully.',
        ]);
    }

    public function productBySubCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_category_id' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
        $id = $request->sub_category_id;

        $products = Product::where('sub_category_id', $id)->where('user_id', 1)->get();

        return response()->json([
            'result' => true,
            'data' => $products,
            'message' => 'Products fetched successfully.',
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|min:1',
            'sub_category_id' => 'required|min:1',
            'name' => 'required|min:1',
            'price' => 'required|min:1',
            'description' => 'required|min:1',
            'sku' => 'required|min:1',
            'unit' => 'required|min:1',
            'status' => 'required|min:1',
            'quantity' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
        $id = $request->user()->id;
        $products = new Product();
        $products->user_id = $id;
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->sku = $request->sku;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/product');
            $image->move($destinationPath, $name);

            $products->image = '/assets/images/product/'.$name;
        } else {
            $products->image = '/assets/images/product/image.jpg';
        }
        $products->unit = $request->unit;
        $products->status = $request->status;
        $products->quantity = $request->quantity;
        $products->in_stock = $request->quantity ? 1 : 0;

        $products->save();

        return response()->json([
            'result' => true,
            'message' => 'Products added successfully.',
        ]);
    }

    public function addadminproduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productids' => 'required|array|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
        $id = $request->user()->id;
        foreach ($request->productids as $val) {
            $adminproduct = Product::where('id', $val)->first();
            $newTask = $adminproduct->replicate();
            $newTask->user_id = $id; // the new project_id
            $newTask->save();
        }

        return response()->json([
            'result' => true,
            'message' => 'Products added successfully.',
        ]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }

        $products = Product::where('id', $request->product_id)->first();

        if (!$products) {
            return response()->json([
                'result' => false,
                'message' => 'Invalid Product ID',
            ]);
        }

        $products->category_id = $request->category_id ? $request->category_id : $products->category_id;
        $products->sub_category_id = $request->sub_category_id ? $request->sub_category_id : $products->sub_category_id;
        $products->name = $request->name ? $request->name : $products->name;
        $products->price = $request->price ? $request->price : $products->price;
        $products->description = $request->description ? $request->description : $products->description;
        $products->sku = $request->sku ? $request->sku : $products->sku;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'pro_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/product');
            $image->move($destinationPath, $name);

            $products->image = '/assets/images/product/'.$name;
        } else {
            $products->image = $products->image;
        }
        $products->unit = $request->unit ? $request->unit : $products->unit;
        $products->status = $request->status ? $request->status : $products->status;
        $products->quantity = $request->quantity ? $request->quantity : $products->quantity;
        $products->in_stock = $request->quantity ? 1 : 0;

        $products->save();

        return response()->json([
            'result' => true,
            'message' => 'Products updated successfully.',
        ]);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }

        $products = Product::where('id', $request->product_id)->first();

        if (!$products) {
            return response()->json([
                'result' => false,
                'message' => 'Invalid Product ID',
            ]);
        }

        $products->delete();

        return response()->json([
            'result' => true,
            'message' => 'Products Deleted successfully.',
        ]);
    }

    public function getProductDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|min:1',
         ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
        $id = $request->product_id;

        $products = Product::where('id', $id)->get();

        return response()->json([
            'result' => true,
            'data' => $products,
            'message' => 'Products fetched successfully.',
        ]);
    }

    public function productStatus(Request $request)
    {
        $uid = $request->user()->id;
        $id = $request->product_id;
        $updateStatus = Product::where('id', $id)->where('user_id', $uid)->first();
        $updateStatus->status = $request->status;
        $updateStatus->update();
        if ($updateStatus) {
            return response()->json([
                'result' => true,
                'message' => 'Products updated.',
            ]);
        } else {
            return response()->json([
                'result' => false,
                'message' => 'Products not updated.',
            ]);
        }
    }
}
