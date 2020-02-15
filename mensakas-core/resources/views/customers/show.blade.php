@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Customer'])
@endsection

@section('content')
@php ($customerAddress = $customer->customerAddresse)    

<div>
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="form-group col-8 mx-auto">
                <label for="first_name"><strong>First name:</strong></strong></label>
                <p id="first_name">{{$customer->first_name}}</p>
            </div>
            <div class="form-group col-8 mx-auto">
                <label for="last_name"><strong>Last name:</strong></strong></label>
                <p id="last_name">{{$customer->last_name}}</p>
            </div>
            <div class="form-group col-8 mx-auto">
                <label for="name"><strong>Email</strong></label>
                <p id="email">{{$customer->email}}</p>
            </div>
            <div class="form-group col-8 mx-auto">
                <label for="tel"><strong>Phone:</strong></label>
                <p id="phone">{{$customer->phone}}</p>
            </div>
        </div>
        <div class="col-6">
            <div class="h4" style="opacity:0.7">Address</div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="street"><strong>Street:</strong></label>
                    <p id="street">{{$customerAddress->street}}</p>
                </div>
                <div class="form-group col-md-2">
                    <label for="number"><strong>Number:</strong></label>
                    <p id="number">{{$customerAddress->number}}</p>
                </div>
                <div class="form-group col-md-2">
                    <label for="number"><strong>House number:</strong></label>
                    <p id="house_number">{{$customerAddress->house_number}}</p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="City"><strong>City:</strong></label>
                    <p id="city">{{$customerAddress->city}}</p>
                </div>
                <div class="form-group col-md-2">
                    <label for="Zip"><strong>Zip:</strong></label>
                    <p id="Zip">{{$customerAddress->zip_code}}</p>
                </div>
            </div>
        </div>
        <div class="col-10 mx-auto row">
            <div class="mr-2">
                <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
            </div>
            <div class="mr-2">
                <form action="{{route('customers.edit', ['customer'=>$customer->id])}}" method="get">
                    <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button>     
                </form>
            </div>
            <div>
                <form action="{{route('customers.destroy', ['customer'=>$customer])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection