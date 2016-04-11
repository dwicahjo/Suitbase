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
$(wrapper).append('<div class="form-group"><label class="col-md-4 control-label">Question '+x+'</label><div class = "col-md-6"><input class ="form-control" type="text" name="mytext[]"/><span class = "input-group-btn"><button class="remove_field btn btn-danger" id = "'+x+'">Remove</button></span></div></div>');
}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); 
//var button_id = this.id;
var question_deleted = this.id;
$(this).parent('span').parent('div').parent('div').remove();
//document.getElementById(button_id).remove();
x--;
})
});