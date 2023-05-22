$(window).on("load", function () {
  console.log("window loaded");
  $.ajax({
    url: "index.php",
    type: "POST",
    data: { Query: "" },
    // dataType: "json",
    success: function (response) {
      // if (response.length === 0) {
      $("#result").html(response);
      // } else {
      //   let detailsHtml = "";
      //   for (let i = 0; i < response.length; i++) {
      //     detailsHtml += response[i].card;
      //   }
      //   $("#result").html(detailsHtml);
        // $("#paginate").html(response[0].pagination); // Assuming pagination link is at index 0
      // }
      // console.log(response);
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
  let page = $(this).data("page");

  $.ajax({
    url: "Show_projects.php",
    data: { pageId: page }, // Pass the page number as a parameter
    type: "GET",
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
        $("#paginate").html(response[0].pagination); // Assuming pagination link is at index 0
      }
      console.log(response);
      console.log(status);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
      console.log("status:", status);
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
    // dataType: "json",
    success: function (response) {
      // if (response.length === 0) {
      $("#result").html(response);
      // } else {
      //   let detailsHtml = "";
      //   for (let i = 0; i < response.length; i++) {
      //     detailsHtml += response[i].card;
      //   }
      //   $("#result").html(detailsHtml);
      //   $("#paginate").html(response[0].pagination); // Assuming pagination link is at index 0
      // }
      // console.log(response);
      // console.log(response);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});
