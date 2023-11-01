<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// check the database
if ($username == 'julia' && $password == 'password') {

  $_SESSION['auth'] = true;
  header("Location: story-board.php");
  exit();

} else {

  $_SESSION['message'] = 'Invalid Username or password';
  
  exit();
}