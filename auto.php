<?php
$title="Авторизация";
$color="#aaaaff";

$pa_sotryd = $_POST['pa_sotryd'];
$login_sotryd = $_POST["login_sotryd"];

$db = mysqli_connect('localhost', 'root', '', 'smart_build') or
die ("Не могу подключиться к	серверу!"); 
mysqli_set_charset($db,'utf8');

$strSQL1="SELECT * FROM sotrydnic  WHERE login_sotryd='".$login_sotryd. "' AND pa_sotryd='".$pa_sotryd."'";
$result1=$db->query($strSQL1)
or die("Не могу выполнить запрос!"); if($row=mysqli_fetch_array($result1))
{
session_start();#session_register()
$_SESSION["login_sotryd"]=$row["fam"]." ".$row["NAME"];#session_register
$_SESSION["id_sotrydnic"]=$row["id_sotrydnic"];
$message="<tr><td bgcolor='#66cc66' align='center'>
<b>Вы успешно авторизованы</b></td></tr>";
$success=true;
}
else
{
$message="<tr><td bgcolor='#ff9999' align='center'>
<b>Таких логина/ пароля не существует!!!</b></td></tr>";
}
mysqli_close($db);

if($success)
{
    header ('Location: cabinet.php');  // перенаправление на нужную страницу
    exit();    // прерываем работу скрипта, чтобы забыл о прошлом
}
else
{ print $message; include("footer.php");
}
?>