<?php
require_once("userclass.php");

$userObj = new User();

$accountCreated = array();
$errors;

$username = "";
$email = "";

if (isset($_POST["formSubmitted"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $accountCreated = $userObj->Register($username, $password, $confirmpassword, $email);
}

if ($accountCreated === true) {
    $errors = array();
} else {
    $errors = $accountCreated;
}
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
    <link rel="stylesheet" href="styling/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="body-container container-fluid p-0">
        <div class="left-side">
            <div class="left-side-container">
                <form class="form" action="register.php" method="POST">
                    <div id="WelcomeMessage" class="display-4 mb-3">
                        Welcome
                    </div>
                    <div class="error-message">
                        <?php

                        foreach ($errors as $error) {
                            echo "<div style='color:red; margin-bottom:12px; margin-top:-12px;'>$error</div>"; // ERROR PROMPT
                        }

                        ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Username" placeholder="Mark24" name="username" pattern="[A-Za-z0-9]+" autocomplete="username" required>
                        <label for="Username">Username</label>
                        <div id="usernameHelpBlock" class="form-text">
                            Please include only letters and numbers.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="Email" placeholder="name@example.com" name="email" autocomplete="email" required>
                        <label for="Email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="Password" placeholder="Password" name="password" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="new-password" required>
                        <label for="Password">Password</label>
                        <div id="passwordHelpBlock" class="form-text">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces or emoji.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm Password" name="confirmpassword" autocomplete="current-password" required>
                        <label for="ConfirmPassword">Confirm Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="register-button btn btn-primary btn-lg mb-0" type="submit">Register</button>
                    </div>
                    <div class="sign-in-redirect d-grid gap-2 mx-auto">
                        <div class="redirect-text">Already a user? <a href="login.php">Sign in</a> instead.</div>
                    </div>
                    <input type="hidden" name="formSubmitted" value="1" />
                </form>
            </div>
        </div>
        <div class="right-side"></div>
    </div>

</body>

</html>