<?php

    $fileName = "../srcs/userData.csv";

        $file = fopen($fileName, "r") or die("Unable to open file!");

        while (($string = fgetcsv($file, 10000, ",")) !== FALSE) {
            $column = explode(";", $string[0]);
            $password  = md5($column[8]);
            $sqlInsert = "INSERT into tbl_user (id,fName,lName,adress1,adress2,postalCode,email,cellNum,password,userImage, status)
              values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "',
              '" . $column[4] . "','". $column[5] ."','" . $column[6] . "','". $column[7] . "','". $password .
                "','". $column[9] ."','" . $column[10] . "')";
                if (mysqli_query($db, $sqlInsert)) {
                    echo "Row in tbl_user imported successfully<br>";
                } else {
                    die("Error importing table tbl_user: " . mysqli_error($db) . "<br>");
                }
    }
?>

