<!--PUBLIC-->
<!--Basic information about the childcare premise plus 2 feature-->
<!--boxes. A feature box should highlight new activities, events,-->
<!--special offers etc. Each feature should contain a title, detail,-->
<!--an image and an optional link to another page in the website-->
<!--(for more information).-->

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
     <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="css/style.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&display=swap" rel="stylesheet">
     <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    

     
    <title>Rainbow childcare</title>
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
      <!-- .............................................................................................................................  -->
      <!-- heade -->
      <!-- put a header for the login page  -->
      <header class="header-top">
          <!-- wrapper for header  -->
          <div class="wrapper-mian-header">
            <div class="txt-main">
              <p class="txt-care txt-h1">Exceptional Preschool Education And</p>
                 <p class="txt-care">Childcare</p>
              </div>
          </div>
      </header>
      <!-- .............................................................................................................................  -->
      <!-- sections  -->
      <section class="sec-card">
          <div class="txt-choose-us">
              <h1>Serving Infants to School Ages</h1>
          </div>
          <div class="card-wrapper">
              <div class="card default">
                <div class="circle">
                  <img src="Images/icons/infant.png">
                </div>
              <p>INFANTS
                & TODDLERS</p>
            </div>
              <div class="card default"><div class="circle">
                <img src="Images/icons/pre.png">
              </div>
              <p>PRESCHOOL</p>
            </div>
              <div class="card default">
                <div class="circle">
                  <img src="Images/icons/care.png">
                </div>
                <p>DROP-IN CARE</p>
              </div>
              <div class="card default">
                <div class="circle">
                  <img src="Images/icons/summer.png">
                </div>
                <p>SUMMER</p>
              </div>
          </div>
      </section>
       <!-- .............................................................................................................................  -->
       <!-- second section  -->

       <section class="sec-card services">
        <div class="txt-services">
            <h1>Child groups</h1>
        </div>
        <div class="card-wrapper">
            <div class="card">
                <img src="Images/icons/infant.png">
              <h1>Babies</br>(6 months to 1 year)</h1>
               <p>We work together with parents over a settling in period of a few days to ensure that your child is happy and comfortable in their new surroundings.</p>
            </div>
            <div class="card">
                <img src="Images/icons/baby.png">
                <h1>Wobblers</br>(1 to 2 year)</h1>
            <p>To you its play, to them it is learning. As a wobbler, your child takes their first steps and really begins to explore the world around them.</p>
            </div>
            <div class="card">
                <img src="Images/icons/Toddlers.png">
                <h1>Toddlers</br>(2 to 3 years)</h1>
                <p>We encourage and guide them to further develop their confidence, their intellectual, social and emotional development as they explore their environment.</p>
            </div>
            <div class="card">
                <img src="Images/icons/Preschool.png">
                <h1>Preschool</br>(3 to 5 years)</br></h1>
                <p>At Rainbow we believe in a fun, play based approach to learning and development in the early years.</p>
            </div>
        </div>
        <div class="more">
          <form class="d-flex" action="babies.php">
            <button class="btn btn-outline-success btn-header" type="submit">Find out more</button>
          </form>
        </div>

      </section>
    <!-- .............................................................................................................................  -->

    <section class="sec-card insights">
      <div class="txt-services">
        <h1>Our Place</h1>
        <p>We have eight rooms in our childcare centre as well as a safe outdoor area which can be used throughout the day by all age groups. Children have access to a two playgrounds insight and a one big outside which can be used in the sunny days. We are also a fully catered children centre, with all our meals freshly prepared onsite. We can assure that your child will be happy because what we love is their smiles.</p>
    </div>
    <div class="card-wrapper">
        <div class="card"><img src="images/img/kidsschool.jpeg"></div>
        <div class="card"><img src="images/img/carousel_1-1.jpeg"></div>
        <div class="card"><img src="images/img/314fc37c8743cebb4e4e7e38b29312f5.jpg"></div>
    </div>
    <div class="card-wrapper">
        <div class="card"><img src="images/img/imgkids1.jpeg"></div>
        <div class="card"><img src="images/img/imgkids2.jpeg"></div>
        <div class="card"><img src="images/img/imgkids3.jpeg"></div>
    </div>
    </section>

     <!-- .............................................................................................................................  -->
     <section class="sec-card insights bg-c-orage">
      <div class="txt-services">
        <h1>Upcoming Events</h1>
    </div>
    <div class="card-wrapper">
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
    </div>
    </section>

     <!-- .............................................................................................................................  -->

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