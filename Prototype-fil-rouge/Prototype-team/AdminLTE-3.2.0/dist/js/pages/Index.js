$(window).on("load", function () {
  console.log("window loaded");
  $.ajax({
    url: "../AdminLTE-3.2.0/dist/php/Show_projects.php",
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
        // let test = $("#paginate")
        $("#paginate").html(response[0].pagination); // Assuming pagination link is at index 0
      }
      console.log(response[0].pagination);
      // console.log(test);
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
    url: "../AdminLTE-3.2.0/dist/php/Show_projects.php",
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
    url: "../AdminLTE-3.2.0/dist/php/Process_Search.php",
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
        // $("#paginate").html(response[0].pagination); // Assuming pagination link is at index 0
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

$(document).on("click", "#theone", function () {
  // event.preventDefault();
  // $("#reservation-modal").modal("show");
  var page_num = $(this).data("page_num");
  console.log(page_num);
  console.log("the one");
});