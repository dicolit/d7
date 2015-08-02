(function ($) {
  $(function () {
    $('#btn_review').unbind('click').bind('click', function (e) {
      e.preventDefault();
      var num_star = 5, node_id = 1;
      var json_data = {
        'action': 'submit_rating_cook'
        , access_token: ''
        , data: {
          'num_star': num_star,
          'node_id': node_id
        }
      };
      $.getJSON("/api/nscem",
        {
          'json_data': JSON.stringify(json_data)
        }
      ).done(function (res) {
          console.log(res);
        });
    });

    $('#btn_share_facebook').unbind('click').bind('click', function (e) {
      e.preventDefault();
      var network = 'facebook', node_id = 1;
      var json_data = {
        'action': 'submit_share_cook'
        , access_token: ''
        , data: {
          'network': network,
          'nid': node_id
        }
      };
      $.getJSON("/api/nscem",
        {
          'json_data': JSON.stringify(json_data)
        }
      ).done(function (res) {
          console.log(res);
        });
    });

    if($('.email-overlay .btn.btn-green.submit').length > 0){
      $('.email-overlay .btn.btn-green.submit').unbind('click').bind('click', function (e) {
        e.preventDefault();
        var network = 'email', node_id = $(this).attr('data-node-id'), name = $('#email_sender_name').val(), note = $('#email_sender_note').val(), emails = $('#recipient-list').val();
        /* Get emails */
        if(emails == '' || name == '' || note == ''){
          alert('Email, name and note are required.');
          return;
        }
        var json_data = {
          'action': 'submit_share_cook'
          , access_token: ''
          , data: {
            'network': network,
            'nid': node_id,
            'emails': emails,
            'name'  : name,
            'note' : note
          }
        };
        $.getJSON("/api/nscem",
          {
            'json_data': JSON.stringify(json_data)
          }
        ).done(function (res) {
            console.log(res);
          });
      });
    }

    /* Rating for node */
    if($('.rate-overlay .btn.btn-green').length > 0){
      $('.rate-overlay .btn.btn-green').unbind('click').bind('click', function (e) {
        e.preventDefault();
        var val = $('.rate-overlay input[type=radio]:checked').val();
        if(val != undefined){
          var node_id = $(this).attr('data-node-id');
          var json_data = {
            'action': 'ajax_rating'
            , access_token: ''
            , data: {
              'value': val,
              'nid': node_id
            }
          };
          $.post("/api/nscem",
            {
              'json_data': JSON.stringify(json_data)
            },function(res){
              console.log(res);
            }
          );
        }
      });
    }

    /* Add new comment for node */
    if($("#comment_content").length > 0){
      $("#comment_content").keyup(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code == 13){
          e.preventDefault();
          var val = $('#comment_content').val();
          if(val != ''){
            var node_id = $(this).attr('data-node-id');
            var json_data = {
              'action': 'ajax_comment'
              , access_token: ''
              , data: {
                'action' : 'add_comment',
                'content': val,
                'nid': node_id
              }
            };
            $.post("/api/nscem",
              {
                'json_data': JSON.stringify(json_data)
              },function(res){
                console.log(res);
              }
            );
          }
        }
      });
    }

    /* Report spam for comment */
    if($('.btn-report-spam').length > 0){
      $('.btn-report-spam').unbind('click').bind('click', function (e) {
        e.preventDefault();
        var c_id = $(this).attr('data-comment-id');
        var json_data = {
          'action': 'ajax_comment'
          , access_token: ''
          , data: {
            'action' : 'report_spam',
            'cid': c_id
          }
        };
        $.post("/api/nscem",
          {
            'json_data': JSON.stringify(json_data)
          },function(res){
            console.log(res);
          }
        );
      });
    }

    if($('#detail-actions--snackbox').length > 0){
      $('#detail-actions--snackbox').unbind('click').bind('click', function (e) {
        e.preventDefault();
        var nid = $(this).attr('data-node-id');
        var json_data = {
          'action': 'add_snack_box'
          , access_token: ''
          , data: {
            'nid': nid
          }
        };
        $.post("/api/nscem",
          {
            'json_data': JSON.stringify(json_data)
          },function(res){
            console.log(res);
          }
        );
      });
    }

  });
})(jQuery);
function share_facebook(url){
  FB.ui(
    {
      method: 'share',
      href: url
    }, function(response){
      console.log(response);
    });
}
jQuery.noConflict();
