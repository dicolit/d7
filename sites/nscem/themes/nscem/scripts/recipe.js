//RECIPE PAGE
(function($){
    if(!$('.recipe-page').length)
        return;
    
    var ingredientID = 0;
    var directionID = 0;
    var ingredientList = [];
    var directionList = [];

    var helper = {
        removeItemArray: function(index, arr) {
            arr.splice(index, 1);
        },

        getItemById: function(id, list) {
            for(var i = 0; i<list.length; i++) {
                if(list[i].id == id) {
                    return list[i];
                }
            }
        }
    };

    $('.directions-wrapper').sortable({
        items: ".step-item",
        axis: "y",
        cursor: "move",
        opacity: 0.5,
        handle: ".move-btn",
        update: function(evt,ui) {
            var sortedIDs = $('.directions-wrapper').sortable( "toArray", {attribute: "id"} );
            var sortedList = [];
            for(var i = 0; i < sortedIDs.length ; i++) {
                var id = sortedIDs[i].replace('stepItem-','');
                var item = helper.getItemById(id, directionList);
                sortedList.push(item);
            }
            directionList = sortedList;
            
            for(var j = 0; j < directionList.length; j++)
            {
                directionList[j].id = parseInt(j+1);
                directionList[j].updateOrder();
            }

        },
        
    });
    
    
    /*Show Ingredient Edit Handler*/
    $(document).on('click','.ingredient-item .edit-icon', function(evt){
        var index = $(evt.currentTarget).parents('.ingredient-item').index();
        if(ingredientList[index].checkEditShow())
            ingredientList[index].hideEdit();
        else
            ingredientList[index].showEdit();

    })

    /*Add Ingredient Handler*/
    $('.recipe-page .ingredient-add').on('click', function(evt){
        var ing = new ingredient(ingredientID);
        ingredientList.push(ing);
        $('.ingredient-wrapper').append(ing.jqInstance);
        ingredientID++;
    });

    /*Delete Ingredient Handler*/
    $(document).on('click','.ingredient-item .delete-btn', function(evt){
        var index = $(evt.currentTarget).parents('.ingredient-item').index();
        if(!ingredientList[index].checkConfirmShow())
            ingredientList[index].showConfirm();
    });

    /*Confirm to delete Ingredient Handler*/
    $(document).on('click','.ingredient-item .delete-confirm .confirm-btn.yes', function(evt){
        var index = $(evt.currentTarget).parents('.ingredient-item').index();
        ingredientList[index].delete();
        helper.removeItemArray(index,ingredientList);
    });
    $(document).on('click','.ingredient-item .delete-confirm .confirm-btn.no', function(evt){
        var index = $(evt.currentTarget).parents('.ingredient-item').index();
        ingredientList[index].hideConfirm();
    });

    /*Edit Action Ingredient Handler*/
    $(document).on('click','.ingredient-item .edit-action .cancel', function(evt){
        var index = $(evt.currentTarget).parents('.ingredient-item').index();
        ingredientList[index].hideEdit();
        
    });
    $(document).on('click','.ingredient-item .edit-action .save', function(evt){
        var index = $(evt.currentTarget).parents('.ingredient-item').index();
        ingredientList[index].saveData();
        
    });

    /*Add Direction Handler*/
    $('.recipe-page .step-add').on('click', function(evt){
        var dir = new direction(directionID);
        directionList.push(dir);
        $('.directions-wrapper').append(dir.jqInstance);
        directionID++;
    });

    /*Delete Direction Handler*/
    $(document).on('click', '.step-item .delete-btn', function(evt){
        var index = $(evt.currentTarget).parents('.step-item').index();
        if(!directionList[index].checkConfirmShow())
            directionList[index].showConfirm();   
    });

    /*Confirm to delete Direction Handler*/
    $(document).on('click','.step-item .delete-confirm .confirm-btn.yes', function(evt){
        var index = $(evt.currentTarget).parents('.step-item').index();
        directionList[index].delete();
        helper.removeItemArray(index,directionList);
        for(var j = 0; j < directionList.length; j++)
        {
            directionList[j].id = parseInt(j+1);
            directionList[j].updateOrder();
        }
    });

    $(document).on('click','.step-item .delete-confirm .confirm-btn.no', function(evt){
        var index = $(evt.currentTarget).parents('.step-item').index();
        directionList[index].hideConfirm();
    });
    
})(jQuery);

function direction(_id) {
    this.type = "direction";
    this.id = _id;
    this.setHTML();  
}

direction.prototype.setHTML = function(){
    var html = '<div id="stepItem-'+ this.id +'" class="step-item">\
                    <div class="step-item-wrapper">\
                        <div class="info">\
                            <span class="counter">'+ parseInt(this.id+1) +'</span>\
                            <p contentEditable="true"></p>\
                        </div>\
                        <div class="step-action">\
                            <a class="delete-btn" href="javascript:void(0);"></a>\
                            <a class="move-btn" href="javascript:void(0);"></a>\
                        </div>\
                    </div>\
                    <div class="delete-confirm">\
                        <div class="confirm-msg">\
                            <p>Are you sure you want to delete this ingredient? </p>\
                        </div>\
                        <div class="confirm-action">\
                            <a class="confirm-btn yes" href="javascript:void(0);">Yes</a>\
                            <a class="confirm-btn no" href="javascript:void(0);">No</a>\
                        </div>\
                    </div>\
                </div>';

    this.jqInstance = $(html);
    this.hideConfirm();
}

