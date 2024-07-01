<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Cities;
use Illuminate\Http\Request;

class CitiesController extends Controller
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
        $page_name = 'Cities';

        // Get items
        $items = Cities::orderBy('id','desc')->get();
        
        // Push data
        $data['items'] = $items;
        $data['add'] = true;
        $data['page_name'] = $page_name;
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
        // Validation
        $request->validate([
            'name_fr' => 'required|max:255',
        ]);
        
        // Lang Validation
        if($request->has('name_en') && $request->name_en != null){
            $name_en = $request->name_en;
        }else{
            $name_en = $request->name_fr;
        }

        if($request->has('name_ru') && $request->name_ru != null){
            $name_ru = $request->name_ru;
        }else{
            $name_ru = $request->name_fr;
        }

        // Get data
        $item = new Cities;
        $item->name_en = $name_en;
        $item->name_ru = $name_ru;
        $item->name_fr = $request->name_fr;
        $item->save();

        // Success Redirect
        return redirect()->back()->with('added','added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $locale = 'hy', $id)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'Cities / Update';

        // Get item
        $item = Cities::findOrFail($id);
        
        // Push data
        $data['item'] = $item;
        $data['page_name'] = $page_name;
        $data['route'] = $request->segment(3);

        // Send data to blade
        return view('admin.'.$data['route'].'.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function edit(Seo $seo)
    {
        //
    }


   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'hy', $id)
    {
        // Validation
        $request->validate([
            'name_en' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_fr' => 'required|max:255',
        ]);
        
        // Get data
        $item = Cities::findOrFail($id);
        $item->name_en = $request->name_en;
        $item->name_ru = $request->name_ru;
        $item->name_fr = $request->name_fr;
        $item->save();

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale = 'hy', $id)
    {
        // Delete
        Cities::findOrFail($id)->delete();
    
        // Success Redirect
        return redirect()->back()->with('deleted','deleted');
    }
}
