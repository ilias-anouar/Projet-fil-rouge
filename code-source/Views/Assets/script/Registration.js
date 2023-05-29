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
