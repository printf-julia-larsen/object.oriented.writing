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
                        if (isset($_SESSION['success'])) {
                            if (isset($_COOKIE['last_created_title'])) {
                                if ($_SESSION['success'] === true) {
                                    ?>
                                        <div class="subtitle success-message">
                                    <?php echo $_COOKIE['last_created_title'] . " successfully created!";
                                    ?>
                                        </div>
                                    <?php
                                }else {
                                    ?>
                                    <div class="subtitle error-message"><?php echo isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "Was not successful"; ?></div>
                                    <?php  
                                }
                            }else {
                                ?>
                                <div class="subtitle error-message"><?php echo isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "Could not find title."; ?></div>
                                <?php  
                            }
                        } else {
                            ?>
                            <div class="subtitle error-message"><?php echo isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "Something unexpected happened. Object was not created."; ?></div>
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