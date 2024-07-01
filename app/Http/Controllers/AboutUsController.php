<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutUsDescription;
use App\Reviews;
use App\Seo;

class AboutUsController extends Controller
{
    public function index(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get description data
        $description = AboutUsDescription::first();

        // Get reviews data
        $reviews = Reviews::orderBy('id', 'desc')->get();

        // Get seo data
        $seo = Seo::where('page', 'about-us')->first();

        // Push data
        $data['description'] = $description;
        $data['reviews'] = $reviews;
        $data['seo'] = $seo;

        // Senda data to view
        return view('pages.about-us')->with($data);
    }
}
