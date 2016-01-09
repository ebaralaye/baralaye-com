/**
 * Baralaye.com Template functionality
 * @author tech@baralaye.com
 */

(function($){

    Baralaye.Template = (function() {

        /**
         * Sets Global Nav selected state
         * @private
         */
        function globalNav() {
            $('.tmp-nav a').each(function(){
                var $this = $(this),
                    locRef = $this.attr('href'),
                    locRef1 = locRef.split('/')[1] || null,
                    locRef2 = locRef.split('/')[2] || null,
                    locRef3 = locRef.split('/')[3] || null,
                    locRefH = locRef.split('#')[1] || null;
                if (locRef === locDoc 
                    || (locRef1 === locDoc1 && locRef2 === null) 
                    || (locRef2 === locDoc2 && locRef3 === null) 
                    || (locRef3 === locDoc3 && locRef3 !== null) 
                    || (locRef1 === "news" && locDoc1 === "announcements")) {
                    $this.attr('class', 'active');
                    $this.parents('li').attr('class', 'selected master');

                    // Check if matched link is third level menu item or a second level item with submenu
                    // Include class to bump tmp-top margin
                    if ($this.parents('ul')[2] || ($this.parents('ul')[1] && $this.siblings('ul')[0])) {
                      $('#tmp-top').addClass('double-nav');
                    }
                }
            });

            /*show bottom nav only when the bottom dive is visible*/
            $(window).scroll( function () {
              if ($(window).scrollTop() > 100 && $(window).width() <= 768){
                $('.tmp-bottom').show();
              }
              else $('.tmp-bottom').hide();
            });
        }

        /**
         * Sets Top Nav dropdowns
         * @private
         */
        function topNavDropdowns() {
            $('#tmp-top > .tmp-nav > ul.nav > li').mouseenter(function(){
                var $this = $(this);
                if($this.hasClass('master') !== true){
                    $this.siblings('li').removeClass('selected');
                    $this.siblings('li').removeClass('selected');
                    $this.addClass('selected');
                    $this.mouseleave(function(){
                        $this = $(this);
                        $this.removeClass('selected');
                        $('#tmp-top > .tmp-nav > ul.nav > li.master').addClass("selected");
                    });
                }
            });
        }

        /**
         * Provides top marign for vertical alignment
         * @private
         */
        function getVAlignMargin($elem){
          var top_buffer = 20;
          var top_height = (($(window).height() - $elem.height())/2 - top_buffer);
          if (top_height <= 0) top_height = 0;
          return top_height;
        }

        /**
         * Sets page-body vertical alignmnet
         * @private
         */
        function setPageBodyVAlign(){
          $('.page-body').not('.catalog-item, .home').css('margin-top', getVAlignMargin($('.page-body')) + 'px');
        }

        /** @private */
        function setEventHandlers() {
          $(window).load( function (){
            setPageBodyVAlign();
          });
          $(window).resize( function (){
            setPageBodyVAlign();
          });
        }

        return {
            init: function() {
                globalNav();
                topNavDropdowns();
                setPageBodyVAlign();
                setEventHandlers();
            }
        };

    }());

}(jQuery));
