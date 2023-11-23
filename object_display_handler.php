<?php

if (!isset($_SESSION['auth']) || $_SESSION['auth'] === false) {
    $_SESSION['redir_message'] = "You must be logged in to access your Story Board!";
    header("Location: login.php");
    exit();

}else{
    require_once('dao.php');
    $dao = new Dao();
    $userID = $dao->getUserByUsername($_SESSION['user']);
    
    if (!$userID) {
        header("Location: login.php");
        exit();
    }

}


// for the object display, we only want the title, labels, and related objects