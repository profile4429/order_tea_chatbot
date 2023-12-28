<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\receipt;

use App\Models\order_detail;


class OrderController extends Controller
{
    public function ViewOrder()
    {
        $order = Order::orderBy('order_date', 'desc')->paginate(30);

        return view('backend.vieworder', [
            'order' => $order
        ]);
    }
    public function ChangeStatus(Request $request)
    {
        $id_receipt = $request->id;
        $type = $request->type;

        $check = receipt::where('id_receipt', $id_receipt)->first();
        if (!$check) redirect()->back();


        $updated = receipt::updateOrCreate(
            ['id_receipt' => $id_receipt],
            ['status' => $type == 'accept' ? 2 : ($type == 'cancel' ? 0 : ($type == 'success' ? 3 : 1))]
        );

        if ($updated) {
            $receipt = receipt::all();
            return view('backend.vieworder', [
                'receipt' => $receipt
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function GetOrderID(Request $request)
    {
        $order_id = $request->order_id;
        $product = order_detail::where('order_id', $order_id)
            ->join('product', 'order_detail.product_id', '=', 'product.id')
            ->select('order_detail.count', 'order_detail.price', 'order_detail.total_money', 'product.title', 'product.image')
            ->get();
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }
}
