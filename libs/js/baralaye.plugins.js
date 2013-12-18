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
         * Sets Cloud Zoom plugin for Portfolio Detail view
         * @private
         */
        function setCloudZoom() {
            if ($('#zoom-var').text() === 'zoom-1'){
                var main_rel ="position: 'inside'";
                var imgFirst_name = $('.shop-product-large .images .main img:first').attr('src').split('/')[5]; 
                $('.shop-product-large .images .main img:first').wrap("<a href='/images/art/portfolio/big/"+imgFirst_name+"' class='cloud-zoom' id='zoom1' />");
                $('.shop-product-large .images .main a:first').attr('rel',main_rel);
                $('.poplets a').each(function(){
                    var img_name = this.href.split('/')[7];
                    var url_rel = "useZoom: 'zoom1', smallImage: '/images/art/portfolio/large/"+img_name+"'";
                    var big_src = "/images/art/portfolio/big/"+img_name; 
                    $(this).removeAttr('onclick').attr('rel',url_rel).attr('class','cloud-zoom-gallery').attr('href',big_src);
                });
            }
        }

        /**
         * Portal Accordion Slides
         * @private
         */
        function setAccordianSLides() {
            var slide_number;
            function slideNumber(slides){
                slide_number = Math.floor(Math.random() * slides);
            }
            var slides_sculpture = [
                '/images/art/portfolio/large/S-MT_0005_f.jpg',
                '/images/art/portfolio/large/S-MM_0003_a.jpg',
                '/images/art/portfolio/large/S-CR_0017_a.jpg'
            ];
            slideNumber(slides_sculpture.length);
            $('.home .accordion .sculpture img').attr('src',slides_sculpture[slide_number]);
            var slides_vessels = [
                '/images/art/portfolio/large/V-PT_0019_a.jpg',
                '/images/art/portfolio/large/V-PT_0026_a.jpg',
                '/images/art/portfolio/large/V-PT_0017_a.jpg'
            ];
            slideNumber(slides_vessels.length);
            $('.home .accordion .vessels img').attr('src',slides_vessels[slide_number]);
            var slides_drawings = [
                '/images/art/portfolio/large/DW_0018.jpg',
                '/images/art/portfolio/large/DW_0014.jpg',
                '/images/art/portfolio/large/DW_0016.jpg'
            ];
            slideNumber(slides_drawings.length);
            $('.home .accordion .drawings img').attr('src',slides_drawings[slide_number]);

            //// Portal Accordion ////
            $('.accordion').classicAccordion({
                width: 675,
                height: 200,
                slideshow: false,
                shadow: true,
                alignType: 'centerCenter',
                closedPanelSize: 60,
                panelProperties: {
                    0: {
                        captionTop: 162,
                        captionLeft: -1,
                        captionWidth: 200,
                        captionHeight: 38
                    },
                    1: {
                        captionTop:162,
                        captionLeft:-1,
                        captionWidth:200,
                        captionHeight:38
                    },
                    2:{captionTop:162, captionLeft:-1, captionWidth:200, captionHeight:38},
                    3:{captionTop:162, captionLeft:-1, captionWidth:200, captionHeight:38},
                    4:{captionTop:162, captionLeft:-1, captionWidth:200, captionHeight:38},
                    5:{captionTop:162, captionLeft:-1, captionWidth:200, captionHeight:38}
                }
            });

        }

        /**
         * Flickr Photoset function
         * @private
         */
        function flickrPhotoSet() {

            $('.productSmall.photoset').each(function(){
                jQuery('<img />').attr('class', 'loader').attr('src', '/images/plugins/ajax-loader.gif').appendTo('.productSmall.photoset');
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
                           $('.productSmall.photoset a').fancybox();
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
                setCloudZoom();
                if (locDoc1 === '') {
                    setAccordianSLides();
                }
                flickrPhotoSet();

            }

        };

    }());

}(jQuery));
