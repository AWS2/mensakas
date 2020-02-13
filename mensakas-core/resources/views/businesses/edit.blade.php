@extends('layouts.app')

@section('content')

<div>
    <form action="{{route('businesses.update', ['business'=>$business])}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="form-group col-8 mx-auto">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" value="{{$business->name}}" name="name">
                </div>
                <div class="form-group col-8 mx-auto">
                    <label for="tel">Phone:</label>
                    <input type="text" class="form-control" id="phone" value="{{$business->phone}}" name="phone">
                </div>
            </div>
            <div class="col-6">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="street">Street:</label>
                        <input type="text" class="form-control" id="street" name="street"
                            value="{{$business->businessAddresses->street}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="number">Number:</label>
                        <input type="text" class="form-control" id="number" name="number"
                            value="{{$business->businessAddresses->number}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="City">City:</label>
                        <input type="text" class="form-control" id="City" name="city"
                            value="{{$business->businessAddresses->city}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="Zip">Zip:</label>
                        <input type="text" class="form-control" id="Zip" name="zip_code"
                            value="{{$business->businessAddresses->zip_code}}">
                    </div>
                </div>
            </div>
            <div class="col-10 mx-auto row">
                <div class="mr-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                <div >
                <form action="{{route('businesses.index')}}" method="get">
                    <button type="submit" class="btn btn-success">Back</button>
                </form>
            </div>

            </div>
        </div>


</div>

@endsection
