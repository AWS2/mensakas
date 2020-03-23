$(document).ready(main);

//Add event on button #changeRiderButton --- Call function getAllDataRidersAPI();
function main() {
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
//Function to show and stop showing the button to show the riders,
//if text button is Select Rider then call a function updateOrCreateRiderOrder(rider_id,order_id); with new data
function showOrHideRiders() {
		if($('#changeRiderButton').text()=='Show active riders'){
			$('#selectWithRiders').toggle();
			$('#changeRiderButton').text('Select Rider');
		}
		else if($('#changeRiderButton').text()=='Select Rider'){
			$('#selectWithRiders').toggle();
			$('#changeRiderButton').text('Show active riders');
			var rider_id = $("#selectWithRiders option:selected").val();
			var order_id = $("#orderID").val();
			updateOrCreateRiderOrder(rider_id,order_id);
		}
}

//Call API and get all data then call function createSelectForChangeRider(data['data']); for create new select
function getAllDataRidersAPI(){
	$.ajax({
        type: 'GET',
        url: ' http://localhost:8000/api/mensakas',
        dataType: 'json',
        success: function(data) {
        	createSelectForChangeRider(data['data']);
        }
    });
}

//Function that is activated by clicking the button(Select Rider) where we make the API calls to do the update or the store
function updateOrCreateRiderOrder(rider_id,order_id){
	$('#rider').text($("#selectWithRiders option:selected").text());
	var deliveryID = $('#deliveryID').val();
	//If exist data in table delivery, update delivery
	if (deliveryID > 0) {
		$.ajax({
	        type: 'POST',
	        url: '/api/delivery/'+deliveryID,
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