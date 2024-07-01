<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seo;
use App\TermsAndConditions;
use App\ConfirmTermsAndConditions;
use App\TermsAndConditionsItems;
use App\User;
use App\UserOptions;
use App\UserOptionsDocs;
use App\Order;
use App\CardData;
use App\Factures;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    // Auth Validation
    // public function __construct() 
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get data
        $options = UserOptions::where('user_id', Auth::user()->id)->first();

        if($options == NULL){
        	// Make options
	        $options = new UserOptions;
	        $options->user_id = Auth::user()->id;
	        $options->save();
        }

        $docs = UserOptionsDocs::where('user_id',  Auth::user()->id)->first();
        
        if($docs == NULL){
			// Make options docs
	        $docs = new UserOptionsDocs;
	        $docs->user_id = Auth::user()->id;
	        $docs->save();
		}

        // Get seo data
        $seo = Seo::where('page', 'account')->first();

        // Get main terms and conditions data
        $terms_and_conditions = TermsAndConditions::first();

        // Get terms and conditions items data
        $terms_and_conditions_items = TermsAndConditionsItems::orderBy('id', 'desc')->get();

        // Get confirms
        $confirms = ConfirmTermsAndConditions::where('user_id', Auth::user()->id)->get();

        // Make array
        $arr = array();

        // Loop from confirms
        foreach($confirms as $confirm){
            array_push($arr, $confirm->terms_id);
        }

        // Get active orders data
        $active_orders = Order::where(['user_id' => Auth::user()->id, 'type' => 1])->orderBy('id', 'desc')->get();

        // Get success orders data
        $success_finished_orders = Order::where(['user_id' => Auth::user()->id, 'type' => 2])->orderBy('id', 'desc')->get();

        // Get success payed orders data
        $success_finished_payed_orders = Order::where(['user_id' => Auth::user()->id, 'type' => 4])->orderBy('id', 'desc')->get();

        // Get cancel orders data
        $canceled_orders = Order::where(['user_id' => Auth::user()->id, 'type' => 3])->orderBy('id', 'desc')->get();

        // Get factures data
        $factures = Factures::where('user_id', Auth::user()->id)->get();

        // Get card data
        $card_data = CardData::first();

        // Push data
        $data['seo'] = $seo;
        $data['arr'] = $arr;
        $data['card_data'] = $card_data;
        $data['active_orders'] = $active_orders;
        $data['success_finished_orders'] = $success_finished_orders;
        $data['success_finished_payed_orders'] = $success_finished_payed_orders;
        $data['canceled_orders'] = $canceled_orders;
        $data['terms_and_conditions'] = $terms_and_conditions;
        $data['terms_and_conditions_items'] = $terms_and_conditions_items;
        $data['factures'] = $factures;

        //  Check email confirmation and senda data to view
        if(Auth::user()->confirm == 0){
            // Confirmed
            return view('pages.account.confirm')->with($data);
        }else{
            // Not confirmed yet
            return view('pages.account.index')->with($data);
        }
    }

    public function  change_account_data(Request $request){
        // Get data from middleware
        $data = $request->data;
        
        // Validation
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);
        
        // Make data
        $user_data['name'] = $request->name;
        $user_data['email'] = $request->email;
        $user_data['phone'] = $request->phone;

        // Update data
        User::findOrFail(Auth::user()->id)->update($user_data);

        // Success response
        echo 1;
    }

    public function  change_image(Request $request){
        // Get data from middleware
        $data = $request->data;
        
        // Validation
        $request->validate([
            'img' => 'required',
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
            $fileNameToStore = 'Depannage.fr_'.time().'.'.$extenstion;
            
            // Upload image
            $request->img->move(public_path('assets/img/users'), $fileNameToStore);
            
            // Get current category row
            $current_item = User::findOrFail(Auth::user()->id);

            // Check image directory
            if(isset($current_item->img) && $current_item->img != null && file_exists(public_path('assets/img/users'.$current_item->img))){
                // Chek default image
                if($current_item->img != 'default.jpg'){
                    // Unlink old image
                    unlink(public_path('assets/img/users/'.$current_item->img));
                }
            }

            // Push data
            $user_data['img'] = $fileNameToStore;
        }

        // Update data
        User::findOrFail(Auth::user()->id)->update($user_data);

        // Success redirect
        return redirect()->back();
    }

    public function update(Request $request, $locale = 'hy'){
        // Get data from middleware
        $data = $request->data;

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'new_password_confirm' => 'required'
        ]);

        // Get user data before update
        $user_data = array(
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'confirm' => Auth::user()->confirm,
            'phone' => Auth::user()->phone,
            'img' => Auth::user()->img,
        );

        // User validation
        if(md5($request->old_password) === Auth::user()->llc){
            if($request->new_password === $request->new_password_confirm){
                // Delete User
                User::findOrFail(Auth::user()->id)->delete();

                // Make user update
                $user = new User;
                $user->id = $user_data['id'];
                $user->name = $user_data['name'];
                $user->email = $user_data['email'];
                $user->confirm = $user_data['confirm'];
                $user->phone = $user_data['phone'];
                $user->img = $user_data['img'];
                $user->password = Hash::make($request->new_password);
                $user->llc = md5($request->new_password);

                // Save user
                $user->save();

                // Log out
                Auth::logout();

                // Make Session
                $request->session()->put('user_message', translating('password-upadted-log-in-again'));

                // Redirect o login page with alert
                return redirect()->route('login', ['locale' => app()->getLocale()]);
            }else{
                // Make Session
                $request->session()->put('error_password', 'error_password');

                // Redirect Error
                return redirect()->back()->with('error','error');    
            }
        }else{
            // Make Session
            $request->session()->put('error_password', 'error_password');

            // Redirect Error
            return redirect()->back()->with('error','error');
        }
    }

    public function change_account_secondary_data(Request $request){
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

        UserOptions::where('user_id', Auth::user()->id)->update($update_data);

        // Success response
        echo 1;

    }

    public function change_account_secondary_data_docs(Request $request){
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
            $current_item = UserOptionsDocs::where('user_id', Auth::user()->id)->first();

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
            $current_item = UserOptionsDocs::where('user_id', Auth::user()->id)->first();

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
            $current_item = UserOptionsDocs::where('user_id', Auth::user()->id)->first();

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
            $current_item = UserOptionsDocs::where('user_id', Auth::user()->id)->first();

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
            $current_item = UserOptionsDocs::where('user_id', Auth::user()->id)->first();


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
            $current_item = UserOptionsDocs::where('user_id', Auth::user()->id)->first();


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

        UserOptionsDocs::where('user_id', Auth::user()->id)->update($update_data);

        // Success response
        return redirect()->route('account', ['locale' => app()->getLocale()]);
    }

    public function confirm_terms(Request $request){
        // Get terms confirm items
        $terms_and_conditions_items = TermsAndConditionsItems::with('confirm')->orderBy('id', 'desc')->get();

        // Loop from items
        foreach($terms_and_conditions_items as $terms_and_conditions_item){
            // Check request has this item check 
            if($request->has('confirm'.$terms_and_conditions_item->id)){
                // Check confirm exists
                $check_exists = ConfirmTermsAndConditions::where(['user_id' => Auth::user()->id, 'terms_id' => $terms_and_conditions_item->id])->get();

                // Check count
                if(count($check_exists) == 0){
                    // Make confirm data
                    $term_data = new ConfirmTermsAndConditions;
                    $term_data->user_id = Auth::user()->id;
                    $term_data->terms_id = $terms_and_conditions_item->id;
                
                    // Save data
                    $term_data->save();
                }
            }else{ // User not confirmate this term
                // Remove from confirmated terms
                ConfirmTermsAndConditions::where(['user_id' => Auth::user()->id, 'terms_id' => $terms_and_conditions_item->id])->delete();
            }
        }

        // Resturn with success response
        echo 1;
    }

    public function verify(Request $request, $locale = 'fr', $email){
        // Get data from middleware
        $data = $request->data;
        
        if(!Auth::user()){
            return redirect()->route('login', ['locale' => app()->getLocale()]);
        }else{
            if(md5(Auth::user()->email) === $email){
                // Make data
                $update_data = array( 'confirm' => 1 );
                
                // Update
                User::findOrFail(Auth::user()->id)->update($update_data);
                
                // Make options
                $options = new UserOptions;
                $options->user_id = Auth::user()->id;
                $options->save();
        
                // Make options docs
                $docs = new UserOptionsDocs;
                $docs->user_id = Auth::user()->id;
                $docs->save();
                
                // Send data to view account page
                return redirect()->route('account', ['locale' => app()->getLocale()]);
            }else{
                // Send data to view login page
                return redirect()->route('login', ['locale' => app()->getLocale()]);
            }
        }
    }

    public function resend(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Validation
        $request->validate([
            'email' => 'email:rfc,dns'
        ]);

        // Email content
        $body = '
            <html>
                <body>
                    <h1>'.translating("confirm-email").'</h1>
                    <a href="'.route('verify', ['locale' => app()->getLocale(), 'email' => md5(Auth::user()->email)]).'">'.translating('confirm').'</a>
                </body>
            </html>
        ';

        // Headers settings
        $headers = '';
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= 'From: '.'info@intervention-urgence24-7.com'. "\r\n";
        $headers .= 'Cc: '.'info@intervention-urgence24-7.com'."\r\n";

        // Sending to admin process
        $send_adimn = mail($request->email, translating('email-confirm'), $body, $headers);

        // dd(route('verify', ['locale' => app()->getLocale(), 'email' => md5(Auth::user()->email)]));

        // Response succes
        return redirect()->back();
    }

    public function update_description(Request $request, $locale = 'fr', $id){
        // Get order
        $order = Order::findOrFail($id);
        
        // Check user
        if($order->id == Auth::user()->id){
            // Error response
            echo 0; exit;
        }else{
            // Validation
            $request->validate([
                'description' => 'required'
            ]);

            // Make data
            $update_data = array(
                'description_en' => $request->description,
                'description_ru' => $request->description,
                'description_fr' => $request->description,
            );

            // Change data
            Order::findOrFail($id)->update($update_data);

            // Success ressponse
            echo 1;
        }
    }

    public function log_out(Request $request){
        // Get data
        $data = $request->data;
        
        // Log Out
        Auth::logout();

        // Redirect to login
        return redirect()->route('login', ['locale' => app()->getLocale()]);
    }

    
    public function pdf(Request $request, $locale = 'fr', $id){
        // Get data from middleware
        $data = $request->data;

        // Get pdf
        $pdf = Factures::findOrFail($id);

        // Download
        return response()->download(public_path(). "/factures/".$pdf->file, $pdf->file);
    }

    public function download_data(Request $request, $locale = 'fr', $id, $file){
        
        // Get data from middleware
        $data = $request->data;

        // Get data
        $row = UserOptionsDocs::findOrFail($id);

        // Download
        return response()->download(public_path(). "/assets/img/users/pdf/".$row->$file, $row->$file);
    }


    public function payOrder(Request $request)
    {
        // Validation
        $request->validate([
            'order_id' => 'required'
        ]);

        $order_data = Order::findOrFail($request->order_id);

        if(!isset($order_data) || $order_data == NULL || !Auth::check() || $order_data->user_id != Auth::user()->id){
            echo 'error'; exit;
        }

        // Check user exiss pamrnt method or no
        $curl = curl_init('https://merchant.revolut.com/api/1.0/customers/'.Auth::user()->card_data.'/payment-methods');
        $curl_post_data = array(
            "only_merchant"=> true,
        );

        // var_dump(json_encode($curl_post_data)); exit;
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer sk_tCm9Tqxknm0jnG4c1wzKEPUdUP8-0XRCGB6bLfzLA9ZexKUAkYyFzz1q7rSFOtE0',
            'Accept: */*',
            'Accept-Encoding: gzip, deflate, br'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
        $curl_response = curl_exec($curl);

        // curl_close($curl);
        $decoded = json_decode($curl_response);

        $curl = curl_init('https://merchant.revolut.com/api/1.0/orders');
        $curl_post_data = array(
                // "amount"=> floatval(getWorkerAndIncomePrice($order_data->price, $order_data->material_price, $order_data->has_tax)) * intval(100),
                "amount" => 100,
                "capture_mode"=> "AUTOMATIC",
                "merchant_order_ext_ref"=>"Order",
                "email"=> Auth::user()->email,
                "currency"=> strtoupper('EUR')
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer sk_tCm9Tqxknm0jnG4c1wzKEPUdUP8-0XRCGB6bLfzLA9ZexKUAkYyFzz1q7rSFOtE0',
            'Accept: */*',
            'Accept-Encoding: gzip, deflate, br'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
        $curl_response = curl_exec($curl);

        $orderdecoded = json_decode($curl_response);

        // check user card data
        if(isset(Auth::user()->card_data) && Auth::user()->card_data != NULL){ // Exists user
            return response()->json($orderdecoded); exit;
        }else{
            echo 'error'; exit;
        }
    }

    public function set_status(Request $request){
        // Validation
        $request->validate([
            'order_id' => 'required'
        ]);

        $order = Order::findOrFail($request->order_id);

        if(!isset($order) || $order == NULL || $order->type != 2){
            // return redirect()->route('home', ['locale' => app()->getLocale()]);
            echo 'error'; exit;
        }else{
            $order->type = 4;
            $order->save();
            // return redirect()->route('account', ['locale' => app()->getLocale()]);
            echo 1; exit;
        }
    }

    public function card_verify(Request $request){
        $curl = curl_init('https://merchant.revolut.com/api/1.0/customers');

        $curl_post_data = array(
                'full_name' => Auth::user()->name,
                'business_name' => "VIKTOIRE A.S. LTD",
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone
        );

        // var_dump(json_encode($curl_post_data)); exit;
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer sk_tCm9Tqxknm0jnG4c1wzKEPUdUP8-0XRCGB6bLfzLA9ZexKUAkYyFzz1q7rSFOtE0',
            // 'Authorization: Bearer sk_iDmkjMCkQ7thzJEvzZNcvTSndUqnVCpuMHOuQ0wmxGoFMk6O6axC7v30YmDFjPN9',
            'Accept: */*',
            'Accept-Encoding: gzip, deflate, br'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
        $curl_response = curl_exec($curl);

        // curl_close($curl);
        $decoded = json_decode($curl_response);

        // Get card data
        $card_data = $decoded->id;

        $user = User::findOrFail(Auth::user()->id);
        $user->card_data = $card_data;
        $user->save();

        return redirect()->route('account', ['locale' => app()->getLocale()]);
    }
}






