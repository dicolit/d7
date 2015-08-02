function webtour() {
    this.step = [];  
}

webtour.prototype.initHomeStep = function(){
    this.step = [
    {
      element: $("#home-page .listing .listing--list .list-item")[0],
      title: "Lorem Ipsum",
      content: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
      placement: "bottom",
      subChild: ".add-to-snackbox",
    },
    {
      element: $("#home-page .listing .listing--list .list-item")[0],
      title: "Lorem Ipsum 2",
      content: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
      placement: "bottom",
      subChild: "h4",
    },
    {
      element: $("#social-4"),
      title: "Title of my step",
      placement: "bottom",
      content: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..",
    }
  ]
}

webtour.prototype.initTour = function(){
    
    var tour = new Tour({
        name: "tour", 
        steps: this.step,
        container: "body",
        keyboard: false,
        storage: false,//window.localStorage,
        debug: false,
        backdrop: true,
        backdropContainer: 'body',
        backdropPadding: 0,
        redirect: true,
        orphan: false,
        duration: false,
        delay: false,
        basePath: "",
        template: "<div class='popover tour'>\
            <div class='arrow'></div>\
            <h3 class='popover-title'></h3>\
            <div class='popover-content'></div>\
            <div class='popover-navigation'>\
                <button class='btn btn-green' data-role='prev'>Prev</button>\
                <button class='btn btn-green' data-role='next'>Next</button>\
            </div>\
            <div class='end-wrapper'>\
                <button class='btn btn-green-border' data-role='end'>End tour</button>\
            </div>\
            </nav>\
          </div>",
        afterGetState: function (key, value) {},
        afterSetState: function (key, value) {},
        afterRemoveState: function (key, value) {},
        onStart: function (tour) {},
        onEnd: function (tour) {},
        onShow: function (tour) {},
        onShown: function (tour) {
            return;
            var subChild =  tour._options.steps[tour._current].subChild;
            var placement = tour._options.steps[tour._current].placement;
            if(typeof subChild !== "undefined") {
                var left, top;
                subChild = $(tour._options.steps[tour._current].element).find(subChild);
                if(placement == "top") {
                    left = subChild.offset().left + subChild.width()/2 - $('.tour.in').width()/2;
                    top = subChild.offset().top - 5;
                }
                else if (placement == "bottom") {  
                    left = subChild.offset().left + subChild.width()/2 - $('.tour.in').width()/2;
                    top = subChild.offset().top + subChild.height() + 5;
                }
                else if (placement == "left") {  
                    left = subChild.offset().left - 5;
                    top = subChild.offset().top + subChild.height()/2 - $('.tour.in').height()/2;
                }
                else if (placement == "right") {  
                    left = subChild.offset().left + subChild.width() + 5;
                    top = subChild.offset().top + subChild.height()/2 - $('.tour.in').height()/2;
                }
                setTimeout(function(){

                    $('.tour.in').css({
                        left: left + "px",
                        top: top + "px",
                    });  
                },100)
            }
        },
        onHide: function (tour) {},
        onHidden: function (tour) {},
        onNext: function (tour) {},
        onPrev: function (tour) {},
        onPause: function (tour, duration) {},
        onResume: function (tour, duration) {},
        onRedirectError: function (tour) {}
    }); 

    tour.init();
    tour.start();   
}

