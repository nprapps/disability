<!DOCTYPE html>
<html>
<head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="//www.google.com/jsapi"></script>
  <script src="smartresize.js"></script>
  <script type="text/javascript" charset="utf-8">
  google.load('visualization', '1.0', {'packages' : ['corechart']});
  </script>
  <script type="text/javascript" charset="utf-8">
  var numbers = [
  <?php
ini_set("auto_detect_line_endings", true);

$row = 1;
if (($handle = fopen("data.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    print '[';
    $values = array();
    foreach ($data as $k => $value) {
      $values[] = str_replace(array("\n", "\r"), ' ', (((is_numeric($value) || empty($value)) && $k != 0) ? (int) $value : "'$value'"));
    }
    print implode(', ', $values);
    print "],\n";
  }    
  fclose($handle);
}
?>
];
var options,
data,
chart, 
initOptions = function() {
  var width = $('#wrapper').innerWidth();
  if (width < 600) {
    options.height = width/1.5;
    options.chartArea.width = '80%';
    options.chartArea.height = '70%';
    options.chartArea.left = 60;
    options.legend.position = 'bottom';
  }
  else if (width < 1000) {
    options.height = width/2;
    options.chartArea.width = '60%';
    options.chartArea.height = '80%';
    options.chartArea.left = 60;
    options.legend.position = 'right';
  }
  else {
    options.height = 500;
    options.chartArea.width = '80%';
    options.chartArea.height = '90%';
    options.chartArea.left = 80;
    options.legend.position = 'right';
  }
};
$(function () {

  function drawVisualization() {
    data = google.visualization.arrayToDataTable(numbers);
    chart = new google.visualization.AreaChart(document.getElementById('visualization'));
    options = {
      colors: ['0b403f', '11605e', '17807e', '51a09e', '8bc0bf', 'c5dfdf', 'b39429', 'efc637', 'f7e39b'],
      isStacked: true,
      areaOpacity: 0.9,
      width: '100%',
      height: 500,
      lineWidth: 1,
      chartArea: {
        left: 80,
        top: 20,
        width: '80%',
        height: '90%'
      },
      legend: {
        textStyle: {
          fontSize: 11
        }
      },
      hAxis: {
        showTextEvery: 5,
        maxValue: 2010
      }
    };
    initOptions();
    chart.draw(data, options);
  }

  google.setOnLoadCallback(drawVisualization);
});
$(window).smartresize(function () {
  initOptions();
  chart.draw(data, options);
});
</script>
</head>
<body>
  <div id="wrapper" style="padding: 12px;">
    <div id="visualization">
    </div>
  </div>

</body>
</html>
