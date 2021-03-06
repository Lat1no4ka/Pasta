$(document).ready(function () {
    $("#signin").on("click", function () {
        $(".signin").css("display", "block");
        $("body").css("overflow", "hidden");
    });
    $(".signin").on("click", function (e) {
        if ($(e.target).hasClass("signin")) {
            $(".signin").css("display", "none");
            $("body").css("overflow", "scroll");
        }
    });
    $("#signup").on("click", function () {
        $(".signup").css("display", "block");
        $("body").css("overflow", "hidden");
    });
    if ($("#reg-error").text() != "") {
        $(".signup").css("display", "block");
    } else if ($("#auth-error").text() != "") {
        $(".signin").css("display", "block");
    }

    $(".signup").on("click", function (e) {
        if ($(e.target).hasClass("signup")) {
            $(".signup").css("display", "none");
            $("body").css("overflow", "scroll");
        }
    });

    $("#sendPaste").on("click", function () {
        let jsonArray = [];
        jsonArray.push({ text: $(".input-paste").val() });
        jsonArray.push({ title: $("#title").val() });
        jsonArray.push({ lang: $("#lang").val() });
        jsonArray.push({ DateOfExist: $("#DateOfExist").val() });
        jsonArray.push({ access: $("#access").val() });

        jsonArray = JSON.stringify(jsonArray);
        console.log(jsonArray);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            url: "/insertPaste",
            type: "POST",
            data: jsonArray,
        }).then(function (result) {
            document.location.reload();
        });
    });

    $("#editPasteEnable").on("click", function () {
        $("#edit").css("display", "block");
        $(".input-paste").prop("readonly", false);
    });
    $("#editPaste").on("click", function () {
        let jsonArray = [];
        jsonArray.push({ id: $("#id").val() });
        jsonArray.push({ text: $(".input-paste").val() });
        jsonArray.push({ title: $("#title").val() });
        jsonArray.push({ lang: $("#lang").val() });
        jsonArray.push({ DateOfExist: $("#DateOfExist").val() });
        jsonArray.push({ access: $("#access").val() });

        jsonArray = JSON.stringify(jsonArray);
        console.log(jsonArray);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            url: "/updatePaste",
            type: "POST",
            data: jsonArray,
        }).then(function (result) {
            console.log(result);
            document.location.reload();
        });
    });
});
