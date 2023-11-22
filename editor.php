<?php session_start(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/editorStyles.css">
            <link rel="stylesheet" href="../styles/generalStyles.css">
            <script src="handle-subform.js"></script>
            <title>Editor</title>
        </head>
        <body>
            <?php include_once('header.php'); ?>

            <h1 class="subject">Create a New Object</h1>

            <form method="POST" action="editor_handler.php">
            <div class="canvas">


            <div class="editor-section">
                <span class="heading-grouper">
                    <h4 class="section-label">Title</h4>
                    <p>The title will be the main identifier of your object. You can choose to add an alias.</p>
                </span>

                <label class="editor-label" for="title">Title</label>
                <input type="text" name="title" class="small-text-box" required>

                <label class="editor-label" for="alias">Alias</label>
                <input type="text" name="alias" class="small-text-box">
            </div>


            <div class="editor-section">
                <span class="heading-grouper">
                    <h4 class="section-label">Add Labels</h4>
                    <p>Labels will help to concisely describe attrbutes about this object. Some good labels could be 'Character' or 'Location'.</p>
                    <div id="labelsList"></div>
                </span>

                <label class="editor-label" for="labels">Labels</label>
                <input type="text" id="labels" name="labels"  class="small-text-box">

                <button type="button" class="add-button" onclick="addLabel()">Add</button>
            </div>



            <div class="editor-section">
                <span class="heading-grouper">
                    <h4 class="section-label">Add Object Relations</h4>
                    <p>This is where you can connect this object to other objects you've created!</p>
                    <div id="relationList"></div>
                </span>

                <label class="editor-label" for="relation-title">Related Object</label>
                <input type="text" id="relation-title" name="relation-title" class="small-text-box">

                <label class="editor-label" for="relation">Relationship</label>
                <input type="text" id="relation" name="relation" class="small-text-box">

                <button type="button" class="add-button" onclick="addRelationship()">Add</button>
            </div>



            <div class="editor-section">
                <span class="heading-grouper">
                    <h4 class="section-label">Add More Information</h4>
                    <p>All of this information is optional, but will add more definition to your object.</p>
                </span>

                <label for="descriptors" class="editor-label">Descriptors</label>
                <textarea type="text" id="descriptors" name="descriptors" class="large-text-box"></textarea>

                <label for="lore" class="editor-label">Lore</label>
                <textarea type="text" id="lore" name="lore" class="large-text-box"></textarea>
                
                <label for="links" class="editor-label">External Links</label>
                <textarea type="text" id="links" name="links" class="large-text-box"></textarea>

                <label for="info" class="editor-label">Additional Info</label>
                <textarea type="text" id="info" name="info"  class="large-text-box"></textarea>
            </div>

            </div>
                <div class="button-container" id="canvas-buttons">
                    <button type="button" class="clear-button">Clear</button>
                    <button type="submit" class="submit-button">Submit</button>
                </div>
            </form>
        </body>
        <?php include('footer.php'); ?>
    </html>