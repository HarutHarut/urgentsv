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

        $data['servicesList'] = [
            [
                'icon' => 'Depannage_16152016011.png',
                'img' => 'Depannage_16152882152.jpg',
                'title' => 'Boiler Repair and Installation',
                'description' => 'Ensure your home stays warm and efficient with our expert boiler services. Whether you need a quick repair or a full installation, our certified technicians provide reliable solutions tailored to your needs.',
                'url' => 'boilers'
            ],
            [
                'icon' => 'Depannage_16152015871.png',
                'img'  => 'Depannage_16152883352.jpg',
                'title' => 'Lock Repair and Installation, Locksmith',
                'description' => 'Locked out or need to upgrade your home’s security? Our locksmiths are ready to assist with fast and secure lock repair and installation services, ensuring your peace of mind.',
                'url' => 'locksmith'
            ],
            [
                'icon' => 'Depannage_16152015651.png',
                'img' => 'Depannage_16152884012.png',
                'title' => 'Electricians',
                'description' => 'From fixing faulty wiring to installing new lighting, our licensed electricians deliver top-quality electrical services that keep your home safe and functioning smoothly.',
                'url' => 'electricity'
            ],
            [
                'icon' => 'Depannage_16152015381.png',
                'img' => 'Depannage_16152884482.jpg',
                'title' => 'Plumber',
                'description' => 'Don’t let plumbing issues disrupt your day. Our skilled plumbers are available to tackle everything from leaks to full installations, providing dependable service when you need it most.',
                'url' => 'plumber'
            ],
        ];

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
