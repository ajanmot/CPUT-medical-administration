<?php
function checkUserConnection()
{
    session_start();
    include('includes/dbConnexion.php');

    if(!isset($_SESSION['login_user']))
        return (false);
    $user_check = $_SESSION['login_user'];

    $ses_sql = mysqli_query($db,"select username from tbluser where username = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

    $login_session = $row['username'];

    if (isset($login_session))
        return (true);
    else
        return (false);
//    if(!isset($_SESSION['login_user']))
//	   return (false);
//    return (true);
}
?>
