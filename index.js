function validate()
{
    
    var email=$("input[type=email]").val();
    var username=$("#username").val();
    var name=$("#name").val();
    var pass=$("#pass").val();
    var repass=$("#repass").val();
    $(".err_red").html("")
    if(email=="")
        {
       $("#email_err").html("Field must be filled");
        return false;
      
        }
    if(username=="")
        {
            $("#user_err").html("Field must be filled");
            return false;
        }
    if(name=="")
        {
            $("#name_err").html("Field must be filled");
            return false;
        }
    if(pass=="")
        {
            $("#pass_err").html("Field must be filled");
            return false;
        }
    if(pass!=repass)
        {
            $("#repass_err").html("password did't matched please try again");
            return false;
        }
    return true;
}
