google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
 
function drawChart() {
  var data = google.visualization.arrayToDataTable([
                  ['Article', 'Amount'],
<?php
$query = mysqli_query($db, "SELECT * FROM employees");
while($row = mysqli_fetch_array($query)){
echo "['".$row['department']."',".$row['employees']."],";
}
 
?>
]);
 
// Optional; add a title and set the width and height of the chart
  var options = {'title':'No. of Employees in each department', 'width':800, 'height':400};
 
  // Display the chart inside the <div> element with id="ColumnChart"
  var chart = new google.visualization.ColumnChart(document.getElementById('ColumnChart'));
  chart.draw(data, options);
}