direction.prototype.checkConfirmShow = function() {
    if(this.jqInstance.find('.delete-confirm').is(':visible'))
        return true;
    else
        return false;
}

direction.prototype.showConfirm = function() {
    this.jqInstance.find('.delete-confirm').show();
}

direction.prototype.hideConfirm = function() {
    this.jqInstance.find('.delete-confirm').hide();
}

direction.prototype.updateOrder = function() {
    this.jqInstance.find('.counter').text(this.id);
    this.jqInstance.attr('id','stepItem-'+this.id);
}

direction.prototype.delete = function() {
    this.jqInstance.remove();
}
/*-----------------------------------------------------------------------------------------*/
function ingredient(_id) {
    this.type = "ingredient";
    this.firstAdd = true;
    this.id = _id;
    this.setHTML();  
}

ingredient.prototype.setHTML = function(){
    var html = '<div class="ingredient-item">\
                    <div class="ingredient-visual">\
                        <p class="name"></p>\
                        <span class="edit-icon"></span>\
                    </div>\
                    <div class="ingredient-edit">\
                        <p class="title">Edit Ingredient</p>\
                        <div class="edit-row">\
                            <div class="qty">\
                                <label>Quantity</label>\
                                <input class="big" type="text">\
                            </div>\
                            <div class="fractions">\
                                <label>Fractions</label>\
                                <div class="select-wrapper fraction-select">\
                                    <select>\
                                        <option>/2</option>\
                                        <option>/4</option>\
                                    </select>\
                                </div>\
                            </div>\
                            <div class="unit">\
                                <label>Unit</label>\
                                <div class="select-wrapper unit-select">\
                                    <select>\
                                        <option>tablespoon</option>\
                                        <option>spoon</option>\
                                    </select>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="edit-row">\
                            <div class="ingredient">\
                                <label>Ingredient</label>\
                                <input class="big" type="text">\
                            </div>\
                        </div>\
                        <div class="edit-action">\
                            <button class="cancel btn btn-green-border">Cancel</button>\
                            <button class="save btn btn-green">Save</button>\
                            <a href="javascript:void(0);" class="delete-btn">\
                                Delete this ingredient\
                            </a>\
                        </div>\
                        <div class="delete-confirm">\
                            <div class="confirm-msg">\
                                <p>Are you sure you want to delete this ingredient? </p>\
                            </div>\
                            <div class="confirm-action">\
                                <a class="confirm-btn yes" href="javascript:void(0);">Yes</a>\
                                <a class="confirm-btn no" href="javascript:void(0);">No</a>\
                            </div>\
                        </div>\
                    </div>\
                </div>';

    this.jqInstance = $(html);
    this.initSelect();
    if(this.firstAdd) {
        this.showEdit();  
        this.hideConfirm(); 
        this.hideDeleteBtn(); 
        this.firstAdd = false;
    }
    
}

ingredient.prototype.checkEditShow = function() {
    if(this.jqInstance.find('.ingredient-edit').is(':visible'))
        return true;
    else
        return false;
}

ingredient.prototype.checkConfirmShow = function() {
    if(this.jqInstance.find('.delete-confirm').is(':visible'))
        return true;
    else
        return false;
}

ingredient.prototype.hideEdit = function() {
    this.jqInstance.find('.ingredient-edit').hide();
}

ingredient.prototype.showEdit = function() {
    this.jqInstance.find('.ingredient-edit').show();
    if(!this.firstAdd)
        this.showDeleteBtn();
}

ingredient.prototype.hideVisual = function() {
    this.jqInstance.find('.ingredient-visual').hide();
}

ingredient.prototype.showVisual = function() {
    this.jqInstance.find('.ingredient-visual').show();
}

ingredient.prototype.showConfirm = function() {
    this.jqInstance.find('.delete-confirm').show();
}

ingredient.prototype.hideConfirm = function() {
    this.jqInstance.find('.delete-confirm').hide();
}

ingredient.prototype.showDeleteBtn = function() {
    this.jqInstance.find('.delete-btn').show();
}

ingredient.prototype.hideDeleteBtn = function() {
    this.jqInstance.find('.delete-btn').hide();
}

ingredient.prototype.delete = function() {
    this.jqInstance.remove();
}

ingredient.prototype.saveData = function() {
    var val = this.jqInstance.find('.qty input').val() + "" 
                +  this.jqInstance.find('.fractions select').val() + " " 
                +  this.jqInstance.find('.unit select').val() + " "
                +  this.jqInstance.find('.ingredient input').val();
    this.jqInstance.find('.ingredient-visual .name').text(val)
}

ingredient.prototype.initSelect = function() {
    //Select Wrapper
    this.jqInstance.find('.select-wrapper').each(function() {
        if ($(this).find('span').length <= 0) {
            $(this).prepend('<span>' + $(this).find('select option:selected').text() + '</span>');
        }
    });
}

