//cook_page

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

angular.module('todoApp', [])
  .controller('TodoListController', function() {
    var todoList = this;
    todoList.todos = [
      {text:'learn angular', done:true},
      {text:'build an angular app', done:false}
      ];

    todoList.addTodo = function() {
      todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todoText = '';
      console.log(todoList.todos);

    };

    todoList.remaining = function() {
      var count = 0;
      angular.forEach(todoList.todos, function(todo) {
        count += todo.done ? 0 : 1;
      });
      return count;
    };

    todoList.archive = function() {
      var oldTodos = todoList.todos;
      todoList.todos = [];
      angular.forEach(oldTodos, function(todo) {
        if (!todo.done) todoList.todos.push(todo);
      });
    };
  });
