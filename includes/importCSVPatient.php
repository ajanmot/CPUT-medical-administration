<?php

    $fileName = "../srcs/patientData.csv";

        $file = fopen($fileName, "r") or die("Unable to open file!");

        while (($string = fgetcsv($file, 10000, ",")) !== FALSE) {
            $column = explode(";", $string[0]);
            $sqlInsert = "INSERT into tbl_patient (id,fName,lName,roomNo,password,nextOfKinID,address1,address2,
              postalCode,gradeClasification,prescript,patientImage)
              values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "',
              '" . $column[4] . "','". $column[5] ."','" . $column[6] . "','". $column[7] . "','". $column[8] .
                "','". $column[9] ."','" . $column[10] . "','" . $column[11] . "')";
                if (mysqli_query($db, $sqlInsert)) {
                    echo "Row tbl_patient imported successfully<br>";
                } else {
                    die("Error importing table tbl_patient: " . mysqli_error($db) . "<br>");
                }
    }
?>