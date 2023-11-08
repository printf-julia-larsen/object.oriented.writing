<?php

session_start();
require_once('dao.php');

$username = $_POST['username'];
$password = $_POST['password'];

$dao = new Dao();
$_SESSION['auth'] = $dao->authenticate($username, $password);

if ($_SESSION['auth']) {
  unset($_SESSION['error_message']);
  $_SESSION['user'] = $username;
  header("Location: story-board.php");
  exit();
  
} else {
  header("Location: login.php");
  exit();
}
