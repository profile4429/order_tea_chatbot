<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ViewCategory()
    {
        $category = category::paginate(5);
        return view('backend.viewcategory', [
            'categorys' => $category
        ]);
    }
    public function AddCategory(Request $request)
    {
        $params = $request->all();
        unset($params['_token']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->move('images', $filename);
            $params['image'] = $filename;
        }
        category::insert($params);
        return redirect()->route('ViewCategory');
    }
    public function DeleteCategory(Request $request)
    {
        try {
            $id = $request->id;
            $category = category::findOrFail($id);
            if ($category->product()->count() > 0) {
                $json = [
                    'error' => 2,
                    'messe' => "Không thể xóa danh mục đã tồn tại sản phẩm"
                ];
            } else {
                $category->delete();
                $json = [
                    'error' => 0,
                    'messe' => "Xóa thành công"
                ];
            }
        } catch (\Exception $e) {
            $json = [
                'error' => 1,
                'messe' => $e->getMessage()
            ];
        }
        return response()->json($json);
    }
    
    public function GetCategoryID(Request $request)
    {
        $category_id = $request->category_id;
        $category = category::find($category_id);
        if ($category) {
            return response()->json($category);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
