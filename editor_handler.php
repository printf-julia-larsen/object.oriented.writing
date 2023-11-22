<?php

session_start();
require_once('dao.php');

function getOptions() {
    $items = ["Item1", "Item2", "Item3", "Item4"];
    foreach ($items as $item) {
        echo "<option value='$item'>$item</option>";
    }
}


$new_title = $_POST['new_title'];
$new_descriptors = $_POST['new_descriptors'];
$related_objects = $_POST['related_objects'];
$relationship = $_POST['relationship'];
$info =  $_POST['info'];
$selectedItems = isset($_POST['selectedOptions']) ? $_POST['selectedOptions'] : [];
$type = "object";
$lore = "lore";
$external = "placeholder";

$success = false;

$dao = new Dao();
$success = $dao->saveObject($new_title, $type, implode(', ', $selectedItems), $new_descriptors, $lore, $external, $info, $_SESSION['user']);

if ($success === true)
{
    header("Location: editor.php");
    exit();

} else {

    header("Location: index.php");
    exit();
}