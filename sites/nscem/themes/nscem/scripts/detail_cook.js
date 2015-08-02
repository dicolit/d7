// SLIDE TOGGLE ON DETAIL PAGE
(function($){
    if(!$('.detail-page').length)
        return;

    var detailSlider = $('.detail-page .description-gallery ul').bxSlider({
        minSlides: 1,
        maxSlides: 3,
        moveSlides: 1,
        slideWidth: $('.detail-page .description-gallery ul li').width() + 13,
        slideMargin: 0,
        controls: true,
        infiniteLoop: false
    })
    
    var toggle = {
        initToggle: function(_trigger, _obj) {
            
            if($(window).innerWidth() < 768) {

                $(_trigger).off('click').on('click',function() {
                  if($(_obj).find('.bx-viewport').length && !$(_obj).is(':visible'))
                  {
                    setTimeout(function(){
                        toggle.reinitSlider();
                    },0)                    
                  }
                  $(_obj).slideToggle(400, function() {
                    $(_obj).toggleClass('toggle-collapsed', !$(this).is(':visible'));
                    $(_trigger).toggleClass('toggle-collapsed', !$(this).is(':visible'));                
                  }); 
                });

                if(!$(_obj).hasClass('toggle-collapsed')) {

                    $(_obj).slideToggle(0, function() {
                        $(_obj).toggleClass('toggle-collapsed', !$(this).is(':visible'));
                        $(_trigger).toggleClass('toggle-collapsed', !$(this).is(':visible'));
                    });  
                }
            }
            else {
                $(_trigger).off('click');
                if($(_obj).hasClass('toggle-collapsed')) {
                    $(_obj).css('display','block');
                    $(_obj).removeClass('toggle-collapsed')

                }
                if($(_trigger).hasClass('toggle-collapsed')) {
                    $(_trigger).removeClass('toggle-collapsed')
                }
                
            }
        },

        reinitSlider: function(){
            
            if(detailSlider)
            {
                detailSlider.destroySlider();
            }

            detailSlider = $('.detail-page .description-gallery ul').bxSlider({
                minSlides: 1,
                maxSlides: 3,
                moveSlides: 1,
                slideWidth: $('.detail-page .description-gallery ul li').width() + 13,
                slideMargin: 0,
                controls: true,
                infiniteLoop: false
            });

        }
    }

    $(window).on('resize', function(){
        toggle.initToggle('.detail-page .description h3', '.detail-page .description .description-gallery');
        toggle.initToggle('.detail-page .comments h3', '.detail-page .comments .comments-list');
        toggle.initToggle('.detail-page .ingredients h3', '.ingredients .list-unstyled');
        toggle.reinitSlider(); 
    });

    toggle.initToggle('.detail-page .description h3', '.detail-page .description .description-gallery');
    toggle.initToggle('.detail-page .comments h3', '.detail-page .comments .comments-list');
    toggle.initToggle('.detail-page .ingredients h3', '.ingredients .list-unstyled');
      
})(jQuery);