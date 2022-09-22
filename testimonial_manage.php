<!--ADMIN-->
<!--Allows the admin to decide which testimonials are displayed-->

<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !="admin"){
    header("location:index.php");
}
?>

<?php
$msg="";
require('mysql_connect.php');
$query2 = "UPDATE testimony SET display='yes' WHERE id='".$_GET['display']."'";

@mysqli_query($db_connection, $query2);
$query3 = "DELETE FROM testimony WHERE id='".$_GET['discard']."'";

@mysqli_query($db_connection, $query3);

mysqli_close($db_connection);
?>

<?php include "header.html" ?>
        <?php
        require('mysql_connect.php');
        $query = "SELECT * FROM testimony WHERE display='none'";
        $result = @mysqli_query($db_connection, $query);
        $query4 = "SELECT * FROM testimony WHERE display='yes'";
        $result2 = @mysqli_query($db_connection, $query4);
        if ($result->num_rows > 0) {
            echo'<section id="testimonial-contol"class="sec-card services dash bg-white">
            <div class="card card-dash">
                      <h1 class="title-dash">Testimonial waiting for approval</h1>
                      <div class="include-dash">';
            while($row = $result->fetch_assoc()) {
                echo"
                            <form action='#testimonial-contol'method='get'>
                                <h5 class='card-title mb-2 text-muted' >Title: ".$row["title"]."</h5>
                                <h5 class='card-subtitle mb-2 text-muted'>From: ".$row["name"]."</h5>
                                <h5 class='card-subtitle mb-2 text-muted'>Date: ".$row["date"]."</h5>
                                <p class='card-text'>".$row["message"]."</p>
                                <div class='form-group'>
                                    <button id='display' type='submit' name='display' value='".$row["id"]."' class='btn btn-outline-success btn-header bg-c-green '>Display</button>
                                    <button type='submit' name='discard' value='".$row["id"]."' class='btn btn-outline-success btn-header bg-c-red'>Discard</button>
                                </div>
                            </form> 
                            <div class='line'></div>";
            }echo'       <div>
            </div>
        </div>
      </section>';
        }
         if ($result2->num_rows > 0) {
            echo'<section id="testimonial-contol"class="sec-card services dash">
                   <div class="card card-dash">
                     <h1 class="title-dash"> Approved testimonials</h1>
                     <div class="include-dash">';
            while($row = $result2->fetch_assoc()) {
                echo"      
                            <form action='#testimonial-contol'method='get'>
                                <h5 class='card-title mb-2 text-muted' >Title: ".$row["title"]."</h5>
                                <h5 class='card-subtitle mb-2 text-muted'>From: ".$row["name"]."</h5>
                                <h5 class='card-subtitle mb-2 text-muted'>Date: ".$row["date"]."</h5>
                                <p class='card-text'>".$row["message"]."</p>
                                <div class='form-group'>
                                    <button type='submit' name='discard' value='".$row["id"]."' class='btn btn-outline-success btn-header bg-c-red'>Discard</button>
                                </div>
                            </form> 
                            <div class='line'></div>
                            ";
            }echo'<div>
                </div>
               </div>
             </section>';
        }
       
        mysqli_close($db_connection);
        ?>
        <p class="text-center"><?= $msg; ?></p>
 