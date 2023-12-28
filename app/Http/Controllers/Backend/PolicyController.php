<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\policy;

class PolicyController extends Controller
{
    public function ViewPolicy(Request $request)
    {
        $policy = policy::get();
        return view('backend.viewpolicy')->with([
            'policy'=> $policy
        ]);
    }
    public function AddPolicy(Request $request)
    {
        $params = $request->all();
        unset($params['_token']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->move('images', $filename);
            $params['image'] = $filename;
        }
        policy::insert($params);
   
        return redirect()->route('ViewPolicy');
    }

    public function DeletePolicy(Request $request)
    {
        try {
            $id = $request->id;
            policy::where('id', $id)->delete();
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

    public function UpdatePolicy(Request $request)
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
        policy::where('id', $id)->update($params);
        return redirect()->route('ViewPolicy');
    }

    public function GetPolicyID(Request $request)
    {
        $policy_id = $request->policy_id;
        $policy = policy::find($policy_id);
        if ($policy) {
            return response()->json($policy);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
