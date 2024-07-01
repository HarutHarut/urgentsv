<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SiteData;
use Illuminate\Http\Request;

class SiteDataController extends Controller
{

    // Admin Validation
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'Site Datas';

        // Get items
        $item = SiteData::first();

        // Push data
        $data['page_name'] = $page_name;
        $data['add'] = false;
        $data['item'] = $item;
        $data['route'] = $request->segment(3);

        // Send data to blade
        return view('admin.'.$data['route'].'.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SiteData  $siteData
     * @return \Illuminate\Http\Response
     */
    public function show(SiteData $siteData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteData  $siteData
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteData $siteData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteData  $siteData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'hy', $id)
    {
        // Validation
        $request->validate([
            'name_en' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_fr' => 'required|max:255',
            'map' => 'required',
        ]);

        // Make data
        $item['name_en'] = $request->name_en;
        $item['name_ru'] = $request->name_ru;
        $item['name_fr'] = $request->name_fr;
        $item['map'] = $request->map;

        // Get image data
        if($request->has('logo_light')){
            // Get filename with extenstion
            $filenameWithExt_light = $request -> file('logo_light')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename_light = pathinfo($filenameWithExt_light, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion_light = $request->file('logo_light')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore_light = 'logo.png';
            
            // Upload image
            $request->logo_light->move(public_path('assets/img'), $fileNameToStore_light);
            
            // Push data
            $item['logo_light'] = $fileNameToStore_light;
        }

        // Get image data
        if($request->has('logo_dark')){
            // Get filename with extenstion
            $filenameWithExt_dark = $request -> file('logo_dark')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename_dark = pathinfo($filenameWithExt_dark, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion_dark = $request->file('logo_dark')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore_dark = 'logo-dark.png';
            
            // Upload image
            $request->logo_dark->move(public_path('assets/img'), $fileNameToStore_dark);
            
            // Push data
            $item['logo_dark'] = $fileNameToStore_dark;
        }

        // Get image data
        if($request->has('preloader')){
            // Get filename with extenstion
            $filenameWithExt_preloader = $request -> file('preloader')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename_preloader = pathinfo($filenameWithExt_preloader, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion_preloader = $request->file('preloader')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore_preloader = 'preloader.jpg';
            
            // Upload image
            $request->preloader->move(public_path('assets/img'), $fileNameToStore_preloader);
            
            // Push data
            $item['preloader'] = $fileNameToStore_preloader;
        }

        // Get image data
        if($request->has('favicon')){
            // Get filename with extenstion
            $filenameWithExt_favicon = $request -> file('favicon')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename_favicon = pathinfo($filenameWithExt_favicon, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion_favicon = $request->file('favicon')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore_favicon = 'favicon.ico';
            
            // Upload image
            $request->favicon->move(public_path('assets/img'), $fileNameToStore_favicon);
            
            // Push data
            $item['favicon'] = $fileNameToStore_favicon;
        }

        // Save data
        SiteData::first()->update($item);

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteData  $siteData
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteData $siteData)
    {
        //
    }
}
