@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Business'])
@endsection

@section('content')

<div>
    <div class="col-7 mx-auto">
        <div class="">
            <label for="name"><strong>Name:</strong></label>
            <p id="name">{{$business->name}}</p>
        </div>
        <div class="">
            <label for="tel"><strong>Phone:</strong></label>
            <p id="phone">{{$business->phone}}</p>
        </div>
    </div>
    <div class="col-7 mx-auto">
        <div class="h5 border-bottom" style="opacity:0.7">Address</div>
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
            <div class="col-md-4 ml-2">
                <label for="Zip"><strong>Zip:</strong></label>
                <p id="Zip">{{$business->businessAddresses->zip_code}}</p>
            </div>
        </div>
    </div>
    <div class="col-7 mx-auto row">
        <div class="mr-2">
            <form action="{{route('businesses.index')}}" method="get">
                <button type="submit" class="btn btn-success">Back</button>
            </form>
        </div>
        <div class="mr-2">
            <form action="{{route('businesses.edit', ['business'=>$business->id])}}" method="get">
                <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button>     
            </form>
        </div>
        <div class="mr-2">
            <form action="{{route('businesses.destroy', ['business'=>$business])}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>
</div>

@endsection
