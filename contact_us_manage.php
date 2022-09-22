<!--ADMIN-->
<!--Allows the reading of the messages-->
<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !="admin"){
    header("location:index.php");
}
?>

<?php
    $msg="";
    require('mysql_connect.php');
    $query = "DELETE FROM contact_us WHERE id='".$_GET['send']."'";
    $result = @mysqli_query($db_connection, $query);
?>

<html lang="en">
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <?php
        $query = "SELECT * FROM contact_us";
        $result = @mysqli_query($db_connection, $query);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo"
                        
                            <form action='admin_dash.php' method='get'>
                            <div class='display'>
                                <p class=''>From: ".$row["name"]."</p>
                                <p class=''>Email:".$row["email"]."</p>
                                <p class=''>Phone:".$row["phone"]."</p>
                                <p class=''>".$row["message"]."</p>
                                </div>
                                <div class=''>
                                    <button type='submit' name='send' value='".$row["id"]."' class='btn btn-outline-success btn-header bg-c-red'>Discard</button>
                                </div>
                            </form>
                            <div class='line'></div>";
            }
        }
        else {
            $msg = "Your message box is empty.";
        }
        ?>
        <p class="text-center"><?= $msg; ?></p>
    </div>
</div>
</body>
</html>
