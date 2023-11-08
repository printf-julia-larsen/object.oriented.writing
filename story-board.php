<?php session_start(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Story Board</title>
        </head>
        <body>
            <?php include_once('header.php'); ?>
            <div class="sidebar">
                <div class="subtitle">
                    Your Objects
                </div>
                <hr>
                <div class="object-wrapper">
                    <a href="editor.php"><p class="object-title">Create New Object</p></a>
                </div>
            </div>
        </body>
        <?php include('footer.php'); ?>
    </html>