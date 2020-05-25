<head>
<title>Добавление сотрудника</title>
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
    $fam = "";
    $NAME = "";
    //$otchectvo_sotr = "";
    $nambe_phone = "";
    $date_birth = "";
    $gragdanctvo = "";
    $kod_OKIN = "";
    //$e_mail = "";
    //$g_m = "";
    $cantry_birth = "";
    $oblast_birth = "";
    $city_birth = "";
    //$passport_series = "";
    //$passport_namber = "";
    //$date_passport = "";
    //$date_reg_place_live = "";
    //$who_passport = ""; 
    $canrty_passport = "";
    $oblast_passport = "";
    $sity_passport = "";
    $strit_passport = "";
    $hose_passport = "";
    $kvart_passport  = "";
    $canrty_fakt = "";
    $oblast_fakt = "";
    $sity_fact = "";
    $strit_fact = "";
    $hose_fact = "";
    $kvart_fact = "";
    $pocht_index_fact = "";
    $name_organiz = "";
    $nambe_tryd_dogovor = "";
    $date_trud_dogovor = "";
    $tabel_namber = "";
    $alfavit = "";
    //$charakter_w  = "";
    //$vid_w = "";
    $nambe_trud_book = "";
    //$LANGUAGE = "";
    //$yroven = "";
    //$vid_education = "";
    $name_plase_education_osn = "";
    $date_start_education = "";
    $date_end_education = "";
   //$name_dok = "";
    $seria_dok = "";
    $namber_dok = "";
    $kvalific = "";
    $cpecialnost = "";
    $date_dok_education = "";
   /* $vid_prof_education = "";
    $name_prof_place_edication = "";
    $date_start_prof_education = "";
    $date_end_prof_education = "";
    $namber_dok_prof_education = "";
    $cpecialnost_prof_education = "";
    $date_dok_prof_education = "";
    $dey_o = "";
    $let_o = "";
    $month_o = "";
    $dey_nep = "";	
    $let_nep  = "";
    $month_nep = "";
    $dey_n = "";
    $let_n = ""; 
    $month_n = "";
    $vid_profession = "";*/
    $dolgnost = "";
    $kvalifik = "";
    //$otvet_gotovnost = "";
    //$kol_project = "";
    $date_attest = "";
    $resh_kommis_attest ="";
    $namber_protocol_attest = "";
    $date_prortocol_attest = "";
    $osnovanie_attaest = "";
    $namber_passport_health = "";
    $namber_strax_polis = "";
    $date_med_osmortra = "";
    $name_organ_polis = "";
    $ospasn_proizv_factor = "";
    $date_zakl  = "";
    //$otvet_docter = "";
    $rezyltat_tip_person = "";
    $namber_snils = "";
    $date_snils = "";
    $namber_inn = "";
    $date_inn = "";
    $name_organiz_inn  = "";
    $kod_organa_inn = "";
    /*$namber_voinsk_ychet = "";
    $kategoria_zapas = "";
    $sostav_profil = "";
    $poln_kod_obozn_VYC = "";
    $kategor_gonosty_voin_slygb = "";
    $name_voin_kommisariat = "";
    $sost_in_voin_ychet = "";
    $otmetka_cnat_voin_ycheta = "";*/
    //$dop_information = "";
    //$login_sotryd = ""; 
    //$pa_sotryd = "";
    //$dostyp = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") //добавление гражданства
        {
            $gragdanctvo = $_POST["gragdanctvo"];
            $kod_OKIN = $_POST["kod_OKIN"];

        if($gragdanctvo!="" && $kod_OKIN!="")
            {
                if($gragdanctvo==$kod_OKIN) {}

                else
                    {
                        $strSQL2="INSERT INTO gragdanstvo (id_gragdanstvo, gragdanctvo, kod_OKIN) VALUES (NULL,'".$gragdanctvo."', '".$kod_OKIN."')";
                        $result2=$db->query($strSQL2)
                    or die("Не могу выполнить запрос вставика гражданства!");
                    $message="<tr><td bgcolor='#66cc66' align='center'>
                    <b>Сотрудник успешно добавлен</b></td></tr>";
                    $success=true;
                    }
            }
        else
            $message="<tr><td bgcolor='#ff9999' align='center'>
            <b>Не все поля заполнены в гражданстве!!!</b></td></tr>";
        }
    $strSQL1="SELECT * FROM  gragdanstvo  WHERE gragdanctvo='".$gragdanctvo. "'";
    $result1=$db->query($strSQL1)
    or die("Не могу выполнить запрос поиска гражданства!"); 
    if($row=mysqli_fetch_array($result1))
        {
            $_SESSION["id_gragdanstvo"]=$row["id_gragdanstvo"];
            $success=true;
            $id_gragdanstvo_s=$_SESSION["id_gragdanstvo"];
            $id_gragdanstvo = (int)$id_gragdanstvo_s;
        }
    
        if($_SERVER["REQUEST_METHOD"] == "POST") // добавление места рождения
    {
    
        $cantry_birth =$_POST["cantry_birth"] ;
        $oblast_birth =$_POST["oblast_birth"] ;
        $city_birth = $_POST["city_birth"];

        if($cantry_birth!="" && $oblast_birth!="" /*&& $city_birth=""*/)
        {
                if($cantry_birth==$oblast_birth) {}
            
                else
                    {
                        $strSQL3="INSERT INTO place_birth (id_place_birth, cantry_birth, oblast_birth, city_birth, kod_OKATO) VALUES (NULL, '".$cantry_birth."', '".$oblast_birth."', '".$city_birth."', NULL)";
                        $result3=$db->query($strSQL3)
                    or die("Не могу выполнить запрос вставикb места рождения!");
                    $message="<tr><td bgcolor='#66cc66' align='center'>
                    <b>Сотрудник успешно добавлен</b></td></tr>";
                    $success=true;
                    }
        }
        else
        $message="<tr><td bgcolor='#ff9999' align='center'>
        <b>Не все поля заполнены в месте рождения!!!</b></td></tr>";
    } 

    $id_place_birth="";
    $strSQL4="SELECT * FROM  place_birth  WHERE  city_birth='".$city_birth."'";
    $result4=$db->query($strSQL4)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result4))
        {  
            $_SESSION["id_place_birth"]=$row["id_place_birth"];
            $success=true;
            $id_place_birth_s=$_SESSION["id_place_birth"];
            $id_place_birth = (int)$id_place_birth_s;
            
    }
    echo "место рождения";
    echo $id_place_birth;

        if($_SERVER["REQUEST_METHOD"] == "POST") // добавление места регистрации 
        {
        
            $canrty_passport = $_POST["canrty_passport"];
            $oblast_passport = $_POST["oblast_passport"];
            $sity_passport = $_POST["sity_passport"];
            $strit_passport = $_POST["strit_passport"];
            $hose_passport = $_POST["hose_passport"];
            $kvart_passport  = $_POST["kvart_passport"];
    
            if($canrty_passport!="" && $oblast_passport!="" /*&& $sity_passport="" && $strit_passport="" && $hose_passport="" && $kvart_passport=""*/)
            {
                    if($canrty_passport==$oblast_passport) {}
                
                    else
                        {
                            $strSQL2="INSERT INTO adress_passport (id_adress_passport, canrty_passport, oblast_passport, sity_passport, strit_passport, hose_passport, kvart_passport, pocht_index_passport) VALUES (NULL, '".$canrty_passport."', '".$oblast_passport."', '".$sity_passport."', '".$strit_passport."', '".$hose_passport."', '".$kvart_passport."', NULL)";
                            $result2=$db->query($strSQL2)
                        or die("Не могу выполнить запрос вставить место регистрации!");
                        $message="<tr><td bgcolor='#66cc66' align='center'>
                        <b>Сотрудник успешно добавлен</b></td></tr>";
                        $success=true;
                        }
            }
            else
            $message="<tr><td bgcolor='#ff9999' align='center'>
            <b>Не все поля заполнены в месте регистрации!!!</b></td></tr>";
        } 
       $strSQL5="SELECT * FROM  adress_passport  WHERE  canrty_passport='".$canrty_passport."' AND oblast_passport='".$oblast_passport."' AND sity_passport='".$sity_passport."' AND strit_passport='".$strit_passport."' AND hose_passport='".$hose_passport."' AND kvart_passport='".$kvart_passport."' ";
        $result5=$db->query($strSQL5)
        or die("Не могу выполнить запрос поиска места регистрации!"); 
        if($row=mysqli_fetch_array($result5))
            {  
                $_SESSION["id_adress_passport"]=$row["id_adress_passport"];
                $success=true;
                $id_adress_passport_s=$_SESSION["id_adress_passport"];
                $id_adress_passport = (int)$id_adress_passport_s;
                
        }
        echo "место регистрации";
