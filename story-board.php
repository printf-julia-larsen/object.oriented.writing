<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Story Board</title>
        </head>
        <body>
            <?php include('header.php'); ?>
            <div class="sidebar">
                <div class="subtitle">
                    Your Objects
                </div>
                <hr>
                <div class="object-wrapper">
                    <p class="object-title">Kali Torvalds</p>
                    <div class="object-tag">Character</div>
                </div>
                <div class="object-wrapper">
                    <p class="object-title">Roginus</p>
                    <span class="object-tag">Location</span>
                    <div class="object-tag">Narritive</div>
                </div>
                <div class="object-wrapper">
                    <p class="object-title">The Catalyst</p>
                    <div class="object-tag">Item</div>
                    <div class="object-tag">Weapon</div>
                </div>
                <div class="object-wrapper">
                    <a href="editor.php"><p class="object-title">Create New Object</p></a>
                </div>
            </div>
        </body>
        <?php include('footer.php'); ?>
    </html>