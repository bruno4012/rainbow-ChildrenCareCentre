<!--PUBLIC-->
<!--Form enabling the public users to leave a message which-->
<!--should contain:-->
<!--- Name-->
<!--- Email-->
<!--- Phone no-->
<!--- Message-->
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
        $msg = "";
    if (isset($_POST['send'])){
        require('mysql_connect.php');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $query = "INSERT INTO contact_us(name, email, phone, message) VALUES('$name','$email','$phone','$message')";
        $result = @mysqli_query($db_connection, $query);
        if($result) { // if the query ran successfully
            $msg = "Thank you for your message!";
        }

    }
?>

<html lang="en">
<head>
    <title>Contact Us</title>
    <link href="css/reset.css" rel="stylesheet"/>
     <!-- favicon  -->
     <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
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
          <form class="d-flex" action="login.php">
              <button class="btn btn-outline-success" type="submit">log in</button>
            </form>
        </div>
      </nav>
      <header class="header-top login ">
      <div class="card-wrapper">
          <div class="card card-contact-us">
              <!-- <img src=""> -->
            <h1>Contact us:</h1>
            <form action="contact_us.php" method="post" class="p-4">
            <label for="name">Your name</label>
                <input type="text" name="name" class="form-control" maxlength=100 placeholder="Your name" required >
            <label for="email">Email</label>
                <input type="text" class="form-control" name="email" aria-describedby="emailHelp" maxlength=100 placeholder="youremail@example.com" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <label for="phone">Phone</label>
            <input type="tel" class="form-control" name="phone" pattern="[0-9]{14}" placeholder="00353839999999">
            <label for="message">Your message</label>
                <textarea type="text" class="form-control" name="message" maxlength=100 required></textarea>
                <button type="submit" name="send" class="btn btn-secondary btn-block">Send</button>
              <p class="text-center"><?= $msg; ?></p>
            </form>
          </div>
            </div>
  </header>
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
