
$(document).ready(imReady);

function imReady() {
    $('#extraDiv').hide();
    $("#categoryInput").on('input', function () {
        console.log($("#categoryInput").val());
        if ($("#categoryInput").val() == 1) {
            $('#extraDiv').show();
        } else {
            $('#extraDiv').hide();
        }
    });
}