<!DOCTYPE html>
<html>
    <head>
      <?php require "../reachoutNL/webApp/views/templates/head.php"; ?>
      <link rel="stylesheet" href="../reachoutNL/public/css/reachout.css"/>
      <link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Arbutus+Slab" rel="stylesheet">
      <script src="../reachoutNL/public/js/reachout.js"></script>
      <title>RNL</title>
    </head>
    <body>

      <header>

         <div id="container">

           <div id="menu">

              <h3><?php echo $user_data['username'];?></h3>
              <a href="../reachoutNL/welcom.php?page=logout"><span class="icon-exit"></span><p>Logout</p></a>

           </div>


           <div id="core">

             <p id="details">Fill the fields to add souls</p>

              <form id="soulsForm" action="" method="">

                <input type="text" name="" placeholder="Name" class="soulData">
                <input type="text" name="" placeholder="Email" class="soulData">
                <input type="text" name="" placeholder="Telnr." class="soulData">
                <input type="submit" name="" value="Add New Soul" id="addNewSouls">

              </form>

           </div>

           <div id="soulsAdded">

           </div>

         </div>

      </header>


      <footer>

        <div id="footer">

           <span class="icon-home2"></span>
           <h4 id="souls">Souls won:<span id="soulsCount"></span></h4>
           <span class="icon-list2"></span>

        </div>


      </footer>

    </body>

</html>
