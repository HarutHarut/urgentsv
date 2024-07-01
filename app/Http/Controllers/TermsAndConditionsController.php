<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TermsAndConditions;
use App\Seo;

class TermsAndconditionsController extends Controller
{
    public function index(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get description data
        $description = TermsAndConditions::first();

        // Get seo data
        $seo = Seo::where('page', 'terms-and-conditions')->first();

        // Push data
        $data['description'] = $description;
        $data['seo'] = $seo;

        // Senda data to view
        return view('pages.terms-and-conditions')->with($data);
    }
}
