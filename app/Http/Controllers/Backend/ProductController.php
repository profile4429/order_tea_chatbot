<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\menu;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function ViewProduct()
    {
        $menu = menu::paginate(10);
        return view('backend.viewproduct', [
            'menu' => $menu,
        ]);
    }
    public function AddProduct(Request $request)
    {
        $params = $request->all();
        unset($params['_token']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->move('images', $filename);
            $params['image'] = $filename;
        }
        menu::insert($params);

        return redirect()->route('ViewProduct');
    }
    public function UpdateProduct(Request $request)
    {
        $id = $request->id;
        $params = $request->all();
        unset($params['_token']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->move('images', $filename);
            $params['image'] = $filename;
        }
        menu::where('id', $id)->update($params);
        return redirect()->route('ViewProduct');
    }
 
    public function GetProductID(Request $request)
    {
        $menu_id = $request->menu_id;
        $menu = menu::find($menu_id);
        if ($menu) {
            return response()->json($menu);
        } else {
            return response()->json(['error' => 'menu not found'], 404);
        }
    }
    
    public function DeleteProduct(Request $request)
    {
        try {
            $id = $request->id;
            menu::where('id', $id)->delete();
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
