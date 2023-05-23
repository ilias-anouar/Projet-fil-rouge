$(window).on("load", function () {
  console.log("window loaded");
  $.ajax({
    url: "index.php",
    type: "POST",
    data: {
      Query: "",
      pageId: 1,
    },
    success: function (response) {
      // Handle the response
      $("#result").html(response);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
      console.log("status:", status);
    },
  });
});

// Handle pagination link click event
$(document).on("click", ".page-link", function (e) {
  e.preventDefault();
  let pageId = $(this).data("page");
  console.log(pageId);
  $.ajax({
    url: "index.php",
    type: "POST",
    data: {
      Query: "",
      pageId: pageId,
    },
    success: function (response) {
      // Handle the response
      $("#result").html(response);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});

$(document).on("keyup", "#search", function () {
  let value = $(this).val();
  console.log(value);
  $.ajax({
    url: "index.php",
    type: "POST",
    data: { Query: value },
    success: function (response) {
      $("#result").html(response);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});
