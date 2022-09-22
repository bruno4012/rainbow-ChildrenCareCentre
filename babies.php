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
     <script src="assets/dist/js/bootstrap.bundle.min.js"></script>



    <title>Hello, world!</title>
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
    
    <header class="header-top pags">
      <!-- wrapper for header  -->
      <div class="wrapper-mian-header">
        <div class="txt-main">
          <p class="txt-care">SERVICES</p>
          </div>
      </div>
  </header>
      <section class="sec-card services">
       <div class="card-wrapper">
        <div class="card">
          <img src="Images/icons/infant.png">
        <h1>Babies</br>(6 months to 1 year)</h1>
         <p>We work together with parents over a settling in period of a few days to ensure that your child is happy and comfortable in their new surroundings.</p>
      </div>
           <div class="card card-big">
               <h1>Babies</h1>
               <p>In our baby rooms, we are developing your child’s sense of self and there is constant interaction between the carers and the children to encourage their natural curiosity. The environment is safe, stimulating and nurturing to foster your child’s love of learning as they discover the world around them. Our black and white areas are designed to create a stimulating yet comforting environment for babies which will captivate and hold your child’s attention, encouraging visual development as well as physical activity.</p>
               <p></p>
           </div>
       </div>
       <div class="more">
        <form class="d-flex" action="babies.html">
          <button class="btn btn-outline-success btn-header" type="submit">Register Now</button>
        </form>
       </div>
     </section>
     <section class="sec-card services bg-white">
      <div class="card-wrapper">
        <div class="card">
          <img src="Images/icons/baby.png">
          <h1>Wobblers</br>(1 to 2 year)</h1>
        <p>To you its play, to them it is learning. As a wobbler, your child takes their first steps and really begins to explore the world around them.</p>
        </div>
          <div class="card card-big">
              <h1>Wobblers</h1>
              <p>Every day is action packed with exciting child-initiated activities designed to nurture their development. There are large movement activities that develop children’s balance and gross motor skills, there’s all types of art, there’s water and messy play, dressing up, garden time, tumble tots, singing, dancing and early language activities.</p>
              <p>All our fun activities all help to promote your child’s communication and social skills while encouraging sensory and language development. To them, it’s just lots of fun, and that’s because we believe that learning is literally, child’s play. Parents and carers enjoy a continuous and ongoing dialogue. Together with weekly observations and developmental meetings that ensures a meaningful dialogue between home and crèche supports your child’s day to day development.</p>
          </div>
          </div>
          <div class="more">
            <form class="d-flex" action="babies.html">
              <button class="btn btn-outline-success btn-header" type="submit">Register Now</button>
            </form>
           </div>
    </section>
    <section class="sec-card services">
     <div class="card-wrapper">
       <div class="card">
           <img src="Images/icons/Toddlers.png">
                <h1>Toddlers</br>(2 to 3 years)</h1>
                <p>We encourage and guide them to further develop their confidence, their intellectual, social and emotional development as they explore their environment.</p>
       </div>
         <div class="card card-big">
             <h1>Toddlers</h1>
             <p>At this age they’re ready for a little more structure and new fun challenges as well as free play and rest periods. As your child discovers their own independence, we encourage and guide them to further develop their confidence, their intellectual, social and emotional development as they explore their environment.</p>
            <p>We pay especially close attention to the development of speech and language and encourage the development of your child’s speech and language through a range of fun and social activities such as songs, role play and storytelling. Other main areas of focus include music, arts and crafts, colours, numbers and fun messy play, where we encourage each child to express their personality through creative and imaginative play whilst promoting their self-esteem and concentration.</p>
         </div>
         </div>
         <div class="more">
          <form class="d-flex" action="babies.html">
            <button class="btn btn-outline-success btn-header" type="submit">Register Now</button>
          </form>
         </div>
   </section>
   <section class="sec-card services bg-white">
    <div class="card-wrapper">
      <div class="card">
        <img src="Images/icons/Preschool.png">
          <h1>Preschool</br>(3 to 5 years)</br></h1>
          <p>At Rainbow we believe in a fun, play based approach to learning and development in the early years.</p>
      </div>
        <div class="card card-big">
            <h1>Preschool</h1>
            <p>Our careers are passionate about childcare and expert in supporting your child’s development within a playful and fun atmosphere.  Every child’s journey is unique and is recorded in a Learning Journey story book that is filled with paintings, collages, drawings and photographs of your child and their new friends.</p>
            <p>Pre-school children’s favourite word is ‘why?’ and they have an endless curiosity about the world.  This is when your child really learns to learn. It’s a time of non-stop exploration and discovery, when your child absorbs everything around them.</p>
            <p>We recognise that the preschool years of 3-5 are especially important and lay the foundations of your child’s primary education. At this stage we introduce the Montessori method of teaching. Your child is introduced to the fundamentals of reading, writing and mathematics in preparation for school, all the while in a fun, exciting and colourful way.</p>
        </div>
      </div>
      <div class="more">
        <form class="d-flex" action="babies.html">
          <button class="btn btn-outline-success btn-header" type="submit">Register Now</button>
        </form>
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
