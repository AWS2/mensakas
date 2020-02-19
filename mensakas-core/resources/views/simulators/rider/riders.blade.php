@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: select a rider'])
@endsection

@section('content')
<div class="table d-flex justify-content-center">

    <div class="">
        <table>
            <tr>
                <td></td>
                <td><strong>Name</strong></td>
                <td><strong>Last name</strong></td>
                <td><strong>Username</strong></td>
            </tr>

            @foreach($riders as $rider)
            <tr>
                <td>
                    <form action="{{route('simulator.rider.jobs', ['rider'=>$rider])}}" method="get">
                        <button type="submit" class="btn btn-success">Select</button>
                    </form>

                </td>
                <td>{{$rider->first_name}}</td>
                <td>{{$rider->last_name}}</td>
                <td>{{$rider->username}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
