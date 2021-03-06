<?php

include("dbConnexion.php");

$val_patient = mysqli_query($db,'select 1 from `tbl_patient` LIMIT 1');

if($val_patient !== FALSE)
{
    if (mysqli_query($db,'DROP TABLE tbl_patient'))
        echo "Table tbl_patient has been droped <br>";
    else
        echo "--->Error dropping table_patient : " .mysqli_error($db) . "<br>";
}

$val_user = mysqli_query($db,'select 1 from `tbl_user` LIMIT 1');

if($val_user !== FALSE)
{
    if (mysqli_query($db,'DROP TABLE tbl_user'))
        echo "Table tbl_user has been droped <br>";
    else
        echo "--->Error dropping table_user : " .mysqli_error($db) . "<br>";
}

$val_medecine = mysqli_query($db,'select 1 from `tbl_medecine` LIMIT 1');

if($val_medecine !== FALSE)
{
    if (mysqli_query($db,'DROP TABLE tbl_medecine'))
        echo "Table tbl_medecine has been droped <br>";
    else
        echo "--->Error dropping table_medecine : " .mysqli_error($db) . "<br>";
}

$val_item = mysqli_query($db,'select 1 from `tbl_item` LIMIT 1');

if($val_item !== FALSE)
{
    if (mysqli_query($db,'DROP TABLE tbl_item'))
        echo "Table tbl_item has been droped <br>";
    else
        echo "--->Error dropping table_item : " .mysqli_error($db) . "<br>";
}

$val_patient_has_medecine = mysqli_query($db,'select 1 from `tbl_patient_has_medecine` LIMIT 1');

if($val_patient_has_medecine !== FALSE)
{
    if (mysqli_query($db,'DROP TABLE tbl_patient_has_medecine'))
        echo "Table tbl_patient_has_medecine has been droped <br>";
    else
        echo "--->Error dropping table_patient_has_medecine : " .mysqli_error($db) . "<br>";
}

$val_patient_has_item = mysqli_query($db,'select 1 from `tbl_patient_has_item` LIMIT 1');

if($val_patient_has_item !== FALSE)
{
    if (mysqli_query($db,'DROP TABLE tbl_patient_has_item'))
        echo "Table tbl_patient_has_item has been droped <br>";
    else
        echo "--->Error dropping table_patient_has_item : " .mysqli_error($db) . "<br>";
}

$sql_user = "CREATE TABLE `tbl_user` (
`id` int(11) NOT NULL,
`fName` varchar(32) NOT NULL,
`lName` varchar(32) NOT NULL,
`adress1` varchar(64) NOT NULL,
`adress2` varchar(64),
`postalCode` varchar(8) NOT NULL,
`email` varchar(32) NOT NULL,
`cellNum` varchar(10) NOT NULL,
`password` varchar(33) NOT NULL,
`hash_validation` varchar(33),
`userImage` text NOT NULL,
`status` ENUM('user', 'admin', 'matron') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";


if (mysqli_query($db, $sql_user)) {
    echo "Structure of tbl_user created successfully <br>";
} else {
    echo "--->Error creating tbl_user structure: " . mysqli_error($db) . "<br>";
}

$sql_user = "ALTER TABLE `tbl_user`
ADD PRIMARY KEY (`id`);";


if (mysqli_query($db, $sql_user)) {
    echo "Alteration for tbl_user success full (key)<br>";
} else {
    echo "--->Error altering table tbl_user (key): " . mysqli_error($db) . "<br>";
}

$sql_user = "ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";


if (mysqli_query($db, $sql_user)) {
    echo "Alteration for tbl_user success full (primary) <br>";
} else {
    echo "--->Error altering table (primary): " . mysqli_error($db) . "<br>";
}

$sql_patient = "CREATE TABLE `tbl_patient` (
`id` int(11) NOT NULL,
`fName` varchar(32) NOT NULL,
`lName` varchar(32) NOT NULL,
`roomNo` varchar(32) NOT NULL,
`password` varchar(33) NOT NULL,
`nextOfKinID` int(11) NOT NULL,
`address1` varchar(64) NOT NULL,
`address2` varchar(64) NOT NULL,
`postalCode` varchar(32) NOT NULL,
`gradeClasification` ENUM('A', 'B', 'C') NOT NULL,
`prescript` varchar(32) NOT NULL,
`patientImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

if (mysqli_query($db, $sql_patient)) {
    echo "Structure of tbl_patient created successfully<br>";
} else {
    echo "--->Error creating table: " . mysqli_error($db) . "<br>";
}

$sql_patient = "ALTER TABLE `tbl_patient`
ADD PRIMARY KEY (`id`),
ADD KEY `tbl-patient_ibfk_1` (`nextOfKinID`);";

if (mysqli_query($db, $sql_patient)) {
    echo "Alteration of tbl_patient success full (key)<br>";
} else {
    echo "--->Error altering table (key) : " . mysqli_error($db) . "<br>";
}

$sql_patient = "ALTER TABLE `tbl_patient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";

if (mysqli_query($db, $sql_patient)) {
    echo "Alteration of tbl_patient success full(primary)<br>";
} else {
    echo "--->Error altering table (primary): " . mysqli_error($db) . "<br>";
}

$sql_patient = "ALTER TABLE `tbl_patient`
ADD CONSTRAINT `tbl_patient_ibfk_1` FOREIGN KEY (`nextOfKinID`) REFERENCES `tbl_user` (`id`);";

if (mysqli_query($db, $sql_patient)) {
    echo "Alteration of tbl_patient success full (foreign)<br>";
} else {
    echo "--->Error altering table (foreign): " . mysqli_error($db) . "<br>";
}

$sql_medecine = "CREATE TABLE `tbl_medecine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medDesc` varchar(45) NOT NULL,
  `schedule` varchar(45) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

if (mysqli_query($db, $sql_medecine)) {
    echo "Structure of tbl_medecine created successfully<br>";
} else {
    echo "--->Error creating table: " . mysqli_error($db) . "<br>";
}

$sql_item = "CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemDesc` varchar(45) NOT NULL,
  `itemPic` varchar(45) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

if (mysqli_query($db, $sql_item)) {
    echo "Structure of tbl_item created successfully<br>";
} else {
    echo "--->Error creating table: " . mysqli_error($db) . "<br>";
}

$sql_patient_has_medecine = "CREATE TABLE `tbl_patient_has_medecine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_patient_ID` varchar(45) NOT NULL,
  `tbl_medecine_ID` varchar(45) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

if (mysqli_query($db, $sql_patient_has_medecine)) {
    echo "Structure of tbl_patient_has_medecines created successfully<br>";
} else {
    echo "--->Error creating table: " . mysqli_error($db) . "<br>";
}

$sql_patient_has_item = "CREATE TABLE `tbl_patient_has_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_patient_ID` varchar(45) NOT NULL,
  `tbl_item_ID` varchar(45) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

if (mysqli_query($db, $sql_patient_has_item)) {
    echo "Structure of tbl_patient_has_item created successfully<br>";
} else {
    echo "--->Error creating table: " . mysqli_error($db) . "<br>";
}

include('importCSV/importCSVUser.php');
include('importCSV/importCSVPatient.php');
include('importCSV/importCSVMedecine.php');
include('importCSV/importCSVItem.php');
include('importCSV/importCSVPatientHasMedecine.php');
include('importCSV/importCSVPatientHasItem.php');

