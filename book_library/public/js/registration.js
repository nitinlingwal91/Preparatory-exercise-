$(document).ready(function(){
    $('#userfcheck').hide();
    $('#userlcheck').hide();
    $('#emailcheck').hide();
    $('#passcheck').hide();
    $('#cpasscheck').hide();

    var userf_err = true;
    var userl_err = true;
    var email_err = true;
    var pass_err = true;
    var cpass_err = true;

    // first name

    $('#user_fname').keyup(function(){
        user_fname_check();
    });

    function user_fname_check(){

        var user_val = $('#user_fname').val();
        if(user_val.length == ''){
            $('#userfcheck').show();
            $('#userfcheck').html("Please fill the name field.");
            $('#userfcheck').focus();
            $('#userfcheck').css("color","red");
            userf_err = false;
            return false;

        }else{
            $('#userfcheck').hide();
        }


        
        if((user_val.length < 3) || (user_val.length > 10)){
            $('#userfcheck').show();
            $('#userfcheck').html("username length must be between 3 to 10");
            $('#userfcheck').focus();
            $('#userfcheck').css("color","red");
            userf_err = false;
            return false;

        }else{
            $('#userfcheck').hide();
        }

    }

// last name
    $('#user_lname').keyup(function(){
        user_lname_check();
    });

    function user_lname_check(){

        var user_val = $('#user_lname').val();
        if(user_val.length == ''){
            $('#userlcheck').show();
            $('#userlcheck').html("Please fill the name field.");
            $('#userlcheck').focus();
            $('#userlcheck').css("color","red");
            userl_err = false;
            return false;

        }else{
            $('#userlcheck').hide();
        }


        
        if((user_val.length < 3) || (user_val.length > 10)){
            $('#userlcheck').show();
            $('#userlcheck').html("username length must be between 3 to 10");
            $('#userlcheck').focus();
            $('#userlcheck').css("color","red");
            userl_err = false;
            return false;

        }else{
            $('#userlcheck').hide();
        }

    }

    // email
    $('#user_email').keyup(function(){
        user_email_check();
    });

    function user_email_check() {
        var emailVal = $('#user_email').val();
        var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      
        if (emailVal.length == 0) {
          $('#emailcheck').show();
          $('#emailcheck').html("Email field cannot be empty.");
          $('#emailcheck').focus();
          $('#emailcheck').css("color","red");
          return false;
        }
      
        if (!emailRegex.test(emailVal)) {
          $('#emailcheck').show();
          $('#emailcheck').html("Please enter a valid email address.");
          $('#emailcheck').focus();
          $('#emailcheck').css("color","red");
          return false;
        }
      
        $('#emailcheck').hide();
        return true;
      }
      

// password
// Password validation
$('#user_password').keyup(function(){
    user_password_check();
    cpwd_check(); // call cpwd_check() whenever user_password is updated
});

function user_password_check(){

    var password_val = $('#user_password').val();
    if(password_val.length == ''){
        $('#passcheck').show();
        $('#passcheck').html("Please fill the password field.");
        $('#passcheck').focus();
        $('#passcheck').css("color","red");
        return false;

    }else{
        $('#passcheck').hide();
    }

    if((password_val.length < 8) || (password_val.length > 20)){
        $('#passcheck').show();
        $('#passcheck').html("Password length must be between 8 to 20");
        $('#passcheck').focus();
        $('#passcheck').css("color","red");
        return false;

    }else{
        $('#passcheck').hide();
    }

    return true;
}

// Confirm Password validation
$('#cpwd').keyup(function(){
    cpwd_check();
});

function cpwd_check(){

    var password_val = $('#user_password').val();
    var confirm_password_val = $('#cpwd').val();

    if(confirm_password_val.length == ''){
        $('#cpasscheck').show();
        $('#cpasscheck').html("Please fill the confirm password field.");
        $('#cpasscheck').focus();
        $('#cpasscheck').css("color","red");
        return false;

    }else{
        $('#cpasscheck').hide();
    }

    if(password_val !== confirm_password_val){
        $('#cpasscheck').show();
        $('#cpasscheck').html("");
        $('#cpasscheck').focus();
        $('#cpasscheck').css("color","red");
        return false;

    }else{
        $('#cpasscheck').hide();
    }

    return true;
}


   
})