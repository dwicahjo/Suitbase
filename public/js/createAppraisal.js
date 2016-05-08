$(document).ready(function() {
var max_fields = 10; //maximum input boxes allowed
var wrapper = $("#wrap"); //Fields wrapper
var add_button = $("#addQuestionAppraisal"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
    e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div class="form-group"><label class="col-md-4 control-label">Question</label><div class = "col-md-6"><input class ="form-control" type="text" name="question[]" required/><span class = "input-group-btn"><button class="remove_field btn btn-danger" id = "'+x+'">Remove</button></span></div></div>');
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

function remove_question(x) {
document.getElementById(x).remove();
}
