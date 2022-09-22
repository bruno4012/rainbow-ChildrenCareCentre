<!--ADMIN-->
<!--Allows the entry/editing of the daily information of the child-->
<!--(name, temperature, breakfast, lunch, activities). Only one-->
<!--record is created for each child per day (i.e., to update the-->
<!--information during the day you should be editing the existing-->
<!--record, if exists)-->
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

<?php
if (isset($_POST['send'])) {

    require('mysql_connect.php');
    $child_id = $_POST['child_id'];
    $temperature = $_POST['temperature'];
    $breakfast = $_POST['breakfast'];
    $lunch = $_POST['lunch'];
    $activities = $_POST['activities'];
    $observation = $_POST['observation'];
    $date = date("Y-m-d");
    $query = "SELECT * FROM day WHERE child_id='$child_id' AND date='$date'";
//    echo $query;
    $result = @mysqli_query($db_connection, $query);
    if ($result->num_rows==1) {
        $query = "UPDATE `day` SET `temperature`='$temperature',`breakfast`='$breakfast',`lunch`='$lunch',`activities`='$activities',`observation`='$observation' WHERE `child_id`='$child_id' AND `date`='$date'";
        if($result){
            $msg = "The details were updated. ";
        }
        else{
            $msg= "Error inserting data. Please contact system administration";
        }
    }
    else{
        $query = "INSERT INTO day(child_id, temperature, breakfast, lunch, activities, observation, date) VALUES('$child_id', '$temperature','$breakfast','$lunch','$activities', '$observation', '$date')";
        echo $query;
        $result = @mysqli_query($db_connection, $query);
        if($result){
            $msg = "Day details submitted!!";
        }
        else{
            $msg= "Error inserting data. Please contact system administration";
        }
        mysqli_close($db_connection);
    }
}
?>

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
     
</head>
<body>
<?php include "header/header.php" ?>
<section class="sec-card services bg-white">
       <div class="card-wrapper">
<div class="container width-card">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-light mt-5 px-0">
            <h3 class="text-center text-light bg-secondary p-3 bg-c-orage">Enter day details: </h3>
            <form action="day_details_edit.php" method="post" class="p-4">
                <div class="form-group">
                    <label for="date">Child ID:</label>
                    <input type="text" name="child_id" class="form-control" maxlength=3 required >
                </div>
                <div class="form-group">
                    <label for="date">Temperature:</label>
                    <input type="text" name="temperature" class="form-control" maxlength=5 required >
                </div>
                <div class="form-group">
                    <label for="title">Breakfast:</label>
                    <input type="text" name="breakfast" class="form-control" maxlength=100 placeholder="e.g Bananas, apples and muesli" >
                </div>
                <div class="form-group">
                    <label for="message">Lunch: </label>
                    <input type="text" name="lunch" class="form-control" maxlength=100 placeholder="e.g 'Salad, veggie meatballs, mashed potatoes'" >
                </div>
                <div class="form-group">
                    <label for="message">Activities: </label>
                    <textarea type="text" class="form-control" name="activities" maxlength=100 required></textarea>
                </div>
                <div class="form-group">
                    <label for="message">Observation: </label>
                    <textarea type="text" class="form-control" name="observation" maxlength=100></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="send" class="btn btn-secondary btn-block">Send</button>
                </div>
                <p class="text-center"><?= $msg; ?></p>
            </form>
        </div>
    </div>
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
