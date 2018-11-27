<?php
/*if (!$_GET || empty($_GET['hash']) || $_GET['hash'] = 0)
    header("Location: 404.php");
include("includes/dbConnexion.php");
$user_id = $_GET['id'];
$SQLRequest = "SELECT hash_validation FROM tbl_user WHERE id='$user_id'";
$SQLResult = mysqli_query($db, $SQLRequest);
while (($row = mysqli_fetch_array($SQLResult, MYSQLI_ASSOC)))
    if ($row['hash_validation'] == $_GET['hash'])
        break ;
    if (!$row)
        header("Location: 404.php");
   */ ?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Succes Registration</title>
</head>
<body background="srcs/forest-bg.jpg" style="background-repeat: no-repeat; background-size: cover;">

<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col">

        </div>
        <div class="col-6 shadow bg-white rounded" style="padding: 80px 80px 80px 80px; opacity: 0.8">
            <p class="text--center">You are registred</p>
            <p class="text--center"><a href = "login.php">Login</a></p>
        </div>
        <div class="col">

        </div>
    </div>
</div>
</body>

</html>