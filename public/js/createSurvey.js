function select(value){
var text = document.getElementById("select_menu").selectedIndex; //0
var multiple = document.getElementById("select_menu").selectedIndex;//1
var checkbox = document.getElementById("select_menu").selectedIndex;//2
var select_menu = $(".col-md-4 control-label");

if(value == "text"){
alert("text");
} else if (value == "multiple"){
	/*$(select_menu).append('<div class="radio"><label><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Option 1<input class="form-control" name = "option1" required></label></div><div class="radio"><label>
<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Option 2<input class="form-control" name = "option2" required></label></div><div class="radio"><label><button type="submit" class="btn btn-default">Add more options</button></label></div>');*/
alert("in");
} else {
alert("else");
}
}

$(document).ready(function() {
var max_fields = 10; //maximum input boxes allowed
//var wrapper = $(".input_fields_wrap"); //Fields wrapper
//var label = $(".label-input"); // Question label 
var wrapper = $(".form-horizontal"); //Fields wrapper
var add_button = $(".add_field_button"); //Add button ID


var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
//$(label).append('<div class="label-input"><label id = "' + x + '">Question ' + x + '</label></div>'); //Add question label
//$(wrapper).append('<div class="input-group"><input class ="form-control" type="text" name="mytext[]"/><span class = "input-group-btn"><button class="remove_field btn btn-danger" id = "'+x+'">Remove</button></span></div>'); //add input box
$(wrapper).append('<div class="form-group"><label class="col-md-4 control-label">Question '+x+'</label><div class = "col-md-6"><input class ="form-control" type="text" name="mytext[]"/><span class = "input-group-btn"><button class="remove_field btn btn-danger" id = "'+x+'">Remove</button></span></div><div class="form-group"><label class="col-md-4 control-label">Answer Type</label><div class = "col-md-6"><select class="form-control select_menu" name = "answer-type" id = "select_menu" onchange = "select(this.value);"><option value = "text">Text</option><option value = "multiple-choice">Multiple Choice</option><option value = "checkbox">Checkbox</option></select></div></div></div>');
}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); 
//var button_id = this.id;
var question_deleted = this.id;
$(this).parent('span').parent('div').parent('div').remove();
//document.getElementById(button_id).remove();
x--;
});



});


