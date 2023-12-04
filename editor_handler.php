<?php

session_start();
require_once('dao.php');

// Get Data
$title = $_POST['title'];
$alias = $_POST['alias'];
$descriptors = $_POST['descriptors'];
$lore = $_POST['lore'];
$info =  $_POST['info'];
$links = $_POST['links'];

$relationshipData = json_decode($_POST['relationshipData'], true);
$labelData = json_decode($_POST['labelData'], true);

//----------------

$success = false;  

$dao = new Dao();
$userID = $dao->getUserByUsername($_SESSION['user']);

if (!$userID) {
    $_SESSION['error_message'] = "Could not authenticate.";
    $_SESSION['success'] = $success;
    exit();
}

$thisObjID = $dao->saveObject($title, $alias, implode(', ', $labelData), $descriptors, $lore, $links, $info, $_SESSION['user']);

if (!$thisObjID) {
    $_SESSION['error_message'] = "Could not create object.";
    $_SESSION['success'] = false;
    exit();

}else {
    setcookie("last_created_title", $title, time() + 3600, "/");
    $success = true;
}

if ($relationshipData && $success) {

    foreach ($relationshipData as $relationshipObject) {
        
        // set object relations for each relationship

        $objID = $dao->getObjectIDByName($relationshipObject['title'], $userID);
        
        if (!$objID) {
            $_SESSION['error_message'] = "Could not find target object.";
            $_SESSION['success'] = false;
            exit();
        }else {
            $success = true;
        }
        
        //$success = $dao->setObjectRelation($thisObjID, $objID, $relationshipObject['relationship']);
        $success = $dao->setObjectRelation(127, 22, $relationshipObject['relationship']);

        if (!$success) {
            $_SESSION['error_message'] = "Could not set Object Relation for " . $relationshipObject['title'];
            $_SESSION['success'] = false;
            exit();
        }
    }

}else {
    $_SESSION['error_message'] = "Could not save object.";
    $_SESSION["success"] = false;
}

if ($success) {
    unset($_SESSION['error_message']);
}

$_SESSION['success'] = $success;
header("Location: created-object-handler.php");
exit();