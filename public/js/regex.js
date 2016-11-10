var ck_email = /^[a-z0-9._%+-]+@ifpb\.edu\.br$/;

function validate(form_mlogin){
    var email = form_mlogin.email.value;
    var errors = [];
     
    if (!ck_email.test(email)) {
        errors[errors.length] = "Email Invalid .";
    }
    
    if (errors.length > 0) {
        reportErrors(errors);
        return false;
    }
    return true;
}
function reportErrors(errors){
    var msg = "Please Enter Valide Data...\n";
    for (var i = 0; i<errors.length; i++) {
        var numError = i + 1;
        msg += "\n" + numError + ". " + errors[i];
    }
 alert(msg);
}