echo $id_adress_passport;

        if($_SERVER["REQUEST_METHOD"] == "POST") // добавление места фактического адреса
        {
        
            $canrty_fakt = $_POST["canrty_fakt"];
            $oblast_fakt = $_POST["oblast_fakt"];
            $sity_fact = $_POST["sity_fact"];
            $strit_fact = $_POST["strit_fact"];
            $hose_fact = $_POST["hose_fact"];
            $kvart_fact  = $_POST["kvart_fact"];
            $pocht_index_fact = $_POST["pocht_index_fact"];
    
            if($canrty_fakt!="" && $oblast_fakt!="" /*&& $sity_fact="" && $strit_fact="" && $hose_fact="" && $kvart_fact="" && $pocht_index_fact = ""*/)
            {
                    if($canrty_fakt==$oblast_fakt) {}
                
                    else
                        {
                            $strSQL2="INSERT INTO adress_fakt (id_adress_fakt, canrty_fakt, oblast_fakt, sity_fact, strit_fact, hose_fact, kvart_fact, pocht_index_fact) VALUES (NULL, '".$canrty_fakt."' , '".$oblast_fakt."', '".$sity_fact."', '".$strit_fact."', '".$hose_fact."', '".$kvart_fact."', '".$pocht_index_fact."')";
                            $result2=$db->query($strSQL2)
                        or die("Не могу выполнить запрос вставить факт. адрес!");
                        $message="<tr><td bgcolor='#66cc66' align='center'>
                        <b>Сотрудник успешно добавлен</b></td></tr>";
                        $success=true;
                        }
            }
            else
            $message="<tr><td bgcolor='#ff9999' align='center'>
            <b>Не все поля заполнены в факт. адрес!!!</b></td></tr>";
        } 
      $strSQL6="SELECT * FROM  adress_fakt  WHERE  canrty_fakt='".$canrty_fakt."' AND oblast_fakt='".$oblast_fakt."' AND sity_fact='".$sity_fact."' AND strit_fact='".$strit_fact."' AND hose_fact='".$hose_fact."' AND kvart_fact='".$kvart_fact."' ";
        $result6=$db->query($strSQL6)
        or die("Не могу выполнить запрос поиска факт. адрес!"); 
        if($row=mysqli_fetch_array($result6))
            {  
                $_SESSION["id_adress_fakt"]=$row["id_adress_fakt"];
                $success=true;
                $id_adress_fakt_s=$_SESSION["id_adress_fakt"];
                $id_adress_fakt = (int)$id_adress_fakt_s;
                
        }

        echo "фактический адрес";
        echo $id_adress_fakt;

        if($_SERVER["REQUEST_METHOD"] == "POST") // добавление места работы
    {
            $name_organiz=$_POST["name_organiz"];
                
                    $strSQL7="INSERT INTO place_work (id_plase_work, name_organiz, kod_OKYD, kod_OKPO) VALUES (NULL, '".$name_organiz."', NULL, NULL)";
                    $result7=$db->query($strSQL7)
                    or die("Не могу выполнить запрос вставикb места рождения!");
                    $message="<tr><td bgcolor='#66cc66' align='center'>
                    <b>Сотрудник успешно добавлен</b></td></tr>";
                    $success=true;
        
    } 
    $strSQL7="SELECT * FROM  place_work  WHERE  name_organiz='".$name_organiz."'";
    $result7=$db->query($strSQL7)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result7))
        {  
            $_SESSION["id_plase_work"]=$row["id_plase_work"];
            $success=true;
            $id_plase_work_s=$_SESSION["id_plase_work"];
            $id_plase_work = (int)$id_plase_work_s;      
    }
    echo "организация";
    echo $id_plase_work;

    if($_SERVER["REQUEST_METHOD"] == "POST") // добавление трудовой книжки
    {
            $nambe_trud_book=$_POST["nambe_trud_book"];
                
                    $strSQL9="INSERT INTO trud_book (id_trud_book, nambe_trud_book, date_record_TD, dataSet_add_del, prichuna_date_TD, skan_TD) VALUES (NULL, '".$nambe_trud_book."', NULL, NULL, NULL, NULL)";
                    $result9=$db->query($strSQL9)
                    or die("Не могу выполнить запрос вставикb места рождения!");
                    $message="<tr><td bgcolor='#66cc66' align='center'>
                    <b>Сотрудник успешно добавлен</b></td></tr>";
                    $success=true;
        
    } 
    $strSQL9="SELECT * FROM  trud_book  WHERE  nambe_trud_book='".$nambe_trud_book."'";
    $result9=$db->query($strSQL9)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result9))
        {  
            $_SESSION["id_trud_book"]=$row["id_trud_book"];
            $success=true;
            $id_trud_book_s=$_SESSION["id_trud_book"];
            $id_trud_book = (int)$id_trud_book_s;      
    }
    echo "номер трудовой книжки";
    echo $id_trud_book;

    if($_SERVER["REQUEST_METHOD"] == "POST") // добавление документа образования
    {
    
        $seria_dok =$_POST["seria_dok"] ;
        $namber_dok = $_POST["namber_dok"];
        $date_dok_education = $_POST["date_dok_education"];
        $kvalific = $_POST["kvalific"];
        $cpecialnost = $_POST["cpecialnost"];

       
                     $strSQL13="INSERT INTO dok_education (id_dok_education, name_dok, seria_dok, namber_dok, date_dok_education, kvalific, cpecialnost, kod_OKCO) VALUES (NULL, NULL, '".$seria_dok."', '".$namber_dok."', '".$date_dok_education."', '".$kvalific."', '".$cpecialnost."', NULL)";
                    $result13=$db->query($strSQL13)
                    or die("Не могу выполнить запрос вставикb места рождения!");
                    $message="<tr><td bgcolor='#66cc66' align='center'>
                    <b>Сотрудник успешно добавлен</b></td></tr>";
                    $success=true;
                    
      
    }
    
    $strSQL13="SELECT * FROM  dok_education  WHERE  seria_dok='".$seria_dok."' AND namber_dok='".$namber_dok."'";
    $result13=$db->query($strSQL13)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result13))
        {  
            $_SESSION["id_dok_education"]=$row["id_dok_education"];
            $success=true;
            $id_dok_education_s=$_SESSION["id_dok_education"];
            $id_dok_education = (int)$id_dok_education_s;      
    }
    echo "документ образования";
    echo $id_dok_education;

