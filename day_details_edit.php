<!--ADMIN-->
<!--Allows the entry/editing of the daily information of the child-->
<!--(name, temperature, breakfast, lunch, activities). Only one-->
<!--record is created for each child per day (i.e., to update the-->
<!--information during the day you should be editing the existing-->
<!--record, if exists)-->

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
    <title>Share your experience</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php include "header.html" ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-light mt-5 px-0">
            <h3 class="text-center text-light bg-secondary p-3">Enter day details: </h3>
            <form action="admin_dash.php" method="post" class="p-4">
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
</body>
</html>