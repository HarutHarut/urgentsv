<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\YearsOfExperiance;
use Illuminate\Http\Request;

class YearsOfExperianceController extends Controller
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
        $page_name = 'Years of Experiance';

        // Get item
        $item = YearsOfExperiance::first();

        // Push data
        $data['item'] = $item;
        $data['page_name'] = $page_name;
        $data['route'] = $request->segment(3);

        // Send data to blade
        return view('admin.'.$data['route'].'.show')->with($data);
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
     * @param  \App\YearsOfExperiance  $yearsOfExperiance
     * @return \Illuminate\Http\Response
     */
    public function show(YearsOfExperiance $yearsOfExperiance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\YearsOfExperiance  $yearsOfExperiance
     * @return \Illuminate\Http\Response
     */
    public function edit(YearsOfExperiance $yearsOfExperiance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\YearsOfExperiance  $yearsOfExperiance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'hy', $id)
    {
        // Validation
        $request->validate([
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'description_en' => 'required',
            'description_ru' => 'required',
            'description_fr' => 'required',
            'year' => 'required',
        ]);

        // Make data
        $item['title_en'] = $request->title_en;
        $item['title_ru'] = $request->title_ru;
        $item['title_fr'] = $request->title_fr;
        $item['description_en'] = $request->description_en;
        $item['description_ru'] = $request->description_ru;
        $item['description_fr'] = $request->description_fr;
        $item['year'] = $request->year;

        // Get image data
        if($request->has('img')){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('img')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('img')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_'.time().'.'.$extenstion;
            
            // Upload image
            $request->img->move(public_path('assets/img/other'), $fileNameToStore);
            
            // Push data
            $item['img'] = $fileNameToStore;
        }

        // Save data
        YearsOfExperiance::findOrFail($id)->update($item);

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\YearsOfExperiance  $yearsOfExperiance
     * @return \Illuminate\Http\Response
     */
    public function destroy(YearsOfExperiance $yearsOfExperiance)
    {
        //
    }
}
