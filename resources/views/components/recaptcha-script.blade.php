@if(App\Helpers\RecaptchaHelper::isEnabled())
    {!! App\Helpers\RecaptchaHelper::getScript() !!}
@endif