//____________________________________________________________________________________________________________________________________________


    if($_SERVER["REQUEST_METHOD"] == "POST") // добавление образования
    {
    
        $name_plase_education_osn =$_POST["name_plase_education_osn"] ;
        $date_start_education = $_POST["date_start_education"];
        $date_end_education = $_POST["date_end_education"];

                     $strSQL12="INSERT INTO education (id_education, fk_vid_education, name_plase_education_osn, fk_dok_education, date_start_education, date_end_education, fk_poslevyz_prof_education) VALUES (NULL, NULL, '".$name_plase_education_osn."', '".$id_dok_education."', '".$date_start_education."', '".$date_end_education."', NULL)";
                    $result12=$db->query($strSQL12)
                    or die("Не могу выполнить запрос вставикb места рождения!");
                    $message="<tr><td bgcolor='#66cc66' align='center'>
                    <b>Сотрудник успешно добавлен</b></td></tr>";
                    $success=true;
                    
      
    }
    
    $strSQL12="SELECT * FROM  education  WHERE  name_plase_education_osn='".$name_plase_education_osn."' AND fk_dok_education='".$id_dok_education."'";
    $result12=$db->query($strSQL12)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result12))
        {  
            $_SESSION["id_education"]=$row["id_education"];
            $success=true;
            $id_education_s=$_SESSION["id_education"];
            $id_education = (int)$id_education_s;      
    }
    echo " образования";
    echo $id_education;



//___________________________________________________________________________________________________________________________________________


if($_SERVER["REQUEST_METHOD"] == "POST") // добавление должности
    {
    
        $dolgnost =$_POST["dolgnost"] ;

                     $strSQL17="INSERT INTO dolgnost (id_dolgnost, dolgnost) VALUES (NULL, '".$dolgnost."')";
                    $result17=$db->query($strSQL17)
                    or die("Не могу выполнить запрос вставикb места рождения!");
                    $message="<tr><td bgcolor='#66cc66' align='center'>
                    <b>Сотрудник успешно добавлен</b></td></tr>";
                    $success=true;
                    
      
    }
    
    $strSQL17="SELECT * FROM  dolgnost  WHERE  dolgnost='".$dolgnost."'";
    $result17=$db->query($strSQL17)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result17))
        {  
            $_SESSION["id_dolgnost"]=$row["id_dolgnost"];
            $success=true;
            $id_dolgnost_s=$_SESSION["id_dolgnost"];
            $id_dolgnost = (int)$id_dolgnost_s;      
    }
    echo "должность ";
    echo $id_dolgnost;

//______________________________________________________________________________________________________________________________

if($_SERVER["REQUEST_METHOD"] == "POST") // добавление профессии
    {
                     $strSQL16="INSERT INTO profession (id_profession, fk_vid_profession, fk_dolgnost, kod_OKPDTP) VALUES (NULL, NULL, '".$id_dolgnost."', NULL)";
                    $result16=$db->query($strSQL16)
                    or die("Не могу выполнить запрос вставикb места рождения!");
                    $message="<tr><td bgcolor='#66cc66' align='center'>
                    <b>Сотрудник успешно добавлен</b></td></tr>";
                    $success=true;
    }
    
    $strSQL16="SELECT * FROM  profession  WHERE  fk_dolgnost='".$id_dolgnost."'";
    $result16=$db->query($strSQL16)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result16))
        {  
            $_SESSION["id_profession"]=$row["id_profession"];
            $success=true;
            $id_profession_s=$_SESSION["id_profession"];
            $id_profession = (int)$id_profession_s;      
    }
    echo "профессия";
    echo $id_profession;
//__________________________________________________________________________________________________________________________
if($_SERVER["REQUEST_METHOD"] == "POST") // добавление  квалифкации
    {
    
        $kvalifik =$_POST["kvalifik"] ;
        

       
        $strSQL18="INSERT INTO kvalifik (id_kvalifik, kvalifik) VALUES (NULL, '".$kvalifik."')";
    $result18=$db->query($strSQL18)
    or die("Не могу выполнить запрос вставикb места рождения!");
    $message="<tr><td bgcolor='#66cc66' align='center'>
    <b>Сотрудник успешно добавлен</b></td></tr>";
    $success=true;              
      
    }
    
   $strSQL19="SELECT * FROM  kvalifik  WHERE  kvalifik='".$kvalifik."'";
    $result19=$db->query($strSQL19)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result19))
        {  
            $_SESSION["id_kvalifik"]=$row["id_kvalifik"]; 
           $id_kvalifik_s=$_SESSION["id_kvalifik"];
           $id_kvalifik = (int)$id_kvalifik_s;     
    }
    echo " квалификация";
    echo $id_kvalifik;
    //________________________________________________________________________________________________________________---
   
   
    if($_SERVER["REQUEST_METHOD"] == "POST") // добавление  аттестации
    {
    
        $date_attest =$_POST["date_attest"] ;
        $resh_kommis_attest =$_POST["resh_kommis_attest"] ;
        $namber_protocol_attest =$_POST["namber_protocol_attest"] ;
        $date_prortocol_attest =$_POST["date_prortocol_attest"] ;
        $osnovanie_attaest =$_POST["osnovanie_attaest"] ;

        

       
        $strSQL20="INSERT INTO attest (id_attest,date_attest, resh_kommis_attest, namber_protocol_attest, date_prortocol_attest, osnovanie_attaest) VALUES (NULL, '".$date_attest."', '".$resh_kommis_attest."', '".$namber_protocol_attest."', '".$date_prortocol_attest."', '".$osnovanie_attaest."')";
    $result20=$db->query($strSQL20)
    or die("Не могу выполнить запрос вставикb места рождения!");
    $message="<tr><td bgcolor='#66cc66' align='center'>
    <b>Сотрудник успешно добавлен</b></td></tr>";
    $success=true;              
      
    }
    
   $strSQL20="SELECT * FROM  attest  WHERE  namber_protocol_attest='".$namber_protocol_attest."'";
    $result20=$db->query($strSQL20)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result20))
        {  
            $_SESSION["id_attest"]=$row["id_attest"]; 
           $id_attest_s=$_SESSION["id_attest"];
           $id_attest = (int)$id_attest_s;     
    }
    echo " аттестация";
    echo $id_attest;
//___________________________________________________________________________________________________



