console.log("here");
$(function () {
  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */
  var areaChartData = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
      {
        label: "Weight",
        backgroundColor: "rgba(60,141,188,0.9)",
        borderColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [120, 110, 100, 95],
      },
      {
        label: "Ideal weigth",
        backgroundColor: "Green",
        borderColor: "Green",
        pointColor: "Green",
        pointStrokeColor: "Green",
        pointHighlightFill: "Green",
        pointHighlightStroke: "Green",
        data: [65, 65, 65, 65, 65, 65],
      },
      {
        label: "Healthy weigth",
        backgroundColor: "blue",
        borderColor: "blue",
        pointColor: "blue",
        pointStrokeColor: "blue",
        pointHighlightFill: "blue",
        pointHighlightStroke: "blue",
        data: [67, 100, 67, 50, 67, 67, 88],
      },
    ],
  };

  var areaChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: true,
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

  //-------------
  //- LINE CHART -
  //--------------
  var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
  var lineChartOptions = $.extend(true, {}, areaChartOptions);
  var lineChartData = $.extend(true, {}, areaChartData);
  lineChartData.datasets[0].fill = false;
  lineChartData.datasets[1].fill = false;
  lineChartData.datasets[2].fill = false;
  lineChartOptions.datasetFill = false;
  var lineChart = new Chart(lineChartCanvas, {
    type: "line",
    data: lineChartData,
    options: lineChartOptions,
  });
});
