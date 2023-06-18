function toggleAfdelingAndInDienst() {
    var rolSelect = document.getElementById("rolg");
    var afdelingElements = document.querySelectorAll(".afdelingElement");
    var inDienstElements = document.querySelectorAll(".inDienstElement");

    if (rolSelect.value === "manager") {
        afdelingElements.forEach(function (element) {
            element.style.display = "block";
        });
    } else {
        afdelingElements.forEach(function (element) {
            element.style.display = "none";
        });
    }

    if (rolSelect.value === "administrator") {
        inDienstElements.forEach(function (element) {
            element.style.display = "block";
        });
    } else {
        inDienstElements.forEach(function (element) {
            element.style.display = "none";
        });
    }
}
