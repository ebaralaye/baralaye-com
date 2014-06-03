/**
 * Baralaye.com Base namespace
 * @author tech@baralaye.com
 */

var locDoc = null,
    locDoc1 = null,
    locDoc2 = null,
    locDoc3 = null,
    locDocH = null;

(function($) {

    Baralaye = (function() {

        /** @private */
        function setGlobalVariables() {
            locDoc = document.location.pathname;
            locDoc1 = locDoc.split('/')[1];
            locDoc2 = locDoc.split('/')[2];
            locDoc3 = locDoc.split('/')[3];
            locDocH = locDoc.split('#')[1];
        }

        return {
            init: function() {
               setGlobalVariables();
            }
        };

    }());

}(jQuery));
