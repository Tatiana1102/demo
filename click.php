<?php
$pos = explode("_",$_POST["sel"]);
$k=$pos[0]; 
$mysqli = mysqli_connect("localhost","root","","smart_build");
$res = mysqli_query($mysqli,"SELECT * FROM pol WHERE id_pol=$k");
$row = mysqli_fetch_assoc($res);
echo $row['g_m'];
?>