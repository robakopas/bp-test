(function ($) {
    "use strict";
    jQuery(document).ready(function ($) {
        // Function to detect if an element is scrolled into view
        function isScrolledIntoView(elem) {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();

            var elemTop = $(elem).offset().top;
            var elemBottom = elemTop + $(elem).height();

            return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
        }

        // Function to check and add animation class
        function checkAndAddAnimationClass() {
            $('.animated').each(function () {
                if (isScrolledIntoView(this)) {
                    $(this).addClass('animation');
                }
            });
        }

        // Initial check on page load
        $(window).on('load', checkAndAddAnimationClass);

        // Check on scroll
        $(window).scroll(function () {
            checkAndAddAnimationClass();
        });
    });
}(jQuery));