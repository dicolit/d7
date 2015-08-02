/* jshint devel:true */
'use strict';
var App = window.App || {};

//  GLOBAL
jQuery(document).ready(function($) {
    $('.logged-user--toggle-profile').on('click', function() {
        $(this).toggleClass('active');
        $('.logged-user--detail').slideToggle();
    });

    $('.top-links--user-info a').on('click', function(e) {
        var menuId = $(this).attr('href').replace('#', '');
        if ($(this).attr('id') == 'user-info--search') {
            $('.top-links--user-info a').removeClass('active');
            $('.drop-down-menu-inner').hide();
            $('.mobile-menu').hide();
            return;
        }
        $('.mobile-menu, .mobile-menu-inner').hide();

        if ($(this).hasClass('active')) {
            $('.top-links--user-info a').removeClass('active');
            $('.drop-down-menu-inner').hide();
            $('.mobile-menu').hide();
        } else {
            $('.top-links--user-info a').removeClass('active');
            $(this).addClass('active');

            // desktop dropdown
            $('.drop-down-menu-inner').hide();
            $('#' + menuId).show();
            $('#mobile-' + menuId).show();
            $('.mobile-menu').show();
        }
        return false; // avoid #link
    });

    $('#btn-backtop').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });

    stickMenu();

    /*Stick Menu*/
    function stickMenu() {
      //Keep track of last scroll
      var lastScroll = 0;


      $(window).scroll(function() {
        //Sets the current scroll position
        var st = $(this).scrollTop();
        //Determines up-or-down scrolling
        if (st > lastScroll) {

          //Replace this with your function call for downward-scrolling
          if (st > 600 ) {
            $('#btn-backtop').addClass('on');
          }
        }
        else {
          //Replace this with your function call for upward-scrolling
            if (st < 600) {
                $('#btn-backtop').removeClass('on');
          }
        }
        //Updates scroll position
        lastScroll = st;
      });
    }
});

// OVERLAYS
(function($) {
   var Overlay = {
        overlayHandle: function(_trigger, _overlay){
            var triggerBttn = _trigger,
                overlay = _overlay,
                closeBttn = _overlay.find('.overlay-close'),
                transEndEventNames = {
                    'WebkitTransition': 'webkitTransitionEnd',
                    'MozTransition': 'transitionend',
                    'OTransition': 'oTransitionEnd',
                    'msTransition': 'MSTransitionEnd',
                    'transition': 'transitionend'
                },
                transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
                support = { transitions : Modernizr.csstransitions };

            function toggleOverlay() {
                if( overlay.hasClass('open') ) {
                    overlay.removeClass( 'open' );
                    $('body').removeClass('noscroll');
                    overlay.addClass( 'close' );
                    var onEndTransitionFn = function( ev ) {
                        if( support.transitions ) {
                            if( ev.propertyName !== 'visibility' ) return;
                            this.removeEventListener( transEndEventName, onEndTransitionFn );
                        }
                        overlay.removeClass( 'close' );
                    };
                    if( support.transitions ) {
                        overlay[0].addEventListener( transEndEventName, onEndTransitionFn );
                    }
                    else {
                        onEndTransitionFn();
                    }
                }
                else if( !overlay.hasClass( 'close' ) ) {
                    overlay.addClass( 'open' );
                    $('body').addClass('noscroll');
                }
            }

            triggerBttn.on( 'click', toggleOverlay );
            closeBttn.on( 'click', toggleOverlay );
        }
    }
   /*Video overlay*/
   if ($('.overlay.video-overlay').length) {
        Overlay.overlayHandle($('#detail-actions--snackbox'), $('.overlay.video-overlay'));
   }
   if ($('.overlay.rate-overlay').length) {
        Overlay.overlayHandle($('#detail-actions--rate'), $('.overlay.rate-overlay'));
   }
   if ($('.overlay.point-overlay').length) {
        Overlay.overlayHandle($('.detail-info--view-point-breakdown a'), $('.overlay.point-overlay'));
   }
   if ($('.overlay.email-overlay').length) {
        Overlay.overlayHandle($('#detail-actions--print'), $('.overlay.email-overlay'));
        $('#addRecipient').on('click', function(evt){
            if($('#recipient').val() != "")
            {
                var tag = '<div class="recipient-tag">\
                            <span class="mail">'+ $('#recipient').val() +'</span>\
                            <span class="tag-delete">x</span>\
                          </div>';
                $('#recipient-list').val( $('#recipient-list').val() + $('#recipient').val() + ',' );

                $('#recipient').val("");
                $(evt.currentTarget).parent().append(tag);
            }
        });

        $(document).on('click','.tag-delete', function(evt){
            $(evt.currentTarget).parents('.recipient-tag').remove();
            var t = $('#recipient-list').val();
            t = t.replace($(evt.currentTarget).parents('.recipient-tag').find('.mail').text() + ',',"")
            $('#recipient-list').val(t);

        })
   }
   if ($('.overlay.share-overlay').length) {
        Overlay.overlayHandle($('#detail-actions--share'), $('.overlay.share-overlay'));
   }
})(jQuery);

