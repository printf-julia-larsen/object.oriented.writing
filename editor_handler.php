<?php

session_start();
require_once('dao.php');

function getOptions() {
    $items = ["Item1", "Item2", "Item3", "Item4"];
    foreach ($items as $item) {
        echo "<option value='$item'>$item</option>";
    }
}


$new_title = $_POST['title'];
$alias = $_POST['alias'];

// get labels
// get each relation title and its relation

$descriptors = $_POST['descriptors'];
$lore = $_POST['lore'];
$info =  $_POST['info'];
$links = $_POST['links'];

$selectedItems = isset($_POST['selectedOptions']) ? $_POST['selectedOptions'] : [];
$type = "object";
$lore = "lore";
$external = "placeholder";

$success = false;

$dao = new Dao();
$success = $dao->saveObject($title, $type, implode(', ', $selectedItems), $new_descriptors, $lore, $external, $info, $_SESSION['user']);

if ($success === true)
{
    header("Location: editor.php");
    exit();

} else {

    header("Location: index.php");
    exit();
}