
<title>Добавление проекта</title>
		<meta charset=”utf-8”>
	    <link rel="stylesheet" href="css/normalize.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    	<link rel="stylesheet" href="css/style.css">       
</head>
<body>
    <style>
        .blok1{
            padding: 20px;
        }
        .blok2{
            padding: 20px;
        }
        .button2 {
            font-size: 20px;
            padding: 5px 70px;
            float: center;
        }

        .textbox3 {
            border-radius: 5px;
            padding: 5px 45px;
            font-family: Verdana, Helvetica, Arial, sans-serif;
           
        }

        .textbox4 {
            border-radius: 5px;
            padding: 5px 100px;
            font-family: Verdana, Helvetica, Arial, sans-serif;
           
        }
        .textbox5 {
            border-radius: 5px;
            padding: 5px 220px;
            font-family: Verdana, Helvetica, Arial, sans-serif;
           
        }
        .textbox6 {
            border-radius: 5px;
            padding: 5px 3px;
            font-family: Verdana, Helvetica, Arial, sans-serif;
           
        }

        .vnimanie {
            color: red;
        }
    </style>

<?php

    $db = mysqli_connect('localhost','root','','smart_build') or
    die ("Не могу подключится к сереверу!");
    mysqli_set_charset($db,'utf8');
    $message = "";
    $success = "";
    $name_project = "";
    $opicanie = "";
    $date_project = "";
    $date_start_project = "";
    $date_end_project = "";

    $fam_p = "";
    $name_p = "";
    $otchestvo = "";
    $namber_phone_p = "";
    $mail_p = "";
    $seria_pass_p = "";
    $namber_pass_p = "";
    $date_pass_p = "";
    $who_pass_p = "";
    $login_p = "";
    $PASSWORD = "";

    $cantry_project = "";
    $oblast_project ="";
    $city_project = "";
    $strit_project = "";
    $kod_sroit_object = "";
    

    if($_SERVER["REQUEST_METHOD"] == "POST") //добавление руководитель проекта
     {  
        $fam_p = $_POST["fam_p"];
        $name_p = $_POST["name_p"];
        $otchestvo = $_POST["otchestvo"];
        $namber_phone_p = $_POST["namber_phone_p"];
        $mail_p = $_POST["mail_p"];
        $seria_pass_p = $_POST["seria_pass_p"];
        $namber_pass_p = $_POST["namber_pass_p"];
        $date_pass_p = $_POST["date_pass_p"];
        $who_pass_p = $_POST["who_pass_p"];
        $login_p = $_POST["login_p"];
        $PASSWORD = $_POST["PASSWORD"];

            
        $strSQL2="INSERT INTO rykovod_project (id_rykovod_project, fam_p, name_p, otchestvo, namber_phone_p, mail_p, seria_pass_p, namber_pass_p, date_pass_p, who_pass_p, login_p, PASSWORD, fk_dostyp) VALUES (NULL, '".$fam_p."', '".$name_p."', '".$otchestvo."', '".$namber_phone_p."', '".$mail_p."', '".$seria_pass_p."', '".$namber_pass_p."', '".$date_pass_p."', '".$who_pass_p."', '".$login_p."', '".$PASSWORD."', NULL)";
        $result2=$db->query($strSQL2)
        or die("Не могу выполнить запрос вставика руководителя проекта!");
        $success=true;
                   
        }
        $strSQL2="SELECT * FROM  rykovod_project  WHERE fam_p='".$fam_p. "' AND seria_pass_p='".$seria_pass_p."' AND namber_pass_p='".$namber_pass_p."'";
        $result2=$db->query($strSQL2)
        or die("Не могу выполнить запрос поиска руководителя проекта!"); 
        if($row=mysqli_fetch_array($result2))
        {
            $_SESSION["id_rykovod_project"]=$row["id_rykovod_project"];
            $id_rykovod_project_p=$_SESSION["id_rykovod_project"];
            $id_rykovod_project = (int)$id_rykovod_project_p;
        }
        //______________________________________________________________________________________________________________________
       
       
       
        if($_SERVER["REQUEST_METHOD"] == "POST") //добавление места проекта
        {  
           $cantry_project = $_POST["cantry_project"];
           $oblast_project = $_POST["oblast_project"];
           $city_project = $_POST["city_project"];
           $strit_project = $_POST["strit_project"];
           $kod_sroit_object = $_POST["kod_sroit_object"];
           
   
               
           $strSQL2="INSERT INTO place_object (id_place_object, cantry_project, oblast_project, city_project, strit_project, kod_sroit_object) VALUES (NULL, '".$cantry_project."', '".$oblast_project."', '".$city_project."', '".$strit_project."', '".$kod_sroit_object."')";
           $result2=$db->query($strSQL2)
           or die("Не могу выполнить запрос вставика места проекта!");
          
           $success=true;
                      
           }
           $strSQL2="SELECT * FROM  place_object  WHERE kod_sroit_object='".$kod_sroit_object. "'";
           $result2=$db->query($strSQL2)
           or die("Не могу выполнить запрос поиска места проекта!"); 
           if($row=mysqli_fetch_array($result2))
           {
               $_SESSION["id_place_object"]=$row["id_place_object"];
               $id_place_object_p=$_SESSION["id_place_object"];
               $id_place_object = (int)$id_place_object_p;
           }

           //______________________________________________________________________________________________________________________

        if($_SERVER["REQUEST_METHOD"] == "POST") //добавление проекта
        {
            $name_project = $_POST["name_project"];
            $opicanie = $_POST["opicanie"];
            $date_project = $_POST["date_project"];
            $date_start_project = $_POST["date_start_project"];
            $date_end_project = $_POST["date_end_project"];

            
            $strSQL1="INSERT INTO project (id_project, name_project, opicanie, fk_rykovod_project, fk_place_object, date_project, date_start_project, date_end_project, kol_dey_project, kol_sotryd_project, norm_kil_chelovek, fk_statys_project, fk_vid_stroitel, photo_ptoject) VALUES (NULL, '".$name_project."', '".$opicanie."', '".$id_rykovod_project."', '".$id_place_object."', '".$date_project."', '".$date_start_project."', '".$date_end_project."', NULL, NULL, NULL, NULL, NULL, NULL)";
            $result1=$db->query($strSQL1)
            or die("Не могу выполнить запрос вставика дабовления проекта!");
            $message="<tr><td bgcolor='#66cc66' align='center'>
            <b>Сотрудник успешно добавлен</b></td></tr>";
                 ?>
                 <p></p>
                <button class="button button1" onClick="but1()">  Вернуться в раздел проектов
                    <script>
                    function but1()
                            {
                                window.location = "project.php"
                            }
                    </script>
                </button> 
                <?php
            $success=true;
                    
        }
    
    print $message;
    if(!$success)
    {
?>
<?php
    if ($name_project == '<br /><b>Notice</b>:  Undefined variable: fam in <b>C:\xamppp\htdocs\Online_Store\addsotrydnic.php</b> on line <b>74</b><br />')
    {   
        $name_project = "";
        $opicanie = "";
        $date_project = "";
        $date_start_project = "";
        $date_end_project = "";
        $fam_p = "";
        $name_p = "";
        $otchestvo = "";
        $namber_phone_p = "";
        $mail_p = "";
        $seria_pass_p = "";
        $namber_pass_p = "";
        $date_pass_p = "";
        $who_pass_p = "";
        $login_p = "";
        $PASSWORD = "";
        $cantry_project = "";
        $oblast_project ="";
        $city_project = "";
        $strit_project = "";
        $kod_sroit_object = "";
        
    }
?>

   
    <div class="blok1">
        <button class="button2" onClick="but1()"> Отмена
                <script>
                    function but1()
                        {
                            window.location = "project.php"
                        }
                </script>
            </button>   
    </div>
    <form action=add_project.php method=post>
    <center>
        <div class="blok2"> 

            <i><h3>Основные данные проекта</i></h3><p></p> 
        <table border="0" width="85%" align="center">
                        <td align="center" width="40%">Название проекта <p></p> 
                        <input type="text" class="textbox3" name= name_project value="<?php print $name_project ?>"><td>
                        <td align="center" width="40%"> Дата утверждения: <p></p> 
                        <input type="text" class="textbox3" name= date_project value="<?php print $date_project ?>"><td>
                        <td align="center" width="40%"> Краткое описание: <p></p> 
                        <input type="text" class="textbox3" name= opicanie value="<?php print $opicanie ?>"><td>
        </table> 
        <p></p>
        <table border="0" width="85%" align="center">
                        <td align="center" width="40%">Дата начала <p></p> 
                        <input type="text" class="textbox3" name= date_start_project value="<?php print $date_start_project ?>"><td>
                        <td align="center" width="40%">Дата окончания <p></p> 
                        <input type="text" class="textbox3" name= date_end_project value="<?php print $date_end_project ?>"><td>
        </table> 
<p></p>
<i><h3> ______________________________________________________________________________________</i></h3><p></p>
            <i><h3>Руководитель проекта</i></h3><p></p>
        <table border="0" width="85%" align="center">
                            <td align="center" width="70%"> ФИО: <p></p>
                            <input type="text" class="textbox3" name= fam_p with="50px" value="<?php print $fam_p ?>">
                            <input type="text" class="textbox3" name= name_p with="50px" value="<?php print $name_p ?>">
                            <input type="text" class="textbox3" name= otchestvo with="50px" value="<?php print $otchestvo ?>"><p></p>
                            <td align="center" width="30%"> Контактный телефон: <p></p>
                            <input type="text" class="textbox3" name= namber_phone_p with="50px"value="<?php print $namber_phone_p ?>"><p></p>
		</table>
        <p></p>
        <table border="0" width="85%" align="center">
                            <td align="left" width="20%"> Серия паспорта <p></p> 
                            <input type="text" class="textbox3" name= seria_pass_p value="<?php print $seria_pass_p ?>"><td>
                            <td align="left" width="20%"> Номер пасспорта: <p></p> 
                            <input type="text" class="textbox3" name= namber_pass_p value="<?php print $namber_pass_p ?>"><td>
                            <td align="left" width="20%"> Дата пасспорта: <p></p> 
                            <input type="text" class="textbox3" name= date_pass_p value="<?php print $date_pass_p ?>"><td>
                            <td align="left" width="20%"> Кем выдан: <p></p> 
                            <input type="text" class="textbox3" name= who_pass_p value="<?php print $who_pass_p ?>"><td>
        </table> 
        <p></p>
        <table border="0" width="85%" align="center">
                            <td align="left" width="40%">e-mail <p></p>
							<input type="text" class="textbox3" name= mail_p value="<?php print $mail_p ?>"><td>
                            <td align="left" width="40%"> Логин: <p></p> 
                            <input type="text" class="textbox3" name= login_p value="<?php print $login_p ?>"><td>
                            <td align="left" width="40%"> Пароль: <p></p> 
                            <input type="text"class="textbox3" name= PASSWORD value="<?php print $PASSWORD ?>"><td>
                            <td align="left" width="40%"> Доступ: <p></p> 
                            <select name="select" size="1" class="textbox4">
                                <option value="g">Администратор</option>
                                <option value="m">Менеджер отдела кадров</option>
                                <option value="m">Строитель</option>
                                <option value="m">Руководитель проекта</option>
                            </select><td>
        </table> 
        <p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
            <i><h3>Место проекта</i></h3><p></p>
        
        <table border="0" width="85%" align="center">
                            <td align="left" width="30%">Страна <p></p> 
							<input type="text" class="textbox3" name= cantry_project value="<?php print $cantry_project ?>"><td>
                        <td align="left" width="30%"> Область: <p></p> 
                        <input type="text"class="textbox3" name= oblast_project value="<?php print $oblast_project ?>" ><td>
                        <td align="left" width="30%"> Город: <p></p> 
                        <input type="text" class="textbox3" name= city_project value="<?php print $city_project ?>"><td>
        </table> 
        <p></p>
        <table border="0" width="85%" align="center">
                            <td align="left" width="40%"> Улица: <p></p> 
                            <input type="text" class="textbox3" name= strit_project value="<?php print $strit_project ?>"><td>
                            <td align="left" width="40%">Код объекта <p></p>
							<input type="text" class="textbox3" name= kod_sroit_object value="<?php print $kod_sroit_object ?>"><td>
        </table> 
        <p></p>
                        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
                        <i><h3> Вид объекта строительства и его поля</i></h3><p></p>
                        <div class="vnimanie">При отметке обязательно нужно заполнить поля!!!  </div> 
                        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
                        
                         
        <table border="0" width="100%" align="center">
        <td align="center" width="20%"><input type="checkbox" name ="remember3"> Здание<p></p>
                                        <?php /*
                                            if(!empty($_POST)){
                                            if(!empty($_POST['remember3'])){
                                            echo 'checkbox был отмечен, запоминаем поля по введеным данным';
                                            }else{
                                            echo 'записываем нули';
                                            }
                                            }
                                      */  ?> <td>
            <td align="center" width="50%"><input type="checkbox" name ="remember4"> Дорога<p></p>
            <?php
                                           /* if(!empty($_POST)){
                                            if(!empty($_POST['remember4'])){
                                            echo 'checkbox был отмечен, запоминаем поля по введеным данным';
                                            }else{
                                            echo 'записываем нули';
                                            }
                                            } */
                                        ?> 
                                
            <td align="center" width="40%"><input type="checkbox" name ="remember5"> Мост<p></p>

            <?php
                                            /*if(!empty($_POST)){
                                            if(!empty($_POST['remember5'])){
                                            echo 'checkbox был отмечен, запоминаем поля по введеным данным';
                                            }else{
                                            echo 'записываем нули';
                                            }
                                            } */
                                        ?>            
        </table> 
        <table border="0" width="105%" align="center">
                           <td>
                                    Продолжительность рабочего дня <p></p>
                                    <input type="text" class="textbox6" name=cantry_birth > <p></p>
                                    Заданный срок выполнения проекта (рабочие дни) <p></p>
                                    <input type="text" class="textbox6" name=cantry_birth >  <p></p>
                                    Объем грунта (м3) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Количество столбчатых фундаментов (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Объем кирпичной кладки стен  (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Объем кирпичной кладки перегородок  (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Количество колонн  (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Количество перемычек (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Количество плит перекрытия  (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Количество ригелей  (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Площадь этажа (м2) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Площадь этажа (м2) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Количество этажей (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Площадь стен этажа (м2) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Площадь входов-выходов в здание  (шт) <p></p>
                                   

                                   <td>
                                    Продолжительнось рабочего дня <p></p>
                                    <input type="text" class="textbox6" name=cantry_birth > <p></p>
                                    Заданный срок выполнения проекта (рабочие дни) <p></p>
                                    <input type="text" class="textbox6" name=cantry_birth > <p></p>
                                    Протяженность дороги (м) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Площадь дороги (м2) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Площадь обочин (м2) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Площадь откосов (м2) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Объем грунта (м3) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                       
                    <td>
                                   Продолжительность рабочего дня <p></p>
                                    <input type="text" class="textbox6" name=cantry_birth > <p></p>
                                    Заданный срок выполнения проекта (рабочие дни) <p></p>
                                    <input type="text" class="textbox6" name=cantry_birth > <p></p>
                                    Объем грунта (м3) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Ширина мостового сооружения (м) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Длина подхода к мостовому сооружению (м) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Площадь откосов (м2) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Количество упорв для укрепления откосов (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Количество опор (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Количество ригелей (шт) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                    Длина мостового сооружения (м) <p></p>
                                    <input type="text" class="textbox6" name=oblast_birth > <p></p>
                                       
                        </table><p></p>
        </div>
    </center>
    <center>
   <div class="blok1">
        <button class="button2" onClick="but1()"> Добавить проект
                <script>
                    function but1()
                        {
                            window.location = "project.php"
                        }
                </script>
            </button> 
            <?php
            mysqli_close($db);
            } ?>  
    </div></center>
</body>