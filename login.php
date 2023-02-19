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
    <title>Login Page</title>
</head>

<body>

<?php require 'partials/header.php'; ?>

<h1>Login</h1>
<span>or <a href="sign.php">Signup</a></span>
<form action="login.php" method="POST">

<input type="text" name="email"  placeholder="Enter your email" require autofocus>
<input type="password" name="pass"  placeholder="Enter your password" require>
<input type="submit" value="Send">

</form>
</body>

</html>