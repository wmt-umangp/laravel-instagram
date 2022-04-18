$(document).ready(function () {
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");
    $('#signup').validate({
        rules: {
            'name':{
                required:true,
                lettersonly: true,
            },
            'uname':{
                required:true,
                maxlength: 15,
            },
            'email':{
                required: true,
                email: true
            },
            'dob':{
                required:true,
            },
            'profile':{
                required:true,
                extension: "jpg|jpeg|png|gif",
                filesize: 3,
            },
            'password':{
                required: true,
                minlength: 8
            },
            'cpassword':{
                required:true,
                equalTo: "#password"
            }
        },
        messages: {
            'name':{
                required:'Please Enter Name',
                lettersonly: 'Name should be in letters only',
            },
            'uname':{
                required:'Please Enter Username',
                maxlength: 'Username must be less than 15 characters',
            },
            'email':{
                required: 'Please Enter Email',
                email: 'Please Enter Valid Email'
            },
            'dob':{
                required:'Please choose Date of Birth',
            },
            'profile':{
                required:'Please upload Profile Image',
                extension: 'Only image type jpg/png/jpeg/gif is allowed!!',
                filesize: 'Image Size Must be less than 3MB'
            },
            'password':{
                required: 'Please Enter Password',
                minlength: 'Password must be 8 characters long'
            },
            'cpassword':{
                required:'Please Enter Password Again',
                equalTo: "Confirm Password must be same as password"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    $('#signin').validate({
        rules:{
            'uname':{
                required:true,
                maxlength:15,
            },
            'password':{
                required:true,
                minlength: 8,
            },
        },
        messages:{
            'uname':{
                required:'Please Enter Username',
                maxlength:'Username must be less than 15 characters',
            },
            'password':{
                required:'Please Enter Password',
                minlength: 'Password must be 8 characters long',
            },
        },
        submitHandler:function(form){
            form.submit();
        }
    });
    $('#account').validate({
        rules: {
            'name':{
                required:true,
                lettersonly: true,
            },
            'uname':{
                required:true,
                maxlength: 15,
            },
            'email':{
                required: true,
                email: true
            },
            'profile':{
                required:true,
                extension: "jpg|jpeg|png|gif",
                filesize: 3,
            },
        },
        messages: {
            'name':{
                required:'Please Enter Name',
                lettersonly: 'Name should be in letters only',
            },
            'uname':{
                required:'Please Enter Username',
                maxlength: 'Username must be less than 15 characters',
            },
            'email':{
                required: 'Please Enter Email',
                email: 'Please Enter Valid Email'
            },
            'profile':{
                required:'Please upload Profile Image',
                extension: 'Only image type jpg/png/jpeg/gif is allowed!!',
                filesize: 'Image Size Must be less than 3MB'
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
