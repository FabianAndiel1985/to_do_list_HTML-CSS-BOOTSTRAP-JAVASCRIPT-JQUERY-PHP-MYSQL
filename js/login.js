var request;

$("#loginButton").click(function(event) {

    let formValid = true;

    event.preventDefault();

    // validation

    let inputs = $("input");

    inputs.each(function() {
        if ($(this).val().length < 7) {
            if (!$(this).val()) {
                $(this).after("<span class='text-danger'> This field can't be empty <i class='fas fa-arrow-up'></i></span>");
            } else {
                $(this).after("<span class='text-danger'> This field has to be 7 characters min <i class='fas fa-arrow-up'></i></span>");
            }

            formValid = false;
        }
    })


    if (formValid) {

        if (request) {
            request.abort();
        }

        // send login data via ajax
        let form = $(this).parent();
        let inputData = form.find("input, select, button, textarea");
        let serializedData = inputData.serialize();

        $("input").prop('disabled', true);

        request = $.ajax({
            url: "./backend/verifyLogin.php",
            type: "post",
            data: serializedData
        });

        request.done(function(response, textStatus, jqXHR) {
            if (response == 1) {
                window.location.replace("http://localhost:8080/TechnikumPHP/home.php");
            } else {

            }
        });

        request.fail(function(jqXHR, textStatus, errorThrown) {
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });

        // enable inputs again
        request.always(function() {
            $("input").prop('disabled', false);
        });

    }
})