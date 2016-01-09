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
          function setCatalogListItemHeight() {
            $('.item-list.catalog li').height($('.item-list.catalog li').width());
          }

        /**
         * Sets Fancybox for catalog detail image if the viewport is bigger than mobile size 
         * @private
         */
        function setCatalogItemFancybox(){
          if ($(window).width() >= 640){
            $('.bxslider.catalog > li > a').fancybox({
              padding: 0,
              margin: 20,
              closeClick: true,
            });
          }
        }

        function setImageSliderControls($elem){
          console.log($elem.width());
          $('.bx-controls-direction').animate({'width': $elem.width() + 'px'}, 500);
        }

        function setCatalogItemVAlign($elem){

          function getTopMargin($elem){
            var top_height = ((($(window).height() - 200) - $elem.height())/2);
            if ($elem.hasClass('title')){
              top_height = top_height - $('.details').height()/2;
            }
            if (top_height < 0) top_height = 0;
            return top_height;
          }

          if ($(window).width() < 992) {
            $('.page-body.catalog-item .v-align').css('margin-top', 'inherit');
          }
          else if ($elem) {
            $('.page-body.catalog-item .image-slider').animate({'margin-top': getTopMargin($elem) + 'px'}, 500);
          }
          else {
            $('.page-body.catalog-item .v-align').each(function(){
              $(this).css('margin-top', getTopMargin($(this)) + 'px');
            });
          }
        };

        /**
         * Sets BX banner slider
         * @private
         */
        function setBxSlider() {
          $('.bxslider.catalog').bxSlider({
            mode: 'fade',
            pagerCustom: '#bx-pager',
            preloadImages: 'all',
            pager: true,
            speed: 1000,
            controls: false,
            pause: 8000,
            adaptiveHeight: true,
            adaptiveHeightSpeed: 500,
            nextText: "",
            prevText: "",
            onSliderLoad: function($elemIndex){
              setCatalogItemVAlign();
              //setImageSliderControls($('.bxslider > li > a').eq($elemIndex));
            },
            onSlideBefore: function($elem){
              setCatalogItemVAlign($elem);
              //setImageSliderControls($elem.children('a').eq(0));
            },
          });
        }

        /** @private */
        function setGlobalVariables() {
        }

        /** @private */
        function setEventHandlers() {
          $(window).resize( function (){
            setCatalogListItemHeight();
            setCatalogItemVAlign();
          });
        }

        return {
            init: function() {
                setBxSlider();
                setCatalogItemVAlign();
                setCatalogItemFancybox();
                setCatalogListItemHeight();
                setGlobalVariables();
                setEventHandlers();
            }
        };

    }());

}(jQuery));
