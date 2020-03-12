

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>User Profile</title>
     <link rel="stylesheet" type="text/css" href="style.css">
   </head>

   <body>
     <div class="header">

       <?php

          include 'includes/dbh.inc.php';

          $sql = "SELECT * From user;";
          $sqldata = mysqli_query($conn, $sql) or die ('cannot connect data');
          while($row = mysqli_fetch_array($sqldata)){
            echo "".$row["Username"];
          }




        ?>
         <h1></h1>

       <img src="https://i0.wp.com/harrisburgu.edu/wp-content/uploads/2016/11/Grim_Phil28.jpg?w=900&ssl=1" alt="Avatar" class="rounded" style="width:15%; height: 180px">
     </div>
     <br>
     <div class="nav">
       <a href="main.html">News Feed</a>
       <a href="userSettings.html">Settings</a>
       <a href="friends page" target="_self">Friends List</a>
       <a href="bookmarked post table?" target="_parent">Saved Posts</a>
     </div>
     <form>

     <div class="row">

       <div class="column side">

         <h1>contactInfo</h1>
         <?php

            include 'includes/dbh.inc.php';

            $sql = "SELECT * From user;";
            $sqldata = mysqli_query($conn, $sql) or die ('cannot connect data');
            while($row = mysqli_fetch_assoc($sqldata)){
              echo "".$row["phonenumber"];
            }




          ?>



         <br>
         <h4>HU Email:</h4>

         <?php

            include 'includes/dbh.inc.php';

            $sql = "SELECT * From user;";
            $sqldata = mysqli_query($conn, $sql) or die ('cannot connect data');
            while($row = mysqli_fetch_array($sqldata)){
              echo "".$row["email"];
            }




          ?>



       </div>








       <div class="column middle">
         <h1>User Bio</h1>
         <?php

            include 'includes/dbh.inc.php';

            $sql = "SELECT * From user;";
            $sqldata = mysqli_query($conn, $sql) or die ('cannot connect data');
            while($row = mysqli_fetch_array($sqldata)){
              echo "".$row["UserBio"];
            }




          ?>

       </div>

       <div class="column side">

         <h1>About</h1>
         <?php

            include 'includes/dbh.inc.php';

            $sql = "SELECT * From user;";
            $sqldata = mysqli_query($conn, $sql) or die ('cannot connect data');
            while($row = mysqli_fetch_array($sqldata)){
              echo "".$row["About"];
            }




          ?>

         <h5>Faculty </h5>
         <?php

            include 'includes/dbh.inc.php';

            $sql = "SELECT * From user;";
            $sqldata = mysqli_query($conn, $sql) or die ('cannot connect data');
            while($row = mysqli_fetch_assoc($sqldata)){
              echo "".$row["Faculty"];
            }

            ?>



         <small>.</small>





         <h5>Subject</h5>
         <?php

            include 'includes/dbh.inc.php';

            $sql = "SELECT * From user;";
            $sqldata = mysqli_query($conn, $sql) or die ('cannot connect data');
            while($row = mysqli_fetch_assoc($sqldata)){
              echo "".$row["Subject"];
            }

            ?>

         <small></small>

       </div>

     </div>
     <div class="footer">
       <p>© copyright HarrisburgU.life</p>
     </div>

 </html>
