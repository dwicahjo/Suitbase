function select(value,index){
if(value == "text"){
    document.getElementById('multipleChoice'+index).style.display = 'none';
    document.getElementById('checkbox'+index).style.display = 'none';
} else if (value == "multiple-choice"){
    document.getElementById('multipleChoice'+index).style.display = 'block';
    document.getElementById('checkbox'+index).style.display = 'none';
} else {
    document.getElementById('multipleChoice'+index).style.display = 'none';
    document.getElementById('checkbox'+index).style.display = 'block';
}
}

$(document).ready(function() {
var max_fields = 10; //maximum input boxes allowed
var wrapper = $("#wrap"); //Fields wrapper
var wrapperC = $("#wrapCheckbox"); //Fields wrapper
var wrapperR = $("#wrapRadio"); //Fields wrapper
var add_button = $("#addQuestionSurvey"); //Add button ID
var add_optionC = $("#addOptionCheckbox"); //Add button ID
var add_optionR = $("#addOptionRadio"); //Add button ID
var x = 0; //initlal text box count

$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div id="wrapChild'+x+'"><div class="form-group"><label class="col-md-4 control-label">Question </label><div class = "col-md-6"><textarea class ="form-control" type="text" name="question[]"/></textarea><input type="hidden" name="idOption[]" value="'+x+'"></div></div><div class="form-group"><label class="col-md-4 control-label">Question Type</label><div class = "col-md-6"><select class="form-control select_menu" name = "question_type[]" id = "select_menu" onchange = "select(this.value,'+x+');"><option value = "text">Text</option><option value = "multiple-choice">Multiple Choice</option><option value = "checkbox">Checkbox</option></select></div></div><div class="form-group" id="multipleChoice'+x+'" style="display:none"> <div class = "col-md-4 control-label"> </div> <div class = "col-md-6 control-label"> <div class="radio"> <label> <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Option<input class="form-control" name = "radio'+x+'[]"> </label> </div> <div class="radio"> <label> <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Option<input class="form-control" name = "radio'+x+'[]"> </label> </div><div class="radio"> <label> <button class="add-question add_field_button btn btn-default addOptionRadio" type="button" id ="'+x+'">Add More Option</button> </label> </div> </div> </div> <div class="form-group" id="checkbox'+x+'" style="display:none"> <div class = "col-md-4 control-label"> </div> <div class="col-md-6"> <div class="checkbox"> <label> <input type="checkbox" value="">Checkbox<input class="form-control" name = "checkbox'+x+'[]"> </label> </div><div class="checkbox"> <label> <input type="checkbox" value="">Checkbox<input class="form-control" name = "checkbox'+x+'[]"> </label> </div> <div class="checkbox"> <label> <button class="add-question add_field_button btn btn-default addOptionCheckbox" type="button" id ="'+x+'">Add More Option</button> </label> </div> </div></div><button class="remove_field btn btn-danger" id ="'+x+'">Remove</button></div>');
}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault();
//var button_id = this.id;
var question_deleted = this.id;
//$(this).parent('span').remove();
document.getElementById("wrapChild"+question_deleted).remove();
/*document.getElementById(question_deleted).remove();*/
});

$(document).on('click', '.addOptionCheckbox', function(){
        $(this).parent().parent().prepend('<div class="checkbox"> <label> <input type="checkbox" value="">Checkbox <input class="form-control" name = "checkbox'+this.id+'[]"></label><span class = "input-group-btn"><button class="removeOption btn btn-danger" id ="">Remove</button></span></div>');
    });

$(document).on('click', '.addOptionRadio', function(){
        $(this).parent().parent().prepend('<div class="radio"> <label> <input type="radio" value="">Option <input class="form-control" name = "radio'+this.id+'[]"></label><span class = "input-group-btn"><button class="removeOption btn btn-danger" id ="">Remove</button></span></div>');
    });

$(document).on('click', '.removeOption', function(){
        $(this).parent().parent().remove();
    });

});


