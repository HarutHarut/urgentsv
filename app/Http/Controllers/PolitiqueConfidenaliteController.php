<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PolitiqueConfidenalite;
use App\Seo;

class PolitiqueConfidenaliteController extends Controller
{
    public function index(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get description data
        $description = PolitiqueConfidenalite::first();

        // Get seo data
        $seo = Seo::where('page', 'politique-confidenalite')->first();

        // Push data
        $data['description'] = $description;
        $data['seo'] = $seo;

        // Senda data to view
        return view('pages.politique-confidenalite')->with($data);
    }
}
