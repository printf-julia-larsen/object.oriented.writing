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

//

$success = false;  

// start dao

$dao = new Dao();
$userID = $dao->getUserByUsername($_SESSION['user']);

if (!$userID) {
    $_SESSION['error_message'] = "Could not authenticate.";
    $_SESSION['success'] = $success;
    exit();
}

$thisObjID = $dao->saveObject($title, $alias, implode(', ', $labelData), $descriptors, $lore, $links, $info, $_SESSION['user']);

if ($thisObjID) {
    $success = true;
}

if ($relationshipData && $success) {

    if (!$thisObjID) {
        $_SESSION['error_message'] = "Could not create object.";
        $_SESSION['success'] = false;
        exit();
    }

    foreach ($relationshipData as $relationshipObject) {
        
        // set object relations for each relationship

       /* $objID = $dao->getObjectIDByName($relationshipObject['title'], $userID);

        if (!$objID) {
            $_SESSION['error_message'] = "Could not find target object.";
            $_SESSION['success'] = false;
            exit();
        }
        
        $success = $dao->setObjectRelation($thisObjID, $objID, $relationshipObject['relationship']) && $success;

        if (!$success) {
            $_SESSION['error_message'] = "Could not set Object Relation for " . $relationshipObject['title'];
            $_SESSION['success'] = false;
            exit();
        }*/
    }

    setcookie("last_created_title", $title, time() + 3600, "/");

}else {
    $_SESSION['error_message'] = "Could not save object.";
}

if ($success) {
    unset($_SESSION['error_message']);
}

$_SESSION['success'] = $success;
header("Location: created-object-handler.php");
exit();