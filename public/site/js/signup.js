/**
 * @author T N CED tncedric@yahoo.com
 * @description JQuery javascript file that validates user input to sign them up
 */
$(document).ready(function(){
    //grab all the elements that we will work with.
    $sign_up_btn = $("#sign-up-btn");
    $icon = $("#icon");
    $username = $("#username");
    $error = $("#error");
    $cover = $("#cover"); //cover that contains the error msg and the icon. to control their colors
    $group = $("#group"); // the username form-group

    //validation for password and repeat password
    $password = $("#password");
    $rpassword = $("#rpassword");

    //the variable that will storet the password.
    var thepassword = "";

    //for every key up event on the username. get the value
    $username.keyup(function(){
        //get the value of the username.
        var user = $(this).val();

        //if the length is less than 6 then disable the submit buttton.
        if(user.length < 4)
        {
            disable_singup_btn();
            show_error("Username is too short.");
        }
        else
        {
            //fire an ajax query to see if the username is available.
            $.ajax({
               url : "api/checkusername.php",
               method : "POST",
               data : {username:user},
               dataType: "text",
               success: function(data){
                   //check if the data result is true.
                   //if so then the username is available,
                   //else they have to choose another one.
                   if(data == "1")
                   {
                        enable_singup_btn();
                        show_success("Congratulations! Username Available.");
                   }
                   else
                   {
                        show_error("Sorry!. Username already taken");
                   }
               }
            });
        }
    });

    //my functions
    function disable_singup_btn()
    {
        $sign_up_btn.attr('disabled', 'true');
    }

    function enable_singup_btn()
    {
        $sign_up_btn.removeAttr("disabled");
    }

    function show_error(error)
    {
        //start with the form group.
        if($group.hasClass("has-success"))
        {
            //remove the class and add the error class
            $group.removeClass("has-success");
        }

        //now if it does not has the error class then add it.
        if(!$group.hasClass("has-danger"))
        {
            $group.addClass("has-danger");
        }

        //now set the feedback color too for the icons.
        if($cover.hasClass("text-success"))
        {
            $cover.removeClass("text-success");
        }

        if(!$cover.hasClass("text-danger"))
        {
            $cover.addClass("text-danger");
        }

        //now change the icon and change the msg.
        //call function to change the icon.
        icon_times();

        //now set the message.
        $error.html(error);
    }

    function icon_times()
    {
        //if the has the success icon. remove it.
        if($icon.hasClass("fa-check"))
        {
            $icon.removeClass("fa-check");
        }

        if(!$icon.hasClass("fa-times"))
        {
            $icon.addClass("fa-times");
        }
    }

    function icon_success()
    {
        if($icon.hasClass("fa-times"))
        {
            $icon.removeClass("fa-times");
        }

        if(!$icon.hasClass("fa-check"))
        {
            $icon.addClass("fa-check");
        }
    }

    function show_success(success)
    {
        //start with the form group.
        if($group.hasClass("has-danger"))
        {
            //remove the class and add the error class
            $group.removeClass("has-danger");
        }

        //now if it does not has the error class then add it.
        if(!$group.hasClass("has-success"))
        {
            $group.addClass("has-success");
        }

        //now set the feedback color too for the icons.
        if($cover.hasClass("text-danger"))
        {
            $cover.removeClass("text-danger");
        }

        if(!$cover.hasClass("text-success"))
        {
            $cover.addClass("text-success");
        }

        //now change the icon and change the msg.
        //call function to change the icon.
        icon_success();

        //now set the message.
        $error.html(success);
    }

    //validate the password and repeated password.
    $password.keyup(function(){
        //grab the password.
        var pass = $(this).val();

        //if the length is less than 6. the show some errors.
        if(pass.length < 6)
        {
            disable_singup_btn();
            show_password_errors(" Password too short.");
            thepassword = pass;
        }
        else
        {
            enable_singup_btn();
            show_password_success();

            thepassword = pass;
        }
    });

    //now focus out for the repeated password
    $rpassword.keyup(function(){
       //grab the repeated password and compare it with the real password.
       var rpass = $(this).val();

       //now compare them.
       if(rpass !== thepassword)
       {
           //show me some errors.
            disable_singup_btn();

            show_repeat_errors(" Passwords do not match");
       }
       else
       {
           //passwords match. so the form can be submitted.
            enable_singup_btn();

            show_repeat_success();
       }
    });

    function show_password_errors(error)
    {
        $("#pass-confirm").addClass("fa-times").addClass("text-danger")
                .html(error);
    }

    function show_password_success()
    {
        $("#pass-confirm").removeClass("fa-times").removeClass("text-danger")
                .addClass("text-success").addClass("fa-check").html(" OK");
    }

    function show_repeat_errors(error)
    {
        $("#pass-repeat").addClass("fa-times").addClass("text-danger")
                .html(error);
    }

    function show_repeat_success()
    {
        $("#pass-repeat").removeClass("fa-times").removeClass("text-danger")
                .addClass("text-success").addClass("fa-check").html(" Passwords Match");
    }
})
