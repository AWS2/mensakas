console.log('EDIT RIDER ORDER JS');

$(document).ready(main);

/**
* Add event on button #changeRiderButton
* Call function getAllDataRidersAPI();
*/
function main() {
	$('#newRider').toggle();
	$('#changeRiderButton').click(showOrHideRiders);
	getAllDataRidersAPI();
}

/**
* Function where we create the select and put all the options of the select with the json of the riders, and hide it and then use it
* @params JSON with all data of riders
*/
function createSelectForChangeRider(jsonRiders) {
	var selectWithRiders = $('<select>').attr('id', 'selectWithRiders');
	$.each(jsonRiders,function(index, value) {
    	selectWithRiders.append('<option value='+value.id+'>'+value.username+'</option>');
	});
	$('#changeRiderButton').before(selectWithRiders);
	selectWithRiders.hide();
}

/**
* Function to show and stop showing the button to show the riders.
* If text button is Select Rider then call a function updateOrCreateRiderOrder(intRiderID,intOrderID);
*/
function showOrHideRiders() {
	var buttonSelectNewRider = $('#changeRiderButton');
	var selectRiders = $('#selectWithRiders');

	if(buttonSelectNewRider.text()=='New rider'){
		selectRiders.toggle();
		$('#newRider').toggle();
		buttonSelectNewRider.attr('class', 'btn btn-success').text('Confirm').css('color', 'white');
	}
	else if(buttonSelectNewRider.text()=='Confirm'){
		selectRiders.toggle();
		$('#newRider').toggle();
		buttonSelectNewRider.text('New rider').attr('class', 'btn btn-warning').css('color', 'black');
		var intRiderID = $("#selectWithRiders option:selected").val();
		var intOrderID = $("#orderID").val();
		updateOrCreateRiderOrder(intRiderID,intOrderID);
	}
}

/**
* Call API and get all data then call function createSelectForChangeRider(data['data']); for create new select
*/
function getAllDataRidersAPI(){
	$.ajax({
        type: 'GET',
        url: ' http://localhost:8000/api/rider',
        dataType: 'json',
        success: function(data) {
        	var jsonDataRiders = data['data'];
        	createSelectForChangeRider(jsonDataRiders);
        }
    });
}

/**
* Function that is activated by clicking the button(Select Rider) where we make the API calls to do the update or the store
* @params rider_id and order_id, to make the relationship tables.
*/
function updateOrCreateRiderOrder(rider_id,order_id){
	$('#rider').text($("#selectWithRiders option:selected").text());
	var intDeliveryID = $('#deliveryID').val();
	//If exist data in table delivery, update delivery
	if (intDeliveryID > 0) {
		$.ajax({
	        type: 'POST',
	        url: '/api/delivery/'+intDeliveryID,
	        beforeSend: function (xhr) {
	            var token = $('meta[name="csrf_token"]').attr('content');
	            if (token) {
	                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	            }
	        },
	        data: {
	        	'_method': 'PUT',
			    'riders_id': rider_id,
			    'order_id':order_id
			},
	        success: function (data) {
	            alert(data);
	        }
	    });
	//If dont exist data in table delivery, store delivery
	}else{
		$.ajax({
	        type: 'POST',
	        url: '/api/delivery/',
	        beforeSend: function (xhr) {
	            var token = $('meta[name="csrf_token"]').attr('content');
	            if (token) {
	                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	            }
	        },
	        data: {
			    'riders_id': rider_id,
			    'order_id':order_id
			},
	        success: function (data) {
	            alert(data);
	        }
	    });
	}
}