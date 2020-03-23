<?php

namespace App\Http\Controllers;

use App\Comanda;
use App\Status;
use Illuminate\Http\Request;

class ComandaController extends Controller
{
    public function index()
    {
        $comandas = Comanda::all();

        return view('comandas.index')
            ->with('comandas', $comandas);
    }

    public function show(Comanda $comanda)
    {
        return view('comandas.show')
            ->with('comanda', $comanda);
    }

    public function edit(Comanda $comanda)
    {
        $status = Status::all();
        return view('comandas.edit')
            ->with(['comanda' => $comanda, 'status' => $status]);
    }

    public function update(Request $request, Comanda $comanda)
    {
        $comanda->ticket_json = $request->ticket_json;
        $comanda->save();

        $order = $comanda->order;
        $orderStatus = $order->orderStatus;

        $orderStatus->message = $request->message;
        $orderStatus->save();

        return redirect()->action(
            'ComandaController@show',
            ['comanda' => $comanda->id]
        )->with('success', 'Order edited successfully!');
    }
}
