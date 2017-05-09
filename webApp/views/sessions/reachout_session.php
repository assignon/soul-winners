<?php

     session_start();
     require "../reachoutNL/webApp/models/reachout_model.php";

     $reachout = new reachout();

   if(isset($_GET['id']) AND $_GET['id'] > 0){


      $getID = intval($_GET['id']);
    //  $grade = htmlspecialchars($_GET['grade']);

      $user_data = $reachout->get_users_data($getID,"login");


      if( isset($_SESSION['id']) AND  $_SESSION['id'] == $user_data['id']){


            include('../reachoutNL/webApp/views/pages/reachoutAmsterdam.php');
            $reachout->addSouls();

    }else{

      echo "you kan't acces without password<br/>";

      ?>
          <a href="../reachoutNL/welcom.php?page=home">Home page</a>
      <?php
    }

   }else{

     echo "These id don't exist";

   }


    ?>
