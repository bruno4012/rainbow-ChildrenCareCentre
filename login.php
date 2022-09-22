<!--PUBLIC-->
<!--A user should be able to access a logout script from a link in-->
<!--the header. When this logout script executes the session-->
<!--should be destroyed and the user should receive a logout-->
<!--confirmation message and then be returned to the index-->
<!--page.-->
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
    session_start();
    $msg = "";

    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $userPassword = $_POST['password'];
        $userPassword = sha1($userPassword);
        $userType = $_POST['userType'];
//        $query = "SELECT * FROM users WHERE user_name='".$username."' AND user_password='".$userPassword."' AND user_type='".$userType."'";
        $query = "SELECT * FROM users WHERE user_name='".$username."' AND user_password='".$userPassword."'";

        require('mysql_connect.php');
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            session_regenerate_id();
            $_SESSION['username'] = $row["user_name"];
            $_SESSION['role'] = $row["user_type"];
            session_write_close();

            if ($_SESSION['role'] == "admin"){
                header("location:admin_dash.php");
            }
            else if ($_SESSION['role'] == "parent"){
                header("location:parent_dash.php");
            }

        } else {
            $msg = "Username or password is incorrect";
        }
        // close connection
        mysqli_close($db_connection);
    }
?>

<html lang="en">
<head>
   <!-- favicon  -->
   <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <title>Login</title>
    <link href="css/reset.css" rel="stylesheet"/>
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
    header("location:index.php");
  }
if($_SESSION['role'] =="parent"){
    header("location:index.php");
  }
?>
      <header class="header-top login">
    
      <div class="card-wrapper">
          <div class="card card-login">
           <!-- <img src=""> -->
            <h1>Login</h1>
            <form action="login.php" method="post" class="p-4">
              <input type="text" name="username" class="form-control" maxlength=100 placeholder="Username" required>
              <input type="text" name="password" class="form-control" maxlength=100 placeholder="Password" required>
              <input type="submit" name="login" class="btn btn-secondary btn-block">
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
