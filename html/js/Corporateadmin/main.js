$(function () {
    var baseUrl = window.location.origin,
        paswordMatch = 1;
    $("#loginClick").on("click", function () {
        $("#signinform").css("display", "block");
        $("#signup").css("display", "block");
        $("#signupform").css("display", "none");
        $("#login").css("display", "none");
    });
    $("#signUpClick").on("click", function () {
        $("#signinform").css("display", "none");
        $("#signup").css("display", "none");
        $("#signupform").css("display", "block");
        $("#login").css("display", "block");
    });
    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#password, #confirm_password').css("borderColor", "#ccc");
            paswordMatch = 1;
        } else {
            $('#password, #confirm_password').css("borderColor", "#E34234");
            paswordMatch = 0;
        }

    });
    $("#signupAction").on("click", function (event) {
        if(paswordMatch == 0){
            return false;
        }

        if ($('form#signupform')[0].checkValidity() == true && paswordMatch == 1) {
            event.preventDefault();
            var signupData = $("form#signupform").serialize();
            $.ajax({
                url: baseUrl + "/corp/signup",
                type: "POST",
                data: {
                    formValues: signupData
                },
                success: function (result) {
                    var jsObject = JSON.parse(result);
                    if (jsObject.error == 1)
                    {
                      alert(jsObject.errorMessage);
                        return false;
                    }
                    else{
                        $('form#signupform')[0].reset();
                       alert(jsObject.succesMessage);
                        window.location.href = baseUrl + "/show/viewpage"; 
                    }
                }
            });
        }
        

    });
    $("#signinAction").on("click", function (event) {
        if ($('form#signinform')[0].checkValidity() == true) {
            event.preventDefault();
            var signinData = $("form#signinform").serialize();
            $.ajax({
                url: baseUrl + "/corp/signin",
                type: "POST",
                data: {
                    formValues: signinData
                },
                success: function (result) {
                    var jsObject = JSON.parse(result);
                    if (jsObject.error == 1)
                    {
                      alert(jsObject.errorMessage);
                        return false;
                    }
                    else{
                         $('form#signinform')[0].reset();
                       window.location.href = baseUrl + "/show/viewpage";
                    }
                }
            });
        }

    });
});