;(function($) {
    "use strict";

    /**
     * logo Carousel
     */
    var logoCarousel = function( $scope, $ ) {
        var $_this = $scope.find( '.logo-carousel' );
        var $currentID = '#'+$_this.attr( 'id' ),
            $loop   = $_this.data( 'loop' ),
            $dots   = $_this.data( 'dots' ),
            $navs   = $_this.data( 'navs' ),
            $margin   = $_this.data( 'margin' );

        var owl = $( $currentID );
        owl.owlCarousel({
            loop: $loop,
            margin: $margin,
            nav: $navs,
            dots: $dots,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/myewpricing-logo-carousel-id.default', logoCarousel);
    });
})(jQuery);