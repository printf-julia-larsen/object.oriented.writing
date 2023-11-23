<?php

if (!isset($_SESSION['auth']) || $_SESSION['auth'] === false) {
    $_SESSION['redir_message'] = "You must be logged in to access your Story Board!";
    header("Location: login.php");
    exit();

}else{
    require_once('dao.php');
    $dao = new Dao();
    $userID = $dao->getUserByUsername($_SESSION['user']);

    /*
    if (!$userID) {
        header("Location: login.php");
        exit();
    }

    $usersObjects = $dao->getUsersObjects($userID);
    $objectID = reset($usersObjects);

    $objectMetadata = $dao->getObjectByID($objectID);

    if ($objectMetadata) {
        $title = $objectMetadata['title'];
        $labels = $objectMetadata['labels'];
    }
    */

}


// get title from object
// get labels, store them as an array
// get descriptor
// get lore
// get external links
// get additional info
// get related objects

// for the object display, we only want the title, labels, and related objects