$(document).ready(function () {
    $("#createModal").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var url = button.attr("href");

        $.get(url, function (data) {
            $("#createModalContent").html(data);
        });
    });

    $("#createViolationModal").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var url = button.attr("href");

        $.get(url, function (data) {
            $("#createViolationModalContent").html(data);
        });
    });

    $("#editModal").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var url = button.attr("href");

        $.get(url, function (data) {
            $("#editModalContent").html(data);
        });
    });

    $("#addModal").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var url = button.attr("href");

        $.get(url, function (data) {
            $("#addModalContent").html(data);
        });
    });
});
function showMessage() {
    var messageElement = document.getElementById("welcome-message");
    if (messageElement) {
        messageElement.style.display = "block"; // Show the element
        setTimeout(function () {
            messageElement.style.display = "none"; // Hide the element after 5 seconds
        }, 5000); // 5000 milliseconds (5 seconds)
    }
}

// Call the showMessage function when the page loads
window.onload = function () {
    showMessage();
};
