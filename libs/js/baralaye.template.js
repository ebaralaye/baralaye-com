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
                }
            });
        }

        /**
         * Sets Top Nav dropdowns
         * @private
         */
        function topNavDropdowns() {
            $('#tmp-top > .tmp-nav > div > ul > li').mouseenter(function(){
                var $this = $(this);
                if($this.hasClass('master') !== true){
                    $this.siblings('li').removeClass('selected');
                    $this.siblings('li').removeClass('selected');
                    $this.addClass('selected');
                    $this.mouseleave(function(){
                        $this = $(this);
                        $this.removeClass('selected');
                        $('#tmp-top > .tmp-nav > div > ul > li.master').addClass("selected");
                    });
                }
            });
        }

        /**
         * Sets (copys over) Bottom Nav
         * @private
         */
        function displayBottomNav() {
            $('#tmp-bottom > .tmp-nav').html($('#tmp-top > .tmp-nav').html());
        }

        /**
         * Sets background image graphic
         * @private
         */
        function windowBackgroundRotator() {
            var Rotator = [
                'sketch0.gif',
                'sketch1.gif',
                'sketch2.gif',
                'sketch3.gif',
                'sketch4.gif'
            ],
            whichRotator = Math.floor(Math.random()*(Rotator.length)),
            imgSrc = 'url(/images/bg/' + Rotator[whichRotator] + ')';
            $('#tmp-bg-img').css('background-image', imgSrc);
        }

        /** @private */
        function setEventHandlers() {
        }

        return {
            init: function() {
                globalNav();
                topNavDropdowns();
                displayBottomNav();
                /* don't show background image on resume pages */
                if ($.inArray(locDoc1, ['arts','web','cv']) < 0) {
                    windowBackgroundRotator();
                }
                setEventHandlers();
            }
        };

    }());

}(jQuery));
