<?php

session_start();

require 'db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}



if (!empty($_POST['email']) && !empty($_POST['pass'])) {
    $records = $conn->prepare(('SELECT id, email, pass FROM usuarios WHERE email=:email'));
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && $results['pass'] === md5($_POST['pass'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: login.php');
    } else {
        $message = 'Tus credenciales no coinciden con ningun usuario registrado';
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
    <title>Login Page</title>
</head>

<body>

    <?php require 'partials/header.php'; ?>

    <h1>Login</h1>
    <span>or <a href="sign.php">Signup</a></span>


    <?php if (!empty($message)) : ?>

        <p><?= $message ?> </p>

    <?php endif; ?>

    <form action="login.php" method="POST">

        <input type="text" name="email" placeholder="Enter your email" require autofocus>
        <input type="password" name="pass" placeholder="Enter your password" require>
        <input type="submit" value="Send">

    </form>
</body>

</html>