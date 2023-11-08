<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="../styles/bodystyles.css">
            <title>Editor</title>
        </head>
        <body>
            <?php include_once('header.php'); ?>
            <h1 class="subtitle">Create a New Object</h1>
            <div class="canvas">
                <div class="editor-item">
                    <label for="title">Title</label>
                    <textarea id="title" name="title"></textarea>
                </div>
                <div class="editor-item">
                    <label for="descriptors">Descriptors</label>
                    <textarea id="descriptors" name="descriptors"></textarea>
                </div>
                <div class="editor-item">
                    <label for="related-objects">Related Objects</label>
                    <textarea id="elated-objects" name="elated-objects"></textarea>
                    <label for="relationship">Relationship</label>
                    <select name="relationship" id="relationship"> 
                        <option value="none">none</option> 
                        <option value="parent">Parent</option> 
                        <option value="child">Child</option> 
                        <option value="sibling">Sibling</option> 
                    </select>
                </div>
                <div class="editor-item">
                    <label for="labels">Labels</label>
                    <select name="labels" id="labels"> 
                        <option value="empty">--</option> 
                        <option value="character">Character</option> 
                        <option value="location">Location</option> 
                        <option value="item">Item</option> 
                        <option value="arc">Story Arc</option> 
                        <option value="tone">Tone</option> 
                        <option value="Narritive">Narrative</option> 
                    </select>
                    <select name="labels" id="labels"> 
                        <option value="empty">--</option> 
                        <option value="character">Character</option> 
                        <option value="location">Location</option> 
                        <option value="item">Item</option> 
                        <option value="arc">Story Arc</option> 
                        <option value="tone">Tone</option> 
                        <option value="Narritive">Narrative</option> 
                    </select>
                    <select name="labels" id="labels"> 
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
                    <label for="additional-info">Additional Info</label>
                    <textarea id="big-textarea" name="additional-info" rows="10"></textarea>
                    <div class="button-container">
                        <button type="button" class="clear-button">Clear</button>
                        <button type="submit" class="submit-button">Submit</button>
                    </div>
                </div>
            </div>
            <div class="button-container" id="canvas-buttons">
                <button type="button" class="clear-button">Clear</button>
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </body>
        <?php include('footer.php'); ?>
    </html>