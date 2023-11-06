<?php session_start(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Home</title>
        </head>
        <body>
        <?php include('header.php'); ?>
                        <div class="form_wrapper">
                            <h3>Login</h3>
                            <form method="POST" action="login_handler.php">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username">

                                <label for="password">Password</label>
                                <input type="text" id="password" name="password">

                                <button type="submit" class="submit-button">Submit</button>
                            </form>
                            <p>Don't have an account? <a href="create-account.php">Create one!</a></p>
                        </div>
        <div>
        <?php 
            if(isset($_SESSION['auth']))
            {
                if($_SESSION['auth'] === false){
                    echo "Incorrect Username or Password";
                }
            }
        ?>
        </div>
        </body>
        <?php include('footer.php'); ?>
    </html>