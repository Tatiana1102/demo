<head>
		<title>Авторизация</title>
		<meta charset=”utf-8”>
	    <link rel="stylesheet" href="css/normalize.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    	<link rel="stylesheet" href="css/style.css">       
</head>
<style>
	body { background: url('../images/autoriz.png');
		background-size: cover;
    	background-size: 100%;  }
</style>
<body>
    <div class="main-container">
        <div class="auto-blok">
        <form action="auto.php" method = "POST">
        <?php
        if(isset($_SESSION["login_sotryd"]))
        {
        $message="<tr><td bgcolor='#ff9999' align='center'>
        <b>Вы вошли!!!</b></td></tr>"
        //print $_SESSION["login_sotryd"];
        ?>
        
        
        <?php
        }
         
        else {
        ?>
            <div class="textbox">
            
               <center> <input type="text" class="login_auto" name=login_sotryd ></center>
            </div>
            <div class="textbox2"> 
                <div class="label-text">
                 
                <center>
                <center> <input type="password"  class="pas_auto" name=pa_sotryd ></center>
                
                        
            </div>

            <div class="batton batton1">
                <center>
                <input type=submit value=LOGIN style="border-radius: 3px; font-size: 40px;" ></td></tr>
                </center>  
            </div>
             
         <?php    
         }
        ?>
        </div>
    </div>
</body>