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
                        $objectRelations = $dao->getObjectRelation($userID);

                        foreach ($usersObjects as $userObject) {
                            $objectMetadata = $dao->getObjectByID($userObject['objectID']);

                            if ($objectMetadata) {
                                $title = $objectMetadata['title'];

                                $labelsString = $objectMetadata['labels'];
                        
                                if ($labelsString) {
                                    $labelsArray = explode(',', $labelsString);
                                } else {
                                    $labelsArray = [];
                                }
                                    $objectMetadataJSON = json_encode($objectMetadata);
                                    $objectRelationJSON = json_encode($objectRelations);
                                ?>
                                <div class="object-wrapper" object-metadata="<?php echo htmlspecialchars($objectMetadataJSON); ?>" object-relations="<?php echo htmlspecialchars($objectRelationJSON) ?>" id="<?php echo "element_" . $objectMetadata['objectID']; ?>">
                                    <p class="object-title"><?php echo $title; ?></p>
                                    <?php
                                        if ($objectMetadata['alias']) {
                                            ?>
                                            <div class="alias"><?php echo $objectMetadata['alias']; ?></div>
                                            <?php
                                        }
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
                    <div class="create-new-object">
                        <a href="editor.php"><p class="object-title">Create New Object</p></a>
                    </div>
                </div>
                <div class="canvas storyboard"></div>
            </div>
            
        </body>
        <script src="../scripts/handle-objects.js"></script>
        <?php include('footer.php'); ?>
    </html>