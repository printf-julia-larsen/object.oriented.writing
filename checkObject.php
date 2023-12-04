<?php

$dao = new Dao();

if (isset($_POST['title'])) {

    $title = $_POST['title'];
    $isValid = $dao->validateObjectTitle($user['userID'], $title);

    echo json_encode(['valid' => $_SESSION['error_message']]);

} else {
    echo json_encode(['error' => 'Title parameter is missing']);
}