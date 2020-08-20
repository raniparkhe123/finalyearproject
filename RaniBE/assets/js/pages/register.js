$(document).ready(function(){

    $("#user_type").on("change", function(e){
        //alert($(this).val() + " Hey");

        $.ajax({
            type: "POST",
            url: "ajax_helper.php?get_register_details=" + $(this).val(),
            processData: false,
            contentType: false
        }).done(function(response){
            console.log("Completed " + response);
            $("#additional-form-container").html("<h2>" + response + "</h2>");
        }).fail(function(response){
            console.log("Failed " + response);
        })



    });
});