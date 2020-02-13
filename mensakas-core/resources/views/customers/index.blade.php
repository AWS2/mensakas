@extends('layouts.app')

@section('content')
<div class="table d-flex justify-content-center">
    <div class="">
            <form action="{{route('custoemrs.create')}}" method="get">
                <input type="submit" value="Add new business" class="btn btn-success mb-3 ml-3">
            </form>

        <table>
            <tr>
            <td></td>
            <td><strong>Name</strong></td>
            <td><strong>Emil</strong></td>
            <td><strong>Phone</strong></td>
            <td><strong>Address</strong></td>
            <td></td>
            <td></td>

            </tr>

            @foreach($customers as $customer)
            <tr>
                <td>
                <form action="{{route('customers.show', ['customer'=>$customer->id])}}" method="get">
                    <input type="submit" value="+" class="btn btn-success">
                </form>

                </td>
                <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->customerAddresse->street}},{{$customer->customerAddresse->city}}</td>
                <td>
                    <form action="{{route('customers.edit', ['customer'=>$customer->id])}}" method="get">
                        <input type="submit" value="Edit" class="btn btn-warning">
                    </form>

                </td>
                <td>
                <form action="{{route('customers.destroy', ['customer'=>$customer])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
