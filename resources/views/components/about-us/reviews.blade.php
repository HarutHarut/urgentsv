@if(isset($reviews) && count($reviews) > 0)
<!-- client-Area Start-->
<section class="client-area pd-top-88 pd-bottom-100 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2 class="text-white">{{ translating('what-say-clients-title') }}</h2>
                    <p class="text-white">{{ translating('what-say-clients-description') }}</p>
                </div>                    
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($reviews as $review)
            <div class="col-lg-4 col-sm-6">
                <div class="single-client-inner">
                    <div class="thumb">
                        <img src="{{ $image_path }}/client/{{ $review->img }}" alt="{{ $review->{'name_'.app()->getLocale()} }}">
                    </div>
                    <h4><a href="javascrit:void(0)">{{ $review->{'name_'.app()->getLocale()} }}</a></h4>
                    <p>{{ $review->{'description_'.app()->getLocale()} }}</p>
                    <div class="star-ratting">
                        @for($i=0; $i<$review->rate; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>      
</section>
<!-- client-Area End--> 
@endif