@if(App\Helpers\RecaptchaHelper::isEnabled())
    {!! App\Helpers\RecaptchaHelper::getWidget() !!}
@endif
