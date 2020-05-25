<?php
include 'cabinet.php';
?>
<title>FILE MANEDGER</title>
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
	margin: 130px 5px 5px 0px;
    color: black;
    font-family: Verdana, Helvetica, Arial, sans-serif;
    font-size: 20px;
    height:23px;

}
</style>

<body>
	<div class="right_block"> <center>
		<center>	
		<div class="blok-poisk">
		
			<div class="log"><center>
			
		<center>
		<p></p>
				<i><h3>Список проектов</h3></i>
				<p></p>
				<?php
					$db = mysqli_connect('localhost', 'root', '', 'smart_build') or
					die ("Не могу подключиться к	серверу!"); 
					mysqli_set_charset($db,'utf8');
					
					$sql = mysqli_query($db, 'SELECT name_project, date_project, id_project FROM project');
					while ($result = mysqli_fetch_array($sql)) { ?>
						
						<table border="0" width="80%" align="center" bgcolor="#a2a2d0" >
							<td align="left" width="85%"><i> <h4> Название проекта:</h4> </i>
							<?php
						echo "{$result['name_project']}";					
							?> 
							<p><i> <h4> Дата:</h4> </i>
							<?php
						echo "{$result['date_project']}";					
							?></p> 
							 <td> 
							 <button class="button1">
							<center><a href="raspredelenie.php?type=1&id_project=
							<?php print $result['id_project'];?>">
							<font size=-1> Посмотреть распределение</font></a></center></td></td></tr>
							</button>
							</td>
							<tr>
						</table>
						<p></p>
			<?php
		
					}
				?>
			</div>
		</div>   
		
	</center>
	
	
	</div>
	
	
</body>