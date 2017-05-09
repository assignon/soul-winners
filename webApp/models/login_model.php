<?php

   require "../reachoutNL/webApp/core/model.php";

   class login extends model
   {

       public function __construct()
       {

          parent::__construct();

       }


       public function register()
       {

          ?>

            <script type="text/javascript">

               window.addEventListener("load", function(){

                   var registerData = document.querySelectorAll('.registerData');
                   var register = document.getElementById("submit");
                   var xhr;

                   if(window.XMLHttpRequest){

                        xhr = new XMLHttpRequest();

                    }else{

                       xhr = new ActiveXobject("Microsoft.XMLHTTP");

                    }


                    register.addEventListener("click", function(e){

                       e.preventDefault();

                       var name = registerData[0].value;
                       var cellName = registerData[1].value;
                       var email = registerData[2].value;
                       var grade = registerData[3].value;
                       var pass = registerData[4].value;

                       xhr.onreadystatechange = function() {

                         if(this.readyState == 4 && this.status == 200)
                         {

                             error.innerHTML = xhr.responseText;

                             if(error.textContent == "Account succesfully created")
                             {


                                registerData[0].value = "";
                                registerData[1].value = "";
                                registerData[2].value = "";
                                registerData[3].value = "";
                                registerData[4].value = "";

                                error.innerHTML = "Registration succesfully, Login";


                                $(function(){

                                   $(".register").hide('slow');
                                   $(".login").css('opacity','1');
                                   $(".login").show('slow');

                                })

                             }

                         }

                      };

                      if(name != "" && cellName != "" && email != "" && grade != "" && pass != "")
                      {

                        xhr.open('GET','../reachoutNL/webApp/models/ajaxRequest/register.php?name='+name+'&cellName='+cellName+'&email='+email+'&grade='+grade+'&pass='+pass,true);
                        xhr.send();

                      }else{

                        error.innerHTML = "fill all the fields";

                      }

                    })


               })

            </script>

          <?php

       }


       public function login()
       {

          if(isset($_POST['signin']))
          {

             $name = htmlspecialchars($_POST['name']);
             $pass = sha1($_POST['pass']);

             if(!empty($name) AND !empty($pass))
             {

                   $check_name = $this->prepare("SELECT username FROM login WHERE username=?", array($name));

                   $nameCount = $check_name->rowCount();

                   $check_pass = $this->prepare("SELECT password FROM login WHERE password=?", array($pass));

                   $passCount = $check_pass->rowCount();

                   if($nameCount == 1)
                   {

                     if($passCount == 1)
                     {

                        $selectData = $this->prepare('SELECT*FROM login WHERE username=? AND password=?', array($name, $pass));
                        $displayData = $selectData->fetch();

                        $_SESSION['id'] = $displayData['id'];
                        $_SESSION['username'] = $displayData['username'];
                        $_SESSION['password'] = $displayData['password'];

                        header("Location:../reachoutNL/welcom.php?page=reachoutAmsterdam&id=".$_SESSION['id']);

                     }else{

                        $this->signin_err("Wrong password");

                     }

                   }else{

                     $this->signin_err("Wrong username");

                   }


             }else{

                $this->signin_err("fill all the fields");

             }

          }

       }


       public function passwordRecovering()
       {

         ?>

            <script type="text/javascript">

               window.addEventListener("load", function(){

                  var email = document.querySelector('.email');
                  var passRecovering = document.getElementById('passRecovering');
                  var error = document.getElementById('error');
                  var xhr;

                  if(window.XMLHttpRequest){

                       xhr = new XMLHttpRequest();

                   }else{

                      xhr = new ActiveXobject("Microsoft.XMLHTTP");

                   }


                   passRecovering.addEventListener("click", function(e){

                     e.preventDefault();

                     var emailVal = email.value;

                     xhr.onreadystatechange = function() {

                       if(this.readyState == 4 && this.status == 200)
                       {

                           error.innerHTML = xhr.responseText;

                           if(error.textContent == "A mail has just been sent to you with a new temporary password")
                           {

                               email.value = "";

                               $(function(){

                                $("#passRecover").hide("slow");

                               })

                           }


                       }

                    };

                    if(emailVal != "")
                    {

                      xhr.open('GET','../reachoutNL/webApp/models/ajaxRequest/passRecover.php?emailVal='+emailVal,true);
                      xhr.send();

                    }else{

                      error.innerHTML = "Enter your email...";

                    }

                   })

               })

            </script>

         <?php

       }


       public function loginAjax()
       {

          ?>

            <script type="text/javascript">

               window.addEventListener("load", function(){

                  var loginData = document.querySelectorAll('.loginData');
                  var loginAcces = document.getElementById("acces");
                  var xhr;


                  if(window.XMLHttpRequest){

                       xhr = new XMLHttpRequest();

                   }else{

                      xhr = new ActiveXobject("Microsoft.XMLHTTP");

                   }

                   loginAcces.addEventListener("click", function(e){

                        e.preventDefault();

                          var name = loginData[0].value;
                          var pass = loginData[1].value;


                          xhr.onreadystatechange = function() {

                            if(this.readyState == 4 && this.status == 200)
                            {

                                error.innerHTML = xhr.responseText;


                            }

                         };

                         if(name != "" && pass != "")
                         {

                           xhr.open('GET','../reachoutNL/webApp/models/ajaxRequest/login.php?name='+name+'&pass='+pass,true);
                           xhr.send();

                         }else{

                           error.innerHTML = "fill all the fields";

                         }

                   })


               })

            </script>

          <?php

       }

   }

 ?>
