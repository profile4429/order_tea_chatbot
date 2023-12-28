<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
    public function View_Contact()
    {
        $contacts = contact::first();
        return view('frontend.contact')->with([
            'contacts'=> $contacts
        ]);
    }
}
