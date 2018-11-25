<?php
/**
 * Created by PhpStorm.
 * User: Antonin
 * Date: 30/10/2018
 * Time: 11:47
 *  Sources : https://getbootstrap.com/docs/4.0/components/navbar/
 **/
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Medical administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="show_table_patient.php">Patient<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="show_table_item.php">Items<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="show_table_medecine.php">Medecine<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <li class="nav-item active">
                <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>