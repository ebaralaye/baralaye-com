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
         * Resume Reference display
         * @private
         */
        function showSocialSuccessModal(){
          console.log($('#contact-form').data('success'));
            if ($('#contact-form').data('success') === true){
                $('#contact-form-success-modal').modal();
            }
        }

        /** @private */
        function setEventHandlers() {
        }

        return {
            init: function() {
                showResumeReferences();
                showSocialSuccessModal();
                setEventHandlers();
            }
        };

    }());

}(jQuery));
