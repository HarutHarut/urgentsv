<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Menu;
use App\SocialAccounts;
use App\ContactDatas;
use App\SiteData;
use App\FooterLinks;
use Illuminate\Support\Facades\Hash;
use App\Services;
use Illuminate\Support\Facades\Auth;
use App\Seo;
use App\User;
use App\PhoneNumbers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/fr/account';

    // Localizations
    public static $locales = [ 'fr', 'en', 'ru' ];

    // Forget Password
    public function forget_password(Request $request, $locale = 'hy'){
        // Get data from middleware
        $data = $request->data;

        // Validation
        $request->validate([
            'email' => 'email:rfc,dns'
        ]);

        // Make session user email
        $request->session()->put('user_email', md5($request->email));

        // Content
        // $body = view('email-tamplates.messaege-to-admin')->with('data', $data)->render();
        $body = '
            <html>
                <body>
                    <h1>Reset Your Email</h1>
                    <a href="'.route('reset-password', ['locale' => app()->getLocale(), 'email' => $request->session()->get('user_email')]).'"></a>
                </body>
            </html>
        ';

        // Headers settings
        $headers = '';
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$data['private_email'] . "\r\n";
        $headers .= 'Cc: '.$data['private_email']."\r\n";

        // Sending to admin process
        // $send_adimn = mail($data['private_email'], translating('email-confirm'), $body, $headers);

        dd($body);
        // Redirect to login
        return redirect()->route('login', ['locale' => app()->getLocale()]);
    }

    // Forget Password
    public function reset_password(Request $request, $locale = 'hy', $email = null){
        // Get data from middleware
        $data = $request->data;

        // Validation
        if($email == null){
            // Redirect to login
            return redirect()->route('login', ['locale' => app()-getLocae()]);
        }

        // Validation
        if($request->session()->get('user_email') == $email){
            // Get seo data
            $seo = Seo::where('page', 'reset-password')->first();

            // Push data
            $data['seo'] = $seo;

            // Send data to view
            return view('pages.account.reset')->with($data);
        }else{
            // Redirect to login
            return redirect()->route('login', ['locale' => app()->getLocale()]);
        }
    }

    // Forget Password
    public function reset_password_update(Request $request, $locale = 'hy'){
        // Get data from middleware
        $data = $request->data;

        // Validation
        $request->validate([
            'new_password' => 'required',
            'new_password_confirm' => 'required'
        ]);

        // Get all users
        $users = User::get();

        // Loop from users
        foreach($users as $user_id){
            if(md5($user_id->email) == $request->session()->get('user_email')){
                $user = $user_id;
            }
        }

        // Validation
        if(!isset($user) || $user == null){
            // Make Session
            $request->session()->put('error_password', 'error_password');

            // Redirect Error
            return redirect()->back()->with('error','error');
        }

        // Get user data before update
        $user_data = array(
            'id' => $user->id,
            'name' => $user->name,
            'job_title' => $user->job_title,
            'email' => $user->email,
            'confirm' => $user->confirm,
            'phone' => $user->phone,
            'img' => $user->img,
        );

        // User validation
        if($request->new_password === $request->new_password_confirm){
            // Delete User
            User::findOrFail($user_data['id'])->delete();

            // Make user update
            $new_user = new User;
            $new_user->id = $user_data['id'];
            $new_user->name = $user_data['name'];
            $new_user->job_title = $user_data['job_title'];
            $new_user->email = $user_data['email'];
            $new_user->confirm = $user_data['confirm'];
            $new_user->phone = $user_data['phone'];
            $new_user->img = $user_data['img'];
            $new_user->password = Hash::make($request->new_password);
            $new_user->llc = md5($request->new_password);

            // Save user
            $new_user->save();

            // Log out
            Auth::logout();

            // Clear sessions
            $request->session()->forget('user_id');

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
    }


    public function showLoginForm(Request $request)
    {
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
        $seo = Seo::where('page', 'login')->first();

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
            'seo' => $seo,
            'user_number' => $user_number,
//            'image_path' => '/public/assets/img',
            'image_path' => '/assets/img',
            'private_email' => 'manch.asatryan2020@gmail.com',
        );

        // Send data to controller
        return view('auth.login')->with($data);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
