var _Query = "";
// Handle pagination link click event
$(document).on("click", ".page-link", function (e) {
  // alert("pagination loaded");
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
      // Handle the response
      $("#result").html(response);
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
    url: "index.php",
    type: "POST",
    data: { Query: value },
      success: function (response) {
        console.log(response);
      $("#result").html(response);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});
