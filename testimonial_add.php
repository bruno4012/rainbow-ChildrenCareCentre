<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
?>

<?php
if (isset($_POST['send'])){

    if ($_SESSION['role'] == "parent"){
        require('mysql_connect.php');
        $username = $_SESSION['username'];
//        $username = 'parent';
        $date = date("Y-m-d");
        $message = $_POST['message'];
        $title = $_POST['title'];
//        echo $title;
        $query ="SELECT * FROM users WHERE user_name='$username'";
//        echo $query;
        $result = @mysqli_query($db_connection, $query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $name= $row["name"];
            $query2 = "INSERT INTO testimony(title, name, user_name, date, message) VALUES('$title', '$name','$username','$date','$message')";
//            echo $query2;
            $result2 = @mysqli_query($db_connection, $query2);
            if($result2){
                $msg = "Thank you!";
            }
        }
        mysqli_close($db_connection);
    }
    else{
        $msg = "Testimonials are given only by parents.";
    }
}

?>


                   
            <form action="#add_testimonial" method="post" class="p-4">
                    <p class="text-center"><?= $msg; ?></p>
                    <label class="" for="title">Subject:</label></br>
                    <input class="form-form"type="text" name="title" class="form-control" maxlength=100 placeholder="e.g 'My experience with full time baby care at Rainbow'" required ><br>
                    <label class=""or="message">Your testimony: </label>
                    <textarea type="text" class="form-control" name="message" maxlength=100 required></textarea><br>
                    <button type="submit" name="send" class="btn btn-outline-success btn-header">Send</button>
            </form>

