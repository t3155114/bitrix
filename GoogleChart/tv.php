<?php

// Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
@mysql_connect($servername, $username, $password, $dbname) or die ('Не удалось соединиться с БД');
@mysql_select_db($dbname) or die ('Не удалось выбрать БД');
mysql_set_charset( 'utf8' );

$sth = mysql_query("SELECT * FROM z_report") or die ("error: ".mysql_errno());
$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'name', 'type' => 'string'),
    array('label' => 'value', 'type' => 'number')
);
$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp = array();
    
    $temp[] = array('v' => (string) $r['name']); 
   
    $temp[] = array('v' =>  (number_format($r['value'] , 2, '.', ''))); 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);

//------------------------ data for 2nd chart
$sth2 = mysql_query("SELECT * FROM z_report") or die ("error: ".mysql_errno());
$rows2 = array();
$table2 = array();
$table2['cols'] = array(
    array('label' => 'name', 'type' => 'string'),
    array('label' => 'money', 'type' => 'number')
	
);
$rows2 = array();
while($r2 = mysql_fetch_assoc($sth2)) {
    $temp2 = array();
    
    $temp2[] = array('v' => (string) $r2['name']); 
  
    $temp2[] = array('v' => (number_format($r2['money'], 2, '.', ''))); 
    $rows2[] = array('c' => $temp2);
}

$table2['rows'] = $rows2;
$jsonTable2 = json_encode($table2);
//echo "second data";
//echo $jsonTable;
?> 
<html>
   <meta charset="utf-8">
  <title>Диаграммы TV</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <script type="text/javascript">
    google.charts.load('current', {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart1);
	 
    function drawChart1() {
	   var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var view = new google.visualization.DataView(data)
      view.setColumns([ 0,  1, { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation"  } ]);
	  var options = {
             title: "Выполнение плана продаж за месяц",
titleTextStyle: {
   	fontSize: 24,
      bold: true,
      italic: true,
  },

        bar: {groupWidth: "80%"},
		animation:{
        duration: 1000,
        easing: 'in',
		startup: true},
		  annotations: {
    textStyle: {
      fontName: 'Times-Roman',
      fontSize: 20,
      bold: true,
      italic: true,
      // The color of the text.
      color: 'black',
      // The color of the text outline.
      auraColor: 'white',
      // The transparency of the text.
      opacity: 0.8
    }
  },
		vAxis: { title: "Процент выполнения", minValue:0, maxValue:100},
        legend: { position: "none" },
      };
  
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
	  
	  
	  setTimeout(function(){
var data2 = new google.visualization.DataTable(<?=$jsonTable2?>);
var view2 = new google.visualization.DataView(data2)
      view2.setColumns([ 0,  1, { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation"  } ]);
var options2 = {
        title: "Выполнение плана поступлений ДС за месяц",
		titleTextStyle: {
			fontSize: 24,
			bold: true,
			italic: true,
						},
		
		colors:['green'],
		  annotations: {
    textStyle: {
      fontName: 'Times-Roman',
      fontSize: 20,
      bold: true,
      italic: true,
      // The color of the text.
      color: 'black',
      // The color of the text outline.
      auraColor: 'white',
      // The transparency of the text.
      opacity: 0.8
    }
  },
		legend: { position: "none" },
		vAxis: { title: "Процент выполнения", minValue:0, maxValue:100},
		
        bar: {groupWidth: "80%"},
		animation:{
        duration: 1000,
        easing: 'in',
		startup: true},
 
      };
chart.draw(view2, options2);
},15000);
  }
  
 
  </script></html>

   
   <div id="columnchart_values" style= "position: fixed;   top: 0;   left: 0;   width: 100%;  height: 100%; border: 1px solid #ccc"></div>
       

  <meta http-equiv="Refresh" content="30" />
