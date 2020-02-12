@extends('layouts.app')

@section('content')
<div class="table">

    <table>

        @foreach($businesses as $business)
        <tr>
            <td>{{$business->name}}</td>
            <td>{{$business->phone}}</td>
            <td>{{$business->phone}}</td>
        </tr>
        @endforeach
    </table>

</div>
@endsection

