<?php session_start(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Home</title>
        </head>
        <body>
        <?php include_once('header.php'); ?>
        <?php echo isset($_SESSION['redir_message']) ? "<h5 class=\"subject\">" . $_SESSION['redir_message'] . "</h5>" : ""; ?>
        <div class="paragraph_wrapper">
            <h3>Login</h3>
            <form method="POST" action="login_handler.php">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" />

                <button type="submit" class="submit-button">Submit</button>
            </form>
            <p>Don't have an account? <a href="create-account.php">Create one!</a></p>
            <div>
                <?php 
                if (isset($_SESSION['auth']) && $_SESSION['auth'] === false)
                {
                    echo $_SESSION['error_message'];
                }
                ?>
            </div>
        </div>
        </body>
        <?php include_once('footer.php'); ?>
    </html>