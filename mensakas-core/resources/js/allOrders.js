//call to OrderAPI with AJAX and render of the table
$(document).ready(main);

function main()
{
  createOrdersTable();
}

function createOrdersTable()
{
  $.ajax({
    type: 'GET',
    url: '/api/orders',
    dataType: 'json',
    success: function(data)
			{
      //RENDER OF THE TABLE
      var arrayDataComanda = data['data'];
      var arrayComanda;
      //this bucle gets the length of the comanda array to fill the table
      for (var i = 0; i < arrayDataComanda.length; i++)
			{
        arrayComanda = arrayDataComanda[i];
        arrayDataComandaId = arrayComanda['id'];
        $("#header").after("<tr id='tableContent"+i+"'>");
        getAllDataComanda(data, arrayDataComandaId, i);
				showEditButton(data, arrayDataComandaId, i);
        getAllDataCustomer(arrayDataComandaId, i);
        getAllDataStatus(arrayDataComandaId, i);
        getAllDataRiders(arrayDataComandaId, i);
        getAllDataAmount(arrayDataComandaId, i);
        getAllDataStatusMessage(arrayDataComandaId, i);
        $("</tr>").appendTo("#tableContent"+i);
      }
    }
  });
}

function getAllDataComanda(data, id, i)
{
  showComandaButton(data['data'][i], id, i);
}

function showComandaButton(dataComanda, id, i)
{
		var arrayDataComandaId;
		arrayDataComandaId = dataComanda['id'];
    $("<td id=tdShow>").appendTo("#tableContent"+i);
		//link to comandas.show
		$("<a id='showLink' href='http://localhost:8000/comandas/"+arrayDataComandaId+"'>").appendTo("#tdShow");
        $("<button type='submit' class='btn btn-success fa fa-search'></button>").appendTo('#showLink');
			$("</a>").appendTo("#td"+i+"");
    $("</td>").appendTo("#tableContent"+i);
}

function showEditButton(dataComanda, id, i)
{
  var arrayDataComandaId;
  arrayDataComandaId = dataComanda['data'][i];
  //link to comandas.edit
  $("<td id=tdEdit>").appendTo("#tableContent"+i);
	$("<a id='editLink' href='http://localhost:8000/comandas/"+arrayDataComandaId['id']+"/edit'>").appendTo("#tdEdit");
    $("<button type='submit' value='Edit' class='btn btn-warning'><i class='fa fa-pencil'></i> Edit</button>").appendTo('#editLink');
		$("</a>").appendTo("#tdtdEdit");
  $("</td>").appendTo("#tableContent"+i);
}

function getAllDataCustomer(id, i)
{
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

function showCustomerEmail(data, id, i)
{
  var customerId = data['id'];
  var customerEmail = data['email'];
  $("<td>"+customerEmail+"</td>").appendTo("#tableContent"+i);
}

function getAllDataStatus(id, i)
{
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/order/status/'+id,
    dataType: 'json',
    success: function(data)
		{
      dataLength = data['data'].length;
      showStatus(data['data'], id, i, dataLength);
    }
  });
}

function showStatus(data, id, i, dataLength)
{
  var lastStatus = data[dataLength-1];
  $("<td>"+lastStatus['status']+"</td>").appendTo("#tableContent"+i);
}

function getAllDataRiders(id, i)
{
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/order/rider/'+id,
    dataType: 'json',
    success: function(data)
		{
      showRiderUsername(data['data'], id, i);
    }
  });
}

function showRiderUsername(data, id, i)
{
  var riderUsername;
  if (data.length == 1)
	{
    riderUsername = data[0]['username'];
    $("<td>"+riderUsername+"</td>").appendTo("#tableContent"+i);
  }else{
    $("<td> -- </td>").appendTo("#tableContent"+i);
  }
}

function getAllDataAmount(id, i)
{
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/order/amount/'+id,
    dataType: 'json',
    success: function(data)
		{
      showAmount(data['data'], id, i);
    }
  });
}

function showAmount(data, id, i)
{
  var orderAmount;
  if (data.length == 1)
	{
    orderAmount = data[0]['amount'];
    $("<td>"+orderAmount+"€ </td>").appendTo("#tableContent"+i);
  }else{
    $("<td> -- </td>").appendTo("#tableContent"+i);
  }
}

function getAllDataStatusMessage(id, i)
{
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
