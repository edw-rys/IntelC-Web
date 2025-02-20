/*---------------------------------------------
Template name:  VPNet
Version:        1.0
Author:         ThemeLooks
Author url:     http://themelooks.com

NOTE:
------
Please DO NOT EDIT THIS JS, you may need to use "custom.js" file for writing your custom js.
We may release future updates so it will overwrite this file. it's better and safer to use "custom.js".

[Table of Content]

01: Main menu
02: Movable image
03: Background image
04: Parsley form validation
05: Smooth scroll for comment reply
06: Pricing slider
07: Review slider
08: Video popup
09: Back to top button
10: Changing SVG(image) color
11: Typed JS
12: Preloader
13: Content animation

----------------------------------------------*/


(function($) {
    "use strict";
    $(function() {

        // FontAwesomeConfig = { searchPseudoElements: true };

        /* 01: Main menu
        ==============================================*/

        $('.header-menu a[href="#"]').on('click', function(event) {
            event.preventDefault();
        });

        $(".header-menu").menumaker({
            title: '<i class="fas fa-bars"></i>',
            format: "multitoggle"
        });

        var mainHeader = $('.main-header');

        if (mainHeader.length) {
            var sticky = new Waypoint.Sticky({
                element: mainHeader[0]
            });
        }


        /* 02: Movable image
        ==============================================*/

        var moveableImage = $('.banner-image');

        if (moveableImage.length) {
            var parallaxImage = new Parallax(moveableImage[0]);
        }


        /* 03: Background image
        ==============================================*/

        var bgImg = $('[data-bg-img]');

        bgImg.css('background', function() {
            return 'url(' + $(this).data('bg-img') + ') center top';
        });


        /* 04: Parsley form validation
        ==============================================*/

        $('form').parsley();


        /* 05: Smooth scroll for comment reply
        ==============================================*/

        var $commentContent = $('.comment-content > a');

        $commentContent.on('click', function(event) {
            event.preventDefault();
            var $target = $('.comment-form');

            if ($target.length) {
                $('html, body').animate({
                    scrollTop: $target.offset().top - 120
                }, 500);

                $target.find('textarea').focus();
            }
        });


        /* 06: Pricing slider
        ==============================================*/

        var pricingSlider = new Swiper('.pricing-slider', {
            slidesPerView: 3,
            loop: true,
            centeredSlides: true,
            spaceBetween: 2,
            allowTouchMove: false,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            pagination: {
                el: '.pricing-pagination',
                clickable: true,
            },
            breakpoints: {
                // when window width is <= 575px
                575: {
                    slidesPerView: 1
                }
            }
        });


        /* 07: Review slider
        ==============================================*/

        var reviewSlider = new Swiper('.review-slider', {
            slidesPerView: 3,
            spaceBetween: 30,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            pagination: {
                el: '.review-pagination',
                clickable: true,
            },
            breakpoints: {
                // when window width is <= 575px
                575: {
                    slidesPerView: 1
                },
                // when window width is <= 991px
                991: {
                    slidesPerView: 2
                }
            }
        });


        /* 08: Video popup
        ==============================================*/

        var $youtubePopup = $('.youtube-popup');

        if ($youtubePopup.length) {

            $youtubePopup.magnificPopup({
                type: 'iframe'
            });
        }


        /* 09: Back to top button
        ==============================================*/

        var $backToTopBtn = $('.back-to-top');

        if ($backToTopBtn.length) {
            var scrollTrigger = 400, // px
                backToTop = function() {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $backToTopBtn.addClass('show');
                    } else {
                        $backToTopBtn.removeClass('show');
                    }
                };

            backToTop();

            $(window).on('scroll', function() {
                backToTop();
            });

            $backToTopBtn.on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }


        /* 10: Changing svg color
        ==============================================*/

        jQuery('img.svg').each(function() {
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Check if the viewport is set, else we gonna set it if we can.
                if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
                }

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');
        });


        /* 11: Typed JS
        ==============================================*/

        var typedElement = '.typed',
            typedTarget = $(typedElement);

        if (typedTarget.length) {
            var typed = new Typed(typedElement, {
                strings: ['Comience su negocio con nosotros.', 'Prepárate para obtener la mejor velocidad de internet!'],
                typeSpeed: 50,
                backSpeed: 10,
                loop: true
            });
        }

        var typedElementSecond = '.typed-second',
            typedTargetSecond = $(typedElementSecond);

        if (typedTargetSecond.length) {
            var typed = new Typed(typedElementSecond, {
                strings: ['Responsive.', 'Retina Ready.', 'Bootstrap 4 Supported.'],
                typeSpeed: 50,
                backSpeed: 10,
                loop: true
            });
        }
    });


    /* 12: Preloader
    ==============================================*/

    $(window).on('load', function() {

        function removePreloader() {
            var preLoader = $('.preLoader');
            preLoader.fadeOut();
        }
        setTimeout(removePreloader, 250);
    });


    /* 13: Content animation
    ==============================================*/

    $(window).on('load', function() {

        var $animateEl = $('[data-animate]');

        $animateEl.each(function() {
            var $el = $(this),
                $name = $el.data('animate'),
                $duration = $el.data('duration'),
                $delay = $el.data('delay');

            $duration = typeof $duration === 'undefined' ? '0.6' : $duration;
            $delay = typeof $delay === 'undefined' ? '0' : $delay;

            $el.waypoint(function() {
                $el.addClass('animated ' + $name)
                    .css({
                        'animation-duration': $duration + 's',
                        'animation-delay': $delay + 's'
                    });
            }, { offset: '93%' });
        });
    });

})(jQuery);