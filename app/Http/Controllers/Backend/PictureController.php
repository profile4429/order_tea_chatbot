<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\picture;


class PictureController extends Controller
{
    public function ViewPicture(Request $request)
    {
        $pictures = picture::get();
        return view('backend.viewpicture')->with([
            'pictures' => $pictures
        ]);
    }
    public function AddPicture(Request $request)
    {
        $params = $request->all();
        unset($params['_token']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->move('images', $filename);
            $params['image'] = $filename;
        }
        picture::insert($params);
        return redirect()->route('ViewPicture');
    }
    public function DeletePicture(Request $request)
    {
        try {
            $id = $request->id;
            picture::where('id', $id)->delete();
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
