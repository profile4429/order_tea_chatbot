<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\menu;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function ViewCart()
    {
        return view('frontend.cart');
    }
    public function AddToCart($id)
    {
        $product = product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $product->title,
                "image" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
    }
    public function UpdateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cập nhật giỏ hàng thành công');
        }
    }
    public function RemoveCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Xóa thành công');
        }
    }
    public function AddCart(Request $request)
    {

        try {
            $id = $request->id;
            $quantity = $request->quantity;
            $product = product::findOrFail($request->id);
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity']+= $quantity;
            } else {
                $cart[$id] = [
                    "title" => $product->title,
                    "image" => $product->image,
                    "price" => $product->price,
                    "quantity" =>  $quantity
                ];
            }
            session()->put('cart', $cart);
            $json = [
                'error' => 0,
                'messe' => "thanh cong"
            ];
        } catch (\Exception $e) {
            $json = [
                'error' => 1,
                'messe' => $e->getMessage()
            ];
        }
        return response()->json($json);

      

    }
}
