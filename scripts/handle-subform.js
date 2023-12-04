var relationshipData = [];
var labelData = [];

function addLabel() {

    var labelInput = document.getElementById("labels");
    var labelValue = labelInput.value.trim();

    if (labelValue !== "") {
        labelData.push(labelValue);

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
        checkObjectValidity(title) 
            .then(function (isValid) {
                if (isValid) {
                    var relationshipObject = {
                        title: title,
                        relationship: relationship
                    };
            
                    console.log(title);
                    console.log(relationship);
                    relationshipData.push(relationshipObject);
            
                    var labelsList = document.getElementById("relationList");
                    var newRelationship = document.createElement("div");
            
                    newRelationship.innerHTML = `<span>${title}<br><span class="relationship">${relationship}</span></span>`;
                    
                    newRelationship.classList.add("tag");
                    
                    labelsList.appendChild(newRelationship);
            
                    titleInput.value = "";
                    relationshipInput.value = "";
                }else {
                    alert("Invalid object relation." + title + "is not an existing object.")
                }
        })
        .catch(function (error) {
            console.error("Error checking title validity:", error);
        });
    }
}

function checkObjectValidity(title) {
    var url = '';

    return fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'title=' + encodeURIComponent(title),
    })
    .then(function (response) {
        if (!response.ok) {
            throw new Error('Network response was not ok')
        }
        return response.json();
    })
    .then(function (data) {
        return data.valid;
    })
}

function submitForm() {
    console.log("Relationship Data:", relationshipData);
    console.log("Label Data:", labelData);
    
    var relationshipInput = document.createElement("input");
    relationshipInput.type = "hidden";
    relationshipInput.name = "relationshipData";
    relationshipInput.value = JSON.stringify(relationshipData);
    
    var labelInput = document.createElement("input");
    labelInput.type = "hidden";
    labelInput.name = "labelData";
    labelInput.value = JSON.stringify(labelData);
    
    document.forms[0].appendChild(relationshipInput);
    document.forms[0].appendChild(labelInput);
    document.forms[0].submit();
}

function clearForm() {
    var labelsList = document.getElementById("labelsList");
    labelsList.innerHTML = "";

    document.getElementById("relation-title").value = "";
    document.getElementById("relation").value = "";
    relationshipData = [];
    labelData = [];
}