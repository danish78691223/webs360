document.addEventListener("DOMContentLoaded", function () {
    const businessTypeSelect = document.getElementById("businessType");
    const otherBusinessDiv = document.getElementById("otherBusinessDiv");

    businessTypeSelect.addEventListener("change", function () {
        if (this.value === "Other") {
            otherBusinessDiv.style.display = "block";
        } else {
            otherBusinessDiv.style.display = "none";
        }
    });
});
