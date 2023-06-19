console.log("here");
let _Query = ""
$.ajax({
  url: "data.php",
  type: "GET",
  dataType: "json",
  success: function (response) {
    console.log(response[0]);
    let BMI = response[0].BMI
    if (!isNaN(BMI)) {
      if (BMI < 18.5) {
        $(document).ready(function () {
          $("#bmi-status .result").html(`<p class="text-mute">BMI : ${BMI}<br>Underweight</p>`)
          $("#bmi-status .blob").css("background-color", "yellow");
        });
      } else if (BMI < 25) {
        $(document).ready(function () {
          $("#bmi-status .result").html(`<p class="text-mute">BMI : ${BMI}<br>Healthy</p>`);
          $("#bmi-status .blob").css("background-color", "green");
        });
      } else if (BMI < 30) {
        $(document).ready(function () {
          $("#bmi-status .result").html(`<p class="text-mute">BMI : ${BMI}<br>Overweight</p>`);
          $("#bmi-status .blob").css("background-color", "orange");
        });
      } else {
        $(document).ready(function () {
          $("#bmi-status .result").html(`<p class="text-mute">BMI : ${BMI}<br>Obesity</p>`);
          $("#bmi-status .blob").css("background-color", "red");
        });
      }
    }

    let bodyFatPercentage = response[0].Body_Fat

    let classification = "";
    let color = ""

    if (bodyFatPercentage >= 2 && bodyFatPercentage <= 5) {
      classification = "Essential fat";
      color = "yellow"
    } else if (bodyFatPercentage >= 6 && bodyFatPercentage <= 13) {
      classification = "Athletes";
      color = "lightgreen"
    } else if (bodyFatPercentage >= 14 && bodyFatPercentage <= 17) {
      classification = "Fitness";
      color = "green"
    } else if (bodyFatPercentage >= 18 && bodyFatPercentage <= 24) {
      classification = "Average";
      color = "blue"
    } else if (bodyFatPercentage >= 25) {
      color = "red"
      classification = "Obese";
    }

    $(document).ready(function () {
      $('#bw-status .result').html(`<p class="text-mute">Body Fat : ${bodyFatPercentage}%<br>${classification}</p>`)
      $("#bw-status .blob").css("background-color", color);
    });

    let BMR = response[0].BMR
    $(document).ready(function () {
      $('#bmr-status .result').html(`<p class="text-mute">BMR : ${BMR}<br>Calories/day`)
      $("#bmr-status .blob").css("background-color", "black");
    });
    const days = [];
    for (let i = 1; i <= 30; i++) {
      days.push(`Day ${i}`);
    }
    const data = [];
    for (let i = 1; i <= 30; i++) {
      data.push(response[0].Ideal_Weight);
    }

    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */
      let areaChartData = {
        labels: days,
        datasets: [
          {
            label: "Weight",
            backgroundColor: "red",
            borderColor: "red",
            pointColor: "red",
            pointStrokeColor: "red",
            pointHighlightFill: "red",
            pointHighlightStroke: "red",
            data: [response[0].Weight],
          },
          {
            label: "Ideal weigth",
            backgroundColor: "Green",
            borderColor: "Green",
            pointColor: "Green",
            pointStrokeColor: "Green",
            pointHighlightFill: "Green",
            pointHighlightStroke: "Green",
            data: data,
          },
          // {
          //   label: "Healthy weigth",
          //   backgroundColor: "blue",
          //   borderColor: "blue",
          //   pointColor: "blue",
          //   pointStrokeColor: "blue",
          //   pointHighlightFill: "blue",
          //   pointHighlightStroke: "blue",
          //   data: [67, 100, 67, 50, 67, 67, 88],
          // },
        ],
      };

      let areaChartOptions = {
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
      let lineChartCanvas = $("#lineChart").get(0).getContext("2d");
      let lineChartOptions = $.extend(true, {}, areaChartOptions);
      let lineChartData = $.extend(true, {}, areaChartData);
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      // lineChartData.datasets[2].fill = false;
      lineChartOptions.datasetFill = false;
      let lineChart = new Chart(lineChartCanvas, {
        type: "line",
        data: lineChartData,
        options: lineChartOptions,
      });
    });
  },
  error: function (xhr, status, error) {
    console.log("Error:", error);
    console.log("xhr:", xhr);
  },
});

$(document).on("click", ".page-link", function (e) {
  e.preventDefault();
  let pageId = $(this).data("page");
  // console.log(pageId);
  $.ajax({
    url: "Plans.php",
    type: "POST",
    data: {
      Query: _Query,
      pageId: pageId,
    },
    success: function (response) {
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
  // console.log(_Query);
  $.ajax({
    url: "/Projet-fil-rouge/code-source/Controllers/Client/Plans.php",
    type: "POST",
    data: { Query: value },
    success: function (response) {
      $(".result").html(response);
    },
    error: function (xhr, status, error) {
      console.log("Error:", error);
      console.log("xhr:", xhr);
    },
  });
});

$(document).ready(function () {
  $('.show').on('click', function () {
    let input = $(this).closest('.input-group').find('input');

    if (input.attr('type') === 'password') {
      input.attr('type', 'text');
      $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
      input.attr('type', 'password');
      $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });

  $(".update").on('click', function () {
    event.preventDefault()
    console.log("the one");
    let Current_password = $('#Current_password').val()
    let New_password = $('#New_password').val()
    let Password_confirmation = $('#Password_confirmation').val()
    console.log(New_password);
    console.log(Password_confirmation);
    if (New_password == Password_confirmation) {
      console.log(Current_password);
      $.ajax({
        url: "profile.php",
        type: "POST",
        data: {
          action: 1,
          password: Current_password,
          newpass: New_password
        },
        success: function (response) {
          $('#modal-default').modal('hide')
          console.log(response);
          $("#responce").html(response);
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
          console.log("xhr:", xhr);
        },
      });
    } else {
      alert("please make sure the New password and the Password confirmation are the same");
    }
  })
});
$(document).ready(function () {
  // Check if the measurements are stored in local storage
  if (localStorage.getItem('measuresEntered')) {
    // Retrieve the measurement values from local storage
    let height = localStorage.getItem('height');
    let weight = localStorage.getItem('weight');
    let neck = localStorage.getItem('neck');
    let waist = localStorage.getItem('waist');
    let hip = localStorage.getItem('hip');
    let starting_date = localStorage.getItem('starting_date');
    let currentDate = new Date().toISOString().split('T')[0];
console.log("done local storage come");
    // Render the measurement values with specific classes or selectors
    $('.time-label .date').text(starting_date)
    $('.time-label .now').text(currentDate)
    $('.timeline-item .timeline-body ul').html(`
<li class="height">height: ${height} cm</li>
<li class="weight">weight: ${weight} kg</li>
<li class="neck">neck: ${neck} cm</li>
<li class="waist">waist: ${waist} cm</li>
<li class="hip">hip: ${hip} cm</li>
`);
  }
});

const settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://type.fit/api/quotes",
  "method": "GET"
}
let min = 1;
let max = 100;
let randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
console.log(randomNum);

$.ajax(settings).done(function (response) {
  const data = JSON.parse(response);
  $('.Quote-author').text(data[randomNum]['author'])
  $('.Quote-text').text(data[randomNum]['text'])

  console.log(data[randomNum]);
});


