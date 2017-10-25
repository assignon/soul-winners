<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
   require "pdo_connection.php";

   function displaySouls()
   {


      $pdo = pdo();

      $userId = htmlspecialchars($_GET['userId']);
      $select = $pdo->prepare("SELECT * FROM added_souls WHERE user_id=? ORDER BY id DESC");
      $select->execute(array($userId));

      while($displaySouls = $select->fetch())
      {

         ?>

            <div class="soulsAddedContainer">

               <img src="../reachoutNL/public/media/images/<?php echo $displaySouls['soul_avatar'];?>" alt="">
               <p><?php echo ucfirst($displaySouls['soul_name']);?></p>
               <p><?php echo $displaySouls['soul_email'];?></p>

            </div>

         <?php

      }

   }
   displaySouls();

 ?>
