<? 
define("NEED_AUTH", true);

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog.php");
$APPLICATION->IncludeComponent("bitrix:system.auth.form","",Array(
     "REGISTER_URL" => "register.php",
     "FORGOT_PASSWORD_URL" => "",
     "PROFILE_URL" => "profile.php",
     "SHOW_ERRORS" => "Y" 
     )
);
$GLOBALS['APPLICATION']->RestartBuffer(); 
?>

<?php

// Create connection
@mysql_connect($DBHost, $DBLogin, $DBPassword, $DBName) or die ('Не удалось соединиться с БД');
@mysql_select_db($DBName) or die ('Не удалось выбрать БД');
mysql_set_charset( 'utf8' );

$sth = mysql_query("SELECT * FROM z_report") or die ("error: ".mysql_errno());
$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'name', 'type' => 'string'),
    array('label' => 'value', 'type' => 'number'),
	array( 'type' => 'number', 'role' =>'annotation')
);
$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp = array();
    // the following line will be used to slice the  chart
    $temp[] = array('v' => (string) $r['name']); 
    // Values of each slice
    $temp[] = array('v' =>  $r['value']); 
	$temp[] = array('v' =>  $r['value']); //annotation 2
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);



//--------table
$sth3 = mysql_query("SELECT * FROM z_money") or die ("error: ".mysql_errno());
$rows3 = array();
$table3 = array();
$table3['cols'] = array(
    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
   array('label' => 'БЕ', 'type' => 'string'),
    array('label' => 'Вчера', 'type' => 'number'),
	array('label' => 'Нед.', 'type' => 'number'),
	array('label' => 'Месяц', 'type' => 'number')
);
$rows3 = array();
while($r3 = mysql_fetch_assoc($sth3)) {
    $temp3 = array();
    
    $temp3[] = array('v' => (string) $r3['name']); 


   $temp3[] = array('v' => (float)$r3['moneyTd']); 
	$temp3[] = array('v' => (float)$r3['moneyWk'] ); 
	$temp3[] = array('v' => (float)$r3['moneyMo']); 
    $rows3[] = array('c' => $temp3);
}
$table3['rows'] = $rows3;
$jsonTable3 = json_encode($table3);




?> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Oil Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="css/bootstrapTheme.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Owl Carousel Assets -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	
	<!-- Tables -->
    <link href="css/table.css" rel="stylesheet">
	
    <!-- Prettify -->
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    

    <!-- Le fav and touch icons -->

                                   <link rel="shortcut icon" href="ico/favicon.png">
  </head>
  <body>
<!-- <meta name=viewport content="width=device-width, initial-scale=1">-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <script type="text/javascript">
      
	 
	google.charts.load('current', {packages:['corechart', 'table'], 'language': 'ru'});
    google.charts.setOnLoadCallback(drawChart1);
	
	
    google.charts.setOnLoadCallback(drawTable1);
  

	
//First graph	
    function drawChart1() {
	   var data1 = new google.visualization.DataTable(<?=$jsonTable?>);
	   var formatter = new google.visualization.NumberFormat(
	   {decimalSymbol: ',', fractionDigits: 0,  groupingSymbol: ' ', negativeParens: false, suffix: '%'});
	   formatter.format(data1, 2); // Apply formatter to 1 column
     

var options1 = {
        title: "Выполнение плана продаж за месяц",
		titleTextStyle: {
			fontSize: 12,
			color: '#9E0016',
			bold: true,
			italic: true},
		animation:{
			duration: 1000,
			easing: 'in',
			startup: true},
			bar: {groupWidth: "80%"},	
		colors:['blue'],				
		annotations: {
			textStyle: {
			
			  fontSize: 8,
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
		vAxis: {  minValue:0, maxValue:100},
		bar: {groupWidth: "80%"}, 
            };
  
      var chart = new google.visualization.ColumnChart(document.getElementById("sale"));
	
           chart.draw(data1, options1);

	  }



	//table
function drawTable1() {

	  
	var data3 = new google.visualization.DataTable(<?=$jsonTable3?>);
	   
		
    var table3 = new google.visualization.Table(document.getElementById("table_div1"));
	
	var formatter = new google.visualization.NumberFormat(
	   {fractionDigits: 0,  groupingSymbol: ' ',negativeColor: 'red', negativeParens: false});
	   formatter.format(data3, 1); // Apply formatter to 1 column
	   formatter.format(data3, 2); // Apply formatter to 2 column
	   formatter.format(data3, 3); // Apply formatter to 3 column
	   
	var cssClassNames3 = {'headerRow': 'bold-blue-font','oddTableRow': 'blue-background',
								'headerCell': 'italic-bold-darkblue-font'}; 
	var options3 ={'showRowNumber': false, 'allowHtml': true, 'color': 'black', 'cssClassNames': cssClassNames3, width: '100%'};
			table3.draw(data3, options3);
	}
	


  </script></html>
  
  <!-- Define if this user has the right for this report-->
 <?
   $userID = $USER->GetId(); // Узнаём, что за пользователь
   $result = mysql_query("SELECT GROUP_ID FROM b_user_group where user_id='$userID' and GROUP_ID=19") or die ("error: ".mysql_errno());
   $userGroup = mysql_fetch_array($result);  //узнаем группу пользователя
   //echo $userGroup['GROUP_ID'];
   if ( $userGroup['GROUP_ID'] =='19') { // права на все диаграммы для группы  19
   ?>
 <html>
      <div id="demo">
        <div class="container">
          <div class="row">
            <div class="span12">

          <div id="owl-demo" class="owl-carousel">
              <div class="item lazyOwl" id="sale" style="width: 100%; height: 100%;"></div>
			  
	
	
	<table class="columns">
	<tr> <td style="font-size: 18;  color: #9E0016; text-align: center"><br><br><b>Поступление ДС по БЕ</b><br><br><div class="item lazyOwl" id="table_div1" style="border: 1px solid #ccc"></div></td></tr>
	   </table>
	   
	
	
              </div>

            </div>
          </div>
        </div>

    </div>
	</html>
  <?php
} else{ 

?>
<html>

<style="font-size: 18; color: #9E0016; text-align: center;  margin: auto;">Вам не доступны диаграммы
<a href="/">Вернуться на Главную .</a>
 </html>
<?php

}?>

    <script src="js/jquery-1.9.1.min.js"></script> 
    <script src="js/owl.carousel.js"></script>

    <script>
    $(document).ready(function() {

      $("#owl-demo").owlCarousel({
	 
        items : 1,
        navigation : true,   
		itemsTablet : [768, 1],
        itemsTabletSmall : false,
        itemsMobile : [479, 1],
        singleItem : true,
		scrollPerPage: true
      } );

    });

    </script>


    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-tab.js"></script>

    <script src="js/google-code-prettify/prettify.js"></script>
	  <script src="js/application.js"></script>

  </body>
</html>
