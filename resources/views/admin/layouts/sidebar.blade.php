<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu" id="sidebarNav">
            <li class="nav-static-title">Dashboard</li>

            <!-- Orders -->
            <li><a href="{{ route('orders-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-check"></i> <span class="nav-title">Orders</span>   
                <span class="nav-label label label-primary">{{ $orders_count }}</span>
            </a></li>

            <!-- Phone Numbers -->
            <li><a href="{{ route('phone-numbers-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-phone"></i> <span class="nav-title">Phone Numbers</span>   
                <span class="nav-label label label-primary">{{ 'x' }}</span>
            </a></li>

            <!-- Slider -->
            <li><a href="{{ route('slider-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-image"></i> <span class="nav-title">Slider</span>                
                <span class="nav-label label label-primary">{{ $slider_count }}</span>
            </a> </li>

            <!-- Services -->
            <li><a href="{{ route('services-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-settings"></i> <span class="nav-title">Services</span>                
                <span class="nav-label label label-primary">{{ $services_count }}</span>
            </a> </li>

            <!-- Services Items -->
            <li><a href="{{ route('services-items-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-settings"></i> <span class="nav-title">Services Items</span>                
                <span class="nav-label label label-primary">{{ $services_items_count }}</span>
            </a> </li>

            <!-- Cities -->
            <li><a href="{{ route('cities-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-view-list"></i> <span class="nav-title">Cities</span> 
                <span class="nav-label label label-primary">{{ $cities_count }}</span>
            </a> </li>


            <!-- Map Section -->
            <li><a href="{{ route('map-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-map-alt"></i> <span class="nav-title">Map Section</span>                
                <span class="nav-label label label-primary">{{ '1' }}</span>
            </a> </li>

            <!-- Users -->
            <li><a href="{{ route('users-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-user"></i> <span class="nav-title">Users</span>                
                <span class="nav-label label label-primary">{{ $users_count }}</span>
            </a> </li>

            <!-- Site Datas -->
            <li><a href="{{ route('site-data-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-world"></i> <span class="nav-title">Site Datas</span>                
                <span class="nav-label label label-primary">1</span>
            </a> </li>

            <!-- Footer Links -->
            <li><a href="{{ route('footer-links-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-link"></i> <span class="nav-title">Footer Links</span>                
                <span class="nav-label label label-primary">{{ $footer_links_count }}</span>
            </a> </li>

            <!-- Меssages -->
            <li><a href="{{ route('messages-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-email"></i> <span class="nav-title">Меssages</span>                
                <span class="nav-label label label-primary">{{ $messages_count }}</span>
            </a> </li>

            <!-- Menu -->
            <li><a href="{{ route('menu-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-menu"></i> <span class="nav-title">Menu</span>                
                <span class="nav-label label label-primary">{{ $menu_count }}</span>
            </a> </li>

            <!-- Social Accounts -->
            <li><a href="{{ route('social-accounts-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-sharethis"></i> <span class="nav-title">Social Accounts</span>                
                <span class="nav-label label label-primary">{{ $social_accounts_count }}</span>
            </a> </li>

            <!-- Contact Datas -->
            <li><a href="{{ route('contact-data-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-map-alt"></i> <span class="nav-title">Contact Datas</span>                
                <span class="nav-label label label-primary">{{ $contact_datas_count }}</span>
            </a> </li>

            <!-- About Us Section -->
            <li><a href="{{ route('about-us-description-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-info"></i><span class="nav-title">About Us</span>
                <span class="nav-label label label-primary">1</span>
            </a></li>

            <!-- Card Data -->
            <li><a href="{{ route('card-datas-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-info"></i><span class="nav-title">Card Data</span>
                <span class="nav-label label label-primary">1</span>
            </a></li>

            <!-- Years of Experiance -->
            <li><a href="{{ route('years-of-experiance-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-timer"></i><span class="nav-title">Years of Experiance</span>
                <span class="nav-label label label-primary">1</span>
            </a></li>
            
            <!-- Terms and Conditions -->
            <li><a href="{{ route('privacy-policy-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-lock"></i> <span class="nav-title">Terms and Cond.</span>                
                <span class="nav-label label label-primary">1</span>
            </a> </li>

             <li><a href="{{ route('politique-confidenalite-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-lock"></i> <span class="nav-title">Privacy Policy</span>                
                <span class="nav-label label label-primary">1</span>
            </a> </li>  

             <li><a href="{{ route('cookie-policy-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-lock"></i> <span class="nav-title">Cookie Policy</span>                
                <span class="nav-label label label-primary">1</span>
            </a> </li>  

             <li><a href="{{ route('code-de-conduite-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-lock"></i> <span class="nav-title">Code De Conduite</span>                
                <span class="nav-label label label-primary">1</span>
            </a> </li>  

            <!-- Translations -->
            <li><a href="{{ route('translations-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-world"></i> <span class="nav-title">Translations</span>                
                <span class="nav-label label label-primary">{{ $translations_count }}</span>
            </a> </li>

            <!-- SEO -->
            <li><a href="{{ route('seo-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-dashboard"></i> <span class="nav-title">SEO</span>                
             <span class="nav-label label label-primary">{{ $seo_count }}</span>
            </a> </li>
            
            <!-- Personal Links -->
            <li class="nav-static-title">Personal</li>

            <!-- Admin Setting -->
            <li><a href="{{ route('profile-admin-index', ['locale' => app()->getLocale()]) }}" aria-expanded="false"><i class="nav-icon ti ti-key"></i> <span class="nav-title">Admin Settings</span></a> </li>

            <!-- Copyright -->
           
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>