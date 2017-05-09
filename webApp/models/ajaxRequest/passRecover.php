<?php

    require "pdo_connection.php";
    require "sendMail.php";

    function passRecover()
    {

      $pdo = pdo();


      $randString = "abcdefghijklmnopqrstuvwxyz";
      $randString .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $password = "";

      $length = strlen($randString);
      $nb = 0;

      while($nb < 11)
      {

        $password .= $randString[rand(0,$length-1)];
        $nb++;

      }

      $email = htmlspecialchars($_GET['emailVal']);

      $checkEmail = $pdo->prepare("SELECT email FROM login WHERE email=?");
      $checkEmail->execute(array($email));

      $emailCount = $checkEmail->rowCount();

      if($emailCount == 1)
      {

        $updatePass = $pdo->prepare("UPDATE login SET password=? WHERE email=?");
        $updatePass->execute(array(sha1($password), $email));

         send_mail(

           "Password Recorvering",

           "Temporary Password:"." ".$password."<br/>",

           "C.E Amsterdam",

           "ceamsterdam@gmail.com",

           $email

         );

         echo "A mail has just been sent to you with a new temporary password";

      }else{

        echo "Wrong email...";

      }

    }
    passRecover();

?>
