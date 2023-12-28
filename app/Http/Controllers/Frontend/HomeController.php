<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use  App\Models\product;
use  App\Models\intro;
use  App\Models\picture;
use  App\Models\contact;
use  App\Models\category;
use  App\Models\policy;





use  App\Models\order_detail;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Request;

class Homecontroller extends Controller
{
    public function ViewHome()
    {
        $product_desc = product::orderBy('created_at', 'desc')
            ->get();

        $top_product = DB::table('order_detail')
            ->select('product.id', DB::raw('GROUP_CONCAT(DISTINCT product.title SEPARATOR ", ") as title'), 'product.price', DB::raw("SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT product.image SEPARATOR ', '), ',', 1) as image"), DB::raw('SUM(order_detail.count) as total_sales'))
            ->join('product', 'product.id', '=', 'order_detail.product_id')
            ->groupBy('order_detail.product_id', 'product.id', 'product.price')
            ->orderByDesc('total_sales')
            ->limit(5)
            ->get();

        $intro_top = intro::where('status', 0)->get();
        $intro_mid = intro::where('status', 1)->get();

        $picture_top = picture::where('status', 0)->get();
        $picture_mid = picture::where('status', 1)->get();


        return view('frontend.home')->with([
            'product_desc' => $product_desc,
            'top_product' => $top_product,
            'intro_top' => $intro_top,
            'intro_mid' => $intro_mid,
            'picture_top' => $picture_top,
            'picture_mid' => $picture_mid,
        ]);
    }
}
