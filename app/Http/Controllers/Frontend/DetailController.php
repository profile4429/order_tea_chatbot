<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\product;
use  App\Models\category;


class DetailController extends Controller
{
    public function ViewDetail(Request $request)
    {
        $product_desc = product::orderBy('created_at', 'desc')->get();
        $products = product::where('id', $request->id)->get();
        $category_id = Product::find($request->id)->category_id;
        $category = category::where('id',$category_id)->first();
        $product_list = product::where('category_id', $category_id)->get();

        return view('frontend.detail', [
            'products' => $products,
            'product_desc' => $product_desc,
            'category_name' => $category->name,
            'product_list'=> $product_list
        ]);
       
    }
}
