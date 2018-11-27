<?php
/**
 * Created by PhpStorm.
 * User: Antonin
 * Date: 27/11/2018
 * Time: 02:42
 */

if ($_GET)
{
    include("includes/dbConnexion.php");
    if (!empty($_GET['firstName']) && !empty($_GET['lastName']) && !empty($_GET['email']) && !empty($_GET['hash']))
    {
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $email = $_GET['email'];
        $hash = $_GET['hash'];

        $sql_select = "SELECT id FROM tbl_user WHERE email='$email' AND fName='$firstName' AND lName='$lastName' AND hash_validation='$hash'";
        $select_result = mysqli_query($db, $sql_select);
        if (mysqli_num_rows($select_result) == 1)
        {
            $row = mysqli_fetch_array($select_result, MYSQLI_ASSOC);
            $new_user_id = $row['id'];
            $value = 0;
            $sql_modify = "UPDATE tbl_user SET hash_validation=0 WHERE id='$new_user_id'";
            mysqli_query($db, $sql_modify);
            echo 'New user has been created ! <a href="login.php">You can now login here</a>';
        }
        else
        {
            echo "Invalid url";
        }
    }
    else
    {
        echo "Invalid URL - 2 ";
    }

}