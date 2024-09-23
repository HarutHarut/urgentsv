<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Slider;
use App\ServicesItems;
use App\Menu;
use App\SocialAccounts;
use App\ContactDatas;
use App\SiteData;
use App\FooterLinks;
use App\Services;
use App\Order;
use App\User;
use App\Messages;
use App\TermsAndConditionsItems;
use App\Seo;
use App\Translations;
use App\Cities;
use App\PhoneNumbers;

class Index
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */

    // Localizations
    public static $locales = [ 'fr', 'en', 'ru' ];

    public function handle($request, Closure $next)
    {
        if($request->segment(2) != 'admin'){
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

            // Get service names names
            $services = Services::with('items')->orderBy('position_id', 'desc')->get();

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
                'image_path' => '/public/assets/img',
                // 'image_path' => '/assets/img',
                'private_email' => 'info@intervention-urgence24-7.com',
            );

            // Create request
            $request->data = $data;

            // Send data to controller
            return $next($request);
        }else{
            if(Auth::check()){
                if(Auth::user()->role != 'admin' && Auth::user()->role != 'editor'){
                    return redirect()->route('home', ['locale' => app()->getLocale()]);
                }

                if($request->segment(3) != 'orders' && $request->segment(3) != 'cities'  && $request->segment(3) != 'users' && $request->route()->getName() != 'users-admin-city' && $request->route()->getName() != 'users-admin-city' && Auth::user()->role == 'editor'){
                    return redirect()->route('home', ['locale' => app()->getLocale()]);
                }

                // Get Unreaded Messages
                $unreaded_messages = Messages::where('readed','0')->orderBy('id','desc')->limit(5)->get();

                // Get Unreaded Orders
                $unreaded_orders = Order::where('type', 1)->orderBy('id','desc')->limit(5)->get();

                // Get all orders count
                $orders_count = Order::count();

                // Get all slider count
                $slider_count = Slider::count();

                // Get all services count
                $services_count = Services::count();

                // Get all services items count
                $services_items_count = ServicesItems::count();

                // Get all users count
                $users_count = User::count();

                // Get all footer links count
                $footer_links_count = FooterLinks::count();

                // Get all messages count
                $messages_count = Messages::count();

                // Get all menu count
                $menu_count = Menu::count();

                // Get all social accounts count
                $social_accounts_count = SocialAccounts::count();

                // Get all contact datas count
                $contact_datas_count = ContactDatas::count();

                // Get all terms items datas count
                $terms_items_count = TermsAndConditionsItems::count();

                // Get all translations count
                $translations_count = Translations::count();

                // Get all seo count
                $seo_count = Seo::count();

                // Get all cities count
                $cities_count = Cities::count();

                // Make data
                $data = array(
                    'unreaded_messages' => $unreaded_messages,
                    'unreaded_orders' => $unreaded_orders,
                    'orders_count' => $orders_count,
                    'slider_count' => $slider_count,
                    'services_count' => $services_count,
                    'services_items_count' => $services_items_count,
                    'users_count' => $users_count,
                    'footer_links_count' => $footer_links_count,
                    'messages_count' => $messages_count,
                    'menu_count' => $menu_count,
                    'social_accounts_count' => $social_accounts_count,
                    'contact_datas_count' => $contact_datas_count,
                    'terms_items_count' => $terms_items_count,
                    'translations_count' => $translations_count,
                    'seo_count' => $seo_count,
                    'cities_count' => $cities_count,
                    'image_path' => '/public/assets/img',
                    'private_email' => 'info@intervention-urgence24-7.com',
                );

                // Create request
                $request->data = $data;


                // Send data to controller
                return $next($request);
            }else{
                // Redirect 404
                abort('404');
            }
        }
        return $next($request);
    }
}
