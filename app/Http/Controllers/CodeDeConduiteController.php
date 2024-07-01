<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CodeDeConduite;
use App\Seo;

class CodeDeConduiteController extends Controller
{
    public function index(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get description data
        $description = CodeDeConduite::first();

        // Get seo data
        $seo = Seo::where('page', 'code-de-conduite')->first();

        // Push data
        $data['description'] = $description;
        $data['seo'] = $seo;

        // Senda data to view
        return view('pages.code-de-conduite')->with($data);
    }
}
