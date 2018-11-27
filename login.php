
<?php
/**
 * Sources : Bootstrap
 */
include("includes/dbConnexion.php");
session_start();
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
    <title>Login</title>
</head>
<body background="srcs/forest-bg.jpg" style="background-repeat: no-repeat; background-size: cover;">
<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col">

        </div>
        <div class="col-6 shadow bg-white rounded" style="padding: 80px 80px 0px 80px; opacity: 0.8">
            <h3 style="padding-bottom: 50px; text-align: center;" class="text-dark"> Member Login</h3>
            <form action="login.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="inputFirstName" value="<?php if (isset($_POST['inputFirstName']))echo $_POST['inputFirstName'];?>">
                        <div class="invalid-feedback">
                            Please provide your first name.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="inputLastName" value="<?php if (isset($_POST['inputLastName']))echo $_POST['inputLastName'];?>">
                    </div>
                    <div class="invalid-feedback">
                        Please provide your last name.
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email address" name="inputEmail" value="<?php if (isset($_POST['inputEmail']))echo $_POST['inputEmail'];?>">
                    <div class="invalid-feedback">
                        Please provide your email address.
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="inputPassword">
                    <div class="invalid-feedback">
                        Wrong password.
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">Sign in</button>
            </form>
            <p style="padding-top: 100px; text-align: center;"><a href="create_account.php" class="text-dark">Create your account</a> </p>
        </div>
        <div class="col">

        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
<?php
if ($_POST)
{
    if (empty($_POST['inputFirstName']))
    {
        echo "<script>var elemFirst = document.getElementById('inputFirstName');
    elemFirst.classList.add('is-invalid');
</script>";
    }
    else
        $myFirstName = mysqli_real_escape_string($db,$_POST['inputFirstName']);
    if (empty($_POST['inputLastName']))
    {
        echo "<script>var elemLast = document.getElementById('inputLastName');
    elemLast.classList.add('is-invalid'); </script>";
    }
    else
        $myLastName = mysqli_real_escape_string($db,$_POST['inputLastName']);
    if (empty($_POST['inputEmail']))
    {
        echo "<script>var elemEmail = document.getElementById('inputEmail');
    elemEmail.classList.add('is-invalid'); </script>";
    }
    else
        $myEmail = mysqli_real_escape_string($db,$_POST['inputEmail']);
    if (empty($_POST['inputPassword']))
    {
        echo "<script>var elemPassword = document.getElementById('inputPassword');
    elemPassword.classList.add('is-invalid'); </script>";
    }
    else
        $myPassword = md5($_POST['inputPassword']);
    if (!empty($myFirstName) && !empty($myLastName) && !empty($myEmail) && !empty($myPassword))
    {
        $sql = "SELECT id, fName, lName, email, hash_validation FROM tbl_user WHERE fName='$myFirstName' and lName='$myLastName' and email='$myEmail' and password='$myPassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        echo $row['hash_validation'] ;
        echo $row['id'];
        if ($count == 1 && $row['hash_validation'] == 0) {
            $_SESSION['login_id'] = $row['id'];
            $_SESSION['login_user'] = $myFirstName . " " . $myLastName;
            header("Location: index.php");
        }
        else
            {
            echo "<script>var elemPassword2 = document.getElementById('inputPassword');
    elemPassword2.classList.add('is-invalid'); </script>";
        }
    }
}
?>