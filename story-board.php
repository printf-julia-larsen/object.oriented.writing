<?php session_start(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <link rel="stylesheet" href="../styles/generalStyles.css">
            <link rel="stylesheet" href="../styles/storyboardStyles.css">

            <title>Story Board</title>
        </head>
        <body>
            <?php include_once('header.php'); ?>
            <?php include_once('object_display_handler.php'); ?>

            <div class="view-wrapper">
                <div class="sidebar">
                    <div class="subtitle">
                        Your Objects
                    </div>
                    <hr>
                    
                    <?php
                        $usersObjects = $dao->getUsersObjects($userID);

                        foreach ($usersObjects as $userObject) {
                            $objectMetadata = $dao->getObjectByID($userObject['objectID']);

                            if ($objectMetadata) {
                                $title = $objectMetadata['title'];

                                if ($objectMetadata['alias']) {
                                    ?>
                                    <div><?php $objectMetadata['alias']; ?></div>
                                    <?php
                                }

                                $labelsString = $objectMetadata['labels'];
                        
                                if ($labelsString) {
                                    $labelsArray = explode(',', $labelsString);
                                } else {
                                    $labelsArray = [];
                                }

                                ?>
                                <div class="object-wrapper">
                                    <p class="object-title"><?php echo $title; ?></p>
                                    
                                    <?php
                                        foreach ($labelsArray as $label) {
                                            ?>
                                            <div class="object-tag"><?php echo trim($label); ?></div>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>                
                    <div class="object-wrapper">
                        <a href="editor.php"><p class="object-title">Create New Object</p></a>
                    </div>
                </div>
                <div class="canvas storyboard"></div>
            </div>
            
        </body>
        <?php include('footer.php'); ?>
    </html>