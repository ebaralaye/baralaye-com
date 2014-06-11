/**
 * Baralaye.com Plugin functionality
 * @author tech@baralaye.com
 */

(function($){

    Baralaye.Plugins = (function() {

        /**
         * Sets BX banner slider
         * @private
         */
        function setBXSlider() {
            $('.bx-slider').bxSlider({
                auto: true,
                pager: true,
                speed: 1000,
                pause: 8000,
                randomStart: true,
                nextText: ">",
                prevText: "<",
                mode: "fade",
                infiniteLoop: true
            });
        }

        /**
         * Sets Fancy Box modal triggers
         * @private
         */
        function setFancyBox() {
            $('.ltbx.image a').fancybox();
            $('.ltbx.images > a').fancybox({
                openEffect: 'none',
                closeEffect: 'none',
                helpers: {
                    thumbs: {
                        width: 100,
                        height: 100
                    }
                }
            });
            $('.ltbx.win').each(function(){
                $(this).children('a').eq(0).fancybox({
                    'width':400,
                    'height':400,
                    'autoDimensions':false
                });
            });
            $('a.ltbx').fancybox();
            $('a.ltbx.win').fancybox({
                'width':400,
                'height':410,
                'autoDimensions':false,
                'scrolling':'no'
            });
            $('a.gMap').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',
                helpers : {
                    media : {}
                }
            });
            $('a.ltbx.video').click(function(){
                $.fancybox({
                    'padding'         : 0,
                    'autoScale'       : false,
                    'transitionIn'    : 'none',
                    'transitionOut'   : 'none',
                    'title'           : this.title,
                    'width'           : 640,
                    'height'          : 385,
                    'href'            : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                    'type'            : 'swf',
                    'swf'             : {
                        'wmode'           : 'transparent',
                        'allowfullscreen' : 'true'
                    }
                });
                return false;
            });
        }

        /**
         * Flickr Photoset function
         * @private
         */
        function flickrPhotoSet() {

            $('.product-list.photoset').each(function(){
                jQuery('<img />').attr('class', 'loader').attr('src', '/images/plugins/ajax-loader.gif').appendTo('.product-list.photoset');
                //assign your api key equal to a variable
                var photoSetCont = $(this);
                var apiKey = '2dc0ff4d2daaa11adcdef83d127b8558';
                var photosetID = $(this).attr('id').split('_')[1];
                //the initial json request to flickr
                //to get your latest public photos, use this request: http://api.flickr.com/services/rest/?&method=flickr.people.getPublicPhotos&api_key=' + apiKey + '&user_id=29096781@N02&per_page=15&page=2&format=json&jsoncallback=?
                $.getJSON('http://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key=' + apiKey + '&photoset_id=' + photosetID + '&format=json&jsoncallback=?',function(data){
                    //loop through the results with the following function
                    $.each(data.photoset.photo, function(i,item){
                        //build the url of the photo in order to link to it
                        var photoURL_m = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_m.jpg';
                        var photoURL_b = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_z.jpg';
                        //turn the photo id into a variable
                       var photoID = item.id;
                       //use another ajax request to get the tags of the image
                       $.getJSON('http://api.flickr.com/services/rest/?&method=flickr.photos.getInfo&api_key=' + apiKey + '&photo_id=' + photoID + '&format=json&jsoncallback=?',function(data){
                           //create an imgCont string variable which will hold all the link location, title, author link, and author name into a text string
                           var imgCont = '<li><div class="image ltbx"><a href='+ photoURL_b +' title='+ data.photo.title._content +'><img src='+ photoURL_m +' alt='+ data.photo.title._content +' /></a></div>';
                           //add the description & html snippet to the end of the 'imgCont' variable
                           imgCont += '<div class="image-info"><h4 class="title">'+data.photo.title._content+'</h4><p class="desc">'+data.photo.description._content+'</p></div></li>';
                           //append the 'imgCont' variable to the document
                           $(imgCont).appendTo( photoSetCont );
                           //Activate Lightbox
                           $('.product-list.photoset a').fancybox();
                       });
                   });
               });
               jQuery('.loader').remove();
           });

        }

        return {

            init: function() {

                setBXSlider();
                setFancyBox();
                flickrPhotoSet();

            }

        };

    }());

}(jQuery));
