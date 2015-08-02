(function($) {
    $(function() {
        $('#sign_up_popup').unbind('click').bind('click', function(e) {
            e.preventDefault();
            var mail = 'quocbinh.nguyen@ogilvy.com', name = 'binh';
            var json_data = {
                'action': 'ajax_register'
                , access_token: ''
                , data: {
                    'mail': mail,
                    'name': name
                }
            };
            $.getJSON("/api/nscem",
                {
                    'json_data': JSON.stringify(json_data)
                }
            ).done(function(res) {
                    console.log(res);
                });
        });
    });
})(jQuery);
jQuery.noConflict();