@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'New Rider'])
@endsection

@section('content')

<div>
    <form action="{{route('riders.store')}}" method="post">
        {{ csrf_field() }}
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="mr-2">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
    </form>
    <div>
        <form action="{{route('riders.index')}}" method="get">
            <button type="submit" class="btn btn-success">Back</button>
        </form>
    </div>
</div>
</div>
</div>
</div>

@endsection
