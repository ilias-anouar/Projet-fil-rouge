var _Query = "";
// Handle pagination link click event
$(document).on("click", ".page-link", function (e) {
  e.preventDefault();
  let pageId = $(this).data("page");
  console.log(pageId);
  $.ajax({
    url: "index.php",
    type: "POST",
    data: {
      Query: _Query,
      pageId: pageId,
    },
    success: function (response) {
      // console.log(response);
      // Handle the response
      // let div = $(".result");
      // console.log(div);
      $(".result").html(response);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});

$(document).on("keyup", "#search_plan", function () {
  let value = $(this).val();
  _Query = value;
  console.log(_Query);
  $.ajax({
    url: "/Projet-fil-rouge/code-source/Controllers/Admin/Plans/index.php",
    type: "POST",
    data: { Query: value },
    success: function (response, status) {
      // console.log(response);
      console.log(status);
      $(".result").html(response);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});

$(document).on("keyup", "#search_User", function () {
  let value = $(this).val();
  _Query = value;
  console.log(_Query);
  $.ajax({
    url: "/Projet-fil-rouge/code-source/Controllers/Admin/Users/index.php",
    type: "POST",
    data: { Query: value },
    success: function (response, status) {
      console.log(response);
      console.log(status);
      $(".result").html(response);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});
