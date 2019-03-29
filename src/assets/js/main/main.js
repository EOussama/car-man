$(document).ready(() => {

    updateModels(1);

    $('#brand-select').on('change', (e) => {
        updateModels(e.target.value);
    });

    $('#send-form').on('submit', (e) => {

        // Preventing sending the form data.
        e.preventDefault();

        // Sending the request.
        $.ajax({
            url: 'carman/save',
            type: "post",
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (data) {
                
                console.log(data);

                // Clearing past errors.
                $('.errors').empty();

                if (data.length > 0) {

                    // Displaying the current errors.   
                    for (const error of data) {
                        $(".errors").append("<div class=\"alert alert-danger\" role=\"alert\">" + error + "</div>");
                    }
                }
            }
        });
    });
});

function updateModels(brandID) {

    $.get("carman/updateModels/" + brandID, function (data) {

        // Clearing past models.
        $('#model-select').empty();

        for (const model of data) {
            $('#model-select').append("<option value=\"" + model.ModelID + "\">" + model.ModelName + "</option>");
        }
    });
};
