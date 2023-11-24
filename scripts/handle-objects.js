document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.object-wrapper').forEach(function (element) {
        element.addEventListener('click', function () {

            var objectMetadata = JSON.parse(element.getAttribute('object-metadata'));
            createDetailedDisplay(objectMetadata);
        });
    });
});

function createDetailedDisplay(objectMetadata) {
    var containerElement = document.createElement('div');
    containerElement.classList.add("detailed-display-container");

    var resultSection = document.querySelector('.canvas');

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

    var elementsToAppend = [
        createElement(objectMetadata.title, "object-title-expanded"),
        createElement(objectMetadata.alias),
        createElement(objectMetadata.labels),
        createElement(objectMetadata.descriptors),
        createElement(objectMetadata.lore),
        createElement(objectMetadata.additionalInfo),
        createElement(objectMetadata.externalLinks)
    ];

    elementsToAppend.forEach(function (element) {
        if (element) {
            containerElement.appendChild(element);
        }
    });

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