// $(document).on("keyup", "#search", function () {
//   let value = $(this).val();
//   $("#result").html("");
//   $.ajax({
//     url: "./UI/Process_Search.php",
//     type: "POST",
//     data: { value: value },
//     dataType: "json",
//     success: function (response) {
//       $("#result").html(response.details);
//       console.log(response);
//     },
//     error: function (xhr, status, error) {
//       console.log("Error:", error);
//     },
//   });
// });

$(document).ready(function () {
  console.log("document loaded");
});

$(window).on("load", function () {
  console.log("window loaded");
  $.ajax({
    url: "./UI/Show_projects.php",
    dataType: "json",
    success: function (response, status) {
      if (response.length === 0) {
        $("#result").html("<p>Item not found.</p>");
      } else {
        let detailsHtml = "";
        for (let i = 0; i < response.length; i++) {
          detailsHtml += response[i].card;
        }
        $("#result").html(detailsHtml);
      }
      console.log(response);
      console.log(status);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});

$(document).on("keyup", "#search", function () {
  let value = $(this).val();
  // console.log(value);
  $("#result").html("");
  $.ajax({
    url: "./UI/Process_Search.php",
    type: "POST",
    data: { value: value },
    dataType: "json",
    success: function (response, status) {
      if (response.length === 0) {
        $("#result").html("<p>Item not found.</p>");
      } else {
        let detailsHtml = "";
        for (let i = 0; i < response.length; i++) {
          detailsHtml += response[i].card;
        }
        $("#result").html(detailsHtml);
      }
      console.log(response);
      console.log(status);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});
