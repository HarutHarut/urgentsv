<?php
use App\Translations;
use App\Order;
use App\Cities;
use App\User;

function translating($selector){
     // Translations
    $translation = Translations::where(['locale' => app()->getLocale(), 'selector' => $selector])->first();

    // Search result validation
    if (!empty($translation) && $translation != NULL){
        // True value
        return $translation->translation;
    }else{
        // Selector value
      return $selector;
    }
}

function formatDate($datetime){
    // Empty value
    if(empty($datetime) || $datetime == '0'){
        return 'Datetime';
    }else{
        // Make array
        $data_time_arr = explode(' ', $datetime);
        
        // Get date data
        $date_arr = explode('-', $data_time_arr[0]);

        // Get day
        $day_to_time = strtotime($data_time_arr[0]);

        // Return data
        return translating('month-'.$date_arr[1]).' '.$date_arr[2].', '.$date_arr[0];
    }    
}

function getTaxPrice($price, $has_tax){
    // Get price without tax 
    if($has_tax == 0){
        $tax_price = 0;
    }else{
        $tax_price = floatval( floatval($price) / floatval(100)) * floatval(10);
    }

    // Return price
    return floatval($tax_price);
}

function getTotalWithoutTaxPrice($price, $has_tax){
    // Get price without tax 
    if($has_tax == 0){
        $tax_price = 0;
    }else{
        $tax_price = floatval( floatval($price) / floatval(100)) * floatval(10);
    }

    // Get total price
    $total_price = floatval(floatval($price));

    // Get without tax price
    $without_tax_price  = floatval(floatval($total_price) - floatval($tax_price));

    // Return price
    return floatval($without_tax_price);
}

function getWorkerAndIncomePrice($price, $material_price, $has_tax = 1){
    // Get price without tax 
    if($has_tax == 0){
        $tax_price = 0;
    }else{
        $tax_price = floatval( floatval($price) / floatval(100)) * floatval(10);
    }

    // Get total price
    $total_price = floatval(floatval($price));

    // Get material price
    $material_price = floatval(floatval($material_price));

    // Get without tax price
    $without_tax_price  = floatval(floatval($total_price) - floatval($tax_price));

    // Get worker price
    $worker_and_income_price = floatval((floatval($without_tax_price)  - floatval($material_price)) / floatval(2));

    // Return price
    return floatval($worker_and_income_price);
}

function getUserIncome($user_id){
    // Get orders
    $orders = Order::where('user_id', $user_id)->get();

    // Make income
    $income = 0;
    
    // Loop from orders
    foreach($orders as $order){
        // Get price without tax 
        if($order->has_tax == 0){
            $tax_price = 0;
        }else{
            $tax_price = floatval( floatval($order->price) / floatval(100)) * floatval(10);
        }

        // Get total price
        $total_price = floatval(floatval($order->price));

        // Get materoial price
        $material_price = floatval(floatval($order->material_price));
        
        // Get without tax price
        $without_tax_price  = floatval(floatval($total_price) - floatval($tax_price));

        // Get worker price
        $worker_and_income_price = floatval((floatval($without_tax_price) - floatval($material_price)) / floatval(2));

        // Push price to income
        $income = floatval($income) + floatval($worker_and_income_price);
    }

    // Return income
    return $income;
}


function getCityWeekIncome($city_id){
    // Get city data
    $city = Cities::findOrFail($city_id);

    // Currenct datetime
    $date_time = Date('Y-m-d H:i-s');

    $previous_week = strtotime("-1 week +1 day");

    $start_week = strtotime("last sunday midnight",$previous_week);
    $end_week = strtotime("next saturday",$start_week);

    $start_week = date("Y-m-d H:i:s", $start_week);
    $end_week = date("Y-m-d H:i:s", $end_week);

    // Get orders
    $users = User::with([
        'orders' => function($query) use($end_week, $start_week){
            $query->where('created_at', '>=', $start_week)->where('created_at', '<=', $end_week);
        },
    ])->where('city_id', $city_id)->get();

    // Make income
    $income = 0;
    $count = 0;

    // Loop from users
    foreach ($users as $key => $user) {
        if($user->orders != NULL){
            foreach ($user->orders as $key => $order) {
                $income = floatval($income) + floatval($order->price);
                $count = $count + 1;
            }
        }
    }

    return $income.' '.translating('euro').' | '.$count.' Works';
}

