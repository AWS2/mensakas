@extends('layouts.app')

@section('content')

<div >
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="col-8 mx-auto">
                <label for="name"><strong>Name:</strong></label>
                <p id="name">{{$business->name}}</p>
            </div>
            <div class=" col-8 mx-auto">
                <label for="tel"><strong>Phone:</strong></label>
                <p id="phone">{{$business->phone}}</p>
            </div>
        </div>
        <div class="col-6">
            <div class="form-row">
                <div class="col-md-4">
                    <label for="street"><strong>Street:</strong></label>
                    <p id="street">{{$business->businessAddresses->street}}</p>
                </div>
                <div class=" col-md-2 ml-3">
                    <label for="number"><strong>Number:</strong></label>
                    <p id="number">{{$business->businessAddresses->number}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="City"><strong>City:</strong></label>
                    <p id="City">{{$business->businessAddresses->city}}</p>
                </div>
                <div class="col-md-2">
                    <label for="Zip">Zip:</label>
                    <p id="Zip">{{$business->businessAddresses->zip_code}}</p>
                </div>
            </div>
        </div>
        <div class="col-10 mx-auto row">
            <div class="mr-2">
                <form action="{{route('businesses.edit', ['business'=>$business->id])}}" method="get">
                    <button type="submit" class="btn btn-warning">Edit</button>
                </form>
            </div>
            <div>
                <form action="{{route('businesses.index')}}" method="get">
                    <button type="submit" class="btn btn-success">Back</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
