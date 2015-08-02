//FIX SPACE ON ACCOUNT DASHBOARD
(function($){
    if(!$('.account-dashboard-page').length)
        return;
    var checkDashboard = {
        
        check: function() {
            if($(window).innerWidth() > 767) {
                $('.main .rewards').css({
                    'position': 'relative',
                    'top': '0px'
                });
                var des = $('.profile-comletion').offset().top +   $('.profile-comletion').height();
                var origin = $('.main .rewards').offset().top;                
                var offset = origin - des - 30;
                $('.main .rewards').css({
                    'position': 'relative',
                    'top': -offset + 'px'
                });
            }
            else {
                $('.main .rewards').css({
                    'position': 'relative',
                    'top': '0px'
                });
            }    
        }
    }

    $(window).on('resize', function(){
        setTimeout(function(){
            checkDashboard.check();    
        },50);
        
    });

    checkDashboard.check();
})(jQuery);