male_count = 0;
female_count = 0;

$(document).ready(function () {
  $.getJSON("../public/info.json", function (ret) {
    if (ret.status == "OK") {
      tong = ret.data.length;
      for (i = 0; i < tong; i++) {
        if(ret.data[i].gioiTinh == "Nam") {
          male_count++;
        }
      }
      female_count = tong-male_count;

      $('.gioi-tinh-so-lieu-1').append(
        '<p class="text-left"><br>Tổng số dân là ' + tong + ', trong đó gồm có: ' + 
        male_count + ' nam và ' + 
        female_count + ' nữ.' +
        '</p>'
      );
      $('.gioi-tinh-so-lieu-2').append(
        '<p class="text-left"><br>Tổng số dân là ' + tong + ', trong đó gồm có: ' + 
        male_count + ' nam và ' + 
        female_count + ' nữ.' +
        '</p>'
      );
    }
  });
});
// Load the Visualization API and the corechart package.
google.charts.load('current', { 'packages': ['corechart'] });
google.charts.load('current', {'packages':['bar']});
// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawGenderTotalChart);
google.charts.setOnLoadCallback(drawGenderAgeGroupChart);
// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawGenderTotalChart() {

  // Create the data table.

  var data = google.visualization.arrayToDataTable([
    ['Giới tính', 'Số lượng'],
    ['Nam', male_count],
    ['Nữ', female_count]
  ]);
  // Set chart options

  var options = {
    'title': 'Cơ cấu giới tính',
  };

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('chart_gender_1'));
  chart.draw(data, options);
}

function drawGenderAgeGroupChart() {
  var data = google.visualization.arrayToDataTable([
    ['Độ tuổi', 'Nam', 'Nữ'],
    ['20-30', 1000, 400],
    ['30-40', 1170, 460],
    ['40-50', 660, 1120],
    ['60-70', 1030, 540]
  ]);

  var options = {
    chart: {
      'title': 'Cơ cấu giới tính theo độ tuổi',
    }
  };

  var chart = new google.charts.Bar(document.getElementById('chart_gender_2'));

  chart.draw(data, google.charts.Bar.convertOptions(options));
}
