<?php
include 'cabinet.php';
?>
<title>PROJECT</title>
		<meta charset=”utf-8”>
	    <link rel="stylesheet" href="css/normalize.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    	<link rel="stylesheet" href="css/style.css">       
</head>
<style>
table {
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 14px;
  //background: white;
  max-width:80%;
  width: 80%;
  text-align: left;
}
.button1 {
	border-radius: 5px;
    margin: 20px 5px 5px 5px;
}

.log {
	margin: 90px 5px 5px 0px;
    color: black;
    font-family: Verdana, Helvetica, Arial, sans-serif;
    font-size: 20px;
    height:23px;

}
.text10{
	color: fcf5fb;
}
</style>
<body>
<div class="right_block"> <center>	
<div class="log">
<div class="text10">
Календарь событий</div>
<p></p>
<?php


    // местоположение скрипта
    $self = $_SERVER['PHP_SELF']; 
     
    // проверяем, если в переменная month была установлена в URL-адресе, 
    //либо используем PHP функцию date(), чтобы установить текущий месяц.
    if(isset($_GET['month']))
        $month = $_GET['month']; 
    elseif(isset($_GET['viewmonth']))
        $month = $_GET['viewmonth']; 
    else $month = date('m'); 
     
    // Теперь мы проверим, если переменная года устанавливается в URL, 
    //либо использовать PHP функцию date(), 
    //чтобы установить текущий год, если текущий год не установлен в URL-адресе.
    if(isset($_GET['year']))
        $year = $_GET['year']; 
    elseif(isset($_GET['viewyear'])) 
        $year = $_GET['viewyear']; 
    else $year = date('Y'); 
     
    ?>
	    <?php
    if($month == '12')
        $next_year = $year + 1; 
    else $next_year = $year; 
     
    ?>
	<?php
 
 $Month_r = array(
 "1" => "январь",
 "2" => "февраль",
 "3" => "март",
 "4" => "апрель",
 "5" => "май",
 "6" => "июнь",
 "7" => "июль",
 "8" => "август",
 "9" => "сентябрь",
 "10" => "октябрь",
 "11" => "ноябрь",
 "12" => "декабрь"); 
  
 $first_of_month = mktime(0, 0, 0, $month, 1, $year); 
  
 // Массив имен всех дней в неделю
 $day_headings = array('Sunday', 'Monday', 'Tuesday', 
 'Wednesday', 'Thursday', 'Friday', 'Saturday'); 
  
 $maxdays = date('t', $first_of_month); 
 $date_info = getdate($first_of_month); 
 $month = $date_info['mon']; 
 $year = $date_info['year']; 
  
 // Если текущий месяц это январь, 
 //и мы пролистываем календарь задом наперед число, 
 //обозначающее год, должно уменьшаться на один. 
  
 if($month == '1'): 
	 $last_year = $year-1; 
 else: $last_year = $year; 
 endif; 
  
 // Вычитаем один день с первого дня месяца, 
 //чтобы получить в конец прошлого месяца
 $timestamp_last_month = $first_of_month - (24*60*60); 
 $last_month = date("m", $timestamp_last_month);
  
 // Проверяем, что если месяц декабрь, 
 //на следующий месяц равен 1, а не 13
 if($month == '12')
	 $next_month = '1'; 
 else $next_month = $month+1; 
  
 ?>
 <?php
$calendar = " 
<div class=\"block-on-center\">
<table width='390px' height='280px' style='border: 1px solid #cccccc';>
    <tr style='background: #5C8EB3;'>
        <td colspan='7' class='navi'>
            <a style='margin-right: 50px; color: #ffffff;' 
            href='$self?month=".$last_month."&year=".$last_year."'><<</a>
           ".$Month_r[$month]." ".$year."
            <a style='margin-left: 50px; color: #ffffff;'
            href='$self?month=".$next_month."&year=".$next_year."'>>></a>
        </td>
    </tr>
    <tr>
        <td class='datehead'>Пн</td>
        <td class='datehead'>Вт</td>
        <td class='datehead'>Ср</td>
        <td class='datehead'>Чт</td>
        <td class='datehead'>Пт</td>
        <td class='datehead'>Сб</td>
        <td class='datehead'>Вс</td>
    </tr>
    <tr>"; 
?>

<?php
     
	 // очищаем имя класса css
	 $class = "";
	  
	 $weekday = $date_info['wday'];
	  
	 // Приводим к числа к формату 1 - понедельник, ..., 6 - суббота
	 $weekday = $weekday-1; 
	 if($weekday == -1) $weekday=6;
	  
	 // станавливаем текущий день как единица 1
	 $day = 1;
	  
	 // выводим ширину календаря
	 if($weekday > 0) 
		 $calendar .= "<td colspan='$weekday'> </td>";
	  
	 while($day <= $maxdays)
	 {
		 // если суббота, выволдим новую колонку.
		 if($weekday == 7) {
			 $calendar .= "</tr><tr>";
		 $weekday = 0;
	   }
	  
	   $linkDate = mktime(0, 0, 0, $month, $day, $year);
	  
	   // проверяем, если распечатанная дата является сегодняшней датой.
	   //если так, используем другой класс css, чтобы выделить её 
		 if((($day < 10 and "0$day" == date('d')) or ($day >= 10 and "$day" == date('d'))) 
		 and (($month < 10 and "0$month" == date('m')) 
		 or ($month >= 10 and "$month" == date('m'))) and $year == date('Y'))
			$class = "caltoday";
	  
	   //в противном случае, печатаем только ссылку на вкладку
		 else {
		 $d = date('m/d/Y', $linkDate);
	  
		   $class = "cal";
	   }
	  
	   //помечаем выходные дни красным
	   if($weekday == 5 || $weekday == 6) $red='style="color: red" ';
	   else $red='';    
	  
		 $calendar .= "
			 <td class='{$class}'><span ".$red.">{$day}</span>
			 </td>";
		 $day++;
		 $weekday++;  
	 }
	  
	 if($weekday != 7) 
	   $calendar .= "<td colspan='" . (7 - $weekday) . "'> </td>";
	  
	 // выводим сам календарь
	 echo $calendar . "</tr></table>";  
	  
	 ?> <center>
	     <?php
    $months = array(
    'Январь', 
    'Февраль', 
    'Март', 
    'Апрель', 
    'Май', 
    'Июнь', 
    'Июль', 
    'Август', 
    'Сентябрь', 
    'Октябрь', 
    'Ноябрь', 
    'Декабрь');
     
    echo "<form style='float: right; margin-right: 10px;' action='$self' method='get'>
    <select name='month'>";
     
    for($i=0; $i<=11; $i++) {
      echo "<option value='".($i+1)."'";
      if($month == $i+1) 
        echo "selected = 'selected'";
      echo ">".$months[$i]."</option>";
    }
     
    echo "</select>";
    echo "<select name='year'>";
     
    for($i=date('Y'); $i<=(date('Y')+20); $i++)
    {
      $selected = ($year == $i ? "selected = 'selected'" : '');
     
      echo "<option value=\"".($i)."\"$selected>".$i."</option>";
    }
     
    echo "</select><input type='submit' value='смотреть' /></form>";
     
    if($month != date('m') || $year != date('Y'))
      echo "<a style='float: left; margin-left: 10px; font-size: 12px; padding-top: 5px;' 
      href='".$self."?month=".date('m')."&year=".date('Y')."'><< Вернуться к текущей дате</a>";
    echo "</div>"; 
    ?></center></div>	
</center>
	

	</div>
</body>