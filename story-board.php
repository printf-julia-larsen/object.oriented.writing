<?php session_start(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Story Board</title>
        </head>
        <body>
            <?php include_once('header.php'); ?>
            <?php include_once('object_display_handler.php'); ?>
            <div class="sidebar">
                <div class="subtitle">
                    Your Objects
                </div>
                <hr>
                <div class="object-wrapper">
                    <a href="editor.php"><p class="object-title">Create New Object</p></a>
                </div>
                <div class="object-wrapper">
                    <p class="object-title"><?php echo $object['title']; ?></p>
                    <div class="object-tag"><?php echo $labels ?></div>
                </div>
            </div>
        </body>
        <?php include('footer.php'); ?>
    </html>