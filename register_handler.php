<?php

session_start();
require_once('dao.php');

unset($new_username);
unset($new_password);

$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];

$success = false;

$dao = new Dao();
$success = $dao->saveUser($new_username, $new_password);

if ($success === true)
{
    header("Location: editor.php");
    $_SESSION['auth'] = true;
    $_SESSION['user'] = $new_username;
    exit();
}
else
{
    header("Location: create-account.php");
    $_SESSION['auth'] = false;
}