<?php
   include('session_temp.php');
?>
<html>

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>
	  <?php if (checkUserConnection())
			{
				echo "Welcome " . $_SESSION['login_user'];
			}
			else
			{
				echo "Please connect to the site :  <h2><a href = \"login.php\">Login</a></h2>";
			}
		?>
	  <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