function getCityMonthIncome($city_id){
    // Get city data
    $city = Cities::findOrFail($city_id);

    // Currenct datetime
    $date_time = Date('Y-m-d H:i-s');

    $start_month = date("Y-m-d H:i:s", strtotime('first day of previous month'));
    $end_month = date("Y-m-d H:i:s", strtotime('last day of previous month'));

    // Get orders
    $users = User::with([
        'orders' => function($query) use($end_month, $start_month){
            $query->where('created_at', '>=', $start_month)->where('created_at', '<=', $end_month);
        },
    ])->where('city_id', $city_id)->get();

    // Make income
    $income = 0;
    $count = 0;

    // Loop from users
    foreach ($users as $key => $user) {
        if($user->orders != NULL){
            foreach ($user->orders as $key => $order) {
                $income = floatval($income) + floatval($order->price);
                $count = $count + 1;
            }
        }
    }

    return $income.' '.translating('euro').' | '.$count.' Works';
}

function getCityYearIncome($city_id){
    // Get city data
    $city = Cities::findOrFail($city_id);

    // Currenct datetime
    $date_time = Date('Y-m-d H:i-s');

    $start_year = date("Y-m-d H:i:s", strtotime('last year January 1st'));
    $end_year = date("Y-m-d H:i:s", strtotime('last year December 31st"'));

    // Get orders
    $users = User::with([
        'orders' => function($query) use($end_year, $start_year){
            $query->where('created_at', '>=', $start_year)->where('created_at', '<=', $end_year);
        },
    ])->where('city_id', $city_id)->get();

    // Make income
    $income = 0;
    $count = 0;

    // Loop from users
    foreach ($users as $key => $user) {
        if($user->orders != NULL){
            foreach ($user->orders as $key => $order) {
                $income = floatval($income) + floatval($order->price);
                $count = $count + 1;
            }
        }
    }

    return $income.' '.translating('euro').' | '.$count.' Works';
}


function getCityAllTimeIncome($city_id){
    // Get city data
    $city = Cities::findOrFail($city_id);


    // Get orders
    $users = User::with(['orders'])->where('city_id', $city_id)->get();

    // Make income
    $income = 0;
    $count = 0;

    // Loop from users
    foreach ($users as $key => $user) {
        if($user->orders != NULL){
            foreach ($user->orders as $key => $order) {
                $income = floatval($income) + floatval($order->price);
                $count = $count + 1;
            }
        }
    }

    return $income.' '.translating('euro').' | '.$count.' Works';
}


function getCityTodayIncome($city_id){
    // Get city data
    $city = Cities::findOrFail($city_id);


    // Get orders
    $users = User::with([
        'orders' => function($query){
            $query->where('created_at', '<=', Date('Y-m-d 23:59:59'))->where('created_at', '<=', Date('Y-m-d', strtotime('-1 days')));
        },
    ])->where('city_id', $city_id)->get();

    // Make income
    $income = 0;
    $count = 0;

    // Loop from users
    foreach ($users as $key => $user) {
        if($user->orders != NULL){
            foreach ($user->orders as $key => $order) {
                $income = floatval($income) + floatval($order->price);
                $count = $count + 1;
            }
        }
    }

    return $income.' '.translating('euro').' | '.$count.' Works';
}

