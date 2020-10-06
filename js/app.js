$(function () {
  var userErrors = true;
  var emailErrors = true;
  var phoneErrors = true;
  var messageErrors = true;

  function checkErrors() {
    if (
      userErrors == true ||
      emailErrors == true ||
      phoneErrors == true ||
      messageErrors == true
    ) {
      console.log("errors");
    } else {
      console.log("no errors");
    }
  }

  checkErrors();

  $("#username").blur(function () {
    if ($(this).val().length <= 3) {
      $(this).css("border", "1px solid #f00").parent().parent().find(".form-text").fadeIn(300);
      userErrors = true;
    } else {
      $(this).css("border", "1px solid #0f0").parent().parent().find(".form-text").fadeOut(300);
      userErrors = false;
    }
    checkErrors();
  });

  $("#email").blur(function () {
    if ($(this).val().length <= 0) {
      $(this).css("border", "1px solid #f00").parent().parent().find(".form-text").fadeIn(300);
      emailErrors = true;
    } else {
      $(this).css("border", "1px solid #0f0").parent().parent().find(".form-text").fadeOut(300);
      emailErrors = false;
    }
    checkErrors();
  });

  $("#phone").blur(function () {
    if ($(this).val().length <= 0) {
      $(this).css("border", "1px solid #f00").parent().parent().find(".form-text").fadeIn(300);
      phoneErrors = true;
    } else {
      $(this).css("border", "1px solid #0f0").parent().parent().find(".form-text").fadeOut(300);
      phoneErrors = false;
    }
    checkErrors();
  });

  $("#message").blur(function () {
    if ($(this).val().length <= 0) {
      $(this).css("border", "1px solid #f00").parent().find(".form-text").fadeIn(300);
      messageErrors = true;
    } else {
      $(this).css("border", "1px solid #0f0").parent().find(".form-text").fadeOut(300);
      messageErrors = false;
    }
    checkErrors();
  });

  $(".contact-form").submit(function (e) {
    if (
      userErrors == true ||
      emailErrors == true ||
      phoneErrors == true ||
      messageErrors == true
    ) {
      e.preventDefault();
      $("#username,#email,#phone,#message").blur();
    } else {
    }
  });
});
