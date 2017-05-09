<?php

   require "pdo_connection.php";

   function register()
   {

       $pdo = pdo();

       $name = htmlspecialchars($_GET['name']);
       $cellName = htmlspecialchars($_GET['cellName']);
       $email = htmlspecialchars($_GET['email']);
       $grade = htmlspecialchars($_GET['grade']);
       $pass = sha1($_GET['pass']);

       $checkEmail = $pdo->prepare("SELECT email FROM login WHERE email=?");
       $checkEmail->execute(array($email));

       $emailCount = $checkEmail->rowCount();

       if($emailCount == 0)
       {

         $insert = $pdo->prepare(
           "INSERT INTO login(username, cellname, email, grade, password)
           VALUES(?,?,?,?,?)"
         );

         $insert->execute(array($name, $cellName, $email, $grade, $pass));

         echo "Account succesfully created";

       }else{

         echo "This email already exist...";

       }

   }
   register();

 ?>
