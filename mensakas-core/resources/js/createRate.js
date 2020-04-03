console.log("Rate")

$(document).ready(main);

function main() {
    $('#rate').click(changeRate);
    $('#create').click(createRate);
    $('#createInvoice').click(createInvoice);
    $('.changeStatus').click(changeStatus)
}

function changeRate() {
    if (confirm('Are you sure?')) {
        var businessId = $("#businessId").val();
        var fixed_rate = parseInt(prompt("Fixed Rate:"))
        var percentage_rate = parseFloat(prompt("Percentage Rate:"))
        $.ajax({
            type: 'PUT',
            url: '/api/business/rate',
            data: {
                'business_id': businessId,
                'fixed_rate': fixed_rate,
                'percentage_rate': percentage_rate

            },
            success: function (response) {
                refreshData(response)
            },
            error: function (response) {
                displayError(response)
            }
        });
    }
}

function createRate() {
    if (confirm('Are you sure?')) {
        var businessId = $("#businessId").val();
        var fixed_rate = parseInt(prompt("Fixed Rate:"))
        var percentage_rate = parseFloat(prompt("Percentage Rate:"))
        $.ajax({
            type: 'PUT',
            url: '/api/business/rate',
            data: {
                'business_id': businessId,
                'fixed_rate': fixed_rate,
                'percentage_rate': percentage_rate

            },
            success: function (response) {
                createData(response)
            },
            error: function (response) {
                displayError(response)
            }
        });
    }
}

function refreshData(response) {
    $("#fRate").text(response.data.fixed_rate);
    $("#pRate").text(response.data.percentage_rate);
    $("#errors").empty()
}

function displayError(response) {
    console.log(response)

    $("#errors").html("ERROR:<br>" + response.responseText + "<br>Try again");

}

function createData(response) {
    console.log(response)
    $("#new").empty();

    let value = '<div class="h3 mt-2" style="opacity:0.7">Business Rate</div> <div class="form-group col-md-4"><label for="fRate"><strong>Fixed Rate:</strong></label> <p id="fRate">' + response.data.fixed_rate + '</p></div><div class="form-group col-md-4"> <label for="pRate"><strong>Percentage Rate:</strong></label> <p id="pRate">' + response.data.percentage_rate + ' </p></div><div class="form-group col-md-4"><button type="submit" id="rate" class="btn btn-warning btn-block"> Modify  Rate</button> </div>  <div class="form-group col-md-4" id="errors"></div>'
    $(value).appendTo($("#new"))
    refreshEvents()
}


function createInvoice() {
    if (confirm('Are you sure?')) {
        var businessId = $("#businessId").val();
        var orderAmount = parseFloat(prompt("Order amount:"))
        $.ajax({
            type: 'POST',
            url: '/api/business/' + businessId + "/invoice",
            data: {
                'orderAmount': orderAmount

            },
            success: function (response) {
                createInvoiceHtml(response)
            },
            error: function (response) {
                displayInvoiceError(response)
            }
        });
    }
}

function displayInvoiceError(response) {
    console.log(response)
    $("#ierrors").html("ERROR:<br>" + response.responseText + "<br>Try again");
}

function createInvoiceHtml(response) {
    $("#ierrors").empty();

    let value = '<div class="col-8 mt-3 invoice' + response.data.id + '"><strong>Amount:</strong> ' + response.data.amount + '<br><strong>Status:</strong> ' + response.data.status + '<button value="' + response.data.id + '" class="btn btn-success btn-block changeStatus">Change Status</button></div>'
    $(value).appendTo($("#invoices"))
    refreshEvents()

}

function changeStatus(event) {
    console.log(event.target.value)
    if (confirm('Are you sure?')) {
        var targetId = event.target.value;
        var status = prompt("Status:(PAID|UNPAID)")
        $.ajax({
            type: 'PATCH',
            url: '/api/invoice/' + targetId,
            data: {
                'status': status
            },
            success: function (response) {
                changeInvoice(response)
            },
            error: function (response) {
                displayInvoiceError(response)
            }
        });
    }
}

function changeInvoice(response) {
    $("#ierrors").empty();
    let div = $(".invoice" + response.data.id)
    let value = '<strong>Amount:</strong> ' + response.data.amount + '<br><strong>Status:</strong> ' + response.data.status + '<button value="' + response.data.id + '" class="btn btn-success btn-block changeStatus">Change Status</button>'
    div.html(value)
    refreshEvents()

}

function refreshEvents() {
    $('#rate').unbind();
    $('#create').unbind();
    $('#createInvoice').unbind();
    $('.changeStatus').unbind()
    $('#rate').click(changeRate);
    $('#create').click(createRate);
    $('#createInvoice').click(createInvoice);
    $('.changeStatus').click(changeStatus)
}

