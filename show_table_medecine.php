<?php
/**
 * Created by PhpStorm.
 * User: Antonin
 * Date: 05/11/2018
 * Time: 12:57
 * Sources https://getbootstrap.com/
 */

session_start();
if (empty($_SESSION['login_id']))
    header("Location: login.php");
include_once('includes/navbar.php');
include("includes/dbConnexion.php");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Show table</title>
</head>

<?php
$user_id = $_SESSION['login_id'];
$sql_status = "SELECT status FROM tbl_user WHERE id='$user_id'";
$result_status = mysqli_query($db, $sql_status);
$row = mysqli_fetch_array($result_status, MYSQLI_ASSOC);
if ($row['status'] != 'user')
    $sql_medecine = "SELECT * FROM tbl_medecine";
else
    $sql_medecine = "SELECT * FROM tbl_medecine WHERE id IN (SELECT tbl_medecine_ID FROM tbl_patient_has_medecine WHERE tbl_patient_ID IN (SELECT id FROM tbl_patient WHERE nextOfKinID='$user_id'))";
if (!($medecine_result = mysqli_query($db, $sql_medecine)))
    echo $db->error;
?>

<div class="container h-100">
    <div class="row d-flex justify-content-center" style="margin-top: 200px;">
        <div class="shadow bg-white rounded" style="opacity: 0.8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">medDesc</th>
                    <th scope="col">schedule</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
            <tbody>
            <?php
            while (($row = mysqli_fetch_array($medecine_result, MYSQLI_ASSOC)))
            {
                echo "<tr>";
                foreach ($row as $key => $value)
                {
                    if (!strcmp($key, "id"))
                        echo '<th scope="row">' . $value .' </th>';
                    else
                        echo "<td>" . $value . "</td>";
                }
                ?>
                <td><a href="edit.php?editMedecine=1&id=<?php echo $row['id'];?>&medDesc=<?php echo $row['medDesc']?>&schedule=<?php echo $row['schedule']?>">Edit</a></td>
                <td><a href="edit.php?deleteMedecine=1&id=<?php echo $row['id'];?>">Delete</a></td>
                <?php
                echo "</tr>";
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
</html>
