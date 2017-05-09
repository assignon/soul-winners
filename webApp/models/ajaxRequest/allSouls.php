<?php

   require "pdo_connection.php";

   function allSouls()
   {

     
      $pdo = pdo();

      $userId = htmlspecialchars($_GET['userId']);

      $select = $pdo->prepare("SELECT id FROM added_souls WHERE user_id=?");
      $select->execute(array($userId));
      $displaySouls = $select->rowCount();

      echo $displaySouls;

   }
   allSouls();

 ?>
