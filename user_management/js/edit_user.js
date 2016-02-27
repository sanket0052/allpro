$.validate({
    form : '#edit_user_profile',
    modules : 'security, file',
    onError : function($form) {
        //alert('Validation of form '+$form.attr('id')+' failed!');
    },
    onSuccess : function($form) {
        //alert('The form '+$form.attr('id')+' is valid!');
        //return false; // Will stop the submission of the form
    },
    onValidate : function($form) {
        return {
            // element : $('#some-input'),
            // message : 'This input has an invalid value for some reason'
        }
    },
    onElementValidate : function(valid, $el, $form, errorMess) {
        console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
    }
});