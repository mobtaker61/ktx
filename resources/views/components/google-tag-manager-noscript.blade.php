@if(config('gtm.enabled') && config('gtm.id'))
<!-- Google tag (gtag.js) noscript -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('gtm.id') }}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google tag (gtag.js) noscript -->
@endif
