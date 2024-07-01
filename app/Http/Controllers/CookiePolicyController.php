<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CookiePolicy;
use App\Seo;

class CookiePolicyController extends Controller
{
    public function index(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get description data
        $description = CookiePolicy::first();

        // Get seo data
        $seo = Seo::where('page', 'cookie-policy')->first();

        // Push data
        $data['description'] = $description;
        $data['seo'] = $seo;

        // Senda data to view
        return view('pages.cookie-policy')->with($data);
    }
}
