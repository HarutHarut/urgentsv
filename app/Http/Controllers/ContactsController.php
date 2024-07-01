<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seo;

class ContactsController extends Controller
{
    public function index(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get seo data
        $seo = Seo::where('page', 'contacts')->first();

        // Push data
        $data['seo'] = $seo;

        // Senda data to view
        return view('pages.contacts')->with($data);
    }
}
