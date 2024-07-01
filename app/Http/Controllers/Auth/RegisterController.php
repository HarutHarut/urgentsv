<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Menu;
use App\SocialAccounts;
use App\ContactDatas;
use App\SiteData;
use App\FooterLinks;
use App\Services;
use Illuminate\Support\Facades\Auth;
use App\Seo;
use App\PhoneNumbers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/fr/account';

    // Localizations
    public static $locales = [ 'fr', 'en', 'ru' ];

    public function showRegistrationForm(Request $request)
    {
        // Check login or no
        if(Auth::check()){
            return redirect()->route('account', ['locale' => app()->getLocale()]);
        }

        // Localization
        if(!in_array($request->segment(1), self::$locales)){
            app()->setLocale('fr');
        }else{
            app()->setLocale($request->segment(1));
        }

        // Current localization
        $locale = app()->getLocale();

        // Get social accounts
        $social_accounts = SocialAccounts::orderBy('position_id','asc')->get();

        // Get menu categories
        $menu_items = Menu::orderBy('position_id', 'asc')->get();

        // Get phone numbers data
        $phone_numbers = ContactDatas::where('type', 'phone')->orderBy('position_id', 'desc')->get();

        // Get emails data
        $emails = ContactDatas::where('type', 'email')->orderBy('position_id', 'desc')->get();

        // Get addresses data
        $addresses = ContactDatas::where('type', 'address')->orderBy('position_id', 'desc')->get();

        // Get site datas
        $site_data = SiteData::first();
        
        // Get footer links
        $footer_links = FooterLinks::orderBy('position_id','asc')->get();

        // Get service data
        $services = Services::with('items')->orderBy('position_id', 'desc')->get();

        // Get seo data
        $seo = Seo::where('page', 'register')->first();

        if(!isset($_COOKIE['user_city_code'])) {
                // Check user exiss pamrnt method or no
                $curl = curl_init("http://api.ipstack.com/".$_SERVER['REMOTE_ADDR']."?access_key=b091bc7cd0dc1ee77f3f296db8c60145&format=1");

                // var_dump(json_encode($curl_post_data)); exit;
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Accept: */*',
                    'Accept-Encoding: gzip, deflate, br'
                ));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $curl_response = curl_exec($curl);

                $decoded = json_decode($curl_response);
                
                if(isset($decoded->region_code)){
                    setcookie('user_city_code', $decoded->region_code, time() + (86400 * 30 * 365), "/"); // 86400 = 1 day
                }
                
                if(isset($decoded) && isset($decoded->region_code)){
	                $user_number = PhoneNumbers::where('location', $decoded->region_code)->first();
            	}else{
	                $user_number = NULL;
            	}
            }else{
                $user_number = PhoneNumbers::where('location', $_COOKIE['user_city_code'])->first();
            }

            

            if($user_number == NULL){
                $locc = 'value_'.app()->getLocale();
                $user_number = $phone_numbers->first()->$locc;
            }else{
                $user_number = $user_number->phone;
            }

        // Make data array
        $data = array(
            'locale' => $locale,
            'social_accounts' => $social_accounts,
            'menu_items' => $menu_items,
            'phone_numbers' => $phone_numbers,
            'emails' => $emails,
            'addresses' => $addresses,
            'site_data' => $site_data,
            'footer_links' => $footer_links,
            'services' => $services,
            'user_number' => $user_number,
            'seo' => $seo,
            'image_path' => '/public/assets/img',
            'private_email' => 'info@intervention-urgence24-7@gmail.com',
        );

        // Send data to controller
        return view('auth.register')->with($data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Content
        $body = '
            <html>
                <body>
                    <h1>Email Confirm</h1>
                    <a href="'.route('verify', ['locale' => app()->getLocale(), 'email' => md5($data['email'])]).'">'.translating('confirm').'</a>
                </body>
            </html>
        ';

        // Headers settings
        $headers = '';
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= 'From: '.'info@intervention-urgence24-7.com' . "\r\n";
        $headers .= 'Cc: '.'info@intervention-urgence24-7.com'."\r\n";

        // Sending to admin process
        $send_adimn = mail($data['email'], translating('email-confirm'), $body, $headers);

        $curl = curl_init('https://merchant.revolut.com/api/1.0/customers');

        $curl_post_data = array(
                'full_name' => $data["name"],
                'business_name' => "Intervention Urgance",
                'email' => $data['email'],
                'phone' => $data['phone']
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

        // Get card data
        $card_data = $decoded->id;

        return User::create([
            'name' => $data['name'],
            'job_title' => $data['job_title'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'llc' => md5($data['password']),
            'card_data' => $card_data
        ]);
    }
}

