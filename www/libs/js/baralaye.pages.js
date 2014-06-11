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

        /** @private */
        function setEventHandlers() {
        }

        return {
            init: function() {
                showResumeReferences();
                setEventHandlers();
            }
        };

    }());

}(jQuery));
