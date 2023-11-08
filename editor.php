<?php session_start(); ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Editor</title>
        </head>
        <body>
            <?php include_once('header.php'); ?>
            <h1 class="subtitle">Create a New Object</h1>
            <form method="POST" action="editor_handler.php">
                <div class="canvas">
                    <div class="editor-item">
                        <label for="new_title">Title</label>
                        <textarea id="new_title" name="new_title"></textarea>
                    </div>
                    <div class="editor-item">
                        <label for="new_descriptors">Descriptors</label>
                        <textarea id="new_descriptors" name="new_descriptors"></textarea>
                    </div>
                    <div class="editor-item">
                        <label for="related_objects">Related Objects</label>
                        <textarea id="related_objects" name="related_objects"></textarea>
                        <label for="relationship">Relationship</label>
                        <select name="relationship" id="relationship"> 
                            <option value="none">none</option> 
                            <option value="parent">Parent</option> 
                            <option value="child">Child</option> 
                            <option value="sibling">Sibling</option> 
                        </select>
                    </div>
                    <div class="editor-item">
                        <label for="label">Labels</label>
                        <select name="label1" id="label"> 
                            <option value="empty">--</option> 
                            <option value="character">Character</option> 
                            <option value="location">Location</option> 
                            <option value="item">Item</option> 
                            <option value="arc">Story Arc</option> 
                            <option value="tone">Tone</option> 
                            <option value="Narritive">Narrative</option> 
                        </select>
                        <select name="label2" id="label"> 
                            <option value="empty">--</option> 
                            <option value="character">Character</option> 
                            <option value="location">Location</option> 
                            <option value="item">Item</option> 
                            <option value="arc">Story Arc</option> 
                            <option value="tone">Tone</option> 
                            <option value="Narritive">Narrative</option> 
                        </select>
                        <select name="label3" id="labels"> 
                            <option value="empty">--</option> 
                            <option value="character">Character</option> 
                            <option value="location">Location</option> 
                            <option value="item">Item</option> 
                            <option value="arc">Story Arc</option> 
                            <option value="tone">Tone</option> 
                            <option value="Narritive">Narrative</option> 
                        </select>
                    </div>
                    <div class="editor-item">
                        <label for="info">Additional Info</label>
                        <textarea id="big-textarea" name="info" rows="10"></textarea>
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