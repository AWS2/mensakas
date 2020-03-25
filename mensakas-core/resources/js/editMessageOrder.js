console.log("MESSAGE JS");

$(document).ready(main);

function main() {
	$('#inputMessage').toggle();
	$('#addNewMessage').click(showOrHideInput);
}

function showOrHideInput () {
	if ($('#addNewMessage').text()=="Add new message") {
		$('#inputMessage').val("");
		$('#inputMessage').toggle();
		$('#addNewMessage').text("Confirm message");
	}else{
		addMessage($('#inputMessage').val());
		$('#inputMessage').toggle();
		$('#addNewMessage').text("Add new message");
	}
}

function addMessage(textMessage) {
	console.log(textMessage);
	var message = textMessage;
	var order_id = $("#orderID").val();
	$.ajax({
        type: 'POST',
        url: '/api/order/'+order_id+'/message',
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
        	'_method': 'PUT',
		    'message': message,
		    'order_id':order_id
		},
        success: function (data) {  
            alert(data);
            if (data.includes("2")) {
            	$('#message').text(message);
            }else if(data.includes("3")){
            	$('#message').text($('#message').text()+" / "+message);
            }
        }
    });
}