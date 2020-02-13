@extends('layouts.app')

@section('content')
<div class="table d-flex justify-content-center">
    <div class="">
            <form action="{{route('businesses.create')}}" method="get">
                <input type="submit" value="Add new business" class="btn btn-success mb-3 ml-3">
            </form>

        <table>
            <tr>
            <td></td>
            <td><strong>Name</strong></td>
            <td><strong>Phone</strong></td>
            <td><strong>Address</strong></td>
            <td></td>
            <td></td>

            </tr>

            @foreach($businesses as $business)
            <tr>
                <td>
                <form action="{{route('businesses.show', ['business'=>$business->id])}}" method="get">
                    <input type="submit" value="+" class="btn btn-success">
                </form>

                </td>
                <td>{{$business->name}}</td>
                <td>{{$business->phone}}</td>
                <td>{{$business->businessAddresses->street}},{{$business->businessAddresses->city}}</td>
                <td>
                    <form action="{{route('businesses.edit', ['business'=>$business->id])}}" method="get">
                        <input type="submit" value="Edit" class="btn btn-warning">
                    </form>

                </td>
                <td>
                <form action="{{route('businesses.destroy', ['business'=>$business])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('are you sure?')">
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

