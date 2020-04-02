//call to OrderAPI with AJAX and render of the table
$(document).ready(main);

function main() {
  createOrdersTable();
}
////////////////////////////////////////////////////////////

function createOrdersTable(){
  $.ajax({
    type: 'GET',
    url: '/api/orders',
    dataType: 'json',

    success: function(data) {
      //render de la tabla
      //crear funcion para hacer un bucle y que haga las llamadas a ajax que toquen y estasllamadas llamen a la funcion que genere la tabla con los datos correspondientes
      var arrayDataComanda = data['data'];
      var arrayComanda;
      //this bucle gets the length of the comanda array to fill the table
      // for (var i = (arrayDataComanda.length-5); i < arrayDataComanda.length; i++) {
      for (var i = 0; i < arrayDataComanda.length; i++) {
        arrayComanda = arrayDataComanda[i];
        arrayDataComandaId = arrayComanda['id'];
        $("#header").after("<tr id='tableContent"+i+"'>");
        getAllDataComanda(data, arrayDataComandaId, i);
        getAllDataCustomer(arrayDataComandaId, i);
        getAllDataStatus(arrayDataComandaId, i);
        getAllDataRiders(arrayDataComandaId, i);
        getAllDataAmount(arrayDataComandaId, i);
        getAllDataStatusMessage(arrayDataComandaId, i);
        showEditButton(data, arrayDataComandaId, i);
        $("</tr>").appendTo("#tableContent"+i);
      }
    }
  });
}


/////////////////////////////////////////////////////////////


//FIRST BUTTON TO COMANDA.SHOW------------------------------------------------------------------------------------------------------------> REDIRECT NEEDS TO BE FIXED

function getAllDataComanda(data, id, i){
  showComandaButton(data['data'][i], id, i);
}
//$(location).attr('href','http://localhost:8000/comandas/' + arrayDataComandaId);
function showComandaButton(dataComanda, id, i){
		var arrayDataComandaId;
		arrayDataComandaId = dataComanda['id'];
    $("<td id=td"+i+">").appendTo("#tableContent"+i);
		$("<a id='showLink' href='http://localhost:8000/comandas/"+arrayDataComandaId+"'>").appendTo("#td"+i+"");
    //link to comandas.show
      // $("<form  href='http://localhost:8000/comandas/"+arrayDataComandaId+"' method='get'>").appendTo("#td"+i);
        $("<button type='submit' class='btn btn-success fa fa-search'></button>").appendTo('#showLink');
      // $("</form>").appendTo("#td"+i);
			$("</a>").appendTo("#td"+i+"");
    $("</td>").appendTo("#tableContent"+i);
  }


/////////////////////////////////////////////////////////////////

function showEditButton(dataComanda, id, i){
  var arrayDataComandaId;
  arrayDataComandaId = dataComanda['data'][i];
  //link to comandas.edit
  $("<td id=tdEdit>").appendTo("#tableContent"+i);
	$("<a id='editLink' href='http://localhost:8000/comandas/"+arrayDataComandaId['id']+"/edit'>").appendTo("#td"+i+"");
    // $("<form href='http://localhost:8000/comandas/"+arrayDataComandaId['id']+"/edit' method='get'>").appendTo("#tdEdit");
    $("<button type='submit' value='Edit' class='btn btn-warning'><i class='fa fa-pencil'></i> Edit</button>").appendTo('#editLink');
    // $("</form>").appendTo("#tdEdit");
		$("</a>").appendTo("#td"+i+"");
  $("</td>").appendTo("#tableContent"+i);

}
////////////////////////////////////////////////////////////////////

//FIRST FIELD EMAIL CUSTOMER

function getAllDataCustomer(id, i){
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/order/customer/'+id,
    dataType: 'json',
		async: false,
    success: function(data) {
      showCustomerEmail(data['data'], id, i);
    }
  });
}

function showCustomerEmail(data, id, i){

  var customerId = data['id'];
  var customerEmail = data['email'];
  $("<td>"+customerEmail+"</td>").appendTo("#tableContent"+i);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//SECOND FIELD STATUS payment

function getAllDataStatus(id, i){
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/order/status/'+id,
    dataType: 'json',

    success: function(data) {
      dataLength = data['data'].length;
      showStatus(data['data'], id, i, dataLength);
    }
  });
}

function showStatus(data, id, i, dataLength){
  var lastStatus = data[dataLength-1];
  $("<td>"+lastStatus['status']+"</td>").appendTo("#tableContent"+i);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///catch rider username
//THIRD FIELD RIDER

function getAllDataRiders(id, i){
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/order/rider/'+id,
    dataType: 'json',

    success: function(data) {
      showRiderUsername(data['data'], id, i);
    }
  });
}

function showRiderUsername(data, id, i){
  var riderUsername;
  if (data.length == 1) {
    riderUsername = data[0]['username'];
    $("<td>"+riderUsername+"</td>").appendTo("#tableContent"+i);
  }else{
    $("<td> -- </td>").appendTo("#tableContent"+i);
  }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///catch rider username
//THIRD FIELD RIDER

function getAllDataAmount(id, i){
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/order/amount/'+id,
    dataType: 'json',

    success: function(data) {
      showAmount(data['data'], id, i);
    }
  });
}

function showAmount(data, id, i){
  var orderAmount;
  if (data.length == 1) {
    orderAmount = data[0]['amount'];
    $("<td>"+orderAmount+"€ </td>").appendTo("#tableContent"+i);
  }else{
    $("<td> -- </td>").appendTo("#tableContent"+i);
  }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getAllDataStatusMessage(id, i){
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/order/message/'+id,
    dataType: 'json',

    success: function(data) {
      showStatusMessage(data['data'], id, i);
    }
  });
}

function showStatusMessage(data, id, i){
  var StatusMessage;
  if (data['message'] == null) {
    $("<td> -- </td>").appendTo("#tableContent"+i);
  }else{
    StatusMessage = data['message'];
    $("<td>"+StatusMessage+"</td>").appendTo("#tableContent"+i);
  }
}
