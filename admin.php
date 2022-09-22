<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !="admin"){
    header("location:index.php");
}
?>

<html lang="en">
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php include "header.html" ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-light mt-5 px-0">
            <h1>Hello <?= $_SESSION['username']?>!</h1>
            <h2>You are a <?= $_SESSION['role']?></h2>
            <a href="logout.php" class="btn btn-secondary btn-block">Logout</a>
        </div>
    </div>
</div>
<?php include "footer.html" ?>
</body>
</html>