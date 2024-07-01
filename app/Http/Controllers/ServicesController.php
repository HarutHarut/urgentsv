<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\Seo;

class ServicesController extends Controller
{
    public function index(Request $request, $locale = 'fr', $url = NULL){
        // Get data from middleware
        $data = $request->data;

        if($url == NULL){
            // Get seo data
            $seo = Seo::where('page', 'services')->first();

            $data['seo'] = $seo;

            // Senda data to view
            return view('pages.services-list')->with($data);
        }else{
            // Get service data
            $service = Services::where('url', $url)->first();

            $data['service'] = $service;

            // Senda data to view
            return view('pages.service-detail')->with($data);
        }
    }

    public function search(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get services data
        $services = Services::with('items')->
        where('title_en', 'LIKE', '%'.$request->search.'%')->
        orWhere('title_ru', 'LIKE', '%'.$request->search.'%')->
        orWhere('title_fr', 'LIKE', '%'.$request->search.'%')->
        orderBy('position_id', 'desc')->get();

        // Get seo data
        $seo = Seo::where('page', 'services')->first();

        // Push data
        $data['services'] = $services;
        $data['seo'] = $seo;

        // Senda data to view
        return view('pages.services-list')->with($data);
    }
}
