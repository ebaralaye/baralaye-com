/**
 * Baralaye.com Inits
 * @author: web@baralaye.com
 */

var Site = window.Site || {};

(function($){

    Site.init = function() {
        Baralaye.init();
        Baralaye.Plugins.init();
        Baralaye.Template.init();
        Baralaye.Catalog.init();
        Baralaye.Pages.init();
    };

    $(Site.init);

}(jQuery));
