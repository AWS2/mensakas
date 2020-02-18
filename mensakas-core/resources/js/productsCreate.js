
$(document).ready(imReady);

function imReady() {
    $('#extraDiv').hide();
    $("#categoryInput").on('input', function () {
        if ($("#categoryInput").val() == 1) {
            $('#extraDiv').show();
        } else {
            $('#extraDiv').hide();
        }
    });
}