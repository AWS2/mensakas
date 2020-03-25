@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Rider'])
@endsection

@section('script')
<script src="{{ asset('js/geolocation.js') }} " defer></script>
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
            <input type="hidden" id='id_rider' name="" value="{{$rider->id}}">
            <div class="from-row" id="map" style="height: 300px; border-radius: 10px;">

            </div>
            <div class="mt-3 row">
                <div class="mr-2">
                    <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
                </div>
                <div class="mr-2">
                    <form action="{{route('riders.edit', ['rider'=>$rider])}}" method="get">
                        <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button>
                    </form>
                </div>
                <div>
                    <form action="{{route('riders.destroy', ['rider'=>$rider])}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
