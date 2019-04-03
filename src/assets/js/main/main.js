$(document).ready(() => {

    const modal = $('#loading-modal');

    $('.modal-body').hide();
    updateModels(1);

    $('#brand-select').on('change', (e) => {
        updateModels(e.target.value);
    });

    $('#send-form').on('submit', (e) => {

        if ($('[type=file]')[0].files[0].size / 1024 > 1024) {

            alert('This image is bigger than 1 MB, choose a different one.');
        } else {
            
            // Opening up the modal.
            modal.modal('show');
    
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
                async: true,
                success: function (data) {
    
                    setTimeout(() => {
    
                        // Clearing past errors.
                        $('.errors').empty();
    
                        if (data.length > 0) {
    
                            // Scrolling to the errors section.
                            $("html, body").animate({ scrollTop: 0 }, "slow");
    
                            // Closing up the modal.
                            modal.modal('hide');
    
                            // Displaying the current errors.   
                            for (const error of data) {
                                $(".errors").append("<div class=\"alert alert-danger\" role=\"alert\">" + error + "</div>");
                            }
                        } else {
    
                            $('.modal-body').show();
    
                            setTimeout(() => {
    
                                $('.modal-body').hide();
    
                                // Closing up the modal.
                                modal.modal('hide');
    
                            }, 1000);
                        }
                    }, 1000);
                }
            });
        }
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