function getUserWeekOrder($user_id){
    // Get city data
    $user = User::findOrFail($user_id);

    // Currenct datetime
    $date_time = Date('Y-m-d H:i-s');

    $previous_week = strtotime("-1 week +1 day");

    $start_week = strtotime("last sunday midnight",$previous_week);
    $end_week = strtotime("next saturday",$start_week);

    $start_week = date("Y-m-d H:i:s", $start_week);
    $end_week = date("Y-m-d H:i:s", $end_week);

    // Get orders
    $orders = Order::where('created_at', '>=', $start_week)->where('created_at', '<=', $end_week)->where('user_id', $user_id)->get();

    // Make income
    $income = 0;
    $count = 0;
    $material_price = 0;

    // Loop from users
    foreach ($orders as $key => $order) {
        $income = floatval($income) + floatval($order->price);
        $count = $count + 1;
        $material_price = floatval($material_price) + floatval($order->material_price);
    }

    return $income.' ( ~ '.getWorkerAndIncomePrice($income, $material_price).' )'.translating('euro').' | '.$count.' Works';
}

function getUserMonthOrder($user_id){
    // Get order data
    $user = User::findOrFail($user_id);

    // Currenct datetime
    $date_time = Date('Y-m-d H:i-s');

    $start_month = date("Y-m-d H:i:s", strtotime('first day of previous month'));
    $end_month = date("Y-m-d H:i:s", strtotime('last day of previous month'));

    // Get orders
    $orders = Order::where('created_at', '>=', $start_month)->where('created_at', '<=', $end_month)->where('user_id', $user_id)->get();

    // Make income
    $income = 0;
    $count = 0;
    $material_price = 0;

    // Loop from users
    foreach ($orders as $key => $order) {
        $income = floatval($income) + floatval($order->price);
        $count = $count + 1;
        $material_price = floatval($material_price) + floatval($order->material_price);
    }

    return $income.' ( ~ '.getWorkerAndIncomePrice($income, $material_price).' )'.translating('euro').' | '.$count.' Works';
}

function getUserYearOrder($user_id){
    // Get city data
    $user = User::findOrFail($user_id);

    // Currenct datetime
    $date_time = Date('Y-m-d H:i-s');

    $start_year = date("Y-m-d H:i:s", strtotime('last year January 1st'));
    $end_year = date("Y-m-d H:i:s", strtotime('last year December 31st"'));

    // Get orders
    $orders = Order::where('created_at', '>=', $start_year)->where('created_at', '<=', $end_year)->where('user_id', $user_id)->get();

    // Make income
    $income = 0;
    $count = 0;
    $material_price = 0;

    // Loop from users
    foreach ($orders as $key => $order) {
        $income = floatval($income) + floatval($order->price);
        $count = $count + 1;
        $material_price = floatval($material_price) + floatval($order->material_price);
    }

    return $income.' ( ~ '.getWorkerAndIncomePrice($income, $material_price).' )'.translating('euro').' | '.$count.' Works';
}


function getUserTodayIncome($user_id){
    // Get city data
    $user = User::findOrFail($user_id);

    // Get orders
    $orders = Order::where('created_at', '<=', Date('Y-m-d 23:59:59'))->where('created_at', '<=', Date('Y-m-d', strtotime('-1 days')))->where('user_id', $user_id)->get();

    // Make income
    $income = 0;
    $count = 0;
    $material_price = 0;

    // Loop from users
    foreach ($orders as $key => $order) {
        $income = floatval($income) + floatval($order->price);
        $count = $count + 1;
        $material_price = floatval($material_price) + floatval($order->material_price);
    }

    return $income.' ( ~ '.getWorkerAndIncomePrice($income, $material_price).' )'.translating('euro').' | '.$count.' Works';
}

function getUserAllTimeIncome($user_id){
    // Get city data
    $user = User::findOrFail($user_id);

    // Get orders
    $orders = Order::where('user_id', $user_id)->get();

    // Make income
    $income = 0;
    $count = 0;
    $material_price = 0;

    // Loop from users
    foreach ($orders as $key => $order) {
        $income = floatval($income) + floatval($order->price);
        $count = $count + 1;
        $material_price = floatval($material_price) + floatval($order->material_price);
    }

    return $income.' ( ~ '.getWorkerAndIncomePrice($income, $material_price).' )'.translating('euro').' | '.$count.' Works';
}


function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}