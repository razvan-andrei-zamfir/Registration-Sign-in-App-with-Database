<?php
require_once("dbclass.php");

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database("localhost", "root", "", "loginproject");
    }

    public function Register($username, $password, $confirmPassword, $email)
    {
        $errors = array();
        $valid = true;

        if (strlen($username) < 6 || strlen($username) > 32) {
            $valid = false;
            array_push($errors, "Username length should be between 6 and 32 characters");
        } else {
            $whereFields = array("username", "=", $username);

            $this->db->Select("users", $whereFields);

            $count = $this->db->Count();

            if ($count > 0) {
                $valid = false;
                array_push($errors, "Username already exists, please sign in");
            };
        }

        if (strlen($password) < 6 || strlen($password) > 32) {
            $valid = false;
            array_push($errors, "Password length should be between 6 and 32 characters");
        } else {
            if ($password !== $confirmPassword) {
                $valid = false;
                array_push($errors, "Passwords do not match");
            }
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
            array_push($errors, "Invalid email address");
        } else if (strlen($email) > 100) {
            $valid = false;
            array_push($errors, "Email is too long");
        } else {
            $whereFields = array("email", "=", $email);

            $this->db->Select("users", $whereFields);

            $count = $this->db->Count();

            if ($count > 0) {
                $valid = false;
                array_push($errors, "Email address already exists, please sign in");
            };
        }

        if ($valid) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $fields = array(
                "username" => array(":username" => $username),
                "password" => array(":password" => $password),
                "email" => array(":email" => $email)
            );

            $this->db->Insert("users", $fields);

            return true;

            echo "<script>alert('User successfully registered')</script>";
        } else {
            return $errors;
        }
    }

    // NEW LOG IN FUNCTION

    public function Login($username, $password)
    {
        $errors = array();
        $valid = true;

        if (empty($username)) {
            $valid = false;
            array_push($errors, "Please enter username.");
        }

        if (empty($password)) {
            $valid = false;
            array_push($errors, "Please enter your password.");
        }

        if ($valid) {
            $whereFields = array("username", "=", $username);
            $user = $this->db->Single("users", $whereFields);

            if ($user) {
                /* Debugging statements
                echo "Entered Password: " . $password . "<br>";
                echo "Stored Hashed Password: " . $user['password'] . "<br>";
                */
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $user['id'];
                    $_SESSION["username"] = $user['username'];
                    echo "<script>alert('Connection successful. Welcome back " . htmlspecialchars($user['username']) . "');</script>";
                } else {
                    array_push($errors, "invalid_password");
                }
            } else {
                array_push($errors, "invalid_username");
            }
        }

        return $errors;
    }
}
