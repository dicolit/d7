$(document).ready(function(){
  /**
   * Fixed Header + Navigation.
   */
  ( function() {


    var header_fixed = jQuery('.fixed-on');
    var p_to_top     = header_fixed.position().top;


    jQuery(window).scroll(function(){
        if(jQuery(document).scrollTop() > p_to_top) {
            $('#header').addClass('header-fixed');
            $('#header').stop().animate({},300);
            if ( jQuery("body").hasClass('header-transparent') ) {
                // No Thing
            } else {
                jQuery('.site-content').css('padding-top', header_fixed.height());
            }

        } else {
            $('#header').removeClass('header-fixed');
            $('#header').stop().animate({},300);
            if (jQuery("body").hasClass('header-transparent') ) {
                // No Thing
            } else {
                jQuery('.site-content').css('padding-top', '0');
            }
        }
    });


  })();



  /**
   * Back To Top
   */
  ( function() {
      jQuery('#btt').fadeOut();
      jQuery(window).scroll(function() {
          if(jQuery(this).scrollTop() != 0) {
              jQuery('#btt').fadeIn();
          } else {
              jQuery('#btt').fadeOut();
          }
      });

      jQuery('#btt').click(function() {
          jQuery('body,html').animate({scrollTop:0},800);
      });
  })();
});
