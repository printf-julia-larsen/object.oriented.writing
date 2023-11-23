<?php

session_start();
require_once('dao.php');


$title = $_POST['title'];
$alias = $_POST['alias'];

// get labels
// get each relation title and its relation

$descriptors = $_POST['descriptors'];
$lore = $_POST['lore'];
$info =  $_POST['info'];
$links = $_POST['links'];

$relationshipData = json_decode($_POST['relationshipData'], true);
$labelData = json_decode($_POST['labelData'], true);

$success = false;

$dao = new Dao();
$success = $dao->saveObject($title, $alias, implode(', ', $labelData), $descriptors, $lore, $links, $info, $_SESSION['user']);

$success = true;

if ($success === true)
{
    header("Location: editor.php");
    exit();

} else {

    header("Location: index.php");
    exit();
}