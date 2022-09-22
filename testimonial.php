<!--PUBLIC-->
<!--Shows a list of admin approved testimonials given by parents-->
<?php
// Turn off all error reporting
error_reporting(0);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- favicon  -->
     <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <!-- reset css page to no style  -->
    <link href="css/reset.css" rel="stylesheet"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- main css page style  -->
    <link rel="stylesheet" href="css/style.css">
     <!-- main css page style  -->
     <link rel="stylesheet" href="css/styles_registration.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&display=swap" rel="stylesheet">
     <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    

     
    <title>Testimonial</title>
  </head>
  <body>
  <?php
  session_start();

if(!isset($_SESSION['username'])){
  include "header/header.php";
}
if($_SESSION['role'] =="admin"){
      include "header/header_adm.php" ;
  }
if($_SESSION['role'] =="parent"){
      include "header/header_parent.php" ;
  }
?>
<?php include "header.html" ?>

 
        <p class="text-center"><?= $msg; ?></p>
        </div>
    </div>
</div><header class="header-top pags">
      <!-- wrapper for header  -->
      <div class="wrapper-mian-header">
        <div class="txt-main">
          <p class="txt-care">Testimonial</p>
          </div>
      </div>
  </header>
   <section class="sec-card services">
       <div class="card-wrapper testimonial-card">
               <?php
        require('mysql_connect.php');
        $query = "SELECT * FROM testimony WHERE display='yes'";
        $result = @mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo" <div class='card'> 
                    <h1>Title: ".$row["title"]."<br>
                    <br>From:".$row["name"]."<br>
                    <br>Date:".$row["date"]."<br>
                    <br>message: ".$row["message"]."</h1>
                    </div>";
            }
        }
        mysqli_close($db_connection);
        ?>
     </section>
     <!-- .............................................................................................................................  -->
     <section id="add_testimonial"class="sec-card insights">
      <div class="txt-services">
        <h1>Share your experience with us</h1>
    </div>
    <div class="card-wrapper testimonial">
      <div class="card">
       <?php include "testimonial_add.php" ?>
      </div>
    </div>
    </section>

     
  <footer class="footer">

    <div class="wrapper-footer">
      <div class="logo"> <img src="images/logo/logo.png"></div>
      <div class="txt-footer"> HOME<br> SERVICE<br> TESTIMONIAL<br>CONTACT US<br> REGISTER</div>
      <div class="txt-footer">Facebook<br> Instagram <br>Twetter</div>
    </div>
    <div class="wrapper-footer">
     <div class="txt-footer"> <p>©2021, Rainbow children care centre Ltda. All Rights Reserved.</p></div>
   </div>
   
  </footer>
   </body>
 </html>
