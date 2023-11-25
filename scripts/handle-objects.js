document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.object-wrapper').forEach(function (element) {
        element.addEventListener('click', function () {

            var objectRelation = JSON.parse(element.getAttribute('object-relations'));
            console.log(objectRelation);

            var objectMetadata = JSON.parse(element.getAttribute('object-metadata'));
            createDetailedDisplay(objectMetadata);
        });
    });
});

function createDetailedDisplay(objectMetadata) {
    var containerElement = document.createElement('div');
    var elementId = "element_" + objectMetadata.objectID;
    console.log(elementId);

    containerElement.classList.add("detailed-display-container");
    //containerElement.id = elementId;

    var resultSection = document.querySelector('.canvas');
    var deleteButton = createElement("Delete", "delete-button");

    deleteButton.addEventListener('click', function () {
        // Perform AJAX request to PHP script for deletion
        var objectId = objectMetadata.objectID;
        deleteObject(objectId, elementId, resultSection, containerElement);
    });

    containerElement.id 

    var removeButton = createElement("-", 'remove-button');
    containerElement.appendChild(removeButton);
    removeButton.addEventListener('click', function () {
        resultSection.removeChild(containerElement);
    });

    function createElement(content, className) {
        if (content) {
            var element = document.createElement('div');
            element.textContent = content;
            if (className) {
                element.classList.add(className);
            }
            return element;
        }
        return null;
    }

    var line = document.createElement('hr');
    line.className = "expanded-line";

    var elementsToAppend = [
        createElement(objectMetadata.title, "object-title-expanded"),
        createElement(objectMetadata.alias, "alias-expanded"),

        line,

        objectMetadata.labels ? createElement("Labels", "expanded-heading") : null,
        createElement(objectMetadata.labels, "expanded-info"),

        objectMetadata.descriptors ? createElement("Descriptors", "expanded-heading") : null,
        createElement(objectMetadata.descriptors, "expanded-info"),

        objectMetadata.lore ? createElement("Lore", "expanded-heading") : null,
        createElement(objectMetadata.lore, "expanded-info"),

        objectMetadata.additionalInfo ? createElement("More Info", "expanded-heading") : null,
        createElement(objectMetadata.additionalInfo, "expanded-info"),

        objectMetadata.externalLinks ? createElement("External Links", "expanded-heading") : null,
        createElement(objectMetadata.externalLinks, "expanded-info")
    ];

    elementsToAppend.forEach(function (element) {
        if (element) {
            containerElement.appendChild(element);
        }
    });

    containerElement.appendChild(deleteButton);
    resultSection.appendChild(containerElement);
}

function createElement(title, className) {
    var newElement = document.createElement('div');
    newElement.textContent = title;

    if (className) {
        newElement.classList.add(className);
    }

    return newElement;
}

// here's my ajax stuff
function deleteObject(objectId, elementID, resultSection, containerElement) {

    var url = 'object_delete_handler.php';
    var params = 'objectId=' + objectId;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);

            resultSection.removeChild(containerElement);

            var elementToRemove = document.getElementById(elementID);

            if (elementToRemove) {
                elementToRemove.parentNode.removeChild(elementToRemove);
            }
        }
    };

    xhr.send(params);
}