<?php
/**
 * Source (HTML & JS) : https://getbootstrap.com/docs/4.0/components/forms/
 *
 */
include("includes/dbConnexion.php");
include("includes/send_mail.php");
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
    <title>Hello, world!</title>
</head>
<body background="srcs/forest-bg.jpg" style="background-repeat: no-repeat; background-size: cover;">
<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col">

        </div>
        <div class="col-6 shadow bg-white rounded" style="padding: 80px 80px 100px 80px; opacity: 0.8">
            <h3 style="padding-bottom: 50px; text-align: center;" class="text-dark">Member Creation</h3>
            <form action="create_account.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="inputFirstName" value="<?php if (isset($_POST['inputFirstName']))echo $_POST['inputFirstName'];?>" required>
                        <div class="invalid-feedback">
                            Invalid first name.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="inputLastName" value="<?php if (isset($_POST['inputLastName']))echo $_POST['inputLastName'];?>" required>
                    </div>
                    <div class="invalid-feedback">
                        Invalid last name.
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="inputAddress" value="<?php if (isset($_POST['inputAddress']))echo $_POST['inputAddress'];?>" required>
                    <div class="invalid-feedback">
                        Invalid address.
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-8">
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Address 2" name="inputAddress2" value="<?php if (isset($_POST['inputAddress2']))echo $_POST['inputAddress2'];?>" required>
                    </div>
                    <div class="form-group col-4">
                        <input type="text" class="form-control" id="inputPCode" placeholder="Postal code" name="inputPCode" value="<?php if (isset($_POST['inputPCode']))echo $_POST['inputPCode'];?>" required>
                        <div class="invalid-feedback">
                            Invalid postal code.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email address" name="inputEmail" value="<?php if (isset($_POST['inputEmail']))echo $_POST['inputEmail'];?>" required>
                    <div class="invalid-feedback">
                        Invalid email address.
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputTel" placeholder="Tel. N°" name="inputTel" value="<?php if (isset($_POST['inputTel']))echo $_POST['inputTel'];?>" required>
                    <div class="invalid-feedback">
                        Invalid phone number.
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="inputPassword" required>
                    <div class="invalid-feedback">
                        Password doesn't match.
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="inputPassword2" required>
                    <div class="invalid-feedback">
                        Password doesn't match.
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">Register</button>
            </form>
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
        echo "<script>var elem = document.getElementById('inputFirstName');
            elem.classList.add('is-invalid');
        </script>";
    }
    else
        $firstName = mysqli_real_escape_string($db,$_POST['inputFirstName']);
    if (empty($_POST['inputLastName']))
    {
        echo "<script>var elem = document.getElementById('inputLastName');
            elem.classList.add('is-invalid'); </script>";
    }
    else
        $lastName = mysqli_real_escape_string($db,$_POST['inputLastName']);
    if (empty($_POST['inputAddress']))
    {
        echo "<script>var elem = document.getElementById('inputAddress');
            elem.classList.add('is-invalid'); </script>";
    }
    else
        $address = mysqli_real_escape_string($db,$_POST['inputAddress']);
    if (!empty($_POST['inputAddress2']))
        $address2 = $_POST['inputAddress2'];
    if (empty($_POST['inputPCode']))
    {
        echo "<script>var elem = document.getElementById('inputPCode');
            elem.classList.add('is-invalid'); </script>";
    }
    else
        $postalCode = mysqli_real_escape_string($db,$_POST['inputPCode']);
    if (empty($_POST['inputEmail']))
    {
        echo "<script>var elem = document.getElementById('inputEmail');
            elem.classList.add('is-invalid'); </script>";
    }
    else
        $email = mysqli_real_escape_string($db,$_POST['inputEmail']);
    if (empty($_POST['inputTel']))
    {
        echo "<script>var elem = document.getElementById('inputTel');
            elem.classList.add('is-invalid'); </script>";
    }
    else
        $cellNum = mysqli_real_escape_string($db,$_POST['inputTel']);
    if (empty($_POST['inputPassword']))
    {
        echo "<script>var elem = document.getElementById('inputPassword');
            elem.classList.add('is-invalid'); </script>";
    }
    else
        $password = $_POST['inputPassword'];
    if (empty($_POST['inputPassword2']))
    {
        echo "<script>var elem = document.getElementById('inputPassword2');
            elem.classList.add('is-invalid'); </script>";
    }
    else
        $password2 = $_POST['inputPassword'];
    if (strlen($firstName) > 32)
    {
        echo "<script>var elem = document.getElementById('inputFirstName');
            elem.classList.add('is-invalid');</script>";
    }
    else if (strlen($lastName) > 32)
    {
        echo "<script>var elem = document.getElementById('inputLastName');
            elem.classList.add('is-invalid');</script>";
    }
    else if (strlen($address) > 64)
    {
        echo "<script>var elem = document.getElementById('inputAddress');
            elem.classList.add('is-invalid');</script>";
    }
    else if (isset($address2) && strlen($address2) > 64)
    {
        echo "<script>var elem = document.getElementById('inputAddress2');
            elem.classList.add('is-invalid');</script>";
    }
    else if (strlen($postalCode) > 8)
    {
        echo "<script>var elem = document.getElementById('inputPCode');
            elem.classList.add('is-invalid');</script>";
    }
    else if (!is_numeric($postalCode))
    {
        echo "<script>var elem = document.getElementById('inputPCode');
            elem.classList.add('is-invalid');</script>";
    }
    else if (strlen($email) > 32)
    {
        echo "<script>var elem = document.getElementById('inputEmail');
            elem.classList.add('is-invalid');</script>";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<script>var elem = document.getElementById('inputEmail');
            elem.classList.add('is-invalid');</script>";
    }
    else if (strlen($cellNum) != 10)
    {
        echo "<script>var elem = document.getElementById('inputTel');
            elem.classList.add('is-invalid');</script>";
    }
    else if (!is_numeric($cellNum))
    {
        echo "<script>var elem = document.getElementById('inputTel');
            elem.classList.add('is-invalid');</script>";
    }
    else if ($password != $password2)
    {
        echo "<script>var elem = document.getElementById('inputPassword');
            elem.classList.add('is-invalid');</script>";
        echo "<script>var elem = document.getElementById('inputPassword2');
            elem.classList.add('is-invalid');</script>";
    }
    else
    {
        $hash = md5($password);
        $default = "user";
        $path = "path";
        $sqlInsert = "INSERT into tbl_user (fName,lName,adress1,adress2,postalCode,email,cellNum,password,userImage, status)
        values ('" . $firstName . "','" . $lastName . "','" . $address . "',
        '" . $address2 . "','". $postalCode ."','" . $email . "','". $cellNum . "','". $hash .
            "','". $path ."','" . $default . "')";
        if (mysqli_query($db, $sqlInsert))
        {
            send_mail($email, "New account created", 'Your new account as been created ! <a href="http://localhost/medical_administration/login.php"> Click here </a> to login ! ');
            echo '<script> window.location.href = "success_registration.php"</script>';
        }
        else {
            die("Error creating user : " . mysqli_error($db) . "<br>");
        }
    }
}
?>