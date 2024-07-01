<div class="call-now-button" style="margin-top: 100px;">
@if(isset($user_number))
    <img class="d-inline-block" src="{{ $image_path }}/icon/phone.png" alt="{{ translating('phone') }}">
    <a class="d-inline-block ml-2" href="tel: {{ $user_number }}"> {{ $user_number }}</a>
@endif
</div>