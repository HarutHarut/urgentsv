<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\CookiePolicy;
use Illuminate\Http\Request;

class CookiePolicyController extends Controller
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
        $page_name = 'Terms And Conditions Items';

        // Get items
        $items = CookiePolicy::orderBy('id','desc')->get();
        
        // Push data
        $data['items'] = $items;
        $data['page_name'] = $page_name;
        $data['add'] = true;
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
            'title_fr' => 'required',
            'description_fr' => 'required',
        ]);

        // Lang Validation
        if($request->has('title_en') && $request->title_en != null){
            $title_en = $request->title_en;
        }else{
            $title_en = $request->title_fr;
        }

        if($request->has('title_ru') && $request->title_ru != null){
            $title_ru = $request->title_ru;
        }else{
            $title_ru = $request->title_fr;
        }

        // Lang Validation
        if($request->has('description_en') && $request->description_en != null){
            $description_en = $request->description_en;
        }else{
            $description_en = $request->description_fr;
        }

        if($request->has('description_ru') && $request->description_ru != null){
            $description_ru = $request->description_ru;
        }else{
            $description_ru = $request->description_fr;
        }

        // Make data
        $item = new CookiePolicy;
        $item->title_en = $title_en;
        $item->title_ru = $title_ru;
        $item->title_fr = $request->title_fr;
        $item->description_en = $description_en;
        $item->description_ru = $description_ru;
        $item->description_fr = $request->description_fr;

        // Save data
        $item->save();

        // Success Redirect
        return redirect()->back()->with('added','added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CookiePolicy  $CookiePolicy
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $locale = 'hy', $id)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'Terms And Conditions Items / Update';

        // Get item
        $item = CookiePolicy::findOrFail($id);
        
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
     * @param  \App\CookiePolicy  $CookiePolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(CookiePolicy $CookiePolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CookiePolicy  $CookiePolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'hy', $id)
    {
        // Validation
        $request->validate([
            'description_en' => 'required',
            'description_ru' => 'required',
            'description_fr' => 'required',
        ]);

        // Make data
        $item['description_en'] = $request->description_en;
        $item['description_ru'] = $request->description_ru;
        $item['description_fr'] = $request->description_fr;

        // Update
        CookiePolicy::findOrFail($id)->update($item);

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CookiePolicy  $CookiePolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale = 'hy', $id)
    {
        // Delete from itmes
        CookiePolicy::findOrFail($id)->delete();

        // Delete from confirms
        ConfirmTermsAndConditions::where('terms_id', $id)->delete();

        // Success Redirect
        return redirect()->back()->with('deleted','deleted');
    }
}
