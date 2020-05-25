<?php
include 'cabinet.php';
?>
<title>USER MANEDGER</title>
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

</style>

<body>
	<div class="right_block">
<p><p><p></p></p></p>
			<button class="button button1" onClick="but1()">  Добавить сотрудника
                    <script>
                    function but1()
                            {
                                window.location = "addsotrydnic.php"
                            }
                    </script>
                </button> 
		 
		<center>	
		<div class="blok-poisk">
			<div class="log-text">
				Список сотрудников
				<p></p>
				<?php
					$db = mysqli_connect('localhost', 'root', '', 'smart_build') or
					die ("Не могу подключиться к	серверу!"); 
					mysqli_set_charset($db,'utf8');
					
					$sql = mysqli_query($db, 'SELECT * FROM sotrydnic, dolgnost, profession WHERE id_dolgnost = fk_dolgnost AND id_profession = fk_profession');
					while ($result = mysqli_fetch_array($sql)) { ?>
						
						<table border="0" width="80%" align="center" bgcolor="#a2a2d0" >
							<td align="left" width="85%"><i> <h4> ФИО сотрудника:</h4> </i>
							<?php
						echo "{$result['fam']}  ";
						echo "{$result['NAME']}  ";
						echo "{$result['otchectvo_sotr']}  ";					
							?> 
							<p><i> <h4> Дата рождения:</h4> </i>
							<?php
						echo "{$result['date_birth']}";					
							?></p> 
							<p><i> <h4> Должность:</h4>  </i>
							<?php
						echo "{$result['dolgnost']}";					
							?></p> 
							<td>  <button class="button1">
							<center><a href="prosmotr_sotr.php?type=1&id_sotrydnic=
							<?php print $result['id_sotrydnic'];?>">
							<font size=-1> Подробнее</font></a></center></td></td></tr>
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
