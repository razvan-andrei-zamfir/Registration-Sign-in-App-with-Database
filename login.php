<?php
require_once("userclass.php");

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $errors = $user->Login($username, $password);

    if (!empty($errors)) {
        foreach ($errors as $error) {
            if ($error == "invalid_username") {
                $usernameError = "is-invalid";
            }
            if ($error == "invalid_password") {
                $passwordError = "is-invalid";
            }
        }
    }
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
                <form class="form" action="login.php" method="POST">
                    <div id="WelcomeMessage" class="display-4 mb-3">
                        Sign in
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Username" placeholder="Mark24" name="username" pattern="[A-Za-z0-9]+" autocomplete="username" required>
                        <label class="login-label" for="Username">Username</label>
                        <div id="usernameHelpBlock" class="form-text">
                            Please include only letters and numbers.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="Password" placeholder="Password" name="password" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="new-password" required>
                        <label class="login-label" for="Password">Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="register-button btn btn-primary btn-lg mb-0" type="submit">Sign in</button>
                    </div>
                    <div class="sign-in-redirect d-grid gap-2 mx-auto">
                        <div class="redirect-text">Not registered yet? <a href="register.php">Register here.</a></div>
                    </div>
                    <input type="hidden" name="formSubmitted" value="1" />
                </form>
            </div>
        </div>
        <div class="right-side"></div>
    </div>
</body>

</html>