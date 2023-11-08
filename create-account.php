<?php session_start(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Home</title>
        </head>
        <body>
        <?php include_once('header.php'); ?>
                    <div class="paragraph_wrapper">
                        <div class="paragraph_body">
                            <h3>Create your Object-Oriented Writing Account</h3>
                            <p>To start writinig!</p>
                            <form method="POST" action="register_handler.php">
                                <label for="new_username">Username</label><br>
                                <input type="text" id="new_username" name="new_username"><br>

                                <label for="password">Password</label><br>
                                <input type="password" id="new_password" name="new_password">
                                <br/>
                                <a href="login.php">Sign in instead</a>
                                <button type="submit" class="submit-button">Submit</button>
                            </form>
                            <div>
                                <?php 
                                if (isset($_SESSION['error_message']) && $_SESSION['auth'] === false)
                                {
                                    echo $_SESSION['error_message'];
                                }
                                ?>
                            </div>
                        </div>
                    </div>
        </body>
        <?php include('footer.php'); ?>
    </html>