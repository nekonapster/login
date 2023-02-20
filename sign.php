<?php
require 'db.php';

// comprobacion envios del signup

$message = "";

if (
    !empty($_POST['user']) &&
    !empty($_POST['pass']) &&
    !empty($_POST['dni']) &&
    !empty($_POST['direccion']) &&
    !empty($_POST['email'])
) {

    $sql = "INSERT INTO usuarios (user, pass, dni, direccion, email) VALUES (:user, :pass, :dni, :direccion, :email)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':user', $_POST['user']);
    $passCifrada = md5($_POST['pass']);
    $stmt->bindParam(':pass', $passCifrada);
    $stmt->bindParam(':dni', $_POST['dni']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':email', $_POST['email']);

    if ($stmt->execute()) {
        $message = 'Succesfully created new user';
    } else {
        $message = 'Sorry there must have been an issue creating your account';
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- import css -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    <title>Sign</title>
</head>

<body>
    <?php require 'partials/header.php'; ?>

    <?php if (!empty($message)) :   ?>
        <p><?= $message  ?></p>
    <?php endif; ?>


    <h1>Sign Up</h1>
    <span>or <a href="login.php">Login</a></span>
    <form action="sign.php" method="POST">

        <input type="text" name="user" placeholder="Enter your username*" require autofocus>
        <input type="text" name="dni" placeholder="Enter your D.N.I*" require minlength="9" maxlength="9">
        <input type="text" name="email" placeholder="Enter your email*" require>
        <!-- <input type="text" name="name" placeholder="Enter your name*" require>
        <input type="text" name="surname" placeholder="Enter your surname*" require> -->
        <input type="text" name="direccion" placeholder="Enter your direction*" require>

        <input type="password" name="pass" placeholder="Enter your password*" require minlength="5" maxlength="12">
        <input type="password" name="confirm_pass" placeholder="Confirm your password" minlength="5" maxlength="12">
        <input type="submit" value="Send">

        <br>
        <span class="asterix">*The field cannot be empty</span>
    </form>

</body>

</html>