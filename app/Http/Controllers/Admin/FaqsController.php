<?php

namespace App\Http\Controllers\Admin;

use App\Faqs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqsController extends Controller
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
        $page_name = 'FAQs';

        // Get items
        $items = Faqs::orderBy('id','desc')->get();

        // Push data
        $data['page_name'] = $page_name;
        $data['add'] = true;
        $data['items'] = $items;
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
            'question_hy' => 'required|max:255',
            'answer_hy' => 'required',
            'position_id' => 'required',
        ]);

        // Lang Validation
        if($request->has('question_en') && $request->question_en != null){
            $question_en = $request->question_en;
        }else{
            $question_en = $request->question_hy;
        }

        if($request->has('question_ru') && $request->question_ru != null){
            $question_ru = $request->question_ru;
        }else{
            $question_ru = $request->question_hy;
        }

        // Lang Validation
        if($request->has('answer_en') && $request->answer_en != null){
            $answer_en = $request->answer_en;
        }else{
            $answer_en = $request->answer_hy;
        }

        if($request->has('answer_ru') && $request->answer_ru != null){
            $answer_ru = $request->answer_ru;
        }else{
            $answer_ru = $request->answer_hy;
        }

        // Make data
        $item = new Faqs;
        $item->question_en = $question_en;
        $item->question_ru = $question_ru;
        $item->question_hy = $request->question_hy;
        $item->answer_en = $answer_en;
        $item->answer_ru = $answer_ru;
        $item->answer_hy = $request->answer_hy;
        $item->position_id = $request->position_id;

        // Save data
        $item->save();

        // Success Redirect
        return redirect()->back()->with('added','added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $locale = 'hy', $currency = 'amd', $id)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'FAQs / Update';

        // Get item
        $item = Faqs::findOrFail($id);
        
        // Push data
        $data['item'] = $item;
        $data['page_name'] = $page_name;
        $data['route'] = $request->segment(4);

        // Send data to blade
        return view('admin.'.$data['route'].'.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function edit(Faqs $faqs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'hy', $currency = 'amd', $id)
    {
        // Validation
        $request->validate([
            'question_en' => 'required|max:255',
            'question_ru' => 'required|max:255',
            'question_hy' => 'required|max:255',
            'answer_en' => 'required',
            'answer_ru' => 'required',
            'answer_hy' => 'required',
            'position_id' => 'required',
        ]);

        // Make data
        $item['question_en'] = $request->question_en;
        $item['question_ru'] = $request->question_ru;
        $item['question_hy'] = $request->question_hy;
        $item['answer_en'] = $request->answer_en;
        $item['answer_ru'] = $request->answer_ru;
        $item['answer_hy'] = $request->answer_hy;
        $item['position_id'] = $request->position_id;

        // Save data
        Faqs::findOrFail($id)->update($item);

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale = 'hy', $currency = 'amd', $id)
    {
        // Delete from itmes
        Faqs::findOrFail($id)->delete();

        // Success Redirect
        return redirect()->back()->with('deleted','deleted');
    }
}
