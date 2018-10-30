<head>
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Welcome </title>
</head>
<?php
include('session_temp.php');
?>
<html>

<body>
<?php
if (($db = checkUserConnection()))
{
    $tmp = $_SESSION['login_id'];
    $sql = "select * from tbl_user where id='$tmp'";
    if (($result = mysqli_query($db, $sql)))
    {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo "Welcome " . $_SESSION['login_user'] . " (" . $row['status'] . ")";
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    else
        die("Error fetching data: " . mysqli_error($db) . "<br>");
    ?><p class="text--center"><a href = "logout.php">Sign Out</a></p><?php
}
else
{
    echo "<p class=\"text--center\">Please connect to the site :  <a href = \"login.php\">Login</a> </p>";
}
?>
</body>
</html>
