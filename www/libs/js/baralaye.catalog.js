/**
 * Catalog functionality
 * @author tech@baralaye.com
 */

(function($){

    Baralaye.Catalog = (function() {

        /** @private */
        var $listName = null,
            $detailType = null,
            $detailPrice = null,
            $detailEdition = null,
            $detailWeight = null;

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
        function itemDetailView() {
            //// Hide product edition (for inapplicable items)
            if($detailEdition.children('span').html() !== '1') {
                $detailEdition.show('slow');
            }
            //// Hide product wieght (for inapplicable items)
            if($detailWeight.children('span').html() !== '') {
                $detailWeight.show();
            }
        }

        /** @private */
        function setGlobalVariables() {
            $listName = $('.product-list .name a');
            $detailType = $('.shop-product-large .specs .type').html();
            $detailPrice = $('.shop-product-large .specs .price');
            $detailEdition = $('.shop-product-large .specs .edition');
            $detailWeight = $('.shop-product-large .specs li.weight');
        }

        /** @private */
        function setEventHandlers() {
        }

        return {
            init: function() {
                setGlobalVariables();
                setEventHandlers();
                itemListView();
                itemDetailView();
            }
        };

    }());

}(jQuery));
