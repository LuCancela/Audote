(function($) {
    "use strict";

    var animateHTML = function() {
        var elems;
        var windowHeight;

        function init() {
            elems = document.querySelectorAll('.animate-in');
            windowHeight = window.innerHeight;
            addEventHandlers();
            checkPosition();
        }

        function addEventHandlers() {
            window.addEventListener('scroll', checkPosition);
            window.addEventListener('resize', init);
        }

        function checkPosition() {
            for (var i = 0; i < elems.length; i++) {
                var positionFromTop = elems[i].getBoundingClientRect().top;

                if (positionFromTop - windowHeight <= 0) {
                    elems[i].classList.add('in');
                    if ($(elems[i]).hasClass('info-stats-item')) {
                        animateBubbles(elems[i]);
                    }
                    if ($(elems[i]).hasClass('testimonials-1-circles-item')) {
                        animateTestimonialsCircles(elems[i]);
                    }
                }
            }
        }

        return {
            init: init
        };
    };

    function windowResizeHandler() {
        resizeHeroBoxedCirculars();
    }

    function onContentScroll() {
        if ($('.header').hasClass('bigger') || $('.header').hasClass('no-bg')) {
            if (window.pageYOffset > 20) {
                $('.header').addClass('is-sticky');
            } else {
                $('.header').removeClass('is-sticky');
            }
        } else if ($('.header').hasClass('no-bg')) {
            if (window.pageYOffset > 0) {
                $('.header').addClass('is-sticky');
            } else {
                $('.header').removeClass('is-sticky');
            }
        } else {
            if (window.pageYOffset > 93) {
                $('.header').addClass('is-sticky');
            } else {
                $('.header').removeClass('is-sticky');
            }
        }
    }

    window.onscroll = function() {
        onContentScroll();
    };

})(jQuery);
