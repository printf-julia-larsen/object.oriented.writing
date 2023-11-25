<?php

session_start();
require_once('dao.php');

$dao = new Dao();

$objectId = $_POST['objectId'];
$dao->deleteObject($objectId);