if($_SERVER["REQUEST_METHOD"] == "POST") // добавление  пз
    {
    
        $namber_passport_health =$_POST["namber_passport_health"] ;
        $namber_strax_polis =$_POST["namber_strax_polis"] ;
        $name_organ_polis =$_POST["name_organ_polis"] ;
        $date_med_osmortra =$_POST["date_med_osmortra"] ;
        $ospasn_proizv_factor =$_POST["ospasn_proizv_factor"] ;
        $date_zakl =$_POST["date_zakl"] ;


        

       
        $strSQL21="INSERT INTO passport_health (id_passport_health, namber_passport_health, date_passport_health, namber_strax_polis, name_organ_polis, OKVAD_rabotodatel, name_stryc_podrazd_rabotod_PZ, ospasn_proizv_factor, date_med_osmortra, name_med_organiz, date_next_med_osmotra, date_zakl, fk_zakl_docter) VALUES (NULL, '".$namber_passport_health."', NULL, '".$namber_strax_polis."', '".$name_organ_polis."', NULL, NULL, '".$ospasn_proizv_factor."', '".$date_med_osmortra."', NULL, NULL, '".$date_zakl."', NULL)";
    $result21=$db->query($strSQL21)
    or die("Не могу выполнить запрос вставикb места рождения!");
    $message="<tr><td bgcolor='#66cc66' align='center'>
    <b>Сотрудник успешно добавлен</b></td></tr>";
    $success=true;              
      
    }
    
   $strSQL21="SELECT * FROM  passport_health  WHERE  namber_passport_health='".$namber_passport_health."'";
    $result21=$db->query($strSQL21)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result21))
        {  
            $_SESSION["id_passport_health"]=$row["id_passport_health"]; 
           $id_passport_health_s=$_SESSION["id_passport_health"];
           $id_passport_health = (int)$id_passport_health_s;     
    }
    echo " паспорт зд";
    echo $id_passport_health;
//___________________________________________________________________________________________________



if($_SERVER["REQUEST_METHOD"] == "POST") // добавление  тип личности
    {
    
        $rezyltat_tip_person =$_POST["rezyltat_tip_person"] ;
        

        

       
        $strSQL22="INSERT INTO tip_person (id_tip_person, rezyltat_tip_person) VALUES (NULL, '".$rezyltat_tip_person."')";
    $result22=$db->query($strSQL22)
    or die("Не могу выполнить запрос вставикb места рождения!");
    $message="<tr><td bgcolor='#66cc66' align='center'>
    <b>Сотрудник успешно добавлен</b></td></tr>";
    $success=true;              
      
    }
    
   $strSQL22="SELECT * FROM  tip_person  WHERE  rezyltat_tip_person='".$rezyltat_tip_person."'";
    $result22=$db->query($strSQL22)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result22))
        {  
            $_SESSION["id_tip_person"]=$row["id_tip_person"]; 
           $id_tip_person_s=$_SESSION["id_tip_person"];
           $id_tip_person = (int)$id_tip_person_s;     
    }
    echo " тип личности";
    echo $id_tip_person_s;
//___________________________________________________________________________________________________


if($_SERVER["REQUEST_METHOD"] == "POST") // добавление  ИНН
    {
    
        $namber_inn =$_POST["namber_inn"] ;
        $date_inn =$_POST["date_inn"] ;
        $name_organiz_inn =$_POST["name_organiz_inn"] ;
        $kod_organa_inn =$_POST["kod_organa_inn"] ;
        

        

       
    $strSQL24="INSERT INTO inn (id_inn, namber_inn, date_inn, name_organiz_inn, kod_organa_inn, skan_inn) VALUES (NULL, '".$namber_inn."', '".$date_inn."', '".$name_organiz_inn."', '".$kod_organa_inn."', NULL)";
    $result24=$db->query($strSQL24)
    or die("Не могу выполнить запрос вставикb места рождения!");
    $message="<tr><td bgcolor='#66cc66' align='center'>
    <b>Сотрудник успешно добавлен</b></td></tr>";
    $success=true;              
      
    }
    
   $strSQL24="SELECT * FROM  inn  WHERE  namber_inn='".$namber_inn."'";
    $result24=$db->query($strSQL24)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result24))
        {  
            $_SESSION["id_inn"]=$row["id_inn"]; 
           $id_inn_s=$_SESSION["id_inn"];
           $id_inn = (int)$id_inn_s;     
    }
    echo " ИНН";
    echo $id_inn;
//___________________________________________________________________________________________________


if($_SERVER["REQUEST_METHOD"] == "POST") // добавление  СНИСЛ
    {
    
        $namber_snils =$_POST["namber_snils"];
        $date_snils =$_POST["date_snils"];

        

       
        $strSQL23="INSERT INTO snils (id_snils, namber_snils, date_snils, skan_snils) VALUES (NULL, '".$namber_snils."', '".$date_snils."', NULL)";
    $result23=$db->query($strSQL23)
    or die("Не могу выполнить запрос вставикb места рождения!");
    $message="<tr><td bgcolor='#66cc66' align='center'>
    <b>Сотрудник успешно добавлен</b></td></tr>";
    $success=true;              
      
    }
    
   $strSQL23="SELECT * FROM  snils  WHERE  namber_snils='".$namber_snils."'";
    $result23=$db->query($strSQL23)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result23))
        {  
            $_SESSION["id_snils"]=$row["id_snils"]; 
           $id_snils_s=$_SESSION["id_snils"];
           $id_snils = (int)$id_snils_s;     
    }
    echo " СНИЛС";
    echo $id_snils;
//___________________________________________________________________________________________________

if($_SERVER["REQUEST_METHOD"] == "POST") // добавление  труд договора
    {
    
        $nambe_tryd_dogovor =$_POST["nambe_tryd_dogovor"] ;
        $date_trud_dogovor =$_POST["date_trud_dogovor"] ;
        $tabel_namber =$_POST["tabel_namber"] ;
        $alfavit =$_POST["alfavit"] ;

        

       
        $strSQL8="INSERT INTO tryd_dogovor (id_tryd_dogovor, nambe_tryd_dogovor, date_trud_dogovor, tabel_namber, fk_inn, fk_snils, alfavit, charakter_work, vid_work) VALUES (NULL, '".$nambe_tryd_dogovor."', '".$date_trud_dogovor."', '".$tabel_namber."', '".$id_inn."', '".$id_snils."', '".$alfavit."', NULL, NULL)";
    $result8=$db->query($strSQL8)
    or die("Не могу выполнить запрос вставикb места рождения!");
    $message="<tr><td bgcolor='#66cc66' align='center'>
    <b>Сотрудник успешно добавлен</b></td></tr>";
    $success=true;              
      
    }
    
   $strSQL8="SELECT * FROM  tryd_dogovor  WHERE  nambe_tryd_dogovor='".$nambe_tryd_dogovor."'";
    $result8=$db->query($strSQL8)
    or die("Не могу выполнить запрос поиска места рождения!"); 

    if($row=mysqli_fetch_array($result8))
        {  
            $_SESSION["id_tryd_dogovor"]=$row["id_tryd_dogovor"]; 
           $id_tryd_dogovor_s=$_SESSION["id_tryd_dogovor"];
           $id_tryd_dogovor = (int)$id_tryd_dogovor_s;     
    }
    echo " ТРУД ДОГОВОР";
    echo $id_tryd_dogovor;
