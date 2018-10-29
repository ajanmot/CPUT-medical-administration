<head>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<?php
   include('session_temp.php');
?>
<html>

   <head>
      <title>Welcome </title>
   </head>

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
			}
			else
			{
				echo "Please connect to the site :  <a href = \"login.php\">Login</a> <br>";
			}
		?>
	  <a href = "logout.php">Sign Out</a>
   </body>

</html>
