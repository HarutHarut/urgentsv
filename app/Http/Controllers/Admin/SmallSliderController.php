<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SmallSlider;
use App\Products;
use Illuminate\Http\Request;

class SmallSliderController extends Controller
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
        $page_name = 'Small Slider';

        // Get items
        $items = SmallSlider::orderBy('id','desc')->get();

        // Get products
        $products = Products::where('active', 1)->get();

        // Push data
        $data['page_name'] = $page_name;
        $data['add'] = true;
        $data['items'] = $items;
        $data['products'] = $products;
        $data['route'] = $request->segment(4);

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
            'product_id' => 'required',
            'position_id' => 'required',
        ]);

        // Make data
        $item = new SmallSlider;
        $item->position_id = $request->position_id;
        $item->product_id = $request->product_id;

        // Save data
        $item->save();

        // Success Redirect
        return redirect()->back()->with('added','added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SmallSlider  $smallSlider
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $locale = 'hy', $currency = 'amd', $id)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'Small Slider / Update';

        // Get item
        $item = SmallSlider::findOrFail($id);

        // Get products
        $products = Products::where('active', 1)->get();
        
        // Push data
        $data['item'] = $item;
        $data['products'] = $products;
        $data['page_name'] = $page_name;
        $data['route'] = $request->segment(4);

        // Send data to blade
        return view('admin.'.$data['route'].'.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SmallSlider  $smallSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(SmallSlider $smallSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SmallSlider  $smallSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'hy', $currency = 'amd', $id)
    {
        // Validation
        $request->validate([
            'position_id' => 'required',
            'product_id' => 'required',
        ]);

        // Make data
        $item['position_id'] = $request->position_id;
        $item['product_id'] = $request->product_id;

        // Save data
        SmallSlider::findOrFail($id)->update($item);

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SmallSlider  $smallSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale = 'hy', $currency = 'amd', $id)
    {
        // Delete from itmes
        SmallSlider::findOrFail($id)->delete();

        // Success Redirect
        return redirect()->back()->with('deleted','deleted');
    }
}
