<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserOptions;
use App\Cities;
use App\UserOptionsDocs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\ConfirmTermsAndConditions;
use App\TermsAndConditionsItems;
use App\Order;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
        $page_name = 'Users';

        // Get items
        $items = User::with(['orders', 'city'])->orderBy('id','desc')->get();

        // Push data
        $data['items'] = $items;
        $data['page_name'] = $page_name;
        $data['route'] = $request->segment(3);

        // Send data to blade
        return view('admin.'.$data['route'].'.index')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function city(Request $request, $locale = 'hy', $id)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'Users With City';

        // Get items
        $items = User::with([
            'orders',
            'city' => function($query) use($id){
                $query->where('id', $id);
            }
        ])->orderBy('id','desc')->get();

        // Push data
        $data['items'] = $items;
        $data['page_name'] = $page_name;
        $data['route'] = $request->segment(3);

        // Send data to blade
        return view('admin.'.$data['route'].'.city')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request, $locale = 'hy', $id)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'User Orders';

        // Get items
        $items = Order::where('user_id', $id)->orderBy('id','desc')->get();

        // Push data
        $data['items'] = $items;
        $data['page_name'] = $page_name;
        $data['route'] = $request->segment(3);

        // Send data to blade
        return view('admin.'.$data['route'].'.order')->with($data);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $locale = 'hy', $id)
    {
        // Get fata from middleware
        $data = $request->data;

        // Get page name
        $page_name = 'User / Update';

        // Get item
        $item = User::with(['city','orders', 'options', 'docs'])->findOrFail($id);

        // Get cities
        $cities = Cities::orderBy('id', 'desc')->get();

        $terms_and_conditions_items = TermsAndConditionsItems::orderBy('id', 'desc')->get();

        // Get confirms
        $confirms = ConfirmTermsAndConditions::where('user_id', Auth::user()->id)->get();

        // Make array
        $arr = array();

        // Loop from confirms
        foreach($confirms as $confirm){
            array_push($arr, $confirm->terms_id);
        };

        // Push data
        $data['item'] = $item;
        $data['terms_and_conditions_items'] = $terms_and_conditions_items;
        $data['arr'] = $arr;
        $data['cities'] = $cities;
        $data['page_name'] = $page_name;
        $data['route'] = $request->segment(3);

        // Send data to blade
        return view('admin.'.$data['route'].'.show')->with($data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'hy', $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|max:255',
            'job_title' => 'required|max:255',
            'email' => 'required|max:255',
            'confirm' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'city_id' => 'required',
        ]);

        // Make data
        $item['name'] = $request->name;
        $item['job_title'] = $request->job_title;
        $item['email'] = $request->email;
        $item['confirm'] = $request->confirm;
        $item['phone'] = $request->phone;
        $item['role'] = $request->role;
        $item['city_id'] = $request->city_id;

        // Save data
        User::findOrFail($id)->update($item);

        // Success Redirect
        return redirect()->back()->with('updated','updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request, $locale = 'hy', $id)
    {
        // Get data from middleware
        $data = $request->data;

        // Validation
        $request->validate([
            'password' => 'required',
            'password_confirm' => 'required'
        ]);

        // Get user
        $user = User::findOrFail($id);

        // Get user data before update
        $user_data = array(
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'confirm' => $user->confirm,
            'phone' => $user->phone,
            'role' => $user->role,
            'img' => $user->img,
        );

        // User validation
        if($request->password === $request->password_confirm){
            // Delete User
            User::findOrFail($id)->delete();

            // Make user update
            $user = new User;
            $user->id = $user_data['id'];
            $user->name = $user_data['name'];
            $user->job_title = $user_data['job_title'];
            $user->email = $user_data['email'];
            $user->confirm = $user_data['confirm'];
            $user->phone = $user_data['phone'];
            $user->img = $user_data['img'];
            $user->role = $user_data['role'];
            $user->password = Hash::make($request->password);
            $user->llc = md5($request->password);

            // Save user
            $user->save();

            // Redirect o login page with alert
            return redirect()->back()->with('updated', 'updated');
        }else{
            // Make Session
            $request->session()->put('error_password', 'error_password');

            // Redirect Error
            return redirect()->back()->with('error','error');    
        }
        
    }

    public function change_account_secondary_data(Request $request, $locale = 'hy', $id){
        // Get data from middleware
        $data = $request->data;

        // Check data
        if($request->has('nationality') && $request->nationality != null){
            $update_data['nationality'] = $request->nationality;
        }
        if($request->has('from') && $request->from != null){
            $update_data['from'] = $request->from;
        }
        if($request->has('gender') && $request->gender != null){
            $update_data['gender'] = $request->gender;
        }
        if($request->has('province') && $request->province != null){
            $update_data['province'] = $request->province;
        }
        if($request->has('address') && $request->address != null){
            $update_data['address'] = $request->address;
        }
        if($request->has('emplesment') && $request->emplesment != null){
            $update_data['emplesment'] = $request->emplesment;
        }
        if($request->has('group_name') && $request->group_name != null){
            $update_data['group_name'] = $request->group_name;
        }
        if($request->has('jordique') && $request->jordique != null){
            $update_data['jordique'] = $request->jordique;
        }
        if($request->has('address_pec') && $request->address_pec != null){
            $update_data['address_pec'] = $request->address_pec;
        }
        if($request->has('social_card_number') && $request->social_card_number != null){
            $update_data['social_card_number'] = $request->social_card_number;
        }
        if($request->has('tva_number') && $request->tva_number != null){
            $update_data['tva_number'] = $request->tva_number;
        }
        if($request->has('document_type') && $request->document_type != null){
            $update_data['document_type'] = $request->document_type;
        }
        if($request->has('document_number') && $request->document_number != null){
            $update_data['document_number'] = $request->document_number;
        }
        if($request->has('date_expiration') && $request->date_expiration != null){
            $update_data['date_expiration'] = $request->date_expiration;
        }
        if($request->has('birth_day') && $request->birth_day != null){
            $update_data['birth_day'] = $request->birth_day;
        }
        if($request->has('civique') && $request->civique != null){
            $update_data['civique'] = $request->civique;
        }

        if(isset($update_data)){
	        UserOptions::where('user_id', $id)->update($update_data);
        }

        // Success response
    	return redirect()->back()->with('updated', 'updated');

    }

    public function change_account_secondary_data_docs(Request $request, $locale = 'hy', $id){
        // Get data from middleware
        $data = $request->data;

        // Check data
        if($request->has('document_indentie') && $request->document_indentie != null){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('document_indentie')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('document_indentie')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_1'.time().'.'.$extenstion;
            
            // Upload image
            $request->document_indentie->move(public_path('assets/img/users/pdf'), $fileNameToStore);
            
            // Get current category row
            $current_item = UserOptionsDocs::where('user_id', $id)->first();

            // Push data
            $update_data['document_indentie'] = $fileNameToStore;
        }

         // Check data
        if($request->has('doc_retro') && $request->doc_retro != null){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('doc_retro')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('doc_retro')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_2'.time().'.'.$extenstion;
            
            // Upload image
            $request->doc_retro->move(public_path('assets/img/users/pdf'), $fileNameToStore);
            
            // Get current category row
            $current_item = UserOptionsDocs::where('user_id', $id)->first();

            // Push data
            $update_data['doc_retro'] = $fileNameToStore;
        }

        // Check data
        if($request->has('extrait_kbis_doc') && $request->extrait_kbis_doc != null){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('extrait_kbis_doc')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('extrait_kbis_doc')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_3'.time().'.'.$extenstion;
            
            // Upload image
            $request->extrait_kbis_doc->move(public_path('assets/img/users/pdf'), $fileNameToStore);
            
            // Get current category row
            $current_item = UserOptionsDocs::where('user_id', $id)->first();

            // Push data
            $update_data['extrait_kbis_doc'] = $fileNameToStore;
        }

        // Check data
        if($request->has('n_extrais_doc') && $request->n_extrais_doc != null){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('n_extrais_doc')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('n_extrais_doc')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_4'.time().'.'.$extenstion;
            
            // Upload image
            $request->n_extrais_doc->move(public_path('assets/img/users/pdf'), $fileNameToStore);
            
            // Get current category row
            $current_item = UserOptionsDocs::where('user_id', $id)->first();

            // Push data
            $update_data['n_extrais_doc'] = $fileNameToStore;
        }


        // Check data
        if($request->has('d_license_doc') && $request->d_license_doc != null){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('d_license_doc')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('d_license_doc')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_5'.time().'.'.$extenstion;
            
            // Upload image
            $request->d_license_doc->move(public_path('assets/img/users/pdf'), $fileNameToStore);
            
            // Get current category row
            $current_item = UserOptionsDocs::where('user_id', $id)->first();


            // Push data
            $update_data['d_license_doc'] = $fileNameToStore;
        }

        // Check data
        if($request->has('d_n_license') && $request->d_n_license != null){
            // Get filename with extenstion
            $filenameWithExt = $request -> file('d_n_license')->getClientOriginalName();
            
            // Get just fileNameToStore
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get just ext
            $extenstion = $request->file('d_n_license')->getClientOriginalExtension();
            
            // Filename to store
            $fileNameToStore = 'Depannage_6'.time().'.'.$extenstion;
            
            // Upload image
            $request->d_n_license->move(public_path('assets/img/users/pdf'), $fileNameToStore);
            
            // Get current category row
            $current_item = UserOptionsDocs::where('user_id', $id)->first();


            // Push data
            $update_data['d_n_license'] = $fileNameToStore;
        }

        if($request->has('extrait_kbis_doc') && $request->extrait_kbis_doc != null){
            $update_data['extrait_kbis_doc'] = $request->extrait_kbis_doc;
        }

        if($request->has('n_assurance') && $request->n_assurance != null){
            $update_data['n_assurance'] = $request->n_assurance;
        }

        if($request->has('date_experation') && $request->date_experation != null){
            $update_data['date_experation'] = $request->date_experation;
        }

        if($request->has('n_license') && $request->n_license != null){
            $update_data['n_license'] = $request->n_license;
        }

        if(isset($update_data)){
	        UserOptionsDocs::where('user_id', $id)->update($update_data);
        }

        // Success response
    	return redirect()->back()->with('updated', 'updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale = 'hy', $id)
    {
        // Delete from itmes
        User::findOrFail($id)->delete();

        // Delete from itmes
        UserOptions::where('user_id', $id)->delete();

        // Delete from itmes
        UserOptionsDocs::where('user_id', $id)->delete();

        // Success Redirect
        return redirect()->back()->with('deleted','deleted');
    }
}
