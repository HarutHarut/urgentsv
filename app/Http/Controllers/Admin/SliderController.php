<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        $page_name = 'Slider';

        // Get items
        $items = Slider::orderBy('id','desc')->get();

        // Push data
        $data['page_name'] = $page_name;
        $data['add'] = true;
        $data['items'] = $items;
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
            'title_fr' => 'required|max:255',
            'position_id' => 'required|max:255',
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

        // Make data
        $item = new Slider;
        $item->title_en = $title_en;
        $item->title_ru = $title_ru;
        $item->title_fr = $request->title_fr;
        $item->position_id = $request->position_id;

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
            $request->img->move(public_path('assets/img/slider'), $fileNameToStore);
            
            // Push data
            $item->img = $fileNameToStore;
        }else{
            return redirect()->back()->with('error','error');
        }

        // Save data
        $item->save();

        // Success Redirect
        return redirect()->back()->with('added','added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $locale = 'hy', $id)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'Slider / Update';

        // Get item
        $item = Slider::findOrFail($id);
        
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
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'hy', $id)
    {
        // Validation
        $request->validate([
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'position_id' => 'required|max:255',
        ]);

        // Make data
        $item['title_en'] = $request->title_en;
        $item['title_ru'] = $request->title_ru;
        $item['title_fr'] = $request->title_fr;
        $item['position_id'] = $request->position_id;

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
            $request->img->move(public_path('assets/img/slider'), $fileNameToStore);
            
            // Get current category row
            $current_item = Slider::findOrFail($id);

            // Check image directory
            if(isset($current_item->img) && $current_item->img != null && file_exists(public_path('assets/img/slider/'.$current_item->img))){
                // Unlink old image
                unlink(public_path('assets/img/slider/'.$current_item->img));
            }
            // Push data
            $item['img'] = $fileNameToStore;
        }

        // Save data
        Slider::findOrFail($id)->update($item);

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale = 'hy', $id)
    {
        // Get item
        $slider = Slider::findOrFail($id);

        // Check image directory
        if(isset($slider->img) && $slider->img != null && file_exists(public_path('assets/img/slider/'.$slider->img))){
            // Unlink old image
            unlink(public_path('assets/img/slider/'.$slider->img));
        }
        
        // Delete from itmes
        Slider::findOrFail($id)->delete();

        // Success Redirect
        return redirect()->back()->with('deleted','deleted');
    }
}
