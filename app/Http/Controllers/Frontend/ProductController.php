<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;

class ProductController extends Controller
{
    public function ViewListProduct(Request $request)
    {
        $id = $request->id;


        $products = product::where('category_id', $id)->get();
        $categorys = category::where('id', $id)->first();

        return view('frontend.product', [
            'products' => $products,
            'categorys' => $categorys,

        ]);
    }
}
