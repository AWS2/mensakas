@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/filterTable.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: B2B - #'. $business->id])
@endsection

@section('script')
<script src="{{ asset('js/createRate.js') }} " defer></script>
@endsection

@section('content')

<div class="container">
    @if (isset($business->businessRate))
    <div class="col-8 mx-auto border-top">
        <div class="h3 mt-2" style="opacity:0.7">Business Rate</div>
        <div class="form-group col-md-4">
            <label for="fRate"><strong>Fixed Rate:</strong></label>
            <p id="fRate">{{$business->businessRate->fixed_rate }}</p>
        </div>
        <div class="form-group col-md-4">
            <label for="pRate"><strong>Percentage Rate:</strong></label>
            <p id="pRate">{{$business->businessRate->percentage_rate}} </p>
        </div>
        <div class="form-group col-md-4">
            <button type="submit" id="rate" class="btn btn-warning btn-block"> Modify
                Rate</button>
        </div>
        <div class="form-group col-md-4" id="errors"></div>

        @else
        <div id="new" class="col-6 mx-auto border-top">
            <div class="row">
                <div class="h3 mt-2" style="opacity:0.7">Business Rate</div>
                <div class="row">
                    <h6>This business dont have any rate yet</h4>
                        <button type="submit" id="create" class="btn btn-success btn-block"> Create
                            Rate</button>

                </div>
                <div class="form-group col-md-4" id="errors"></div>
            </div>
        </div>
        @endif
        <div id="invoices" class="row mx-auto border-top">
            <div class="h3 mt-2 col-4" style="opacity:0.7">Business Invoice</div>
            <button id="createInvoice" class="col-4 btn btn-success btn-block">Creante new invoice</button>

            @if (empty($business->businessInvoices))
            <h6>This business dont have any invoice yet.</h6>
            <button id="createInvoice" class="btn btn-success btn-block">Create new invoice</button>

            @else
            @foreach ($business->businessInvoices as $invoice)
            <div class="col-8 mt-3 invoice{{ $invoice->id }}">
                <strong>Amount:</strong> {{ $invoice->amount }}
                <br>
                <strong>Status:</strong> {{ $invoice->status }}
                <button value="{{ $invoice->id }}" class="btn btn-success btn-block changeStatus">Change Status</button>
            </div>
            @endforeach
            @endif

        </div>
        <div class="form-group col-md-4" id="ierrors"></div>
    </div>
</div>

<div>
    <input type="hidden" id="businessId" value="{{ $business->id }}">
</div>
@endsection