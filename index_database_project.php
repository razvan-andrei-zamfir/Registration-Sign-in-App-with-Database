<?php

require_once("userclass.php");

$userObj = new User();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A simple, modern registration page">
    <meta name="keywords" content="login, database, login project, registration">
    <meta name="author" content="Razvan-Andrei Zamfir">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styling/styles_initial.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="body-container container-fluid">
        <div class="left-container">
            <a class="anchors" href="login.php">
                <div class="central-container"><button type="button">Sign in</button></div>
            </a>
        </div>
        <div class="right-container">
            <a class="anchors" href="register.php">
                <div class="central-container"><button type="button">Register</button></div>
            </a>
        </div>
    </div>

</body>

</html>