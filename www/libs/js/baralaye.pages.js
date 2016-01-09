/**
 * Baralaye.com Page functionality
 * @author tech@baralaye.com
 */

(function($){

    Baralaye.Pages = (function() {

        /**
         * Resume Reference display
         * @private
         */
        function showResumeReferences(){
            if (window.location.hash === '#references'){
                $('#references').show();
            }
        }

        /**
         * Shows contact form confirmation modal
         * @private
         */
        function showSocialSuccessModal(){
            if ($('#contact-form').data('success') === true){
                $('#contact-form-success-modal').modal();
            }
        }

        /**
         * Sets dynamic height for homepage image gallery
         * @private
         */
        function setHomeSliderHeight() {
          $('.page-body.home .bx-viewport').height($(window).height());
          $('.page-body.home .bxslider li').height($(window).height());
        }

        /**
         * Sets BX banner slider
         * @private
         */
        function setBxSlider() {
            $('.bxslider.home').bxSlider({
                mode: 'fade',
                preloadImages: 'all',
                auto: true,
                pause: 8000,
                speed: 1000,
                randomStart: true,
                pager: false,
                controls: false,
            });
        }

        /** @private */
        function setEventHandlers() {
          $(window).resize( function () {
            setHomeSliderHeight();
          });
        }

        return {
            init: function() {
                setBxSlider();
                setHomeSliderHeight();
                showResumeReferences();
                showSocialSuccessModal();
                setEventHandlers();
            }
        };

    }());

}(jQuery));
