/**
 * Catalog functionality
 * @author tech@baralaye.com
 */

(function($){

    Baralaye.Catalog = (function() {

        /**
         * Sets dynamic heights
         * @private
         */
          function setProductListHeight() {
            $('.product-list.catalog li').height($('.product-list.catalog li').width());
          }

        /**
         * Sets Fancybox for catalog detail image if the viewport is bigger than mobile size 
         * @private
         */
        function setCatalogDetailFancybox(){
          if ($(window).width() >= 640){
            $('.bxslider.catalog > li > a').fancybox({
              padding: 0,
              margin: 20,
              closeClick: true,
            });
          }
        }

        /** @private */
        function setGlobalVariables() {
        }

        /** @private */
        function setEventHandlers() {
          $(window).resize( function (){
            setProductListHeight();
          });
        }

        return {
            init: function() {
                setCatalogDetailFancybox();
                setProductListHeight();
                setGlobalVariables();
                setEventHandlers();
            }
        };

    }());

}(jQuery));
