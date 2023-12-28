<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\intro;

class IntroController extends Controller
{
    public function ViewIntro(Request $request)
    {
        $intros = intro::get();
        return view('backend.viewintro')->with([
            'intros' => $intros
        ]);
    }
    public function AddIntro(Request $request)
    {
        $params = $request->all();
        unset($params['_token']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->move('images', $filename);
            $params['image'] = $filename;
        }
        intro::insert($params);
        return redirect()->route('ViewIntro');
    }
    public function GetIntroID(Request $request)
    {
        $intro_id = $request->intro_id;
        $intro = intro::find($intro_id);
        if ($intro) {
            return response()->json($intro);
        } else {
            return response()->json(['error' => 'Intro not found'], 404);
        }
    }
    public function UpdateIntro(Request $request)
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
        intro::where('id', $id)->update($params);
        return redirect()->route('ViewIntro');
    }
}
