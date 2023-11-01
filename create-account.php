<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Home</title>
        </head>
        <body>
        <?php include('header.php'); ?>
                    <div class="paragraph_wrapper">
                        <div class="paragraph_body">
                            <h3>Create your Object-Oriented Writing Account</h3>
                            <p>To start writinig!</p>
                            <form>
                                <label for="username">Username</label><br>
                                <input type="text" id="username" name="username"><br>

                                <label for="email">Email</label><br>
                                <input type="text" id="email" name="email"><br>

                                <label for="password">Password</label><br>
                                <input type="text" id="password" name="password">
                            </form>
                            <a href="login.php">Sign in instead</a>
                            <button type="submit" class="submit-button">Submit</button>
                        </div>
                    </div>
        </body>
        <?php include('footer.php'); ?>
    </html>