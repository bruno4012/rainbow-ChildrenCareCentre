<!--PUBLIC-->
<!--Displays childcare information and allows parents to register-->
<!--their child in one of the categories. There should be 4-->
<!--categories: babies, wobblers, toddlers and preschool. For-->
<!--each of the categories there must be multiple options such-->
<!--as half / full day care, 1 day, 3 days or 5 days. Parents should-->
<!--create a user name and password at this stage. A-->
<!--confirmation email should be sent for the parents-->
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
$msg = "";
if (isset($_POST['register'])){
    $msg = "";
    require('mysql_connect.php');
    $child_name = $_POST['child_name'];
    $category = $_POST['category'];
    $mode = $_POST['mode'];
    $plan = $_POST['plan'];

    $parent_name = $_POST['parent_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $passwd = sha1($_POST['passwd']);

    //registre child:
    $query1 = "INSERT INTO child(name, category, week_days, mode) VALUES('$child_name','$category','$plan','$mode')";

    $result = @mysqli_query($db_connection, $query1);
    if(!$result) { // if the query ran successfully
        echo "error registry chld: ".$query1;
    }
    // get child id:
    $query2 = "SELECT id FROM child WHERE name='".$child_name."'";
    $result2 = @mysqli_query($db_connection, $query2);
    if ($result2->num_rows == 1) {
        $row = $result2->fetch_assoc();
        $child_id = $row["id"];
    }
    else{
        echo "Error getting child ID: "+ $query2;
    }

    //registre parent:
    $query3 = "INSERT INTO users(user_name, user_type, user_password, name, email, phone, child_id) VALUES('$username','parent','$passwd','$parent_name','$email','$phone','$child_id')";
    $result3 = @mysqli_query($db_connection, $query3);
    if(!$result) { // if the query ran successfully
        echo "error registry parent: ".$query3;
    }

    // close connection
    mysqli_close($db_connection);
    $msg = "You were successfully registered!";
}
?>

<html lang="en">
<head>
    <title>Contact Us</title>
     <!-- favicon  -->
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <link href="css/reset.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
      <header class="header-top login ">
      <div class="card-wrapper">
          <div class="card card-contact-us">
            <p class="text-center"><?= $msg; ?></p>
            <form action="registration.php" method="post" class="p-4">
                <h3>Child register: </h3>
                <div class="form-group">
                    <label for="child_name">Child name: </label>
                    <input type="text" name="child_name" class="form-control" maxlength=100 placeholder="Child name" required >
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" value="baby"" required>
                        <label class="form-check-label" for="category">
                            Baby
                        </label>
                        <small class="form-text text-muted">4 to 12 months old</small>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" value="wobbler"'>
                        <label class="form-check-label" for="category">
                            Wobbler
                        </label>
                        <small class="form-text text-muted">12 months to 2 years</small>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" value="toddler">
                        <label class="form-check-label" for="category">
                            Toddler
                        </label>
                        <small class="form-text text-muted">2 to 3 years</small>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" value="pre school">
                        <label class="form-check-label" for="category">
                            Pre schooler
                        </label>
                        <small class="form-text text-muted">3 to 4 years</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mr-sm-2" for="mode">Mode</label>
                    <select class="custom-select mr-sm-2" name="mode" id="mode" required>
                        <option value="">Select one option...</option>
                        <option value="full day">Full day care</option>
                        <option value="half day">Half day care</option>
                    </select>
                </div>
                <div class="form-group">

                    <label class="mr-sm-2" for="plan">Weekly plan</label>
                    <select  class="custom-select mr-sm-2" name="plan" id="plan" required>
                        <option value="">Select one option...</option>
                        <option value="5" >5 days</option>
                        <option value="3">3 days</option>
                        <option value="1">1 day</option>
                    </select>

                </div>

                <script>
                    var plan = document.getElementById("plan");
                    var mode = document.getElementById("mode");
                    var calculate = document.getElementById("calculate_fee");
                    var selected_mode = "";
                    var selected_category = "";
                    var selected_plan = "";

                    $(document).ready(function(){
                        $('input:radio[name="category"]').change(function() {
                            selected_category = $(this).val();
                        });
                    });

                    mode.onchange = function(event){
                        selected_mode = mode.value;
                    }
                    plan.onchange = function(event){
                        selected_plan = plan.value;
                    }

                    function checkSelected(){
                        if(selected_category==""){
                            alert("please select a category");
                            return false;
                        }
                        else if(selected_mode==""){
                            alert("please select a mode");
                            return false;
                        }
                        else if(selected_plan==""){
                            alert("please select a plan");
                            return false;
                        }
                        else{
                            return true;
                        }
                    }

                    function displayFee() {
                        var elements = document.getElementsByClassName("calculate");
                        for (var i = 0; i < elements.length; i++) {
                            elements[i].style.display = "none";
                        }

                        if (checkSelected()){
                            // alert("selected plan= "+selected_plan+ " selected mode= "+selected_mode+" selected category= "+selected_category);
                            if(selected_plan=="1" && selected_mode=="full day" && selected_category=="baby"){
                                var x = document.getElementById("full_baby_1");
                                x.style.display = "block";
                            }
                            if(selected_plan=="3" && selected_mode=="full day" && selected_category=="baby"){
                                var x = document.getElementById("full_baby_3");
                                x.style.display = "block";
                            }
                            if(selected_plan=="5" && selected_mode=="full day" && selected_category=="baby"){
                                var x = document.getElementById("full_baby_5");
                                x.style.display = "block";
                            }
                            if(selected_plan=="1" && selected_mode=="half day" && selected_category=="baby"){
                                var x = document.getElementById("part_baby_1");
                                x.style.display = "block";
                            }
                            if(selected_plan=="3" && selected_mode=="half day" && selected_category=="baby"){
                                var x = document.getElementById("part_baby_3");
                                x.style.display = "block";
                            }
                            if(selected_plan=="5" && selected_mode=="half day" && selected_category=="baby"){
                                var x = document.getElementById("part_baby_5");
                                x.style.display = "block";
                            }

                            if(selected_plan=="1" && selected_mode=="full day" && selected_category=="toddler"){
                                var x = document.getElementById("full_toddler_1");
                                x.style.display = "block";
                            }
                            if(selected_plan=="3" && selected_mode=="full day" && selected_category=="toddler"){
                                var x = document.getElementById("full_toddler_3");
                                x.style.display = "block";
                            }
                            if(selected_plan=="5" && selected_mode=="full day" && selected_category=="toddler"){
                                var x = document.getElementById("full_toddler_5");
                                x.style.display = "block";
                            }
                            if(selected_plan=="1" && selected_mode=="half day" && selected_category=="toddler"){
                                var x = document.getElementById("part_toddler_1");
                                x.style.display = "block";
                            }
                            if(selected_plan=="3" && selected_mode=="half day" && selected_category=="toddler"){
                                var x = document.getElementById("part_toddler_3");
                                x.style.display = "block";
                            }
                            if(selected_plan=="5" && selected_mode=="half day" && selected_category=="toddler"){
                                var x = document.getElementById("part_toddler_5");
                                x.style.display = "block";
                            }

                            if(selected_plan=="1" && selected_mode=="full day" && selected_category=="wobbler"){
                                var x = document.getElementById("full_wobbler_1");
                                x.style.display = "block";
                            }
                            if(selected_plan=="3" && selected_mode=="full day" && selected_category=="wobbler"){
                                var x = document.getElementById("full_wobbler_3");
                                x.style.display = "block";
                            }
                            if(selected_plan=="5" && selected_mode=="full day" && selected_category=="wobbler"){
                                var x = document.getElementById("full_wobbler_5");
                                x.style.display = "block";
                            }
                            if(selected_plan=="1" && selected_mode=="half day" && selected_category=="wobbler"){
                                // alert(category);
                                var x = document.getElementById("part_wobbler_1");
                                x.style.display = "block";
                            }
                            if(selected_plan=="3" && selected_mode=="half day" && selected_category=="wobbler"){
                                var x = document.getElementById("part_wobbler_3");
                                x.style.display = "block";
                            }
                            if(selected_plan=="5" && selected_mode=="half day" && selected_category=="wobbler"){
                                var x = document.getElementById("part_wobbler_5");
                                x.style.display = "block";
                            }

                            if(selected_plan=="1" && selected_mode=="full day" && selected_category=="preschool"){
                                var x = document.getElementById("full_preschool_1");
                                x.style.display = "block";
                            }
                            if(selected_plan=="3" && selected_mode=="full day" && selected_category=="preschool"){
                                var x = document.getElementById("full_preschool_3");
                                x.style.display = "block";
                            }
                            if(selected_plan=="5" && selected_mode=="full day" && selected_category=="preschool"){
                                var x = document.getElementById("full_preschool_5");
                                x.style.display = "block";
                            }
                            if(selected_plan=="1" && selected_mode=="half day" && selected_category=="preschool"){
                                // alert(category);
                                var x = document.getElementById("part_preschool_1");
                                x.style.display = "block";
                            }
                            if(selected_plan=="3" && selected_mode=="half day" && selected_category=="preschool"){
                                var x = document.getElementById("part_preschool_3");
                                x.style.display = "block";
                            }
                            if(selected_plan=="5" && selected_mode=="half day" && selected_category=="preschool"){
                                var x = document.getElementById("part_preschool_5");
                                x.style.display = "block";
                            }
                        }
                    }
                </script>


                <label class="btn btn-secondary btn-block btn-reg" id="calculate_fee" onclick="displayFee()" style="margin-bottom:1rem; color: white">Calculate fee</label>
          
          
  
            <?php
                    require('mysql_connect.php');
                    $query4 = "SELECT * FROM fees";
                    $result4 = @mysqli_query($db_connection, $query4);
                    if ($result4->num_rows == 1) {
                        $row = $result4->fetch_assoc();
                        $baby_fee = $row["baby"];
                        $toddler_fee = $row["toddler"];
                        $wobbler_fee = $row["wobbler"];
                        $preschool_fee = $row["preschool"];
                        //                      plan  fees options:
                        $full_baby_1 = $baby_fee;
                        $full_baby_3 = number_format(3 * $baby_fee,2);
                        $full_baby_5 = number_format(5 * $baby_fee,2);
                        $part_baby_1 = number_format($baby_fee / 2,2);
                        $part_baby_3 = number_format(3 * $baby_fee / 2,2);
                        $part_baby_5 = number_format(5 * $baby_fee / 2,2);

                        $full_toddler_1 = $toddler_fee;
                        $full_toddler_3 = number_format(3 * $toddler_fee,2);
                        $full_toddler_5 = number_format(5 * $toddler_fee,2);
                        $part_toddler_1 = number_format($toddler_fee / 2,2);
                        $part_toddler_3 = number_format(3 * $toddler_fee / 2,2);
                        $part_toddler_5 = number_format(5 * $toddler_fee / 2,2);

                        $full_wobbler_1 = $wobbler_fee;
                        $full_wobbler_3 = number_format(3 * $wobbler_fee,2);
                        $full_wobbler_5 = number_format(5 * $wobbler_fee,2);
                        $part_wobbler_1 = number_format($wobbler_fee / 2,2);
                        $part_wobbler_3 = number_format(3 * $wobbler_fee / 2,2);
                        $part_wobbler_5 = number_format(5 * $wobbler_fee / 2,2);

                        $full_preschool_1 = $preschool_fee;
                        $full_preschool_3 = number_format(3 * $preschool_fee,2);
                        $full_preschool_5 = number_format(5 * $preschool_fee,2);
                        $part_preschool_1 = number_format($preschool_fee / 2,2);
                        $part_preschool_3 = number_format(3 * $preschool_fee / 2,2);
                        $part_preschool_5 = number_format(5 * $preschool_fee / 2,2);
                    }
                    // close connection
                    mysqli_close($db_connection);
                    echo "<p class='calculate' id='full_baby_1' style='display: none'>Weekly fee: €".$full_baby_1."</p>";
                    echo "<p class='calculate' id='full_baby_3' style='display: none'>Weekly fee: €".$full_baby_3."</p>";
                    echo "<p class='calculate' id='full_baby_5' style='display: none'>Weekly fee: €".$full_baby_5."</p>";
                    echo "<p class='calculate' id='part_baby_1' style='display: none'>Weekly fee: €".$part_baby_1."</p>";
                    echo "<p class='calculate' id='part_baby_3' style='display: none''>Weekly fee: €".$part_baby_3."</p>";
                    echo "<p class='calculate' id='part_baby_5' style='display: none''>Weekly fee: €".$part_baby_5."</p>";

                    echo "<p class='calculate' id='full_toddler_1' style='display: none''>Weekly fee: €".$full_toddler_1."</p>";
                    echo "<p class='calculate' id='full_toddler_3' style='display: none''>Weekly fee: €".$full_toddler_3."</p>";
                    echo "<p class='calculate' id='full_toddler_5' style='display: none''>Weekly fee: €".$full_toddler_5."</p>";
                    echo "<p class='calculate' id='part_toddler_1' style='display: none''>Weekly fee: €".$part_toddler_1."</p>";
                    echo "<p class='calculate' id='part_toddler_3' style='display: none''>Weekly fee: €".$part_toddler_3."</p>";
                    echo "<p class='calculate' id='part_toddler_5' style='display: none''>Weekly fee: €".$part_toddler_5."</p>";

                    echo "<p class='calculate' id='full_wobbler_1' style='display: none''>Weekly fee: €".$full_wobbler_1."</p>";
                    echo "<p class='calculate' id='full_wobbler_3' style='display: none''>Weekly fee: €".$full_wobbler_3."</p>";
                    echo "<p class='calculate' id='full_wobbler_5' style='display: none''>Weekly fee: €".$full_wobbler_5."</p>";
                    echo "<p class='calculate' id='part_wobbler_1' style='display: none''>Weekly fee: €".$part_wobbler_1."</p>";
                    echo "<p class='calculate' id='part_wobbler_3' style='display: none''>Weekly fee: €".$part_wobbler_3."</p>";
                    echo "<p class='calculate' id='part_wobbler_5' style='display: none''>Weekly fee: €".$part_wobbler_5."</p>";

                    echo "<p class='calculate' id='full_preschool_1' style='display: none''>Weekly fee: €".$full_preschool_1."</p>";
                    echo "<p class='calculate' id='full_preschool_3' style='display: none''>Weekly fee: €".$full_preschool_3."</p>";
                    echo "<p class='calculate' id='full_preschool_5' style='display: none''>Weekly fee: €".$full_preschool_5."</p>";
                    echo "<p class='calculate' id='part_preschool_1' style='display: none''>Weekly fee: €".$part_preschool_1."</p>";
                    echo "<p class='calculate' id='part_preschool_3' style='display: none''>Weekly fee: €".$part_preschool_3."</p>";
                    echo "<p class='calculate' id='part_preschool_5' style='display: none''>Weekly fee: €".$part_preschool_5."</p>";
                ?>

                </div>
         </div>
            </div>
      <div class="card-wrapper">
          <div class="card card-contact-us">
          <h1>Parent register: </h1>
                <div class="form-group">
                    <label for="parent_name">Your name</label>
                    <input type="text" class="form-control" name="parent_name" maxlength=30 required >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" aria-describedby="emailHelp" maxlength=100 placeholder="youremail@example.com" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone" pattern="[0-9]{14}" placeholder="00353839999999">
                </div>
                <div class="form-group">
                    <label for="username">New username:</label>
                    <input type="text" class="form-control" name="username" maxlength=50 required >
                </div>
                <div class="form-group">
                    <label for="passwd">New password:</label>
                    <input type="text" class="form-control" name="passwd" maxlength=30 required >
                </div>
                <div class="form-group">
                    <button type="submit" name="register" class="btn btn-secondary btn-block btn-reg">Register</button>
                </div>
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
