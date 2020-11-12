$(document).ready(function() {
  
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "/getPaste",
        type: "POST",
        data: "test"
    }).then(function(result) {
    });

    
   
    $("#sendPaste").on("click", function() {
        let jsonArray = [];
        jsonArray.push({text:$(".input-paste").val()});
        jsonArray.push({title:$("#title").val()});
        jsonArray.push({lang:$("#lang").val()});
        jsonArray.push({DateOfExist:$("#DateOfExist").val()});
        jsonArray.push({access:$("#access").val()});

        jsonArray = JSON.stringify(jsonArray);
        console.log(jsonArray);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            url: "/insertPaste",
            type: "POST",
            data: jsonArray,
        }).then(function(result) {
            //document.location.reload();
        });

    });
});
