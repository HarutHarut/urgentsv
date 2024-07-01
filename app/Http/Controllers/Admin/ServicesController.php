<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services;
use App\ServicesItems;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // Admin Validation
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'Services';

        // Get items
        $items = Services::orderBy('id','desc')->get();

        // Push data
        $data['page_name'] = $page_name;
        $data['add'] = true;
        $data['items'] = $items;
        $data['route'] = $request->segment(3);

        // Send data to blade
        return view('admin.'.$data['route'].'.index')->with($data);
    }

    /**
     * Show the form for creating a new.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title_fr' => 'required|max:255',
            'description_fr' => 'required',
            'meta_title_en' => 'required|max:255',
            'meta_description_en' => 'required',
            'meta_title_fr' => 'required|max:255',
            'meta_description_fr' => 'required',
            'position_id' => 'required',
            'img' => 'required',
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
        $item = new Services;
        $item->title_en = $title_en;
        $item->title_ru = $title_ru;
        $item->title_fr = $request->title_fr;
        $item->meta_title_en = $request->meta_title_en;
        $item->meta_description_en = $request->meta_description_en;
        $item->meta_title_fr = $request->meta_title_fr;
        $item->meta_description_fr = $request->meta_description_fr;
        $item->description_en = $description_en;
        $item->description_ru = $description_ru;
        $item->description_fr = $request->description_fr;
        $item->position_id = $request->position_id;
        if($request->has('video') && $request->video != null){
            $item->video = $request->video;
        }

        // Get image data
        if($request->has('img')){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('img')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('img')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_2'.time().'.'.$extenstion;
            
            // Upload image
            $request->img->move(public_path('assets/img/service/img'), $fileNameToStore);
            
            // Push data
            $item->img = $fileNameToStore;
        }else{
            return redirect()->back()->with('error','error');
        }

        // Get image data
        if($request->has('icon')){
            // Get filename with extenstion
            $filenameWithExt_icon = $request -> file('icon')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename_icon = pathinfo($filenameWithExt_icon, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion_icon = $request->file('icon')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore_icon = 'Depannage_1'.time().'.'.$extenstion_icon;
            
            // Upload image
            $request->icon->move(public_path('assets/img/service'), $fileNameToStore_icon);
            
            // Push data
            $item->icon = $fileNameToStore_icon;
        }else{
            return redirect()->back()->with('error','error');
        }

        // Save data
        $item->save();

        // Success Redirect
        return redirect()->back()->with('added','added');
    }

    /**
     * Display the specified.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $locale = 'hy', $id)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'Services / Update';

        // Get item
        $item = Services::findOrFail($id);
        
        // Push data
        $data['item'] = $item;
        $data['page_name'] = $page_name;
        $data['route'] = $request->segment(3);

        // Send data to blade
        return view('admin.'.$data['route'].'.show')->with($data);
    }

    /**
     * Show the form for editing the specified.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
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
            'meta_title_en' => 'required',
            'meta_description_en' => 'required',
            'meta_title_fr' => 'required',
            'meta_description_fr' => 'required',
            'position_id' => 'required',
        ]);

        // Get image data
        if($request->has('img')){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('img')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('img')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_'.time().'2.'.$extenstion;
            
            // Upload image
            $request->img->move(public_path('assets/img/service/img'), $fileNameToStore);
            
            // Get current category row
            $current_item = Services::findOrFail($id);

            // Check image directory
            if(isset($current_item->img) && $current_item->img != null && file_exists(public_path('assets/img/service/img'.$current_item->img))){
                // Unlink old image
                unlink(public_path('assets/img/service/img/'.$current_item->img));
            }

            // Push data
            $item['img'] = $fileNameToStore;
        }

        // Get image data
        if($request->has('icon')){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('icon')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('icon')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_'.time().'1.'.$extenstion;
            
            // Upload image
            $request->icon->move(public_path('assets/img/service'), $fileNameToStore);
            
            // Get current category row
            $current_item = Services::findOrFail($id);

            // Check image directory
            if(isset($current_item->icon) && $current_item->icon != null && file_exists(public_path('assets/img/service'.$current_item->icon))){
                // Unlink old image
                unlink(public_path('assets/img/service/'.$current_item->icon));
            }

            // Push data
            $item['icon'] = $fileNameToStore;
        }
        
        // Make data
        $item['title_en'] = $request->title_en;
        $item['title_ru'] = $request->title_ru;
        $item['title_fr'] = $request->title_fr;
        $item['meta_title'] = $request->meta_title;
        $item['meta_description'] = $request->meta_description;
        $item['description_en'] = $request->description_en;
        $item['description_ru'] = $request->description_ru;
        $item['description_fr'] = $request->description_fr;
        $item['position_id'] = $request->position_id;
        $item['meta_title_en'] = $request->meta_title_en;
        $item['meta_title_fr'] = $request->meta_title_fr;
        $item['meta_description_en'] = $request->meta_description_en;
        $item['meta_description_fr'] = $request->meta_description_fr;

        if($request->has('video') && $request->video != null){
            $item['video'] = $request->video;
        }

        // Save data
        Services::findOrFail($id)->update($item);

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Remove the specified from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale = 'hy', $id)
    {
        // Get item
        $service = Services::findOrFail($id);

        // Check image directory
        if(isset($service->img) && $service->img != null && file_exists(public_path('img/services/'.$service->img))){
            // Unlink old image
            unlink(public_path('img/services/'.$service->img));
        }
        
        // Delete from itmes
        Services::findOrFail($id)->delete();

        // Delete from items
        ServicesItems::where('service_id', $id)->delete();

        // Success Redirect
        return redirect()->back()->with('deleted','deleted');
    }
}
