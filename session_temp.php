<?php
function checkUserConnection()
{
    session_start();

    include('includes/dbConnexion.php');

    if(!isset($_SESSION['login_id']))
        return (false);
    $user_check = $_SESSION['login_id'];

    $ses_sql = mysqli_query($db,"select id from tbl_user where id = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

    $login_session = $row['id'];

    if (isset($login_session))
        return ($db);
    else
        return (false);
//    if(!isset($_SESSION['login_user']))
//	   return (false);
//    return (true);
}

