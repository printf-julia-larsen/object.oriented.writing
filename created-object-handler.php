<?php session_start(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <link rel="stylesheet" href="../styles/editorStyles.css">
            <link rel="stylesheet" href="../styles/generalStyles.css">
            <title>Object Created</title>
        </head>
        <body>
        <?php include_once('header.php'); ?>
            <div class="paragraph_wrapper">
                <h3>
                    <?php 
                        if (isset($_SESSION['success']) && isset($_COOKIE['last_created_title']) && $_SESSION['success'] === true) {
                            ?>
                                <div class="subtitle success-message">
                            <?php echo $_COOKIE['last_created_title'] . " successfully created!";
                            ?>
                                </div>
                            <?php
                        } else {
                            ?>
                            <div class="subtitle error-message">Something went wrong. Object was not created.</div>
                            <?php                        
                        }
                    ?>
                </h3>
                <div class="paragraph_body">
                    You can create another <a href="editor.php">Object</a> or view it in your <a href="story-board.php">Storyboard!</a>
                </div>
            </div>
        </body>
        <?php include_once('footer.php'); ?>
    </html>