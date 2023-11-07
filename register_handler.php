<?php

$username = $_POST['new_username'];
$password = $_POST['new_password'];

$success = false;

// check if username is already in the database
    // if password is valid
        // success = false
// else error message about invalid password or username already exists


if ($success === true)
{
    $_SESSION['auth'] = true;
}