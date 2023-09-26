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
