/**
 * Baralaye.com Plugin functionality
 * @author tech@baralaye.com
 */

(function($){

    Baralaye.Plugins = (function() {

        /**
         * Sets Fancy Box modal triggers
         * @private
         */
        function setFancyBox() {
            $('a.ltbx').fancybox({
              padding: 0,
              margin: 20,
              closeClick: true,
            });
            $('.ltbx.images > a').fancybox({
              padding: 0,
              margin: 20,
              closeClick: true,
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
            $('a.ltbx.win').fancybox({
                'width':400,
                'height':410,
                'autoDimensions':false,
                'scrolling':'no'
            });
            $('a.gMap').fancybox();
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

            $('.item-list.photoset').each(function(){
                jQuery('<img />').attr('class', 'loader').attr('src', '/images/plugins/ajax-loader.gif').appendTo('.item-list.photoset');
                //assign your api key equal to a variable
                var photoSetCont = $(this);
                var apiKey = '2dc0ff4d2daaa11adcdef83d127b8558';
                var photosetID = $(this).attr('id').split('_')[1];
                //to get your latest public photos, use this request: http://api.flickr.com/services/rest/?&method=flickr.people.getPublicPhotos&api_key=' + apiKey + '&user_id=29096781@N02&per_page=15&page=2&format=json&jsoncallback=?
                $.getJSON('https://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key=' + apiKey + '&photoset_id=' + photosetID + '&format=json&jsoncallback=?',function(data){
                    //loop through the results with the following function
                    $.each(data.photoset.photo, function(i,item){

                       //build the url of the photo in order to link to it
                       var photoURL_m = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_m.jpg';
                       var photoURL_b = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_z.jpg';
                       //turn the photo id into a variable
                       var photoID = item.id;
                       var photoDesc;

                       //create an imgCont string variable which will hold all the link location, title, author link, and author name into a text string
                       var imgCont = "<li class='item'><a class='ltbx' id='"+item.id+"' href="+ photoURL_b +"' rel='gallery-1' style=\'background-image:url("+ photoURL_b +")\' /></a>";

                       //append the 'imgCont' variable to the document
                       $(imgCont).appendTo( photoSetCont );

                       //use another ajax request to set the description in the data-caption attribute of the image
                       $.getJSON('https://api.flickr.com/services/rest/?&method=flickr.photos.getInfo&api_key=' + apiKey + '&photo_id=' + item.id + '&format=json&jsoncallback=?',function(data){
                         if (item.title !== undefined){
                           $('#'+item.id).data('caption', "<strong>"+ item.title +"</strong>");
                         }

                         photoDesc = data.photo.description._content;
                         if (photoDesc !== undefined){
                           $('#'+item.id).data('caption', $('#'+item.id).data('caption').concat("<br/> "+ photoDesc));
                         }

                         //Activate Lightbox
                         setFancyBox();
                       });
                   });
               });
               jQuery('.loader').remove();
           });
        }

        return {

            init: function() {
                setFancyBox();
                flickrPhotoSet();
            }

        };

    }());

}(jQuery));
