<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
      <?php require "../reachoutNL/webApp/views/templates/head.php"; ?>
      <link rel="stylesheet" href="../reachoutNL/public/css/home.css"/>
    <!--  <link rel="stylesheet" href="../reachoutNL/public/css/font.css"/>-->
      <link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Arbutus+Slab" rel="stylesheet">
      <script src="../reachoutNL/public/js/home.js"></script>
      <title>RNL</title>
    </head>
    <body>

      <header>

          <div id="container">

            <h2>Souls Winners</h2>

             <p id="error">Login of make a new account</p>

            <div id="start">

              <button class="registerLogin" id="register"><span class="icon-users"></span>Register</button>
              <button class="registerLogin" id="login"><span class="icon-key2"></span>Login</button>

            </div>


            <?php

               require "../reachoutNL/webApp/models/login_model.php";
               $login = new login();
               $login->register();
               $login->login();
               $login->passwordRecovering();

             ?>
            <div class="register">

              <span class="icon-circle-left"></span>

               <form class="" action="" method="">

                 <input type="text" name="" placeholder="Name" class="registerData">
                 <input type="text" name="" placeholder="Cell name" class="registerData">
                 <input type="email" name="" placeholder="Email" class="registerData">
                 <select class="registerData" name="" required>

                    <option value="">Choose your grade</option>
                    <option value="leader">Leader</option>
                    <option value="member">Member / leader assis.</option>

                 </select>
                 <input type="password" name="" placeholder="Password" class="registerData">
                 <input type="submit" name="" value="Register" id="submit">

               </form>

            </div>

            <div class="login">

               <span class="icon-circle-left"></span>

               <form class="" action="" method="post">

                 <input type="text" name="name" placeholder="Name" class="loginData">
                 <input type="password" name="pass" placeholder="Password" class="loginData">
                 <input type="submit" name="signin" value="Login" id="acces">

               </form>

               <p id="passRecovery"><span class="icon-key2"></span>Password forgot?</p>

               <div id="passRecover">

                  <form class="" action="" method="">

                     <input type="email" name="" placeholder="Your Email" class="email">
                     <input type="submit" name="" value="Password recover" id="passRecovering">

                  </form>

               </div>


            </div>

            <p id="soulWinners"></p>


          </div>

      </header>

      <footer>

         <div class="footer">

           <p>Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>

         </div>

      </footer>

    </body>

</html>