//___________________________________________________________________________________________________





    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $fam = $_POST["fam"];
        $NAME = $_POST["NAME"];
        $nambe_phone = $_POST ["nambe_phone"];
        $date_birth = $_POST["date_birth"];
       // $otchectvo_sotr=$_POST["otchectvo_sotr"];
       // $e_mail = $_POST["e_mail"];
       /* $passport_series = $_POST ["passport_series"];
        $passport_namber = $_POST["passport_namber"];
        $date_passport = $_POST["date_passport"];
        $date_reg_place_live = $_POST["date_reg_place_live"];
        $who_passport = $_POST["who_passport"];
        $kol_project = $_POST["kol_project"];
        $dop_information = $_POST["dop_information"];
        $login_sotryd = $_POST["login_sotryd"]; 
        $pa_sotryd = ["pa_sotryd"];*/

        if($fam!="" && $NAME!="" && $nambe_phone!="" && $date_birth!="" /*&& $e_mail="" /*&& $passport_series="" && $passport_namber="" && $date_passport="" && $date_reg_place_live="" && $who_passport="" && $kol_project= "" && $dop_information="" && $login_sotryd="" && $pa_sotryd="" */)
        {
            if($fam==$NAME) {}

            else
                {
                    $strSQL1="SELECT id_sotrydnic FROM sotrydnic WHERE fam = '".$fam."'";
                    $result1=$db->query($strSQL1) 
                    or die("Не могу выполнить запрос!"); 
                    if($row=mysqli_fetch_array($result1))
                        {
                            $message="<tr><td bgcolor='#ff9999' align='center'>
                            <b>Такой сотрудник уже существует!!!</b></td></tr>";
                        }
                    else
                    {
                        $strSQL1="INSERT INTO sotrydnic (id_sotrydnic, fk_place_work, fk_tryd_dogovor, fam, NAME, otchectvo_sotr, date_birth, fk_pol, fk_place_birth, fk_gragdanstvo, fk_inostran, fk_education, fk_sost_brak, fk_sostav_family, passport_series, passport_namber, date_passport, who_passport, skan_passport_osn, skan_passport_reg, fk_work_experience, fk_profession, fk_trud_book, fk_snils, fk_inn, fk_passport_health, fk_tip_person, fk_gotovn_k_komandirovkam, kol_project, fk_adress_fakt, fk_adress_passport, date_reg_place_live, nambe_phone, e_mail, fk_voinsk_ychet, fk_add_and_perevod, fk_attest, fk_pov_kvalifik, fk_kvalifik, fk_prov_perepodgotovka, fk_nagrada, fk_otpysk, fk_soc_lgots, dop_information, fk_del, login_sotryd, pa_sotryd, photo_sotryd, fk_dostyp, fk_zanatost) VALUES (NULL, '".$id_plase_work."', '".$id_tryd_dogovor."', '".$fam."', '".$NAME."', NULL, '".$date_birth."', NULL, NULL, '".$id_gragdanstvo."', NULL, '".$id_education."', NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL, NULL, '".$id_profession."', '".$id_trud_book."', '".$id_snils."', '".$id_inn."', '".$id_passport_health."', '".$id_tip_person."', NULL, NULL,'".$id_adress_fakt."', '".$id_adress_passport."', NULL, '".$nambe_phone."', NULL, NULL, NULL, '".$id_attest."', NULL, '".$id_kvalifik."', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
                        $result1=$db->query($strSQL1)
                        or die("Не могу выполнить запрос на вставку данных сотрудника!");
                        $message="<tr><td bgcolor='#66cc66' align='center'>
                        <b>Сотрудник успешно добавлен</b></td></tr>";
                        $success=true;
                    }
                }
        }
        else
        $message="<tr><td bgcolor='#ff9999' align='center'>
        <b>Не все поля заполнены!!!</b></td></tr>";
    }
    print $message;
    if(!$success)
    {
?>
<?php
    if ($fam == '<br /><b>Notice</b>:  Undefined variable: fam in <b>C:\xamppp\htdocs\Online_Store\addsotrydnic.php</b> on line <b>74</b><br />')
    {
        $fam = "";
        $NAME = "";
        //$otchectvo_sotr = "";
        $nambe_phone = "";
        $date_birth = "";
        $gragdanctvo = "";
        $kod_OKIN = "";
       // $e_mail = "";
        //$g_m = "";
        $cantry_birth = "";
        $oblast_birth = "";
        $city_birth = "";
        //$passport_series = "";
        //$passport_namber = "";
        //$date_passport = "";
        //$date_reg_place_live = "";
        //$who_passport = ""; 
        $canrty_passport = "";
        $oblast_passport = "";
        $sity_passport = "";
        $strit_passport = "";
        $hose_passport = "";
        $kvart_passport  = "";
        $canrty_fakt = "";
        $oblast_fakt = "";
        $sity_fact = "";
        $strit_fact = "";
        $hose_fact = "";
        $kvart_fact = "";
        $pocht_index_fact = "";
        $name_organiz = "";
        $nambe_tryd_dogovor = "";
        $date_trud_dogovor = "";
        $tabel_namber = "";
        $alfavit = "";
        //$charakter_w  = "";
        //$vid_w = "";
        $nambe_trud_book = "";
        //$LANGUAGE = "";
        //$yroven = "";
        //$vid_education = "";
        $name_plase_education_osn = "";
        $date_start_education = "";
        $date_end_education = "";
       //$name_dok = "";
        $seria_dok = "";
        $namber_dok = "";
        $kvalific = "";
        $cpecialnost = "";
        $date_dok_education = "";
       /* $vid_prof_education = "";
        $name_prof_place_edication = "";
        $date_start_prof_education = "";
        $date_end_prof_education = "";
        $namber_dok_prof_education = "";
        $cpecialnost_prof_education = "";
        $date_dok_prof_education = "";
        $dey_o = "";
        $let_o = "";
        $month_o = "";
        $dey_nep = "";	
        $let_nep  = "";
        $month_nep = "";
        $dey_n = "";
        $let_n = ""; 
        $month_n = "";
        $vid_profession = "";*/
        $dolgnost = "";
        $kvalifik = "";
       // $otvet_gotovnost = "";*/
        //$kol_project = "";
        $date_attest = "";
        $resh_kommis_attest ="";
        $namber_protocol_attest = "";
        $date_prortocol_attest = "";
        $osnovanie_attaest = "";
        $namber_passport_health = "";
        $namber_strax_polis = "";
        $date_med_osmortra ="";
        $name_organ_polis = "";
        $ospasn_proizv_factor = "";
        $date_zakl  = "";
       // $otvet_docter = "";
        $rezyltat_tip_person = "";
        $namber_snils = "";
        $date_snils = "";
        $namber_inn = "";
        $date_inn = "";
        $name_organiz_inn  = "";
        $kod_organa_inn = "";
        /*$namber_voinsk_ychet = "";
        $kategoria_zapas = "";
        $sostav_profil = "";
        $poln_kod_obozn_VYC = "";
        $kategor_gonosty_voin_slygb = "";
        $name_voin_kommisariat = "";
        $sost_in_voin_ychet = "";
        $otmetka_cnat_voin_ycheta = "";*/
        //$dop_information = "";
        //$login_sotryd = ""; 
        //$pa_sotryd = "";
        //$dostyp = "";
    }
?>
   
    <div class="blok1">
        <button class="button2" onClick="but1()"> Отмена
                <script>
                    function but1()
                        {
                            window.location = "user_manager.php"
                        }
                </script>
            </button>   
    </div>
    <form action=addsotrydnic.php method=post>
    <center>
        <div class="blok2"> 
        <i><h3> Основные данные</i></h3><p></p>
            <table border="0" width="90%" align="center">
                <td align="center" width="30%">Фамилия: <p></p> 
                    <input type="text"  class="textbox3" name= fam value="<?php print $fam ?>">
                    <td align="center" width="30%">Имя: <p></p> 
                    <input type="text"  class="textbox3" name= NAME value="<?php print $NAME ?>"> 
                    <td align="center" width="30%">Отчество: <p></p> 
                    <input type="text"  class="textbox3" name= motchectvo_sotr value="<?php print $otchectvo_sotr ?>">
                    </div>
                    <td>
                    <td align="center" width="30%">Контактный телефон: <p></p>  
                    <input type="text"  class="textbox3" name= nambe_phone value="<?php print $nambe_phone ?>" ><td>   
                <tr>
            </table>
            <p></p>
            <table border="0" width="90%" align="center">
                <td align="center" width="30%"> Дата рождения (гг-мм-дд) <p></p>
                <input type="text" class="textbox3" name= date_birth value="<?php print $date_birth ?>"> <td>
                <td align="center" width="30%"> Гражданство <p></p>
                <input type="text" class="textbox3" name= gragdanctvo value="<?php print $gragdanctvo ?>"> <td>
                <td align="center" width="30%"> Код ОКИН <p></p>
                <input type="text" class="textbox3" name= kod_OKIN value="<?php print $kod_OKIN ?>"> <td>
                <td align="center" width="30%"> E-mail <p></p>
                <input type="text" class="textbox3" name= e_mail value="<?php print $e_mail ?>"> <td>
                    
            </table>
        <p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Место рождения</i></h3><p></p>
            <table border="0" width="90%" align="center">
                <td align="center" width="30%"> Страна <p></p>
                <input type="text" class="textbox3" name=cantry_birth value="<?php print $cantry_birth ?>"> <td>
                <td align="center" width="30%"> Область <p></p>
                <input type="text" class="textbox3" name=oblast_birth value="<?php print $oblast_birth ?>"> <td>
                <td align="center" width="30%"> Город <p></p>
                <input type="text" class="textbox3" name=city_birth value="<?php print $city_birth ?>"> <td>   
            </table>
            <p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Паспортные данные</i></h3><p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Серия паспорта <p></p>
                    <input type="text" class="textbox3" name=passport_series value="<?php print $passport_series?>" > <td>
                    <td align="center" width="30%"> Номер паспорта <p></p>
                    <input type="text" class="textbox3" name=passport_namber value="<?php print $passport_namber ?>"> <td>
                    <td align="center" width="30%"> Дата получения паспорта <p></p>
                    <input type="text" class="textbox3" name=date_passport value="<?php print $date_passport ?>"> <td>
                    <td align="center" width="30%"> Дата регистрации по месту жительства <p></p>
                    <input type="text" class="textbox3" name=date_reg_place_live value="<?php print $date_reg_place_live ?>"> <td>   
            </table>
        <p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="100%"> Кем выдан <p></p>
                    <input type="text" class="textbox5" name=who_passport value="<?php print $who_passport ?>"> <td>  
            </table>
        <p></p>
        <i><h3> Адрес регистрации</i></h3><p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Страна <p></p>
                    <input type="text" class="textbox3" name=canrty_passport value="<?php print $canrty_passport ?>"> <td>
                    <td align="center" width="30%"> Область <p></p>
                    <input type="text" class="textbox3" name=oblast_passport value="<?php print $oblast_passport ?>"> <td>
                    <td align="center" width="30%"> Город <p></p>
                    <input type="text" class="textbox3" name=sity_passport value="<?php print $sity_passport ?>"> <td>
            </table>
        <p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Улица <p></p>
                    <input type="text" class="textbox3" name=strit_passport value="<?php print $strit_passport ?>"> <td>
                    <td align="center" width="30%"> Дом <p></p>
                    <input type="text" class="textbox3" name=hose_passport value="<?php print $hose_passport ?>"> <td>
                    <td align="center" width="30%"> Квартира <p></p>
                    <input type="text" class="textbox3" name=kvart_passport value="<?php print $kvart_passport ?>"> <td>  
            </table>
        <p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Фактический адрес проживания</i></h3><p></p>
        <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Страна <p></p>
                    <input type="text" class="textbox3" name=canrty_fakt value="<?php print $canrty_fakt ?>"> <td>
                    <td align="center" width="30%"> Область <p></p>
                    <input type="text" class="textbox3" name=oblast_fakt value="<?php print $oblast_fakt ?>"> <td>
                    <td align="center" width="30%"> Город <p></p>
                    <input type="text" class="textbox3" name=sity_fact value="<?php print $sity_fact ?>"> <td>
            </table>
        <p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Улица  <p></p>
                    <input type="text" class="textbox3" name=strit_fact value="<?php print $strit_fact ?>" > <td>
                    <td align="center" width="30%"> Дом <p></p>
                    <input type="text" class="textbox3" name=hose_fact value="<?php print $hose_fact ?>" > <td>
                    <td align="center" width="30%"> Квартира <p></p>
                    <input type="text" class="textbox3" name=kvart_fact value="<?php print $kvart_fact ?>"> <td>
                    <td align="center" width="30%"> Почтовый индекс <p></p>
                    <input type="text" class="textbox3" name=pocht_index_fact value="<?php print $pocht_index_fact ?>"> <td>  
            </table>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Трудовой договор</i></h3><p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Место работы (название организация) <p></p>
                    <input type="text" class="textbox3" name=name_organiz value="<?php print $name_organiz ?>"> <td>
                    <td align="center" width="30%"> Номер трудового договора <p></p>
                    <input type="text" class="textbox3" name=nambe_tryd_dogovor value="<?php print $nambe_tryd_dogovor ?>"> <td>
                    <td align="center" width="30%"> Дата трудового договора <p></p>
                    <input type="text" class="textbox3" name=date_trud_dogovor value="<?php print $date_trud_dogovor ?>"> <td>
                    <td align="center" width="30%"> Табельный номер<p></p>
                    <input type="text" class="textbox3" name=tabel_namber value="<?php print $tabel_namber ?>"> <td>
            </table>
        <p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Алфавит <p></p>
                    <input type="text" class="textbox3" name=alfavit value="<?php print $alfavit ?>"> <td>
                    <td align="center" width="30%"> Характер работы <p></p>
                    <select name="select" size="1" class="textbox4">
                        <option value="g">Полная занятость</option>
                        <option value="m">Частичная занятость</option>
                        <option value="m">Временная работа</option>
                        <option value="m">Стажировка</option>
                    </select> <td>
                    <td align="center" width="30%"> Вид работы <p></p>
                    <select name="select" size="1" class="textbox4">
                        <option value="g">Основная</option>
                        <option value="m">По совместительству</option>
                    </select> <td>
                    <td align="center" width="30%"> Номер трудовой книжки<p></p>
                    <input type="text" class="textbox3" name=nambe_trud_book value="<?php print $nambe_trud_book ?>"> <td>
            </table>
        <p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Образование</i></h3><p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <h3><input type="checkbox" name ="remember"> Знание иностранного языка</h3><p></p>
               <div class="vnimanie">При отметке обязательно нужно заполнить поля!!!  </div> 
                <?php/*
                if(!empty($_POST)){
                if(!empty($_POST['remember'])){
                echo 'checkbox был отмечен, запоминаем поля по введеным данным';
                }else{
                echo 'записываем нули';
                }
                } */?> 
        <p></p>
            <table border="0" width="90%" align="center">
                        <td align="center" width="30%"> Язык <p></p>
                        <input type="text" class="textbox3" name=cantry_birth > <td>
                        <td align="center" width="30%"> Уровень знания языка <p></p>
                        <select name="select" size="1" class="textbox4">
                            <option value="g">Начальный</option>
                            <option value="m">Средний</option>
                            <option value="m">Выше среднего</option>
                            <option value="m">Высокий</option>
                        </select> <td>
                </table>
        <p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Основное образование</i></h3><p></p>
        <table border="0" width="90%" align="center">
        <td align="center" width="30%"> Вид образования <p></p>
                        <select name="select" size="1" class="textbox4">
                            <option value="g">Среденее специальное</option>
                            <option value="m">Высшее (бакалавриат)</option>
                            <option value="m">Высшее (специалитет)</option>
                            <option value="m">Высшее (магистратура)</option>
                            <option value="m">Высшее (аспирантура)</option>
                        </select><td>
                        <td align="center" width="30%"> Название учебного учреждения <p></p>
                        <input type="text" class="textbox3" name=name_plase_education_osn value="<?php print $name_plase_education_osn ?>" >
                    <td align="center" width="30%">Дата поступления <p></p>
                    <input type="text" class="textbox3" name=date_start_education value="<?php print $date_start_education ?>"> <td>
                    <td align="center" width="30%"> Дата окончания <p></p>
                    <input type="text" class="textbox3" name=date_end_education value="<?php print $date_end_education ?>"> <td>
            </table>
        <p></p>
        <i><h3> Документ </i></h3><p></p>
        <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Название документа <p></p>
                    <input type="text" class="textbox3" name=cantry_birth >
                        <td align="center" width="30%">Серия документа <p></p>
                        <input type="text" class="textbox3" name=seria_dok value="<?php print $seria_dok?>">
                    <td align="center" width="30%">Номер документа <p></p>
                    <input type="text" class="textbox3" name=namber_dok value="<?php print $namber_dok ?>"> <td>
            </table>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Квалификация <p></p>
                    <input type="text" class="textbox3" name=kvalific value="<?php print $kvalific ?>"> <td>
                    <td align="center" width="30%"> Специальность по документу <p></p>
                    <input type="text" class="textbox3" name=cpecialnost value="<?php print $cpecialnost ?>" > <td>
                    <td align="center" width="30%"> Дата документа <p></p>
                    <input type="text" class="textbox3" name=date_dok_education value="<?php print $date_dok_education ?>"> <td>
            </table>
        <p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <h3><input type="checkbox" name ="remember2"> Послевузовское профессиональное образование</h3><p></p>
               <div class="vnimanie">При отметке обязательно нужно заполнить поля!!!  </div> 
                <?php/*
                if(!empty($_POST)){
                if(!empty($_POST['remember2'])){
                echo 'checkbox был отмечен, запоминаем поля по введеным данным';
                }else{
                echo 'записываем нули';
                }
                }*/ ?> 
        <p></p>
        <table border="0" width="90%" align="center">
        <td align="center" width="30%"> Вид образования <p></p>
                        <select name="select" size="1" class="textbox4">
                            <option value="g">Среденее специальное</option>
                            <option value="m">Высшее (бакалавриат)</option>
                            <option value="m">Высшее (специалитет)</option>
                            <option value="m">Высшее (магистратура)</option>
                            <option value="m">Высшее (аспирантура)</option>
                        </select><td>
                        <td align="center" width="30%"> Название учебного учреждения <p></p>
                        <input type="text" class="textbox3" name=cantry_birth >
                    <td align="center" width="30%">Дата поступления <p></p>
                    <input type="text" class="textbox3" name=cantry_birth > <td>
                    <td align="center" width="30%"> Дата окончания <p></p>
                    <input type="text" class="textbox3" name=oblast_birth > <td>
            </table>
        <p></p>
        <i><h3> Документ </i></h3><p></p>
        <table border="0" width="90%" align="center">
                    <td align="center" width="30%"> Номер документа <p></p>
                    <input type="text" class="textbox3" name=cantry_birth >
                    <td align="center" width="30%"> Специальность по документу <p></p>
                    <input type="text" class="textbox3" name=oblast_birth > <td>
                    <td align="center" width="30%"> Дата документа <p></p>
                    <input type="text" class="textbox3" name=oblast_birth > <td>
            </table>
        <p></p>
        <p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Профессиональный опыт</i></h3><p></p>
        <div class="vnimanie">При отметке обязательно нужно заполнить поля!!!  </div> 
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <table border="0" width="90%" align="center">
        <td><input type="checkbox" name ="remember3"> Основной<p></p>
                    Дней 
                        <input type="text" class="textbox3" name=cantry_birth > <p></p>
                    Месяцев 
                    <input type="text" class="textbox3" name=cantry_birth >  <p></p>
                     Лет 
                    <input type="text" class="textbox3" name=oblast_birth > <p></p>
                <?php /*
                if(!empty($_POST)){
                if(!empty($_POST['remember3'])){
                echo 'checkbox был отмечен, запоминаем поля по введеным данным';
                }else{
                echo 'записываем нули';
                }
                } */?> <td>
            <input type="checkbox" name ="remember4"> Непрерывный<p></p>
                    Дней 
                        <input type="text" class="textbox3" name=cantry_birth > <p></p>
                    Месяцев 
                    <input type="text" class="textbox3" name=cantry_birth > <p></p>
                     Лет 
                    <input type="text" class="textbox3" name=oblast_birth > <p></p>
               
                <?php/*
                if(!empty($_POST)){
                if(!empty($_POST['remember4'])){
                echo 'checkbox был отмечен, запоминаем поля по введеным данным';
                }else{
                echo 'записываем нули';
                }
                } */?> 
                
            <td><input type="checkbox" name ="remember5"> Стаж, который дает правл на надбавку<p></p>
            Дней 
                        <input type="text" class="textbox3" name=cantry_birth > <p></p>
                   Месяцев 
                    <input type="text" class="textbox3" name=cantry_birth > <p></p>
                     Лет 
                    <input type="text" class="textbox3" name=oblast_birth > <p></p>
                <?php/*
                if(!empty($_POST)){
                if(!empty($_POST['remember5'])){
                echo 'checkbox был отмечен, запоминаем поля по введеным данным';
                }else{
                echo 'записываем нули';
                }
                }*/ ?> 
        </table><p></p>
        <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Профессия</i></h3><p></p>
        <table border="0" width="90%" align="center">
        <td align="center" width="30%"> Вид профессии <p></p>
                        <select name="select" size="1" class="textbox4">
                            <option value="g">Основная</option>
                            <option value="m">Дополнительная</option>
                        </select><td>
                        <td align="center" width="30%"> Должность <p></p>
                        <input type="text" class="textbox3" name=dolgnost value="<?php print $dolgnost ?>">
                    <td align="center" width="30%">Квалификация <p></p>
                    <input type="text" class="textbox3" name=kvalifik value="<?php print $kvalifik ?>"> <td>
            </table>
            <i><h3> ______________________________________________________________________________________</i></h3><p></p>  
            <p></p>
            <table border="0" width="90%" align="center">
            <td align="center" width="30%"> Готовность к командировкам <p></p>
                            <select name="select" size="1" class="textbox4">
                                <option value="g">Готов</option>
                                <option value="m">Не готов</option>
                            </select><td>
                            <td align="center" width="30%">Количество участий в прошлых проектах <p></p>
                            <input type="text" class="textbox3" name=kol_project value="<?php print $kol_project ?>" >
            </table> 
            <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Аттестация</i></h3><p></p>
        <table border="0" width="90%" align="center">
                        <td align="center" width="30%"> Дата <p></p>
                        <input type="text" class="textbox3" name=date_attest value="<?php print $date_attest ?>">
                    <td align="center" width="30%">Решение коммисии <p></p>
                    <input type="text" class="textbox3" name=resh_kommis_attest value="<?php print $resh_kommis_attest ?>"> <td>
                    <td align="center" width="30%">Номер протокола <p></p>
                    <input type="text" class="textbox3" name=namber_protocol_attest value="<?php print $namber_protocol_attest ?>"> <td>
                    <td align="center" width="30%">Дата протокола <p></p>
                    <input type="text" class="textbox3" name=date_prortocol_attest value="<?php print $date_prortocol_attest ?>"> <td>
            </table>
            <p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%">Основание проведения аттестации <p></p>
                    <input type="text" class="textbox5" name=osnovanie_attaest value="<?php print $osnovanie_attaest ?>" > <td>
            </table>
            <i><h3> ______________________________________________________________________________________</i></h3><p></p>
        <i><h3> Паспорт здоровья</i></h3><p></p>
        <table border="0" width="90%" align="center">
                        <td align="center" width="30%">Номер паспорта <p></p>
                        <input type="text" class="textbox3" name=namber_passport_health value="<?php print $namber_passport_health ?>">
                    <td align="center" width="30%">Номер страхового полиса <p></p>
                    <input type="text" class="textbox3" name=namber_strax_polis value="<?php print $namber_strax_polis ?>" > <td>
                    <td align="center" width="30%">Организация страхового полиса <p></p>
                    <input type="text" class="textbox3" name=name_organ_polis value="<?php print $name_organ_polis ?>"> <td>
                    <td align="center" width="30%">Дата медицинского осмотра <p></p>
                    <input type="text" class="textbox3" name=date_med_osmortra value="<?php print $date_med_osmortra ?>"> <td>
            </table>
            <p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%">Опасные факторы работы <p></p>
                    <input type="text" class="textbox5" name=ospasn_proizv_factor value="<?php print $ospasn_proizv_factor ?>"> <td>
                    <td align="center" width="30%">Дата заключения врача <p></p>
                    <input type="text" class="textbox3" name=date_zakl value="<?php print $date_zakl ?>"> <td>
                    <td align="center" width="30%">Заключение врача <p></p>
                    <select name="select" size="1" class="textbox4">
                                <option value="g">Допуск</option>
                                <option value="m">Отказ</option>
                            </select><td>
            </table>
            <i><h3> ______________________________________________________________________________________</i></h3><p></p>
            Результат теста типа личности
            <input type="text" class="textbox5" name=rezyltat_tip_person value="<?php print $rezyltat_tip_person ?>">
            <i><h3> ______________________________________________________________________________________</i></h3><p></p>
            <i><h3>СНИЛС</i></h3><p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%">Номер СНИСЛ<p></p>
                    <input type="text" class="textbox3" name=namber_snils value="<?php print $namber_snils ?>"> <td>
                    <td align="center" width="30%">Дата СНИЛС <p></p>
                    <input type="text" class="textbox3" name=date_snils value="<?php print $date_snils ?>"> <td>
            </table>
            <i><h3> ______________________________________________________________________________________</i></h3><p></p>
            <i><h3>ИНН</i></h3><p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%">Номер ИНН<p></p>
                    <input type="text" class="textbox3" name=namber_inn value="<?php print $namber_inn ?>"> <td>
                    <td align="center" width="30%">Дата ИНН <p></p>
                    <input type="text" class="textbox3" name=date_inn value="<?php print $date_inn ?>"> <td>
                    <td align="center" width="30%">Название органицации ИНН <p></p>
                    <input type="text" class="textbox3" name=name_organiz_inn value="<?php print $name_organiz_inn ?>"> <td>
                    <td align="center" width="30%">Код организации ИНН<p></p>
                    <input type="text" class="textbox3" name=kod_organa_inn value="<?php print $kod_organa_inn ?>"> <td>
            </table>
            <i><h3> ______________________________________________________________________________________</i></h3><p></p>
            <i><h3>Воинский учет</i></h3><p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%">Номер воинского билета<p></p>
                    <input type="text" class="textbox3" name=cantry_birth > <td>
                    <td align="center" width="30%">Категория запаса<p></p>
                    <input type="text" class="textbox3" name=cantry_birth > <td>
                    <td align="center" width="30%">Состав (профиль) <p></p>
                    <input type="text" class="textbox3" name=cantry_birth > <td>
                    <td align="center" width="30%">Полное кодовое обозначение ВУС<p></p>
                    <input type="text" class="textbox3" name=cantry_birth > <td>
            </table>
            <p></p>
            <table border="0" width="90%" align="center">
                    <td align="center" width="30%">Категория годности к военной службе<p></p>
                    <input type="text" class="textbox3" name=cantry_birth > <td>
                    <td align="center" width="30%">Наименование военного камиссариата по месту жительства<p></p>
                    <input type="text" class="textbox3" name=cantry_birth > <td>
                    <td align="center" width="30%">Состояние на воинском учете <p></p>
                    <input type="text" class="textbox3" name=cantry_birth > <td>
                    <td align="center" width="30%">Отметка о снятии с воинского учета<p></p>
                    <input type="text" class="textbox3" name=cantry_birth > <td>
            </table>
            <i><h3> ______________________________________________________________________________________</i></h3><p></p>
            <i><h3>Дополнительная информации</i></h3><p></p>
            <table border="0" width="90%" align="center">
                    <input type="text" class="textbox5" name=dop_information value="<?php print $dop_information ?>" > <td>
                    <td align="center" width="30%">Логин<p></p>
                    <input type="text" class="textbox3" name=login_sotryd value="<?php print $login_sotryd ?>" > <td>
                    <td align="center" width="30%">Пароль<p></p>
                    <input type="text" class="textbox3" name=passport_namber value="<?php print $passport_namber ?>" > <td>
                    <td align="center" width="30%">Доступ <p></p>
                    <select name="select" size="1" class="textbox4">
                                <option value="g">Администратор</option>
                                <option value="m">Менеджер отдела кадров</option>
                                <option value="m">Строитель</option>
                                <option value="m">Руководитель проекта</option>
                            </select><td>
            </table>
            <p></p>
            <button class="button2" onClick="but2()"> Добавить сотрудника
                <script>
                    function but2()
                        {
                            window.location = "user_manager.php"
                        }
                </script>
            </button> 
            <?php
            mysqli_close($db);
            } ?>
        </div>
    </center>
</body>