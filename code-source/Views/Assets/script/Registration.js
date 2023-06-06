let $id = (id) => document.getElementById(id);
var [login, register, form] = ["login", "register", "form"].map((id) =>
  $id(id)
);

[login, register].map((element) => {
  element.onclick = function () {
    [login, register].map(($ele) => {
      $ele.classList.remove("active");
    });
    this.classList.add("active");
    this.getAttribute("id") === "login"
      ? form.classList.remove("active")
      : form.classList.add("active");
  };
});

register.click(); // Show the registration form first

$(document).on("click", "#Register", function (e) {
  e.preventDefault();
  if (
    $("#password").val() != null &&
    $("#password").val() == $("#Re_password").val()
  ) {
    $.ajax({
      type: "POST",
      url: "index.php",
      data: {
        action: "register",
        First_name: $("#First_name").val(),
        last_name: $("#last_name").val(),
        email: $("#email").val(),
        password: $("#password").val(),
      },
      success: function () {
        login.click(); // Show the login form
        $("#success-message").show();
      },
    });
  } else {
    alert("passwords do not match");
  }
});

// $(document).on("click", "#logging_in", function (e) {
//   e.preventDefault();
//   if ($("#email").val() != null && $("#password").val() != null) {
//     $.ajax({
//       type: "POST",
//       url: "index.php",
//       data: {
//         action: "login",
//         email: $("#email").val(),
//         password: $("#password").val(),
//       },
//       // success: function () {},
//     });
//   } else {
//     alert("please enter email and password");
//   }
// });
