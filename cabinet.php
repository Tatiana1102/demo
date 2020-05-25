<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
		<meta charset=”utf-8”>
	    <link rel="stylesheet" href="css/normalize.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    	<link rel="stylesheet" href="css/style.css">       
</head>
<style>
	body { background: url('../images/menu.png');
		background-size: cover;
        background-size: 100%; 
        display: flex;
         }
</style>
<?php

if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
    session_start(); //do this
}
$message = "";
$login_sotryd=$_SESSION["login_sotryd"];
$id_sotrydnic=$_SESSION["id_sotrydnic"];

$db = mysqli_connect('localhost', 'root', '', 'smart_build') or
die ("Не могу подключиться к	серверу!"); 
mysqli_set_charset($db,'utf8');

if(!isset($login_sotryd))
{
$success=false;
$message="<tr><td bgcolor='#ff9999' align='center'>
<b>Вы не авторизованы!!!</b></td></tr>";
}
else
$success=true;
//include("header.php"); 

print $message;

if($success)
{
include("connect.php");
$strSQL="SELECT * FROM sotrydnic WHERE id_sotrydnic='".$id_sotrydnic."'";
$result=$db->query($strSQL)
or die("Не могу выполнить запрос!"); if($row=mysqli_fetch_array($result))
{
?>

<div class="main-container">
    <div class="left_block">
        <center>
            <div class="blok-log">
                <div class="log-text">
                    <?php print $row["fam"]?>
                    <?php print $row["NAME"]?>
                </div>
            </div>
            <div class="blok-menu">
                <div class="menu-text">
                <a href='project.php'>Project</a>
                </div>
                <div class="menu-text">
                <a href='file_manager.php'>File maneger</a>
                </div>
                <div class="menu-text">
                <a href='user_manager.php'>Users maneger</a>
                </div>
                <div class="menu-text">
                <a href='calendar.php'> Calendar</a>
                </div>
                <div class="menu-text">
                <a href='massages.php'>Messages</a> 
                </div>
            </div>    
            
        </center>
    
        <center>
                 <div class="text1">
                <a href='exit.php'>Logout</a> 
                </div>
        </center>
    </div> 
</div>

<?php 
}
}
mysqli_close($db);
?>