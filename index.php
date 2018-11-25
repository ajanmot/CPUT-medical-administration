<?php
/**
 * Sources : Bootstrap
 */
session_start();
    if (empty($_SESSION['login_id']))
        header("Location: login.php");
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>
<?php include_once('includes/navbar.php')?>
<body background="srcs/forest-bg.jpg" style="background-repeat: no-repeat; background-size: cover;">

<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col">

        </div>
        <div class="col-6 shadow bg-white rounded" style="padding: 80px 80px 80px 80px; opacity: 0.8">
            <p class="text--center" style="text-align: center;"><a href = "show_table_patient.php">Show table patient</a></p>
            <p class="text--center" style="text-align: center;"><a href = "show_table_medecine.php">Show table medecine</a></p>
            <p class="text--center" style="text-align: center;"><a href = "show_table_item.php">Show table item</a></p>
            <p class="text--center" style="text-align: center;"><a href = "logout.php">Sign Out</a></p>
        </div>
        <div class="col">

        </div>
    </div>
</div>
</body>
</html>
