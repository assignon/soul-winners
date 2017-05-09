<?php

   require "/pdo_connection.php";

   function login()
   {

     $pdo = pdo();

     $name = htmlspecialchars($_GET['name']);
     $pass = sha1($_GET['pass']);

     $check_name = $pdo->prepare("SELECT username FROM login WHERE username=?");
     $check_name->execute(array($name));

     $nameCount = $check_name->rowCount();

     $check_pass = $pdo->prepare("SELECT password FROM login WHERE password=?");
     $check_pass->execute(array($pass));

     $passCount = $check_pass->rowCount();

     if($nameCount == 1)
     {

       if($passCount == 1)
       {

          $selectData = $pdo->prepare('SELECT*FROM login WHERE username=? AND password=?');
          $selectData->execute(array($name, $pass));
          $displayData = $selectData->fetch();

          $_SESSION['id'] = $displayData['id'];
          $_SESSION['username'] = $displayData['username'];
          $_SESSION['password'] = $displayData['password'];

          header("Location:../reachoutNL/welcom.php?page=reachoutAmsterdam?id=".$_SESSION['id']);

       }else{

          echo "Wrong password";

       }

     }else{

        echo "Wrong username";

     }

   }
   login();

 ?>
