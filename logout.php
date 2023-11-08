<?php session_start(); session_destroy(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Home</title>
        </head>
        <body>
            <?php include('header.php'); ?>
                <div class="subject">
                    <div class="paragraph_wrapper">
                        <p class="paragraph_body">You were succesfully Logged out. Thanks for writing, come back soon!</p>  
                        <div class="subtext-wrapper">
                            <p class="paragraph_body">
                                🢖 Forget something? <a href="login.php" class="subject">Log back in Now!</a> 🢔
                            </p>
                            <p class="subtext">
                                or <a href="create-account.php">Create an Account</a>
                            </p> 
                        </div>           
                    </div>
                </div>
        </body>
        <?php include('footer.php'); ?>
    </html>