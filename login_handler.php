<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$usernameValid = false;
$passwordValid = false;

// Check the database
if ($username == 'julia') {
  $usernameValid = true;
  if ($password == 'password') {
      $passwordValid = true;
  }
}

if ($usernameValid == true && $passwordValid == true)
{
  $_SESSION['auth'] = true;
  header("Location: story-board.php");
}


else {
  
  $_SESSION['auth'] = false;  
  header("Location: login.php");

  exit();
}