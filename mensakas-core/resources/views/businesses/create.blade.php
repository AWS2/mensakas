@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'New Business'])
@endsection

@section('content')

@section('script')
<script src="{{asset('js/business/CreateBusiness.js')}}"defer></script>
@endsection

<div>
    <form action="{{route('businesses.store')}}" method="post" name ="myForm" onsubmit = "return(validate());">
 
        {{ csrf_field() }}
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="form-group col-8 mx-auto">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" value="" name="name" required>
                </div>
                <div class="form-group col-8 mx-auto">
                    <label for="tel">Phone:</label>
                    <input type="text" class="form-control" id="phone" value="" name="phone" required>
                </div>
            </div>
            <div class="col-6">
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
                    <button id="add" type="button" class="btn btn-primary">Create</button>
                </div>
    </form>
    <div>
        <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
    </div>
</div>
</form>
</div>

@endsection