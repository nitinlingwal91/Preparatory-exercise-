$(document).ready(function() {
    $('form').on('submit', function(event) {
        var user_fname = $('#user_fname').val();
        var user_lname = $('#user_lname').val();
        var user_email = $('input[name=user_email]').val();
        var user_password = $('#pwd').val();
        var cpwd = $('#cpwd').val();
        var isChecked = $('input[type=checkbox]').prop('checked');

        if(user_fname == '' || user_lname == '' || user_email == '' || user_password == '' || cpwd == '') {
            alert('Please fill out all fields.');
            event.preventDefault();
        } else if(user_password != cpwd) {
            alert('Passwords do not match.');
            event.preventDefault();
        } else if(!isChecked) {
            alert('Please agree to the terms and conditions.');
            event.preventDefault();
        }
    });
});
