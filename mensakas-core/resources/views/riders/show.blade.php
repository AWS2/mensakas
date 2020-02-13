@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Rider'])
@endsection

@section('content')

<div>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name"><strong>Name:</strong></label>
                    <p id="first_name">{{$rider->first_name}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name"><strong>Last name:</strong></label>
                    <p id="last_name">{{$rider->last_name}}</p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username"><strong>Username:</strong></label>
                    <p id="username">{{$rider->username}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone"><strong>Phone:</strong></label>
                    <p id="phone">{{$rider->phone}}</p>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="mr-2">
                    <form action="{{route('riders.edit', ['rider'=>$rider])}}" method="get">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
                <div >
                    <form action="{{route('riders.index')}}" method="get">
                        <button type="submit" class="btn btn-success">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
