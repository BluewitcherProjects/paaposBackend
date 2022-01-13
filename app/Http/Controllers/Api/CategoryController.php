<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

use Validator;

class CategoryController extends Controller
{

    public function index(Request $request){
        $id=$request->user()->id;

        $category=Category::where('user_id',1)->get();

        return response()->json([
            'result' => true,
            'message' => "category fetched successfully.",
            'data'=>$category
        ]);

    }

    public function subindex(Request $request){
        $id=$request->user()->id;

        $category=SubCategory::where('category_id',$request->cat_id)->get();

        return response()->json([
            'result' => true,
            'message' => "sub category fetched successfully.",
            'data'=>$category
        ]);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:1'
         ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        $id=$request->user()->id;
        $category = new Category();
        $category->user_id=$id;
        $category->name=$request->name;
        $category->image="category.jpg";

        $category->save();

        return response()->json([
            'result' => true,
            'message' => "category added successfully.",
        ]);
    }


    public function storeSubCategory(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:1',
            'category_id'=>'required|min:1'
         ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        $id=$request->user()->id;
        $subcategory = new SubCategory();
        $subcategory->category_id=$request->category_id;
        $subcategory->name=$request->name;
        $subcategory->image="category.jpg";

        $subcategory->save();

        return response()->json([
            'result' => true,
            'message' => "subcategory added successfully.",
        ]);
    }
    
}
