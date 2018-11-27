<?php

$fileName = "../srcs/itemData.csv";

$file = fopen($fileName, "r") or die("Unable to open file!");

while (($string = fgetcsv($file, 10000, ",")) !== FALSE) {
    $column = explode(";", $string[0]);
    $sqlInsert = "INSERT into tbl_item (id, itemDesc, itemPic)
    values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "')";
    if (mysqli_query($db, $sqlInsert)) {
        echo "Row tbl_item imported successfully<br>";
    } else {
        die("Error importing table tbl_item: " . mysqli_error($db) . "<br>");
    }
}

