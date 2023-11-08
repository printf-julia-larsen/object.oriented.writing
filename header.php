<?php
$loginText = "<a href=\"login.php\" class=\"login-title\">Login</a>";
$subtext = "<a href=\"create-account.php\" class=\"create-account\">Create an Account</a>";

if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    $loginText = "<a class=\"login-title\">{$_SESSION['user']}</a>";
    $subtext = "<a href=\"logout.php\" class=\"create-account\">Logout</a>";
}
?>


<link rel="stylesheet" href="../styles/toolbar.css"/>
    <div class="wrapper">
            <div class="header">
                <img class="logo" src="../resources/oowlogo.png" alt="oow logo">
                <div class="login-wrapper">
                    <?php echo $loginText ?>
                    <?php echo $subtext ?>
                </div> 
            </div>
            <div class="ribbon">
                <a href="index.php"><span class="menu_item">Home</span></a>
                <a href="about.php"><span class="menu_item">About</span></a>
                <!--<a href="demo.php"><span class="menu_item">Demo</span></a>-->
                <a href="editor.php"><span class="menu_item">Editor</span></a>
                <a href="story-board.php"><span class="menu_item">Story Board</span></a>
            </div>
