(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('bg-primary shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('bg-primary shadow-sm').css('top', '-150px');
        }
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        smartSpeed: 1000,
        dots: true,
        loop: true,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });

    // GTM Tracking Functions
    window.gtmTrack = {
        // Track page view
        pageView: function(pageTitle, pageUrl) {
            if (typeof dataLayer !== 'undefined') {
                dataLayer.push({
                    'event': 'page_view',
                    'page_title': pageTitle,
                    'page_url': pageUrl || window.location.href,
                    'page_type': 'page'
                });
            }
        },

        // Track custom event
        event: function(eventName, eventData) {
            if (typeof dataLayer !== 'undefined') {
                dataLayer.push({
                    'event': eventName,
                    ...eventData
                });
            }
        },

        // Track product view
        productView: function(productId, productName, category, price) {
            this.event('product_view', {
                'product_id': productId,
                'product_name': productName,
                'category': category,
                'price': price,
                'currency': 'USD'
            });
        },

        // Track product click
        productClick: function(productId, productName, category, position) {
            this.event('product_click', {
                'product_id': productId,
                'product_name': productName,
                'category': category,
                'position': position
            });
        },

        // Track form submission
        formSubmit: function(formName, formData) {
            this.event('form_submit', {
                'form_name': formName,
                'form_data': formData
            });
        },

        // Track button click
        buttonClick: function(buttonName, buttonLocation) {
            this.event('button_click', {
                'button_name': buttonName,
                'button_location': buttonLocation
            });
        }
    };

    // Auto-track product clicks
    $(document).on('click', '.product-card', function() {
        var $card = $(this);
        var productName = $card.find('.product-title').text();
        var productId = $card.data('product-id') || 'unknown';
        var category = $card.data('category') || 'unknown';
        var position = $card.index() + 1;

        window.gtmTrack.productClick(productId, productName, category, position);
    });

    // Auto-track form submissions
    $(document).on('submit', 'form', function() {
        var $form = $(this);
        var formName = $form.attr('id') || $form.attr('class') || 'unknown_form';
        var formData = {};

        $form.find('input, select, textarea').each(function() {
            var $field = $(this);
            if ($field.attr('name')) {
                formData[$field.attr('name')] = $field.val();
            }
        });

        window.gtmTrack.formSubmit(formName, formData);
    });

})(jQuery);

