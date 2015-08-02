// HOME
(function($) {
    if ($('#home-page').length) {
        $('#hero-banner .gallery').flickity({
            wrapAround: true,
            // freeScroll: true,
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false
        });
    }
})(jQuery);

//SCROLL TO LOAD AJAX
(function($){
    $(window).load(function(){
        

        if($('#home-page').length) {
            var target = $('#home-page .listing');
            $(window).on('scroll', function(evt){
                var p = target.offset().top + target.height() - $(window).height()
                var contentLoader = "<div class='content-loader'>\
                                        <span></span>\
                                     </div>";
                if($(window).scrollTop() >= p) {
                    /*Call Ajax Here*/
                    $('.content-loader').remove();
                    target.append(contentLoader);
                }
                else {
                    $('.content-loader').remove();
                }
            })
            
            
        }    
    });
    
})(jQuery);

