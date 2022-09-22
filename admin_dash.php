<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !="admin"){
    header("location:index.php");
}
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- main css page style  -->
    <link rel="stylesheet" href="css/style.css">
     <!-- main css page style  -->
     <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

     <link rel="stylesheet" href="css/styles_registration.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&display=swap" rel="stylesheet">
     



    <title>Hello, world!</title>
  </head>
  <body>
    <?php
    if(!isset($_SESSION['username']) || $_SESSION['role'] =="admin"){
        include "header/header_adm.php";
    }
    else if(!isset($_SESSION['username']) || $_SESSION['role'] =="parent"){
        include "header/header_parent.php";
    }
    else{
        include "header/header.php";
    }
?>
    
    <header class="header-top pags">
      <!-- wrapper for header  -->
      <div class="wrapper-mian-header">
        <div class="txt-main">
          <p class="txt-care">Admin Control</p>
          </div>
      </div>
  </header>
      <section class="sec-card services dash">
       <div class="card-wrapper">
           <div class="card card-dash">
               <h1 class="title-dash">Messages</h1>
               <div class="include-dash">
               <?php
               include "contact_us_manage.php";
               ?>
               <div>
           </div>
       </div>
     </section>
     <!-- testimonial control  -->
               <?php
               include "testimonial_manage.php";
               ?>
 
<!--     <section id="add_testimonial"class="sec-card insights">-->
<!--      <div class="txt-services">-->
<!--        <h1>children day details</h1>-->
<!--    </div>-->
<!--    <div class="card-wrapper testimonial">-->
<!--    <div class="include-dash dispaly-flex">-->
<!--          <form class="d-flex" action="day_details_edit.php">-->
<!--            <button class="btn btn-outline-success btn-header" type="submit">Add new details</button>-->
<!--          </form>-->
<!--               <div>-->
<!--    </div>-->
<!--    </section>-->
<!--     <section class="info">-->
<!--               --><?php
//               include "day_details.php";
//               ?>
<!--     </section>-->
    <section class="sec-card services dash bg-white">
        <div class="card-wrapper">
            <div class="card card-dash">
                <h1 class="title-dash">Add Day details</h1>
                <div class="include-dash">
                    <?php
                    include "day_details_edit.php";
                    ?>
                    <div>
                    </div>
                </div>
    </section>
    <section class="sec-card services">
        <div class="card-wrapper">
            <div class="card card-dash">
                <h1 class="title-dash">Day details</h1>
                <div class="include-dash">
                    <?php
                    include "day_details.php";
                    ?>
                    <div>
                    </div>
                </div>
    </section>

    <section class="sec-card services dash bg-white">
        <div class="card-wrapper">
            <div class="card card-dash">
                <h1 class="title-dash">Fees</h1>
                <div class="include-dash">
                    <?php
                    include "registration_edit.php";
                    ?>
                    <div>
                    </div>
                </div>
    </section>

    <section class="sec-card services dash">
        <div class="card-wrapper">
            <div class="card card-dash">
                <h1 class="title-dash">Index Edit</h1>
                <div class="include-dash">
                    <?php
                    include "index_edit.php";
                    ?>
                <div>
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
