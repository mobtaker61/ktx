@if(App\Helpers\GtmHelper::isEnabled())
    @if(isset($event))
        {!! App\Helpers\GtmHelper::pushCustomEvent($event, $data ?? []) !!}
    @else
        {!! App\Helpers\GtmHelper::pushPageView($pageTitle ?? null, $pageUrl ?? null) !!}
    @endif
@endif
