//call to OrderAPI with AJAX and render of the table
$(document).ready(main);

//Add event on button #changeRiderButton --- Call function getAllDataRidersAPI();
function main() {
	 getAllDataOrdersAPI();
}
//Call API and get all data then call function createSelectForChangeRider(data['data']); for create new select
function getAllDataOrdersAPI(){
	$.ajax({
        type: 'GET',
        url: ' http://localhost:8000/api/orders',
        dataType: 'json',
        success: function(data) {
            //render de la tabla
            createTableAllOrders(data['data']);

            // @foreach($comandas as $comanda)
            // <tr>
            //     <td>
            //         <form action="{{route('comandas.show', ['comanda'=>$comanda['id']])}}" method="get">
            //             <button type="submit" class="btn btn-success fa fa-search"></button>
            //         </form>
            //     </td>
            //     <td>{{$comanda->customerAddress->customer->email ?? 'deleted user'}}</td>
            //     <td>{{$comanda->order->orderStatus->status->status ?? 'without status'}}</td>
            //     <td>{{$comanda->order->delivery->rider->username ?? ''}}</td>
            //     <td>{{$comanda->order->payment->amount ?? ''}}</td>
            //     <td>{{$comanda->order->orderStatus->message ?? ''}}</td>
            //     <td>
            //         <form action="{{route('comandas.edit', ['comanda'=>$comanda['id']])}}" method="get">
            //             <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button>
            //         </form>
            //     </td>
            // </tr>
            // @endforeach

            //foreach
            //tr
            //td form button /form /td
            //td email
            //td Status
            //td username
            //td amount payment
            //td message
            //td form button /form /td
            ///tr
            //end foreach


						$("<td>{{"+arrayDataComandaId+" ?? 'deleted user'}}</td>").appendTo("#tableContent");
				    $("<td>{{$comanda->order->orderStatus->status->status ?? 'without status'}}</td>").appendTo("#tableContent");
				    $("<td>{{$comanda->order->delivery->rider->username ?? ''}}</td>").appendTo("#tableContent");
				    $("<td>{{$comanda->order->payment->amount ?? ''}}</td>").appendTo("#tableContent");
				    $("<td>{{$comanda->order->orderStatus->message ?? ''}}</td>").appendTo("#tableContent");

				    $("<td>").appendTo("#tableContent");
				      $("<form action='http://localhost:8000/comandas/"+arrayDataComanda['id']+"/edit' method='get'>").appendTo("#tableContent");
				      $("<button type='submit' value='Edit' class='btn btn-warning'><i class='fa fa-pencil'></i> Edit</button>").appendTo("#tableContent");
				      $("</form>").appendTo("#tableContent");
				    $("</td>").appendTo("#tableContent");

				    $("<td>"+arrayDataComandaId+"</td>").appendTo("#tableContent");

				    $("#header").after("</tr>");
        }
    });
}

  function createTableAllOrders(data){

  }
