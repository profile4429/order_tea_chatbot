<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;

class NewsController extends Controller
{
    public function ViewNews(Request $request)
    {
        $news = news::get();
        return view('backend.viewnews')->with([
            'news' => $news
        ]);
    }
    public function addNews(Request $request)
    {
        $params = $request->all();
        unset($params['_token']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->move('images', $filename);
            $params['image'] = $filename;
        }
        news::insert($params);

        return redirect()->route('ViewNews');
    }
    public function DeleteNews(Request $request)
    {
        try {
            $id = $request->id;
            news::where('id', $id)->delete();
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

    public function UpdateNews(Request $request)
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
        news::where('id', $id)->update($params);
        return redirect()->route('ViewNews');
    }

    public function GetNewsID(Request $request)
    {
        $news_id = $request->news_id;
        $news = news::find($news_id);
        if ($news) {
            return response()->json($news);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
