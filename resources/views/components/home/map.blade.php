@if(isset($map) && $map != null)
  <div class="container mt-5">
    <div class="row align-items-center">
        <h3 class="w-100 text-center mb-5">{{ $map->{'title_'.app()->getLocale()} }}</h3>
        <div class="col-lg-8 mb-5">
          <div class="row">
           <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-1') }}</h4>
             <ul>
               <li>{{ translating('city-1') }}</li>
               <li>{{ translating('city-2') }}</li>
             </ul>
           </div>

           <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-2') }}</h4>
             <ul>
               <li>{{ translating('city-4') }}</li>
               <li>{{ translating('city-5') }}</li>
             </ul>
           </div>

           <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-3') }}</h4>
             <ul>
               <li>{{ translating('city-6') }}</li>
               <li>{{ translating('city-7') }}</li>
               <li>{{ translating('city-8') }}</li>
               <li>{{ translating('city-9') }}</li>
               <li>{{ translating('city-10') }}</li>
             </ul>
           </div>

           <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-4') }}</h4>
             <ul>
               <li>{{ translating('city-11') }}</li>
               <li>{{ translating('city-12') }}</li>
               <li>{{ translating('city-13') }}</li>
               <li>{{ translating('city-14') }}</li>
               <li>{{ translating('city-15') }}</li>
               <li>{{ translating('city-16') }}</li>
             </ul>
           </div>

            <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-5') }}</h4>
             <ul>
               <li>{{ translating('city-17') }}</li>
               <li>{{ translating('city-18') }}</li>
               <li>{{ translating('city-19') }}</li>
               <li>{{ translating('city-20') }}</li>
             </ul>
           </div>

            <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-6') }}</h4>
             <ul>
                <li>{{ translating('city-21') }}</li>
               <li>{{ translating('city-22') }}</li>
               <li>{{ translating('city-23') }}</li>
               <li>{{ translating('city-24') }}</li>
             </ul>
           </div>

           <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-7') }}</h4>
             <ul>
               <li>{{ translating('city-25') }}</li>
             </ul>
           </div>

           <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-8') }}</h4>
             <ul>
               <li>{{ translating('city-26') }}</li>
             </ul>
           </div>

           <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-9') }}</h4>
             <ul>
               <li>{{ translating('city-27') }}</li>
             </ul>
           </div>

           <div class=" col-lg-4">
             <h4 style="color: #F8EB34;">{{ translating('city-title-10') }}</h4>
             <ul>
               <li>{{ translating('city-28') }}</li>
             </ul>
           </div>
           
          </div>
        </div>
        <div class="col-lg-4 mb-5">
            <img src="{{ $image_path }}/map/{{ $map->map }}" class="w-100 rounded responsive">        
        </div>
    </div>    
  </div>
@endif