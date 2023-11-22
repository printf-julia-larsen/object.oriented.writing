<?php

if (!isset($_SESSION['auth']) || $_SESSION['auth'] === false) {
    $_SESSION['redir_message'] = "You must be logged in to access your Story Board!";
    header("Location: login.php");
    exit();

}else{
    require_once('dao.php');
    $dao = new Dao();
    
    $objectID = 2;

    $objectMetadata = $dao->getObjectByID($objectID);
    $relatedObjects = $dao->getObjectRelation($objectID);

    $title = $objectMetadata['title'];
    $labels = $objectMetadata['labels'];
}



/*
foreach ($labelArray as $label) {
    $cleanLabel = trim($label); // Remove leading/trailing whitespaces
    if (!empty($cleanLabel)) {
        echo '<div class="object-tag">' . htmlspecialchars($cleanLabel) . '</div>';
    }
}*/

// get title from object
// get labels, store them as an array
// get descriptor
// get lore
// get external links
// get additional info
// get related objects

// for the object display, we only want the title, labels, and related objects