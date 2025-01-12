document.addEventListener('DOMContentLoaded', () => {
    jQuery(document).ready(function ($) {
        const owl = $('#carousel-1');
    
        // Initialize Owl Carousel
        owl.owlCarousel({
            loop: false, // Ensure the carousel does not loop
            margin: 20,
            nav: true, // Enable default nav buttons
            navText: ["", ""], // Hide default nav button content
            responsive: {
                0: {
                    items: 1,
                    margin: 10,
                },
                576: {
                    items: 2
                },
                1024: {
                    items: 3
                }
            }
        });
    
        // Hide Owl Carousel's default navigation buttons
        $('.owl-nav').hide();
    
        // Custom navigation
        $('#next-1').click(function () {
            if (!$(this).hasClass('disabled')) {
                owl.trigger('next.owl.carousel');
            }
        });
    
        $('#prev-1').click(function () {
            if (!$(this).hasClass('disabled')) {
                owl.trigger('prev.owl.carousel');
            }
        });
    
        // Update custom navigation buttons' disabled state
        owl.on('changed.owl.carousel', function (event) {
            const totalItems = event.item.count; // Total number of items
            const currentIndex = event.item.index; // Current index
    
            // Update "Prev" button state
            if (currentIndex === 0) {
                $('#prev-1').addClass('disabled');
            } else {
                $('#prev-1').removeClass('disabled');
            }
    
            // Update "Next" button state
            if (currentIndex + event.page.size >= totalItems) {
                $('#next-1').addClass('disabled');
            } else {
                $('#next-1').removeClass('disabled');
            }
        });
    
        // Trigger initial check for button state
        owl.trigger('changed.owl.carousel');
    });
});