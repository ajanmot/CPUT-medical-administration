<?php

$fileName = "../srcs/medecineData.csv";

$file = fopen($fileName, "r") or die("Unable to open file!");

while (($string = fgetcsv($file, 10000, ",")) !== FALSE) {
    $column = explode(";", $string[0]);
    $sqlInsert = "INSERT into tbl_medecine (id, medDesc, schedule)
    values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "')";
    if (mysqli_query($db, $sqlInsert)) {
        echo "Row tbl_medecine imported successfully<br>";
    } else {
        die("Error importing table tbl_medecine: " . mysqli_error($db) . "<br>");
    }
}

