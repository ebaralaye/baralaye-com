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
            $('.page-body.resume .reference').each(function(){
                var $this = $(this);
                if ($this.html().indexOf('@') !== -1){
                    $this.addClass('filled');
                }
            });
            if (locDocH === 'references'){
                $('.page-body.resume .reference.filled').each(function(){
                    var $this = $(this),
                        $name = $this.siblings('.name');
                    $('ul.references').append($('<li/>').append($name.clone()).append($this));
                });
                $('#references').show();
                $('.page-body.resume ul.references').show();
            }
        }

        /**
         * Adds class to page wrap in post detail view
         * @private
         */
        function setBlogDetail() {
            if (locDoc2 === 'Blog' && (locDoc3 === 'post')){
                $('#tmp-wrap').addClass('post-detail');
            }
        }

        /** @private */
        function setEventHandlers() {
        }

        return {
            init: function() {
                showResumeReferences();
                setBlogDetail();
                setEventHandlers();
            }
        };

    }());

}(jQuery));
