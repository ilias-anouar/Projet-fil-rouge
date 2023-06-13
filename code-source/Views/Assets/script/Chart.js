$.ajax({
  url: "data.php",
  type: "GET",
  dataType: "json",
  success: function (response) {
    // Handle the response data
    var labels = response.labels;
    var data = response.data;
    // Use the labels and data in your chart
    $(function () {
      "use strict";
      // Get context with jQuery - using jQuery's .get() method.
      var InscriptionChart = $("#inscriptionChart").get(0).getContext("2d");
      var InscriptionChartData = {
        labels: labels,
        datasets: [
          {
            label: "Inscription number",
            backgroundColor: "orangered",
            data: data,
          },
          // {
          //   label: "Electronics",
          //   backgroundColor: "rgba(210, 214, 222, 1)",
          //   borderColor: "rgba(210, 214, 222, 1)",
          //   pointRadius: true,
          //   pointColor: "rgba(210, 214, 222, 1)",
          //   pointStrokeColor: "#c1c7d1",
          //   pointHighlightFill: "#fff",
          //   pointHighlightStroke: "rgba(220,220,220,1)",
          //   data: [65, 59, 80, 81, 56, 55, 40, 50],
          // },
        ],
      };

      var InscriptionChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: true,
          align: "end",
          //   position: "chartArea",
        },
        scales: {
          xAxes: [
            {
              gridLines: {
                display: true,
              },
            },
          ],
          yAxes: [
            {
              gridLines: {
                display: true,
              },
            },
          ],
        },
      };

      // This will get the first returned node in the jQuery collection.
      // eslint-disable-next-line no-unused-vars
      new Chart(InscriptionChart, {
        type: "bar",
        data: InscriptionChartData,
        options: InscriptionChartOptions,
      });
    });
  },
  error: function (error) {
    // Handle any errors
    console.log(error);
  },
});
