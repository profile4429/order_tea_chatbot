<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\policy;

class PolicyController extends Controller
{
    public function View_Policy(Request $request)
    {
        $id = $request->id;
        $policys = policy::find($id);
        return view('frontend.policy')->with([
            'policys'=> $policys
        ]);
    }
}
