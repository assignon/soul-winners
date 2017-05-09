<?php

   require "pdo_connection.php";
   require "sendMail.php";

   function addSouls()
   {

      $pdo = pdo();

      $name = htmlspecialchars($_GET['name']);
      $email = htmlspecialchars($_GET['email']);
      $telnr = htmlspecialchars($_GET['telnr']);
      $userId = htmlspecialchars($_GET['userId']);

      $check_email = $pdo->prepare("SELECT soul_email FROM added_souls WHERE soul_email=?");
      $check_email->execute(array($email));
      $emailCount = $check_email->rowCount();

      $check_telnr = $pdo->prepare("SELECT soul_number FROM added_souls WHERE soul_number=?");
      $check_telnr->execute(array($telnr));
      $telnrCount = $check_telnr->rowCount();


      $getUsername = $pdo->prepare("SELECT * FROM login WHERE id=?");
      $getUsername->execute(array($userId));
      $displayUsername = $getUsername->fetch();


      $randString = "abcdefghijklmnopqrstuvwxyz";
      $randString .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $password = "";

      $length = strlen($randString);
      $nb = 0;

      while($nb < 16)
      {

        $password .= $randString[rand(0,$length-1)];
        $nb++;

      }

      if($emailCount == 0)
      {

        if($telnrCount == 0)
        {

          if(!empty($telnr))
          {

            $insert = $pdo->prepare
            (
              "INSERT INTO added_souls(soul_name, soul_email, soul_password, soul_number, added_by, cell_name, soul_avatar, user_id, date_added)
              VALUES(?,?,?,?,?,?,?,?,NOW())"
            );

            $insert->execute(array($name, $email, sha1($password), $telnr, $displayUsername['username'],$displayUsername['cellname'], 'avatar.png', $userId));
            send_mail(

              "Christ Embassy Amsterdam nodig u opmerkingen en ervaringen te delen.",

              "U bent vandaag aangesproken door één van onze leden en als het goed is hebt u een boekje gekregen.<br/>
              Wij willen meer kennis met u maken, daarom hebben weij u aan een chat-systeem toegevoegd,<br/>
               waarin u uw opmerkingen, feedback en vragen kan stellen en geven na het lezen van het boekje.,br/>
               Onderaan staat een link naar de website en uw inlog gegevens.<br/>
               Gebruikersnaam:"." ".$name."<br/>
               Wachtwoord:"." ".$password."<br/>
               Link naar de website: ?????????",

              "C.E Amsterdam",

              "ceamsterdam@gmail.com",

              $email

            );

            echo "Soul added successfully";

          }else if(empty($telnr)){

            $insert = $pdo->prepare("INSERT INTO added_souls(soul_name, soul_email, soul_password, soul_number, added_by, cell_name, soul_avatar, user_id, date_added) VALUES(?,?,?,?,?,?,?,?,NOW())");

            $insert->execute(array($name, $email, sha1($password), 'No number', $displayUsername['username'], $displayUsername['cellname'], 'avatar.png', $userId));

            send_mail(

              "Christ Embassy Amsterdam nodig u opmerkingen en ervaringen te delen.",

              "U bent vandaag aangesproken door één van onze leden en als het goed is hebt u een boekje gekregen.<br/>
              Wij willen meer kennis met u maken, daarom hebben weij u aan een chat-systeem toegevoegd,<br/>
               waarin u uw opmerkingen, feedback en vragen kan stellen en geven na het lezen van het boekje.,br/>
               Onderaan staat een link naar de website en uw inlog gegevens.<br/>
               Gebruikersnaam:"." ".$name."<br/>
               Wachtwoord:"." ".$password."<br/>
               Link naar de website: ?????????",

              "C.E Amsterdam",

              "ceamsterdam@gmail.com",

              $email

            );


            echo "Soul added successfully";

          }


        }else{

          echo "This telnr already exist...";

        }

      }else{

          echo "This email already exist...";

      }

   }
   addSouls();

 ?>
