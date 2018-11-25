<?php
/**
 * Created by PhpStorm.
 * User: Antonin
 * Date: 05/11/2018
 * Time: 12:57
 * Sources : https://getbootstrap.com/
 */

session_start();
if (empty($_SESSION['login_id']))
    header("Location: login.php");
include("includes/dbConnexion.php");
include_once('includes/navbar.php');

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
$user_sql = "SELECT status FROM tbl_user WHERE id='$user_id'";
$user_result = mysqli_query($db,$user_sql);
$row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);
if (strcmp($row['status'], 'user') == 0)
    $list_sql = "SELECT * FROM tbl_patient WHERE nextOfKinID='$user_id'";
else
    $list_sql = "SELECT * FROM tbl_patient";
$list_result = mysqli_query($db,$list_sql);
?>
<div class="container h-100">
    <div class="row d-flex justify-content-center" style="margin-top: 200px;">
        <div class="shadow bg-white rounded" style="opacity: 0.8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">RoomN°</th>
                    <th scope="col">Password</th>
                    <th scope="col">NOK</th>
                    <th scope="col">Address</th>
                    <th scope="col">Address2</th>
                    <th scope="col">PostalCode</th>
                    <th scope="col">GradeClass</th>
                    <th scope="col">Prescript</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while (($row = mysqli_fetch_array($list_result, MYSQLI_ASSOC)))
                {
                    echo "<tr>";
                    foreach ($row as $key => $value){
                        if (!strcmp($key, "id"))
                            echo '<th scope="row">' . $value .' </th>';
                        else if (!strcmp($key, "patientImage"))
                        {
                            ?>
                            <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>">Show Face</button></td>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $row['id']; ?>" role="dialog" data-backdrop="false">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $value; ?>.png" style ="width:100%" class="w3-round">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php
                        }
                        else
                            echo "<td>" . $value ."</td>";

                    }
                    ?>
                    <td><a href="edit.php?editPatient=1&id=<?php echo $row['id'];?>&fName=<?php echo $row['fName'];?>&lName=<?php echo $row['lName'];?>&roomNo=<?php echo $row['roomNo'];?>&nextOfKinID=<?php echo $row['nextOfKinID'];?>&address1=<?php echo $row['address1'];?>&address2=<?php echo $row['address2'];?>&postalCode=<?php echo $row['postalCode'];?>&gradeClasification=<?php echo $row['gradeClasification'];?>&prescript=<?php echo $row['prescript'];?>&patientImage=<?php echo $row['patientImage'];?>">Edit</a></td>
                    <td><a href="edit.php?deletePatient=1&id=<?php echo $row['id'];?>">Delete</a></td>
                    <?php
                    echo "</tr>";

                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
