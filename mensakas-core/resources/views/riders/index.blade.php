@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Riders'])
@endsection

@section('content')
<div class="table d-flex justify-content-center">
    <div class="">
            <form action="{{route('riders.create')}}" method="get">
                <input type="submit" value="Add new rider" class="btn btn-success mb-3 ml-3">
            </form>

        <table>
            <tr>
            <td></td>
            <td><strong>Name</strong></td>
            <td><strong>Last name</strong></td>
            <td><strong>Username</strong></td>
            <td><strong>Phone</strong></td>
            <td></td>
            <td></td>

            </tr>

            @foreach($riders as $rider)
            <tr>
                <td>
                <form action="{{route('riders.show', ['rider'=>$rider])}}" method="get">
                    <input type="submit" value="+" class="btn btn-success">
                </form>

                </td>
                <td>{{$rider->first_name}}</td>
                <td>{{$rider->last_name}}</td>
                <td>{{$rider->username}}</td>
                <td>{{$rider->phone}}</td>
                <td>
                    <form action="{{route('riders.edit', ['rider'=>$rider])}}" method="get">
                        <input type="submit" value="Edit" class="btn btn-warning">
                    </form>

                </td>
                <td>
                <form action="{{route('riders.destroy', ['rider'=>$rider])}}" method="post">
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
