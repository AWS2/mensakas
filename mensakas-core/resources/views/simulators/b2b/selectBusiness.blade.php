@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/filterTable.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: B2B select Business'])
@endsection

@section('content')

<div class="container">
    <div class="table-wrapper">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td></td>
                    <td>#</td>
                    <td><strong>Name</strong></td>
                    <td><strong>Phone</strong></td>
                    <td><strong>Address</strong></td>
                    <td><strong>Status</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach($businesses as $business)
                <tr>
                    <td>
                        <form action="{{route('simulator.b2b.showBusiness', ['business'=>$business])}}" method="get">
                            <button type="submit" class="btn btn-success">Select</button>
                        </form>
                    </td>
                    <td>{{$business->id}}</td>
                    <td>{{$business->name}}</td>
                    <td>{{$business->phone}}</td>
                    <td>{{$business->businessAddresses->street}},{{$business->businessAddresses->city}}</td>
                    <td>
                        @if ($business->active)
                        <span class=" text-success" style="font-size: 19px;">•</span>
                        <span>Active</span>
                        @else
                        <span class=" text-danger" style="font-size: 19px;">•</span>
                        <span>Inactive</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection