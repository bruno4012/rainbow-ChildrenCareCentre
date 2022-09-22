<!--ADMIN-->
<!--Allows the fee information to be updated-->

<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !="admin"){
    header("location:index.php");
}

?>

<?php
$msg = "";
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

    mysqli_close($db_connection);
}


if (isset($_POST['update_fee'])){
    require('mysql_connect.php');
    $baby_fee = $_POST['baby_fee'];
    $toddler_fee = $_POST['toddler_fee'];
    $wobbler_fee = $_POST['wobbler_fee'];
    $preschool_fee = $_POST['preschool_fee'];
    $query = "UPDATE fees SET baby='$baby_fee', toddler='$toddler_fee', wobbler='$wobbler_fee', preschool='$preschool_fee'";
    $result = @mysqli_query($db_connection, $query);

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
    mysqli_close($db_connection);
    $msg = " Fees successfully updated.";
}


?>

<html lang="en">
<head>
    <title>Fee update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php include "header.html" ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-light mt-5 px-0">
            <h3 class="text-center text-light bg-secondary p-3">Base fee update</h3>
            <form action="registration_edit.php" method="post" class="p-4">
                <div class="form-group">
                    <label for="baby_fee">Baby fee:</label>
                    <input type="text" name="baby_fee" class="form-control" maxlength=100 value="<?= $baby_fee; ?>" required>
                </div>
                <div class="form-group">
                    <label for="toddler_fee">Toddler fee:</label>
                    <input type="text" name="toddler_fee" class="form-control" maxlength=100 value="<?= $toddler_fee; ?>" required>
                </div>
                <div class="form-group">
                    <label for="wobbler_fee">Wobbler fee:</label>
                    <input type="text" name="wobbler_fee" class="form-control" maxlength=100 value="<?= $wobbler_fee; ?>"required>
                </div>
                <div class="form-group">
                    <label for="preschool_fee">Pre School fee:</label>
                    <input type="text" name="preschool_fee" class="form-control" maxlength=100 value="<?= $preschool_fee; ?>"required>
                </div>
                <div class="form-group">
                    <input type="submit" name="update_fee" class="btn btn-secondary btn-block">
                </div>
                <p class="text-center"><?= $msg; ?></p>
            </form>
            <h3 class="text-center text-light bg-secondary p-3">Plans price guide</h3>
            <div class="p-4">
                <p>Baby:</p>
                <p>Full time baby 1x per week: <?= $full_baby_1; ?></p>
                <p>Full time baby 3x per week: <?= $full_baby_3; ?></p>
                <p>Full time baby 5x per week: <?= $full_baby_5; ?></p>
                <p>Half time baby 1x per week: <?= $part_baby_1; ?></p>
                <p>Half time baby 3x per week: <?= $part_baby_3; ?></p>
                <p>Half time baby 5x per week: <?= $part_baby_5; ?></p>
                <p>Toddler:</p>
                <p>Full time toddler 1x per week: <?= $full_toddler_1; ?></p>
                <p>Full time toddler 3x per week: <?= $full_toddler_3; ?></p>
                <p>Full time toddler 5x per week: <?= $full_toddler_5; ?></p>
                <p>Half time toddler 1x per week: <?= $part_toddler_1; ?></p>
                <p>Half time toddler 3x per week: <?= $part_toddler_3; ?></p>
                <p>Half time toddler 5x per week: <?= $part_toddler_5; ?></p>
                <p>Wobbler:</p>
                <p>Full time wobbler 1x per week: <?= $full_wobbler_1; ?></p>
                <p>Full time wobbler 3x per week: <?= $full_wobbler_3; ?></p>
                <p>Full time wobbler 5x per week: <?= $full_wobbler_5; ?></p>
                <p>Half time wobbler 1x per week: <?= $part_wobbler_1; ?></p>
                <p>Half time wobbler 3x per week: <?= $part_wobbler_3; ?></p>
                <p>Half time wobbler 5x per week: <?= $part_wobbler_5; ?></p>
                <p>Pre School:</p>
                <p>Full time pre schooler 1x per week: <?= $full_preschool_1; ?></p>
                <p>Full time pre schooler 3x per week: <?= $full_preschool_3; ?></p>
                <p>Full time pre schooler 5x per week: <?= $full_preschool_5; ?></p>
                <p>Half time pre schooler 1x per week: <?= $part_preschool_1; ?></p>
                <p>Half time pre schooler 3x per week: <?= $part_preschool_3; ?></p>
                <p>Half time pre schooler 5x per week: <?= $part_preschool_5; ?></p>
            </div>
        </div>
    </div>
</div>
<?php include "footer.html" ?>
</body>
</html>
