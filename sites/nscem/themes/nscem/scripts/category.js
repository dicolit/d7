// CATEGORY
(function($) {
    // HELPERS
    var DropDown = function(el) {
        this.dd = el;
        this.placeholder = this.dd.children('span');
        this.opts = this.dd.find('ul > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });
        },
        getValue: function() {
            return this.val;
        },
        getIndex: function() {
            return this.index;
        }
    };

    if ($('#category-page').length || $('#snackbox-page').length) {
        var dd = new DropDown($('#sort-dropdown'));
        $('.cat-filters-menu__filters a').on('click', function() {
            if (!$('.cat-filters-menu__sort--dropdown').is(':animated')) {
                if ($('#snackbox-page').length > 0) {
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active')
                        $(this).text('More Filters');
                    } else {
                        $(this).addClass('active');
                        $(this).text('Close Filters');
                    }
                } else {
                    $(this).toggleClass('active');
                }
                $('.cat-filters-menu__sort--dropdown').slideToggle();
            }
        });
    }
})(jQuery);