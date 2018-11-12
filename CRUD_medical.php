<?php
/**
 * Created by PhpStorm.
 * User: Antonin
 * Date: 12/11/2018
 * Time: 15:20
 */
class CRUD_medical
{
private $dbConn = NULL;
private $errorMsgs = array();
function __construct()
{
    include("includes/dbConnexion.php");
    $this->dbConn = $db;
    $this->errorMsgs = $db->connect_error;
}
function __wakeup()
{
    include("includes/dbConnexion.php");
    $this->dbConn = $db;
    $this->errorMsgs = $db->connect_error;
}
public function processUserInput()
{
    if (!empty($_GET['deletePatient']))
    {
        $this->deletePatient();
    }
    else if (!empty($_GET['editPatient']))
    {
        $this->editPatient();
    }
}

private function deletePatient()
{
    //if (count($this->errorMsgs) == 0) {
    $tmpPatientId = $_GET['id'];
    $SQLstring = "delete from tbl_Patient where id='$tmpPatientId'";
    $QueryResult = mysqli_query($this->dbConn, $SQLstring);
    if ($QueryResult === FALSE)
        $this->errorMgs[] = "<p>Unable to perform the query. " .
            "<p>Error code " . $this->dbConn->errno .
            ": " . $this->dbConn->error . "</p>\n";
    //}
    echo $this->errorMsgs;
    header("Location: show_table_patient.php");
}

private function editPatient()
{
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
    <title>Edit patient</title>
</head>
<body background="srcs/forest-bg.jpg" style="background-repeat: no-repeat; background-size: cover;">
<div class="row align-items-center h-100">
    <div class="col">

    </div>
    <div class="col-6 shadow bg-white rounded" style="padding: 80px 80px 80px 80px; opacity: 0.8">
        <h3 style="padding-bottom: 50px; text-align: center;" class="text-dark"> Patient n° <?php echo $_GET['id']?> edit</h3>
        <form action="edit.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="inputFirstName" value="<?php if (isset($_GET['fName']))echo $_GET['fName'];?>">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="inputLastName" value="<?php if (isset($_GET['lName']))echo $_GET['lName'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="inputRoomNo" placeholder="Room No" name="inputRoomNo" value="<?php if (isset($_GET['roomNo']))echo $_GET['roomNo'];?>">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="inputNextOfKinID" placeholder="Next of Kin ID" name="inputNextOfKinID" value="<?php if (isset($_GET['nextOfKinID']))echo $_GET['nextOfKinID'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="inputAddress1" placeholder="Address 1" name="inputAddress1" value="<?php if (isset($_GET['address1']))echo $_GET['address1'];?>">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Address 1" name="inputAddress2" value="<?php if (isset($_GET['address2']))echo $_GET['address2'];?>">
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="inputPostalCode" placeholder="Postal code" name="inputPostalCode" value="<?php if (isset($_GET['postalCode']))echo $_GET['postalCode'];?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="inputGradeClasification" placeholder="Grade Clasification" name="inputGradeClasification" value="<?php if (isset($_GET['gradeClasification']))echo $_GET['gradeClasification'];?>">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="inputPrescript" placeholder="Prescript" name="inputPrescript" value="<?php if (isset($_GET['prescript']))echo $_GET['prescript'];?>">
                </div>
            </div>
            <input type="hidden" id="tableToModify" name="tableToModify" value="patient">
            <input type="hidden" id="idPatient" name="idPatient" value="<?php echo $_GET['id']?>">
            <button type="submit" class="btn btn-secondary btn-lg btn-block">Modify patient</button>
        </form>
    </div>
    <div class="col">

    </div>
</div>

</body>
</html>
<?php
}

}
?>
