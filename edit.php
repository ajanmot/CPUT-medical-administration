<?php
/**
 * Created by PhpStorm.
 * User: Antonin
 * Date: 11/11/2018
 * Time: 18:09
 */
session_start();
if ($_POST && $_POST['tableToModify'] == "patient")
{
    $id = $_POST['idPatient'];
    $fName = $_POST['inputFirstName'];
    $lName = $_POST['inputLastName'];
    $roomNo = $_POST['inputRoomNo'];
    $nextOfKinID = $_POST['inputNextOfKinID'];
    $address1 = $_POST['inputAddress1'];
    $address2 = $_POST['inputAddress2'];
    $postalCode = $_POST['inputPostalCode'];
    $gradeClasification = $_POST['inputGradeClasification'];
    $prescript = $_POST['inputPrescript'];
    $SQLRequest = "UPDATE tbl_patient SET fName='$fName', lName='$lName', roomNo='$roomNo', nextOfKinID='$nextOfKinID', address1='$address1',
      address2='$address2', postalCode='$postalCode', gradeClasification='$gradeClasification', prescript='$prescript' WHERE id='$id'";
    include("includes/dbConnexion.php");
    $QueryResult = mysqli_query($db, $SQLRequest);
    if ($QueryResult == FALSE)
        echo "Error while editing the data" . $db->error;
    else
        header("Location: show_table_patient.php");
}
else if ($_POST && $_POST['tableToModify'] == "medecine")
{
    $id = $_POST['idMedecine'];
    $medDesc = $_POST['inputMedDesc'];
    $schedule = $_POST['inputSchedule'];
    $SQLRequest ="UPDATE tbl_medecine SET medDesc='$medDesc', schedule='$schedule' WHERE id='$id'";
    include("includes/dbConnexion.php");
    $QueryResult = mysqli_query($db, $SQLRequest);
    if ($QueryResult == FALSE)
        echo "Error while editing the data" . $db->error;
    else
       header("Location: show_table_medecine.php");
}
    include("CRUD_medical.php");
    if (isset($_SESSION['sess_crud']))
        $crud = unserialize($_SESSION['sess_crud']);
    else
        {
        if (class_exists("CRUD_medical"))
            $crud = new CRUD_medical();
        else
            exit("<p>The Carer class not available!</p>");
    }
    $crud->processUserInput();
    $_SESSION['sess_crud'] = serialize($crud);
