@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Edit Rider'])
@endsection

@section('content')

<div>
    <form action="{{route('riders.update', ['rider'=>$rider])}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{$rider->first_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{$rider->last_name}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{$rider->username}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{$rider->phone}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="mr-2">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                    </form>
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
