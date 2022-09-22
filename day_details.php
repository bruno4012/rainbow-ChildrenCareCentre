<!--PRIVATE-->
<!--Show an attractively formatted table for one row of the day-->
<!--table. Parents can only see their child data, they can filter a-->
<!--day. Admin can filter all children and all days.-->
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
?>



<?php include "header.html" ?>
<div class="container">
    <div class="row justify-content-center" >
    <?php
        require('mysql_connect.php');
        if ($_SESSION['role'] == "admin") {
            echo "
                   <div class='card' style='width: 70rem; margin: 1rem;'>
                        <div class='card-body'>
                            <form action='day_details.php' method='get'>
                                <div class='form-group'>
                                    <label for='date'>Filter by date:</label>
                                    <input type='date' name='date' class='form-control' maxlength=100 >
                                </div>
                                <div class='form-group'>
                                    <label for='id'>Filter by child_id:</label>
                                    <input type='text' name='id' class='form-control' maxlength=100 >
                                </div>
                                <div class='form-group'>
                                    <button type='submit' name='send' class='btn btn-secondary btn-block'>Send</button>
                                </div>
                                <p class='text-center'><?= $msg; ?></p>
                            </form>
                        </div>
                   </div>
            ";
            $query = "SELECT day.child_id, day.temperature, day.breakfast, day.lunch, day.activities, day.observation, day.date, child.name FROM day JOIN child
ON day.child_id = child.id";
            if ($filtered_id){
                $query = "SELECT day.child_id, day.temperature, day.breakfast, day.lunch, day.activities, day.observation, day.date, child.name FROM day JOIN child
ON day.child_id = child.id WHERE day.child_id = '$filtered_id'";
            }
            if ($filtered_day){
                $query = "SELECT day.child_id, day.temperature, day.breakfast, day.lunch, day.activities, day.observation, day.date, child.name FROM day JOIN child
ON day.child_id = child.id WHERE day.date = '$filtered_day'";
            }
            if ($filtered_day && $filtered_id){
                $query = "SELECT day.child_id, day.temperature, day.breakfast, day.lunch, day.activities, day.observation, day.date, child.name FROM day JOIN child
ON day.child_id = child.id WHERE day.date = '$filtered_day' AND day.child_id = $filtered_id";
            }
//                    echo $query;
            $result = @mysqli_query($db_connection, $query);
            mysqli_close($db_connection);
        }


        if($_SESSION['role'] == "parent") {
            echo "
                   <div class='card' style='width: 70rem; margin: 1rem;'>
                        <div class='card-body'>
                            <form action='day_details.php' method='get'>
                                <div class='form-group'>
                                    <label for='date'>Filter by date:</label>
                                    <input type='date' name='date' class='form-control' maxlength=100 >
                                </div>
                                <div class='form-group'>
                                    <button type='submit' name='send' class='btn btn-outline-success btn-header'>Send</button>
                                </div>
                                <p class='text-center'><?= $msg; ?></p>
                            </form>
                        </div>
                   </div>";
            $username= $_SESSION['username'];
            $query_parent = "SELECT child_id FROM `users` WHERE user_name = '$username' ";
//                    echo($query_parent);
            $result = @mysqli_query($db_connection, $query_parent);
            $row = $result->fetch_assoc();
            $child_id= $row["child_id"];
            $query_parent ="SELECT day.child_id, day.temperature, day.breakfast, day.lunch, day.activities, day.observation, day.date, child.name FROM day JOIN child
ON day.child_id = child.id WHERE day.child_id='$child_id'";
            if ($filtered_day){
                $query_parent = "SELECT day.child_id, day.temperature, day.breakfast, day.lunch, day.activities, day.observation, day.date, child.name FROM day JOIN child
ON day.child_id = child.id WHERE day.child_id='$child_id' AND day.date = '$filtered_day'";
            }
//                    echo($query_parent);
            $result = @mysqli_query($db_connection, $query_parent);
            mysqli_close($db_connection);


        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card' style='width: 70rem; margin: 1rem;'>
                            <div class='card-body'>
                                <form action='testimonial_manage.php' method='get'>
                                    <h5 class='card-title'>Name: " . $row["name"] . "</h5>
                                    <h5 class='card-title'>ID: " . $row["child_id"] . "</h5>
                                    <h6 class='card-subtitle mb-2 text-muted'>Date: " . $row["date"]. "</h6>
                                    <h6 class='card-subtitle mb-2 text-muted'>Temperature: " . $row["temperature"] . "</h6>
                                    <h6 class='card-subtitle mb-2 text-muted'>Breakfast: " . $row["breakfast"] . "</h6>
                                    <h6 class='card-subtitle mb-2 text-muted'>Lunch: " . $row["lunch"] . "</h6>
                                    <h6 class='card-subtitle mb-2 text-muted'>Activities: " . $row["activities"] . "</h6>
                                    <h6 class='card-subtitle mb-2 text-muted'>Observation :" . $row["observation"] . "</h6>
                                    <div class='form-group'>
                                    </div>
                                </form>
                            </div>
                        </div>";
            }
        }
        else{
            echo "<div class='card' style='width: 70rem; margin: 1rem;'>
                        <div class='card-body'>
                            <form action='testimonial_manage.php' method='get'>
                                <h5 class='card-title'>Day details is empty</h5>
                                </div>
                            </form>
                        </div>
                  </div>";
        }
    ?>

