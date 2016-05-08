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
//var wrapper = $(".input_fields_wrap"); //Fields wrapper
//var label = $(".label-input"); // Question label
var wrapper = $("#wrap"); //Fields wrapper
var wrapperC = $("#wrapCheckbox"); //Fields wrapper
var wrapperR = $("#wrapRadio"); //Fields wrapper
var add_button = $("#addQuestionSurvey"); //Add button ID
var add_optionC = $("#addOptionCheckbox"); //Add button ID
var add_optionR = $("#addOptionRadio"); //Add button ID
var x = 1; //initlal text box count

$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div id="wrapChild'+x+'"><div class="form-group"><label class="col-md-4 control-label">Question </label><div class = "col-md-6"><input class ="form-control" type="text" name="question[]"/></div><div class="form-group"><label class="col-md-4 control-label">Question Type</label><div class = "col-md-6"><select class="form-control select_menu" name = "question_type[]" id = "select_menu" onchange = "select(this.value,'+x+');"><option value = "text">Text</option><option value = "multiple-choice">Multiple Choice</option><option value = "checkbox">Checkbox</option></select></div></div></div><div class="form-group" id="multipleChoice'+x+'" style="display:none"> <div class = "col-md-4 control-label"> </div> <div class = "col-md-6 control-label"> <div class="radio"> <label> <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Option<input class="form-control" name = "radio[]"> </label> </div> <div class="radio"> <label> <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Option<input class="form-control" name = "radio[]"> </label> </div> <div id="wrapRadio"></div><div class="radio"> <label> <button class="add-question add_field_button btn btn-default" type="button" id="addOptionRadio">Add More Option</button> </label> </div> </div> </div> <div class="form-group" id="checkbox'+x+'" style="display:none"> <div class = "col-md-4 control-label"> </div> <div class="col-md-6"> <div class="checkbox"> <label> <input type="checkbox" value="">Checkbox<input class="form-control" name = "checkbox[]"> </label> </div><div id="wrapCheckbox"></div><div class="checkbox"> <label> <input type="checkbox" value="">Checkbox<input class="form-control" name = "checkbox[]"> </label> </div> <div class="checkbox"> <label> <button class="add-question add_field_button btn btn-default" type="button" id="addOptionCheckbox">Add More Option</button> </label> </div> </div></div><button class="remove_field btn btn-danger" id ="'+x+'">Remove</button></div>');
}
});

$(add_optionC).click(function(e){ //on add input button click
e.preventDefault();
$(wrapperC).append('<div class="checkbox"> <label> <input type="checkbox" value="">Checkbox <input class="form-control" name = "checkbox[]"></label><span class = "input-group-btn"><button class="remove_fieldC btn btn-danger" id ="">Remove</button></span></div>');
});

$(add_optionR).click(function(e){ //on add input button click
e.preventDefault();
$(wrapperR).append('<div class="radio"> <label> <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Option <input class="form-control" name = "radio[]"> </label><span class = "input-group-btn"><button class="remove_fieldR btn btn-danger" id ="">Remove</button></span></div>');
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault();
//var button_id = this.id;
var question_deleted = this.id;
//$(this).parent('span').remove();
document.getElementById("wrapChild"+question_deleted).remove();
/*document.getElementById(question_deleted).remove();*/
});

$(wrapperR).on("click",".remove_fieldR", function(e){ //user click on remove text
e.preventDefault();
//var button_id = this.id;
$(this).parent('span').parent('div').remove();
});

$(wrapperC).on("click",".remove_fieldC", function(e){ //user click on remove text
e.preventDefault();
//var button_id = this.id;
$(this).parent('span').parent('div').remove();
});

});


