@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Simulator: Make order'])
@endsection


@section('content')

<div class="container">
    <form action="{{route('simulator.comanda.customerStore')}}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-6">
                <div class="form-group col-8 mx-auto">
                    <label for="name">First name:</label>
                    <input type="text" class="form-control" id="name" value="" name="first_name">
                </div>
                <div class="form-group col-8 mx-auto">
                    <label for="name">Last name:</label>
                    <input type="text" class="form-control" id="name" value="" name="last_name">
                </div>
                <div class="form-group col-8 mx-auto">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" id="name" value="" name="email" required>
                </div>
                <div class="form-group col-8 mx-auto">
                    <label for="tel">Phone:</label>
                    <input type="text" class="form-control" id="phone" value="" name="phone">
                </div>
            </div>
            <div class="col-6">
                <div class="h4" style="opacity:0.7">Address</div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="street">Street:</label>
                        <input type="text" class="form-control" id="street" name="street" value="" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="number">Number:</label>
                        <input type="text" class="form-control" id="number" name="number" value="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="City">City:</label>
                        <input type="text" class="form-control" id="City" name="city" value="" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="Zip">Zip:</label>
                        <input type="text" class="form-control" id="Zip" name="zip_code" value="" required>
                    </div>
                </div>
            </div>
            <div class="col-10 mx-auto row">
                <div class="mr-2">
                    <button type="submit" class="btn btn-primary">Start order</button>
                </div>
    </form>
    <div>
        <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
    </div>
</div>
</div>
</div>

@endsection