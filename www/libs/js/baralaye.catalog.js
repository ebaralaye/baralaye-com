/**
 * Catalog functionality
 * @author tech@baralaye.com
 */

(function($){

    Baralaye.Catalog = (function() {

        /** @private */
        var $listName = null;

        /** @private */
        function itemListView() {
            //// Hide product small title if "Untitled"
            $listName.each(function(){
                var $this = $(this);
                if($this.html() === 'Untitled') {
                    $this.css('visibility','hidden');
                }
            });
        }

        /** @private */
        function setGlobalVariables() {
            $listName = $('.product-list .name a');
        }

        /** @private */
        function setEventHandlers() {
        }

        return {
            init: function() {
                setGlobalVariables();
                setEventHandlers();
                itemListView();
            }
        };

    }());

}(jQuery));
