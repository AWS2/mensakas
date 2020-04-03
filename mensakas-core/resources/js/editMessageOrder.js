console.log("MESSAGE JS");

$(document).ready(main);

/**
* Function where we add new event on button id=#addNewMessage
*/
function main() {
	$('#inputMessage').toggle();
    $('#newMessage').toggle();
	$('#addNewMessage').click(showOrHideInput);
    $('#deleteMessages').click(deleteMessage);
}

function deleteMessage() {
    if (confirm('Are you sure?')) {
        var intOrderId = $("#orderID").val();
        $.ajax({
            type: 'POST',
            url: 'api/order/'+intOrderId+'/deletemessage',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                '_method': 'PUT',
                'order_id': intOrderId
            },
            success: function (data) {
                alert(data[0]);
                if (data[0].includes("deleted")) {
                    $('#message').text(data[1]);
                }
            }
        });
    }
}

/**
* Function where we call function addMessage(textMessage); if the button text is "Confirm message"
*/
function showOrHideInput () {
    var strInputMessage = $('#inputMessage');
    var buttonNewMessage = $('#addNewMessage');

	if (buttonNewMessage.text()=="New message") {
		strInputMessage.val("").toggle();
        $('#newMessage').toggle();
		buttonNewMessage.text("Confirm").css('color', 'white').attr('class', 'btn btn-success');
	}else if(buttonNewMessage.text()=="Confirm"){
		addMessage(strInputMessage.val());
		strInputMessage.toggle();
        $('#newMessage').toggle();
        buttonNewMessage.attr('class', 'btn btn-warning').css('color', 'black').text("New message");
	}
}

/**
* Function where we add new message (API)
* @params New message text
*/
function addMessage(textMessage) {
	var strMessage = textMessage;
	var intOrderId = $("#orderID").val();
	$.ajax({
        type: 'POST',
        url: 'api/order/'+intOrderId+'/message',
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
        '_method': 'PUT',
		    'message': strMessage,
		    'order_id': intOrderId
		},
        success: function (data) {
            alert(data);
            if (data.includes("Added")) {
            	$('#message').text(strMessage);
            }else if(data.includes("Updated")){
            	$('#message').text($('#message').text()+" / "+strMessage);
            }
        }
    });
}
