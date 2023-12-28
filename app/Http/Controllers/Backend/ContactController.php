<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function ViewContact(Request $request)
    {
        $contacts = contact::first();
        return view('backend.viewcontact')->with([
            'contacts' => $contacts
        ]);
    }
    public function updateContact(Request $request)
    {
        $params = $request->all();
        unset($params['_token']);
        DB::table('contact')->update($params);
        return redirect()->route('ViewContact');
    }
}
