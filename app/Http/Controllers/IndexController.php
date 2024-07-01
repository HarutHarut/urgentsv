<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Services;
use App\AboutUsSection;
use App\YearsOfExperiance;
use App\Gallery;
use App\Banner;
use App\Seo;
use App\Map;

class IndexController extends Controller
{
    public function index(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get slider data
        $slider_items = Slider::orderBy('position_id', 'desc')->get();

        // Get about section data
        $about_us = AboutUsSection::first();

        // Get yeard of experiance data
        $years_of_experiance = YearsOfExperiance::first();

        // Get gallery data
        $galleries = Gallery::orderBy('position_id', 'desc')->get();

        // Get banner data
        $banner = Banner::first();

        // Get map data
        $map = Map::first();

        // Get seo data
        $seo = Seo::where('page', 'home')->first();

        // Push data
        $data['slider_items'] = $slider_items;
        $data['about_us'] = $about_us;
        $data['years_of_experiance'] = $years_of_experiance;
        $data['galleries'] = $galleries;
        $data['banner'] = $banner;
        $data['seo'] = $seo;
        $data['map'] = $map;

        // Senda data to view
        return view('pages.home')->with($data);
    }
}
