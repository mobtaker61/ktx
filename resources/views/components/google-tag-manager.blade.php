@if(config('gtm.enabled') && config('gtm.id'))
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ config('gtm.id') }}"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', '{{ config('gtm.id') }}');
</script>
<!-- End Google tag (gtag.js) -->
@endif
