jQuery(document).ready(function(){
    jQuery('#first').click(function() {
        jQuery.scrollTo('#div1', 1000);
    });
    jQuery('#second').click(function() {
        jQuery.scrollTo('#div2', 2000);
    });
    jQuery('#third').click(function() {
        jQuery.scrollTo('#div3', 3000);
    });
    jQuery('#fouth').click(function() {
        jQuery.scrollTo('#div4', 400);
    });
});