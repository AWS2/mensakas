@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Businesses'])
@endsection

@section('content')

<div class="table d-flex justify-content-center">
    <div class="">
        <table>
            <tr>
            <td></td>
            <td><strong>Name</strong></td>
            <td><strong>Phone</strong></td>
            <td><strong>Address</strong></td>
            <td colspan="2">
                <form action="{{route('businesses.create')}}" method="get">
                    <button type="submit" value="Add new business" class="btn btn-success ml-4"><i class="fa fa-plus"></i> Add Business</button>
                </form>
            </td>

            </tr>

            @foreach($businesses as $business)
            <tr>
                <td>
                    <form action="{{route('businesses.show', ['business'=>$business->id])}}" method="get">
                        <button type="submit" class="btn btn-success fa fa-search"></button>
                    </form>
                </td>
                <td>{{$business->name}}</td>
                <td>{{$business->phone}}</td>
                <td>{{$business->businessAddresses->street}},{{$business->businessAddresses->city}}</td>
                <td>
                    <form action="{{route('businesses.edit', ['business'=>$business->id])}}" method="get">
                        <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button>                        
                    </form>
                </td>
                <td>
                <form action="{{route('businesses.destroy', ['business'=>$business])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

