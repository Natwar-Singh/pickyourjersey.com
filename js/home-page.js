jQuery(document).ready(function(){
  //To fadein login popup
  $("#login_link").click(function(){$("#login").css("display",'block');});
  //to fadein signup popup
  $("#signup_link").click(function(){$("#signup").fadeIn();});
  //to fade out login and signup popup on clicking cross buttons
  $(".cross").click(function(){
    $("#login").css("display",'none');
  	$("#signup").css("display",'none');
});
  //to show login error
  if (!$("#loginfail").length==0) {
        $("#login-error").append('EmailId already Exist');
        $("#login").css("display",'block');
        $("#login-error").css("margin-bottom",'-35px');
       }

  //to prevent directly creating image
  if (!$("#login-first").length==0) {$("#login").css("display",'block');
       }
  //to show message of email alredy exist
  if (!$("#already").length==0) {
       	$("#signup-error").append('EmailId already Exist');
       	$("#signup").css("display",'block');
       }
});
