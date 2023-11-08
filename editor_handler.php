<?php

session_start();
require_once('dao.php');

$new_title = $_POST['new_title'];
$new_descriptors = $_POST['new_descriptors'];
$related_objects = $_POST['related_objects'];
$relationship = $_POST['relationship'];
$label1 = $_POST['label1'];
$label2 = $_POST['label2'];
$label3 = $_POST['label3'];
$info =  $_POST['info'];
$type = "object";
$lore = "lore";
$external = "placeholder";

$labels = array($label1, $label2, $label3);

$success = false;

$dao = new Dao();
$success = $dao->saveObject($new_title, $type, implode(', ', $labels), $new_descriptors, $lore, $external, $info, $_SESSION['user']);

if ($success === true)
{
    header("Location: editor.php");
    exit();

} else {

    header("Location: index.php");
    exit();
}