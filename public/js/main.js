$(document).ready(function(){
       var options = { 
        //target:        '#contactForm',   // target element(s) to be updated with server response 
        beforeSubmit:  validForm,  // pre-submit callback 
        success:       sucessMessage,  // post-submit callback 
        error:  errorResponse,
        // other available options: 
        url:       '/',         // override for form's 'action' attribute 
        type:      'post',        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null,        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind to the form's submit event 
    $('#contactForm').submit(function() { 
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(options); 
         
         
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    });  
});

function validForm(formData, jqForm, options)
{
    var correct = true;
    var email = $('form input[name="email"]').val();
    var message = $('form textarea[name="message"]').val();
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;
    if (!re.test(email) || message.length <= 0) {

        if (!$('.has-error').length || !$('.help-block').length)
        {
         $('form .form-group:first').addClass('has-error');
         $('form .form-group:first').append(' <span id="helpBlock1" class="help-block">Enter validate email.</span>');   
        
        }
        correct = false;
    }else correct = true;
    console.log(message.length);
    if(message.length <= 0)
    {
       if (!$('#helpBlock2').length)
        { 
         $('form .form-group:eq(1)').addClass('has-error');
         $('form .form-group:eq(1)').append(' <span id="helpBlock2" class="help-block">Plase enter your message.</span>');    
     
        }
        correct = false;
    }else correct = true;
    
    if(!correct) return false;


}

function sucessMessage(responseText, statusText, xhr, $form)
{
    $('#myModal').modal('hide');
    //alert('wysłano!'+' '+responseText);
     $('.alert-box').append('<div class="alert alert-success alert-dismissible" role="alert">\n'+
  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>\n'+
  '<strong>Success!</strong> Your message has been send.</div>\n');
    
}

function errorResponse()
{
    $('#myModal').modal('hide');
    alert('something went wrong!');
   
}

$('#contactBtn').click(function (){
    $('form .form-group').removeClass('has-error');
    $('.help-block').remove();   
});