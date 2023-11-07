<?php

session_start();

require_once('dao.php');

$username = $_POST['username'];
$password = $_POST['password'];

$dao = new Dao();
$_SESSION['auth'] = $dao->authenticate($username, $password);

if ($_SESSION['auth']) {
  header("Location: story-board.php");
  exit();
  
} else {

  $_SESSION['error_message'] = "Incorrect Username and Password";
  header("Location: login.php");
  exit();
}
