/**
 * Catalog functionality
 * @author tech@baralaye.com
 */

(function($){

    Baralaye.Catalog = (function() {

      var BxSlider;

        /**
         * Sets dynamic heights
         * @private
         */
          function setCatalogListItemHeight() {
            $('.item-list.catalog li').height($('.item-list.catalog li').width());
          }

        /**
         * Sets Fancybox detail popup for catalog detail image if the viewport is bigger than mobile size
         * @private
         */
        function setCatalogItemFancybox(){
          if ($(window).width() >= 640){
            $('.bxslider.catalog > li > a, .catalog-item > .image > a').fancybox({
              padding: 0,
              margin: 20,
              closeClick: true,
            });
          }
        }

        function setImageSliderControls($elem, $elemIndex){
          var elem_width;
          var elem_height;
          if ($elemIndex !== null) {
            elem_width = ($('.bxslider img').eq($elemIndex)).width();
            elem_height = ($('.bxslider img').eq($elemIndex)).height();
          }
          else if ($elem !== null) {
            elem_width = $elem.find('img').eq(0).width();
            elem_height = $elem.find('img').eq(0).height();
          }
          else {
            elem_width = $('.bxslider img').eq($('#bx-pager a.active').data('slide-index')).width();
            elem_height = $('.bxslider img').eq($('#bx-pager a.active').data('slide-index')).height();
          }
          if (elem_width > 0) {
            $('.bx-controls-direction').css('width', elem_width + 'px');
            $('.bx-controls-direction .bx-prev').css('height', elem_height + 'px');
            $('.bx-controls-direction .bx-next').css('height', elem_height + 'px');
          }
        }

        /**
         * Sets BX banner slider
         * @private
         */
        function setBxSlider() {
          $('.bxslider.catalog').bxSlider({
            mode: 'fade',
            pagerCustom: '#bx-pager',
            preloadImages: 'visible',
            pager: true,
            speed: 500,
            controls: true,
            adaptiveHeight: true,
            adaptiveHeightSpeed: 500,
            nextText: "",
            prevText: "",
            onSliderLoad: function($elemIndex){
              setImageSliderControls(null, $elemIndex);
              Baralaye.Template.VAlign();
            },
            onSlideBefore: function($elem){
              Baralaye.Template.VAlign($elem);
            },
            onSlideAfter: function($elem){
              setImageSliderControls($elem, null);
            }
          });
        }

        /** @private */
        function setEventHandlers() {
          $(window).on('resize', function (){
            if ($('.bxslider.catalog').length === 1) {
              setImageSliderControls(null, null);
            }
          });
          $(window).on('load resize', function (){
            Baralaye.Template.VAlign();
            if ($('.item-list.catalog').length === 1) {
              setCatalogListItemHeight();
            }
          });
        }

        return {
            init: function() {
                setCatalogListItemHeight();
                setBxSlider();
                setCatalogItemFancybox();
                setEventHandlers();
            }
        };

    }());

}(jQuery));
