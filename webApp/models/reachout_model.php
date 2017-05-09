<?php

require "../reachoutNL/webApp/core/model.php";

class reachout extends model
{

    public function __construct()
    {

       parent::__construct();

    }

    public function get_users_data($id,$table_name)
    {

       $req = $this->prepare_fetch("SELECT*FROM $table_name WHERE id=?",[$id]);
       return $req;


     }


     public function addSouls()
     {

        ?>

           <script type="text/javascript">

              window.addEventListener("load", function(){

                 var soulData = document.querySelectorAll('.soulData');
                 var addNewSouls = document.getElementById("addNewSouls");
                 var souls = document.getElementById('soulsCount');
                 var xhr;


                 if(window.XMLHttpRequest){

                      xhr = new XMLHttpRequest();

                  }else{

                     xhr = new ActiveXobject("Microsoft.XMLHTTP");

                  }

                 addNewSouls.addEventListener("click", function(e){


                   e.preventDefault();

                    var name = soulData[0].value;
                    var email = soulData[1].value;
                    var telnr = soulData[2].value;
                    var userId = "<?php echo $_GET['id'];?>";


                    xhr.onreadystatechange = function() {

                      if(this.readyState == 4 && this.status == 200)
                      {

                          details.innerHTML = xhr.responseText;

                          if(details.textContent == "Soul added successfully")
                          {

                            soulData[0].value = "";
                            soulData[1].value = "";
                            soulData[2].value = "";

                            //souls.innerHTML += 1;

                            allSouls();
                            displaySouls();

                          }

                      }

                   };

                   if(name != "" && email != "")
                   {

                     xhr.open('GET','../reachoutNL/webApp/models/ajaxRequest/addSouls.php?name='+name+'&email='+email+'&telnr='+telnr+'&userId='+userId,true);
                     xhr.send();

                   }else{

                     details.innerHTML = "fill the name and email of telnr fields";

                   }

                 })


                 function allSouls()
                 {

                      var souls = document.getElementById('soulsCount');
                      var userId = "<?php echo $_GET['id'];?>";

                      xhr.onreadystatechange = function() {

                        if(this.readyState == 4 && this.status == 200)
                        {

                            souls.innerHTML = ' '+xhr.responseText;

                        }

                     };

                     xhr.open('GET','../reachoutNL/webApp/models/ajaxRequest/allSouls.php?userId='+userId,true);
                     xhr.send();


                 }
                 allSouls()


                 function displaySouls()
                 {

                    var soulsList = document.querySelector(".icon-list2");
                    var soulsAdded = document.getElementById("soulsAdded");
                    var userId = "<?php echo $_GET['id'];?>";

                    soulsList.addEventListener("click", function(){

                        xhr.onreadystatechange = function() {

                          if(this.readyState == 4 && this.status == 200)
                          {

                              soulsAdded.innerHTML = xhr.responseText;

                          }

                       };

                       xhr.open('GET','../reachoutNL/webApp/models/ajaxRequest/displaySouls.php?userId='+userId,true);
                       xhr.send();

                    })

                 }
                 displaySouls();

              })

           </script>

        <?php

     }




     public function displaySouls()
     {



     }

}

 ?>
