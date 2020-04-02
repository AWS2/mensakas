<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderStatus;
use App\Comanda;
use App\Status;
use App\CustomerAddress;
use App\Customer;
use App\Delivery;
use App\Rider;
use App\Payment;
use Validator;

class OrderAPI extends Controller
{

    public function updateMessage(Request $request,$id)
    {
        //
        $order = Order::find($id);
        $orderMessage = OrderStatus::find($order->order_status_id);
        if ($request->message == "") {
            return 'Message null.0';
        }

        if (is_null($orderMessage)) {
            return 'OrderStatus not found.1';
        }

        if ($orderMessage->message == NULL) {
            $orderMessage->message = $request->message;
            $orderMessage->save();
            return 'OrderStatus updated successfully.2';
        }

        $orderMessage->message = $orderMessage->message." / ".$request->message;
        $orderMessage->save();
        return 'OrderStatus updated successfully.3';
    }

    public function showMessages($id)
    {
      $dbOrder = Order::where('comanda_id', $id)->get('order_status_id');
      $dbOrderStatus =  OrderStatus::find($dbOrder)->get(0);
      if (is_null($dbOrderStatus)) {
          $response = [
              'success' => false,
              'data' => 'Empty',
              'message' => 'Order message not found.'
          ];
          return response()->json($response, 404);
      }

      $dataOrdersMessageArray = $dbOrderStatus->toArray();

      $response = [
          'success' => true,
          'data' => $dataOrdersMessageArray,
          'message' => 'Order message retrieved successfully.'
      ];

      return response()->json($response, 200)->header('Content-Type', 'application/json');
    }


    public function deleteMessage($id)
    {
        //
    }

    public function index()
    {
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $dbComandaAll = Comanda::all();
      if (is_null($dbComandaAll)) {
          $response = [
              'success' => false,
              'data' => 'Empty',
              'message' => 'Comanda not found.'
          ];
          return response()->json($response, 404);
      }

      $dataComandasArray = $dbComandaAll->toArray();

      $response = [
          'success' => true,
          'data' => $dataComandasArray,
          'message' => 'Comandas retrieved successfully.'
      ];

      return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    public function getOrders()
    {
      $dbOrderAll = Order::all();
      if (is_null($dbOrderAll)) {
          $response = [
              'success' => false,
              'data' => 'Empty',
              'message' => 'Order not found.'
          ];
          return response()->json($response, 404);
      }

      $dataOrdersArray = $dbOrderAll->toArray();

      $response = [
          'success' => true,
          'data' => $dataOrdersArray,
          'message' => 'Order retrieved successfully.'
      ];

      return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    public function getOrderStatus($id)
    {
      $dbOrder = Order::find($id);
      $dbOrderMessage = OrderStatus::find($dbOrder->order_status_id);
      if (is_null($dbOrderMessage)) {
          $response = [
              'success' => false,
              'data' => 'Empty',
              'message' => 'OrderStatus not found.'
          ];
          return response()->json($response, 404);
      }

      $dataOrderStatusArray = $dbOrderMessage->toArray();

      $response = [
          'success' => true,
          'data' => $dataOrderStatusArray,
          'message' => 'OrderStatus retrieved successfully.'
      ];

      return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    public function getCustomer($id)
    {
      $dbComandaAll = Comanda::find($id);
      $dbCustomerAddress = CustomerAddress::find($dbComandaAll->address_id);
      $dbCustomer = Customer::find($dbCustomerAddress->id);
      if (is_null($dbCustomer)) {
          $response = [
              'success' => false,
              'data' => 'Empty',
              'message' => 'Customer not found.'
          ];
          return response()->json($response, 404);
      }

      $dataCustomersArray = $dbCustomer->toArray();

      $response = [
          'success' => true,
          'data' => $dataCustomersArray,
          'message' => 'Customer retrieved successfully.'
      ];

      return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    public function getStatus($id)
    {
        $dbOrder = Order::where('comanda_id', $id)->get('order_status_id');
        $dbOrderStatus =  OrderStatus::find($dbOrder)->get(0);
        $dbStatus = Status::find($dbOrderStatus);

        if (is_null($dbStatus)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Status not found.'
            ];
            return response()->json($response, 404);
        }

        $dataStatusArray = $dbStatus->toArray();
        $response = [
            'success' => true,
            'data' => $dataStatusArray,
            'message' => 'Status retrieved successfully.'
        ];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    public function getRiderOrder($id)
    {
      $dbOrder = Order::where('comanda_id', $id)->get('id');
      $dbFindOrder = Order::find($dbOrder)->get(0);
      $dbDelivery = Delivery::where('order_id', $dbFindOrder->id)->get('riders_id');
      $dbRider = Rider::find($dbDelivery);

      if (is_null($dbRider)) {
          $response = [
              'success' => false,
              'data' => 'Empty',
              'message' => 'Rider not found.'
          ];
          return response()->json($response, 404);
      }

      $dataRiderArray = $dbRider->toArray();
      $response = [
          'success' => true,
          'data' => $dataRiderArray,
          'message' => 'Rider retrieved successfully.'
      ];

      return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    public function getAmountOrder($id)
    {
      $dbOrder = Order::where('comanda_id', $id)->get('id');
      $dbFindOrder = Order::find($dbOrder)->get(0);
      $dbPayment = Payment::where('id', $dbFindOrder->payment_id)->get('amount');

      if (is_null($dbPayment)) {
          $response = [
              'success' => false,
              'data' => 'Empty',
              'message' => 'Payment not found.'
          ];
          return response()->json($response, 404);
      }

      $dataPaymentArray = $dbPayment->toArray();
      $response = [
          'success' => true,
          'data' => $dataPaymentArray,
          'message' => 'Payment retrieved successfully.'
      ];

      return response()->json($response, 200)->header('Content-Type', 'application/json');
    }
}
