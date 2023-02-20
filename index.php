<?php
session_start();
require 'db.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, pass FROM usuarios WHERE id= :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
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
    <title>Adopt don't buy</title>
</head>

<?php require 'partials/header.php'; ?>

<body>
    <?php if (!empty($user)) :  ?>
        <br>
        <p> Hola <?= $user['email'] ?></p>
        <br> Te has logueado correctamente
        <br>
        <a href="logout.php">Logout</a>

    <?php else :  ?>

        <h1>Please login or signup</h1>

        <a href="http:login.php">Login</a>
        or
        <a href="http:sign.php">Sign</a>
    <?php endif;  ?>

</body>

</html>