// SELECT BOX
(function($){
    //Select Wrapper
    $('.select-wrapper').each(function() {
        if ($(this).find('span').length <= 0) {
            $(this).prepend('<span>' + $(this).find('select option:selected').text() + '</span>');
        }
    });

    $(document).on('change', '.select-wrapper select', function() {
        $(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
    });
})(jQuery);

//EDIT PHOTO POPUP
(function($){
    if(!$('#editPhotoModal').length)
       return;

    var oldVal = 0;
    var cropW;
    var setCropW = {

        setW: function() {
            setTimeout(function(){
                if($(window).innerWidth() < 768) {
                    cropW = $('#editPhotoModal .img-wrapper').width();
                }
                else {
                    cropW = 348;
                }

                $('#editPhotoModal #cropimage').each(function () {
                    $(this).cropbox({width: cropW, height: cropW*0.66})
                });
                oldVal = 0;
                $( "#editPhotoModal #slider" ).slider( "value", oldVal );
            },100);
        }
    }
    $(window).on('resize', function(){
        setCropW.setW();
    })
    setCropW.setW();

    $('#editPhotoModal #cropimage').cropbox({
        width: cropW,
        height: cropW*0.66,
        zoom: 10,
        maxZoom: 1,
        showControls: "never"
    })
    .on('cropbox', function (e, result) {
        //console.log(result);
    });

    $( "#editPhotoModal #slider").slider({
        min: 0,
        max: 9,
        step: 1,
        slide: function(event,ui) {

            var crop = $('#editPhotoModal #cropimage').data('cropbox');
            if(ui.value > oldVal)
                crop.zoomIn();
            else
                crop.zoomOut();
            oldVal = ui.value;
        }
    });

    $('#editPhotoModal .slider-wrapper .zoom-out').on('click', function(evt){
        var crop = $('#editPhotoModal #cropimage').data('cropbox');
        crop.zoomOut();
        if(oldVal>0) {
            oldVal--;
            $( "#editPhotoModal #slider" ).slider( "value", oldVal );
        }
    })

    $('#editPhotoModal .slider-wrapper .zoom-in').on('click', function(evt){
        var crop = $('#editPhotoModal #cropimage').data('cropbox');
        crop.zoomIn();
        if(oldVal<9) {
            oldVal++;
            $( "#editPhotoModal #slider" ).slider( "value", oldVal );
        }
    })
})(jQuery);

//QTIP
(function($){

    if(!$('.icon-tip').length)
        return;

    var tipHelper = {

        checkTarget: function(obj) {

            if($(window).innerWidth() < 640) {
                return $(obj.attr('dock-mobile'));
            }
            else{
                return obj;
            }
        },

        updateArrow: function(obj) {
            var $this = obj;
            setTimeout(function(){
                if($(window).innerWidth() < 640) {
                    var dockW = tipHelper.checkTarget($this).innerWidth();
                    var targetPadding = (tipHelper.checkTarget($this).width() - dockW)/2;
                    var offsetW = Math.abs($this.offset().left +  12.5 - (tipHelper.checkTarget($this).offset().left + targetPadding));
                    var percen = offsetW / dockW * 100;

                    $('.qtip-tip').css({
                        'left': percen + "%",
                    });
                }
                else{
                    $('.qtip-tip').css({
                        'left': "50%",
                    });
                }
            },100);

        }
    }

    $('.icon-tip').each(function(){
        var $this = $(this);
        var content = $($this.attr('qtip-content'));
        var dock = tipHelper.checkTarget($this);

        $this.qtip({ // Grab some elements to apply the tooltip to
            content: {
                text: $(content)
            },
            position: {
                my: 'top center',  // Position my top left...
                at: 'bottom center', // at the bottom right of...
                adjust: {
                    y: 5
                },
                target: dock // my target
            },
            show: "click",
            hide: "click",
            style: {
                classes: 'qtip-light',
                width: "95%",
                tip: {
                    width: 12,
                    height: 10
                }
            },
            events: {
                show: function(event, api) {
                    if($(window).innerWidth() < 640) {
                        $('.qtip').addClass('onMobile');
                    }
                    else
                    {
                        $('.qtip').removeClass('onMobile');
                    }
                    tipHelper.updateArrow($this);
                }
            }
        });
    });

    $(window).on('resize scroll', function(){
        $('.icon-tip').each(function(){
            var $this = $(this);
            if($(window).innerWidth() < 640) {
                $('.qtip').addClass('onMobile');
                $('.icon-tip').qtip('option', 'position.target', tipHelper.checkTarget($this));
            }
            else
            {
                $('.qtip').removeClass('onMobile');
                $('.icon-tip').qtip('option', 'position.target', tipHelper.checkTarget($this));
            }
            tipHelper.updateArrow($this);

        });
    });
})(jQuery);

//WEBTOUR
(function($){
    if($('#home-page').length) {
        //var tour = new webtour();
        //tour.initHomeStep();
        //tour.initTour();
    }
    else
        return;
})(jQuery);

//RATING
(function($){
    if($('.stars').length && $('.stars').find('label').length)
    {
        var value;
        $('.stars').on('click', function(){
            value = $('.stars').find('input:checked').val();
            $('.stars').find('span').css({
                width: value * 20 + "%"
            });
        });
    }

})(jQuery);


//ISOTOPE
(function($){
    if(!$('.listing .listing--list').length)
        return;
    // init Isotope
    var $grid = $('.listing .listing--list').isotope({
      layoutMode: 'masonry'
    });
    // layout Isotope after each image loads
    $grid.imagesLoaded().progress( function() {
      $grid.isotope('layout');
    });
})(jQuery);


//MODAL HANDLE
(function($){
    $('.modal-dialog .close-btn, .modal-dialog .cancel-btn, .modal-dialog .no').on('click', function(){
        if($('.modal').is(':visible')) {
            $('.modal').modal('hide');
        }
    })
})(jQuery);








