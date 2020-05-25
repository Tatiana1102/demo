<?php
include 'cabinet.php';
?>

<head>
<title>Данные о распределении</title>
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
	margin: 55px 5px 5px 0px;
    color: black;
    font-family: Verdana, Helvetica, Arial, sans-serif;
    font-size: 20px;
    height:23px;

}


</style>
<body>

<?php
$type=$_GET["type"];
$id_project=$_GET["id_project"];


$db = mysqli_connect('localhost', 'root', '', 'smart_build') or
die ("Не могу подключиться к	серверу!"); 
mysqli_set_charset($db,'utf8');

if($type==1) // положить в корзину
{

	$strSQL="SELECT id_project,name_project FROM project WHERE id_project='".$id_project."'";
	$result=$db->query($strSQL)
	or die("Не могу выполнить запрос1!"); 

    if ($row=mysqli_fetch_array($result))

    {
     ?>   
    <div class="right_block"> <center>
		<center>	
		<div class="blok-poisk">
		
			<div class="log"><center>
			<h3><i><div class="text10">
			Данные о распределении: 
			<div class="text10"><?php print $row["name_project"]?></div>
            <?php
            $strSQL2="SELECT id_raspredelenie,fk_project, id_project FROM raspredelenie, project WHERE fk_project='".$id_project."'";
            $result2=$db->query($strSQL2)
            or die("Не могу выполнить запрос2!"); 
            if ($row=mysqli_fetch_array($result2)){
                echo $id_project;
            } 
            
            else 
            {?>
            <p></p>
            <button class="button1">
            <center><a href="add_raspredelenie.php?type=1&id_raspredelenie=
            <?php print $result['id_raspredelenie'];?>">
            <font size=-1>Добавить</font></a></center></td></td></tr>
            </button>
            <?php
            }
            ?>
			
			</div></i></h3>

			...
			</div>
			
		</div>   
		
	</center>
	
	
	</div>

	<?php
    }
   
mysqli_query($db,$strSQL);

}


?>




</body>