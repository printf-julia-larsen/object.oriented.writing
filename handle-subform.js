function addLabel() {

    var labelInput = document.getElementById("labels");
    var labelValue = labelInput.value.trim();

    if (labelValue !== "") {
        var labelsList = document.getElementById("labelsList");
        var newLabel = document.createElement("div");

        labelsList.appendChild(newLabel);

        newLabel.textContent = labelValue;

        newLabel.classList.add("tag");

        labelInput.value = "";
    }
}

function addRelationship() {
    var titleInput = document.getElementById("relation-title");
    var relationshipInput = document.getElementById("relation");

    var title = titleInput.value.trim();
    var relationship = relationshipInput.value.trim();

    if (title !== "" && relationship !== "") {
        var labelsList = document.getElementById("relationList");
        var newRelationship = document.createElement("div");

        newRelationship.innerHTML = `<span>${title}<br><span class="relationship">${relationship}</span></span>`;
        
        newRelationship.classList.add("tag");
        
        labelsList.appendChild(newRelationship);

        titleInput.value = "";
        relationshipInput.value = "";
    }
}
