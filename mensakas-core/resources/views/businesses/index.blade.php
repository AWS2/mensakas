@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/filterTable.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush


@section('script')
<script src="{{asset('js/business/CreateBusiness.js')}}"defer></script>
<script src="{{asset('js/business/DeleteBusiness.js')}}"defer></script>
@endsection

@section('space')
@include('layouts.secondNav', ['title' => 'Businesses'])
@endsection

@section('content')

<div class="container">
    <div class="table-wrapper">
        <div class="table-filter">
            <div class="row">
                <div class="col-sm-3"> </div>
                <div class="col-sm-9">
                    <form action="" method="get">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <div class="filter-group">
                            <label>Search</label>
                            <input type="text" class="form-control" name="search">
                        </div>
                        <div class="filter-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td></td>
                    <td>#</td>
                    <td><strong>Name</strong></td>
                    <td><strong>Phone</strong></td>
                    <td><strong>Address</strong></td>
                    <td><strong>Status</strong></td>
                    <td colspan="2">
                        <form action="{{route('businesses.create')}}" method="get">
                            <button id="add" type="button" value="Add new business" class="btn btn-success ml-4"><i
                                    class="fa fa-plus"></i> Add
                                Business</button>
                        </form>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($businesses as $business)
                <tr>
                    <td>
                        <form action="{{route('businesses.show', ['business'=>$business->id])}}" method="get">
                            <button type="submit" class="btn btn-primary fa fa-search"></button>
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
                    <td>
                        <form action="{{route('businesses.edit', ['business'=>$business->id])}}" method="get">
                            <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i>
                                Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('businesses.destroy', ['business'=>$business])}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button id="delete" type="button" value="Delete" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection