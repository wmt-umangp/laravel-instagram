$(document).ready(function () {
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param * 500000)
    }, 'File size must be less than {0} MB');

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
        errorElement: "em",
	    errorPlacement: function ( error, element ) {
	        // Add the `invalid-feedback` class to the error element
            error.insertAfter(element)
	        error.addClass( "invalid-feedback" );
	    },
	    highlight: function ( element, errorClass, validClass ) {
	        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
	    },
	    unhighlight: function (element, errorClass, validClass) {
	        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
	    },
        submitHandler: function(form){
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
        errorElement: "em",
	    errorPlacement: function ( error, element ) {
	        // Add the `invalid-feedback` class to the error element
            error.insertAfter(element)
	        error.addClass( "invalid-feedback" );
	    },
	    highlight: function ( element, errorClass, validClass ) {
	        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
	    },
	    unhighlight: function (element, errorClass, validClass) {
	        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
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
        errorElement: "em",
	    errorPlacement: function ( error, element ) {
	        // Add the `invalid-feedback` class to the error element
            error.insertAfter(element)
	        error.addClass( "invalid-feedback" );
	    },
	    highlight: function ( element, errorClass, validClass ) {
	        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
	    },
	    unhighlight: function (element, errorClass, validClass) {
	        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
	    },
        submitHandler: function(form){
            form.submit();
        }
    });
    $('#addpost').validate({
        rules:{
            'title':{
                required:true,
                maxlength:120,
            },
            'desc':{
                required:true,
                maxlength:300,
            },
            'post_image':{
                required:true,
                extension: "jpg|jpeg|png|gif|mp4|ogg|ogv|avi|mpeg|mov|wmv|flv|mkv",
                filesize: 3,
            },
        },
        messages:{
            'title':{
                required:'Please Enter Post Title',
                maxlength:'Maximum 120 characters allowed',
            },
            'desc':{
                required:'Please Enter Description',
                maxlength:'Maximum 300 characters allowed',
            },
            'post_image':{
                required:'Please upload Profile Image',
                extension: 'Only image or video type jpg,jpeg,png,gif,mp4,ogg,ogv,avi,mpe?g,mov,wmv,flv,mkv is allowed!!',
                filesize: 'File Size Must be less than 5MB',
            }
        },
        errorElement: "em",
	    errorPlacement: function ( error, element ) {
	        // Add the `invalid-feedback` class to the error element
            error.insertAfter(element)
	        error.addClass( "invalid-feedback" );
	    },
	    highlight: function ( element, errorClass, validClass ) {
	        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
	    },
	    unhighlight: function (element, errorClass, validClass) {
	        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
	    },
        submitHandler: function(form){
            form.submit();
        }
    });
});
