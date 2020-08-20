$(document).ready(function(){

    $("#class_id").on("change", function(e){
        //alert($(this).val() + " Hey");

        $.ajax({
            type: "POST",
            url: "ajax_helper.php?get_subject_info=" + $(this).val(),
            processData: false,
            contentType: false
        }).done(function(response){
            console.log("Completed " + response);
            $("#subject_id").html("<option value='0' selected disabled>Select Subject</option>" + response);
        }).fail(function(response){
            console.log("Failed " + response);
        })



    });
});