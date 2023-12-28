<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\order_detail;
use Illuminate\Http\Request;
use App\Models\contact;

class CheckoutController extends Controller
{
    public function ViewCheckout()
    {
        return view('frontend.checkout');
    }
    public function Checkout(Request $request)
    {
        $contacts = contact::first();
        $params = $request->except('_token');
        $payment = $request->payment_option;
        $orderId = 0;
        $total = 0;

        if (session('cart')) {
            $orderId = order::insertGetId($params);
        } else {
            return redirect()->back();
        }
        $cart = session('cart');
        foreach ($cart as $item_product_id => $item) {
            order_detail::insert([
                'order_id' => $orderId,
                'product_id' => $item_product_id,
                'count' => $item['quantity'],
                'price' => $item['price'],
                'total_money' => $item['price'] * $item['quantity'],
            ]);
            $total += $item['price'] * $item['quantity'];
        }
        session()->forget('cart');

        return view('frontend.completecheckout')->with([
            'cart' => $cart,
            'payment' => $payment,
            'total' => $total,
            'params' => $params,
            'contacts'=>$contacts
        ]);
    }
    public function CompleteCheckout()
    {
        return view('frontend.completecheckout');
    }
}
