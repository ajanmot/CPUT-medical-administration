<?php
include("includes/dbConnexion.php");
session_start();
if ($_POST) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    if (isset($_POST['address_2']))
        $address2 = $_POST['address_2'];
    $postalCode = $_POST['postalCode'];
    $email = $_POST['email'];
    $cellNum = $_POST['cellNum'];
    $password = $_POST['password'];
    $password2 = $_POST['password_2'];
    if (strlen($firstName) > 32)
        $_SESSION['error_registration']= "First name too long";
    else if (strlen($lastName) > 32)
        $_SESSION['error_registration']= "Last name too long";
    else if (strlen($address) > 64)
        $_SESSION['error_registration']= "Address too long";
    else if (isset($address2) && strlen($address2) > 64)
        $_SESSION['error_registration']= "Address 2 too long";
    else if (strlen($postalCode) > 8)
        $_SESSION['error_registration']= "Postal code too long";
    else if (!is_numeric($postalCode))
        $_SESSION['error_registration']= "Postal code must be numeric";
    else if (strlen($email) > 32)
        $_SESSION['error_registration']= "Email too long";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $_SESSION['error_registration']= "Email address invalid";
    else if (strlen($cellNum) != 10)
        $_SESSION['error_registration']= "Cell num must be 10 digit";
    else if (!is_numeric($cellNum))
        $_SESSION['error_registration']= "Cell num must be numeric";
    else if ($password != $password2)
        $_SESSION['error_registration']= "Password must be the same";
    else
    {
        $_SESSION['error_registration']= " ";
        $hash = md5($password);
        $default = "user";
        $path = "path";
        $sqlInsert = "INSERT into tbl_user (fName,lName,adress1,adress2,postalCode,email,cellNum,password,userImage, status)
        values ('" . $firstName . "','" . $lastName . "','" . $address . "',
        '" . $address2 . "','". $postalCode ."','" . $email . "','". $cellNum . "','". $hash .
            "','". $path ."','" . $default . "')";
        if (mysqli_query($db, $sqlInsert))
        {
            echo "New user created<br>";
            header("location: success_registration.php");
        }
        else {
            die("Error creating user : " . mysqli_error($db) . "<br>");
        }
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Medical administration</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body class="align">

<div class="grid">
    <p><a href = "logout.php">Home page</a></p>
    <form action="create_account.php" method="POST" class="form login">

        <div class="form__field">
            <label for="createacc_first_name"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">First Name</span></label>
            <input id="createacc_first_name" type="text" name="firstName" class="form__input" placeholder="First Name" value="<?php if (isset($_POST['firstName']))echo $_POST['firstName'];?>"required>
        </div>
        <div class="form__field">
            <label for="createacc_last_name"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Last Name</span></label>
            <input id="createacc_last_name" type="text" name="lastName" class="form__input" placeholder="Last Name" value="<?php if (isset($_POST['lastName']))echo $_POST['lastName'];?>"required>
        </div>
        <div class="form__field">
            <label for="createacc_address"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Address 1</span></label>
            <input id="createacc_address" type="text" name="address" class="form__input" placeholder="Address 1" value="<?php if (isset($_POST['address']))echo $_POST['address'];?>"required>
        </div>
        <div class="form__field">
            <label for="createacc_address_2"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Address 2</span></label>
            <input id="createacc_address_2" type="text" name="address_2" class="form__input" placeholder="Address 2" value="<?php if (isset($_POST['address_2']))echo $_POST['address_2'];?>">
        </div>
        <div class="form__field">
            <label for="createacc_postal_code"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Postal Code</span></label>
            <input id="createacc_postal_code" type="text" name="postalCode" class="form__input" placeholder="Postal Code" value="<?php if (isset($_POST['postalCode']))echo $_POST['postalCode'];?>" required>
        </div>
        <div class="form__field">
            <label for="createacc_email"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Email Adress</span></label>
            <input id="createacc_email" type="email" name="email" class="form__input" placeholder="Email Address"  value="<?php if (isset($_POST['email']))echo $_POST['email'];?>" required>
        </div>
        <div class="form__field">
            <label for="createacc_cell_num"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Cell Num</span></label>
            <input id="createacc_cell_num" type="text" name="cellNum" class="form__input" placeholder="Cell Num" value="<?php if (isset($_POST['cellNum']))echo $_POST['cellNum'];?>" required>
        </div>
        <div class="form__field">
            <label for="createacc_password"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Password</span></label>
            <input id="createacc_password" type="password" name="password" class="form__input" placeholder="Password" required>
        </div>
        <div class="form__field">
            <label for="createacc_password__2"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Password</span></label>
            <input id="createacc_password__2" type="password" name="password_2" class="form__input" placeholder="Password" required>
        </div>

        <div class="form__field">
            <input type="submit" value="Register">
        </div>
        <p class="text--center"><?php if (isset($_SESSION['error_registration'])) echo $_SESSION['error_registration'];?></p>
    </form>
</div>
</body>