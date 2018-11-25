<?php
/**
 * Created by PhpStorm.
 * User: Antonin
 * Date: 05/11/2018
 * Time: 12:57
 * Source : https://getbootstrap.com/
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
$item_sql = "SELECT * FROM tbl_item";

$item_result = mysqli_query($db, $item_sql);

?>

<div class="container h-100">
    <div class="row d-flex justify-content-center" style="margin-top: 200px;">
        <div class="shadow bg-white rounded" style="opacity: 0.8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">itemDesc</th>
                    <th scope="col">itemPic</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while (($row = mysqli_fetch_array($item_result, MYSQLI_ASSOC)))
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
                    <td><a href="edit.php?editItem=1&id=<?php echo $row['id'];?>&itemDesc=<?php echo $row['itemDesc']?>&itemPic=<?php echo $row['itemPic']?>">Edit</a></td>
                    <td><a href="edit.php?deleteItem=1&id=<?php echo $row['id'];?>">Delete</a></td>
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
