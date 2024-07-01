<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
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
        $page_name = 'Logo';

        // Get items
        $item = Logo::first();

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
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'hy', $id)
    {
        // Get image data
        if($request->has('img')){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('img')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('img')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Digital_Gale_'.time().'.'.$extenstion;
            
            // Upload image
            $request->img->move(public_path('img'), $fileNameToStore);
            
            // Get current category row
            $current_item = Logo::findOrFail($id);

            // Check image directory
            if(isset($current_item->img) && $current_item->img != null && file_exists(public_path('img/'.$current_item->img))){
                // Unlink old image
                unlink(public_path('img/'.$current_item->img));
            }

            // Push data
            $item['img'] = $fileNameToStore;
        }

        // Get favicon data
        if($request->has('favicon')){
            // Get filename with extenstion
            $filenameWithExt_favicon = $request -> file('favicon')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename_favicon = pathinfo($filenameWithExt_favicon, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion_favicon = $request->file('favicon')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore_favicon = 'Digital_Gale_'.time().'.'.$extenstion_favicon;
            
            // Upload image
            $request->favicon->move(public_path(), $fileNameToStore_favicon);
            
            // Get current category row
            $current_item_favicon = Logo::findOrFail($id);

            // Check image directory
            if(isset($current_item_favicon->favicon) && $current_item_favicon->favicon != null && file_exists(public_path($current_item_favicon->favicon))){
                // Unlink old image
                unlink(public_path($current_item_favicon->favicon));
            }

            // Push data
            $item['favicon'] = $fileNameToStore_favicon;
        }

         // Get preloader data
         if($request->has('preloader')){
            // Get filename with extenstion
            $filenameWithExt_preloader = $request -> file('preloader')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename_preloader = pathinfo($filenameWithExt_preloader, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion_preloader = $request->file('preloader')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore_preloader = 'Digital_Gale_'.time().'.'.$extenstion_preloader;
            
            // Upload image
            $request->preloader->move(public_path('img'), $fileNameToStore_preloader);
            
            // Get current category row
            $current_item_preloader = Logo::findOrFail($id);

            // Check image directory
            if(isset($current_item_preloader->preloader) && $current_item_preloader->preloader != null && file_exists(public_path($current_item_preloader->preloader))){
                // Unlink old image
                unlink(public_path($current_item_preloader->preloader));
            }

            // Push data
            $item['preloader'] = $fileNameToStore_preloader;
        }

        // Save data
        Logo::findOrFail($id)->update($item);

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
    }
}
